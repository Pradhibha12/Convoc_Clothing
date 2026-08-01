<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Theme;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Store;
use App\Models\User;
use App\Models\Payout;

class PayoutController extends Controller
{
      //Payout System
    public function payout_reports()
    {
        // Default: current month
        $page_data['start_date'] = strtotime('first day of this month');
        $page_data['end_date']   = strtotime('last day of this month');

        // Date range filter
        if (request()->filled('eDateRange')) {
            $date = explode('-', urldecode(request()->query('eDateRange')));

            $page_data['start_date'] = strtotime(trim($date[0]) . ' 00:00:00');
            $page_data['end_date']   = strtotime(trim($date[1]) . ' 23:59:59');
        }

        $query = Payout::where('user_id', auth()->id())
            ->whereBetween('created_at', [
                date('Y-m-d H:i:s', $page_data['start_date']),
                date('Y-m-d H:i:s', $page_data['end_date']),
            ])
            ->latest('id');

        $page_data['payout_reports'] = $query
            ->paginate(10)
            ->appends(request()->query());

        $page_data['payout_request'] = Payout::where('user_id', auth()->id())
            ->where('status', 0)
            ->first();

        // 👇 COMMON HELPERS (you asked for this)
        $page_data['total_payout'] = vendor_total_payout();
        $page_data['balance']      = vendor_available_balance();

        $page_data['page_title'] = get_phrase('Payout Reports');

        return view('store.payout_report.index', $page_data);
    }

    public function payout_setting(){
         $page_data['page_title'] = get_phrase('Payout  Settings');
        $payment_setting         = User::where('id', auth()->user()->id)->first();
        $page_data['vendor'] = json_decode($payment_setting->paymentkeys, true);
        return view('store.payout_report.payout_settings', $page_data);
    }

    public function payout_setting_store(Request $request) {
        $data = $request->all();
        array_shift($data);
        $data = json_encode($_POST['gateways']);

        User::where('id', auth()->user()->id)->update(['paymentkeys' => $data]);
        return redirect(route('vendor.payout.setting'))->with('success', get_phrase('Payout setting updated'));
    }

    public function payout_withdrawal(){
        return view('store.payout_report.withdrawal');
    }

    public function payout_reports_store(Request $request)
    {
        // check old request
        if (Payout::where('user_id', auth()->user()->id)->where('status', 0)->exists()) {
            Session::flash('error', get_phrase('Your request is in process.'));
            return redirect()->back();
        }

        // check amount validity
        $total_income      = vendor_total_revenue();
        $total_payout      = vendor_total_payout();
        $balance_remaining = $total_income - $total_payout;

        if ($request->amount < 1 || $request->amount > $balance_remaining) {
            Session::flash('error', get_phrase('You do not have sufficient balance.'));
            return redirect()->back();
        }

        $data['user_id'] = auth()->user()->id;
        $data['amount']  = $request->amount;
        Payout::insert($data);

         return redirect(route('vendor.payout.reports'))->with('success', get_phrase('Your request has been submitted.'));
    }

    public function payout_delete($id)
    {
        if (Payout::where('id', $id)->where('user_id', auth()->user()->id)->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }
        Payout::where('id', $id)->delete();
        Session::flash('success', get_phrase('Your request has been deleted.'));
        return redirect()->back();
    }


}
