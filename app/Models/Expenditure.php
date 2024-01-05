<?php

namespace App\Models;

use App\Enums\ExpenditureType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency',
        'grossAmount',
        'type',
        'description',
        'reference',
        'merchant',
        'paidAt',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paidAt' => 'date',
        'type' => ExpenditureType::class
    ];
}
