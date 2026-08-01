<?php

namespace App\Models\payment_gateway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skrill extends Model
{
    use HasFactory;

    public static function payment_status($transaction_keys = [])
    {
        if (is_array($transaction_keys) && count($transaction_keys) > 0) {
            array_shift($transaction_keys);
            session(['keys' => $transaction_keys]);
            return true;
        }
        return false;
    }
}
