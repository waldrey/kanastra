<?php

namespace Utils\Formats;

use Carbon\Carbon;

class FormatBillingData 
{
    public static function formatTypes($billings) 
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

    public static function formatBankHook($billing) 
    {
        $billingFormatted = [
            'debtId' => (int) $billing['debtId'],
            'paid_amount' => floatval($billing['paidAmount']),
            'paid_at' => $billing['paidAt'],
            'updated_at' => Carbon::now('utc')->toDateTimeString(),
        ];

        return $billingFormatted;
    }

    public static function formatResponse($billings) 
    {
        $billingsResponse = [];
        foreach ($billings as $key => $billing) {
            array_push($billingsResponse, [
                'name' => $billing['name'],
                'debtAmount' => $billing['debtAmount'],
                'debtId' => $billing['debtId'],
            ]);
        }

        return $billingsResponse;
    }
}