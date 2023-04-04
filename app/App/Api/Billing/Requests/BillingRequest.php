<?php

namespace App\Api\Billing\Requests;

use Core\Http\Requests\APIValidationRequest;
use Illuminate\Http\Request;
use Domain\Billing\Models\Billing;

class BillingRequest extends APIValidationRequest
{
    public function rules()
    {
        return Billing::$rules;
    }
}