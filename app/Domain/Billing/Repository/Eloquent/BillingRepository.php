<?php

namespace Domain\Billing\Repository\Eloquent;

use Core\Repositories\AbstractRepository;
use Domain\Billing\Repository\Contracts\BillingRepositoryContract;
use Domain\Billing\Models\Billing as Billing;

class BillingRepository extends AbstractRepository implements BillingRepositoryContract
{

    protected $model = Billing::class;

    public function insert($data)
    {
        return $this->model->insert($data);
    }

    public function getByDebtId($debtId)
    {
        return $this->model->where('debtId', $debtId)->first();
    }

    public function update($dataUpdate, $billingId)
    {
        $billing = $this->model->find($billingId);
        return $billing->update($dataUpdate);
    }
}
