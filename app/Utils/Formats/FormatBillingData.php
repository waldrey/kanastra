<?php

namespace Utils\Formats;

use Carbon\Carbon;

class FormatBillingData 
{
    public static function handle($billings) 
    {
        foreach ($billings as $key => $billing) {
            $billings[$key]['governmentId'] = (int)$billing['governmentId'];
            $billings[$key]['debtId'] = (int)$billing['debtId'];
            $billings[$key]['debtAmount'] = floatval($billing['debtAmount']);
            $billings[$key]['created_at'] = Carbon::now('utc')->toDateTimeString();
            $billings[$key]['updated_at'] = Carbon::now('utc')->toDateTimeString();
        }

        return $billings;
    }
}