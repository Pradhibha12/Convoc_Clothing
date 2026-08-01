<?php

namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class OfflinePayment extends Model
{
    use HasFactory;


    public static function payment_status($transaction_keys = [])
    {

        // Extract relevant fields
        $bank_no = $transaction_keys['bank_no'] ?? null;
        $phone_no = $transaction_keys['phone_no'] ?? null;
        $doc = $transaction_keys['doc'] ?? null;

        // File saving logic
        if ($doc && $doc->isValid()) {
            
            $destinationPath = public_path('uploads/offline_payment');

            // Create directory if it doesn't exist
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Generate unique filename
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $doc->getClientOriginalName());
            $doc->move($destinationPath, $fileName);

            $filePath = 'uploads/offline_payment/' . $fileName;

            // Store JSON in session
            $sessionData = [
                'bank_no' => $bank_no,
                'phone_no' => $phone_no,
                'file_path' => $filePath
            ];

            Session::put('session_id', json_encode($sessionData));

            return true;
        }

        return false;
    }

}
