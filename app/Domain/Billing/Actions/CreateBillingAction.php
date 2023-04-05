<?php

namespace Domain\Billing\Actions;

use Domain\Billing\Repository\Contracts\BillingRepositoryContract;

final class CreateBillingAction
{

    protected $billingRepository;

    public function __construct(BillingRepositoryContract $billingRepo) 
    {
        $this->billingRepository = $billingRepo;
    }

    public function __invoke($billingData) 
    {
        return $this->billingRepository->insert($billingData);
    }

}
