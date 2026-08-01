@php
    $payment_details = session('payment_details');
    // user information
    $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();

@endphp

<form action="{{ route('make.order') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="user_name" name="user_name" value="{{ $user->name }}">
    <input type="hidden" id="email" name="email" value="{{ $user->email }}">
    <input type="hidden" id="phone" name="phone" value="{{ $user->phone }}">
    <input type="hidden" id="amount" name="amount" value="{{ $payment_details['payable_amount'] }}">
    <input type="submit" value="Pay by Paytm" class="btn-payment btn py-2 px-3">
</form>
