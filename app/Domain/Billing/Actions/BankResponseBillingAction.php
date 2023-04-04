<?php

namespace Domain\Billing\Actions;

use Domain\Billing\Repository\Contracts\BillingRepositoryContract;

final class BankResponseBillingAction
{
    protected $billingRepository;

    public function __construct(BillingRepositoryContract $billingRepo) 
    {
        $this->billingRepository = $billingRepo;
    }

    public function __invoke($receiveBilling) {
        $billing = $this->billingRepository->getByDebtId($receiveBilling['debtId']);

        if (empty($billing)) {
            return false;
        }

        return $this->billingRepository->update($receiveBilling, $billing['id']);
    }
}
