<?php

namespace Domain\Billing\Repository\Eloquent;

use App\Repositories\AbstractRepository;
use Domain\Billing\Repository\Contract\BillingRepositoryContract;

class BillingRepository extends AbstractRepository implements BillingRepositoryContract;
{

    protected $model = Billing::class;

}
