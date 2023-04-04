<?php

namespace Domain\Billing\Actions;

final class CreateBillingAction
{

    public function __invoke(BillingData $billingData): Billing {
        //@TODO: Create Billing in Database
    }

}
