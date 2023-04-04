<?php

namespace Domain\Billing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use SoftDeletes;

    protected $table = 'billing';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'governmentId',
        'email',
        'debtAmount',
        'debtDueDate',
        'debtId',
        'paid_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'debtDueDate',
    ];

    public static $rules = [];
}
