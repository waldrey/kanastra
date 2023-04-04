<?php

namespace Domain\Billing\Repository\Eloquent;

use App\Core\Repositories\AbstractRepository;
use Domain\Billing\Repository\Contracts\BillingRepositoryContract;
use Domain\Billing\Models\Billing as Billing;

class BillingRepository extends AbstractRepository implements BillingRepositoryContract
{

    protected $model = Billing::class;

    public function insert($data)
    {
        return $this->model->insert($data);
    }
}
