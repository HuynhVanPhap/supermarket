<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticRevenue extends Model
{
    use HasFactory;

    protected $table = 'analytic_revenue';
    protected $fillable = [
        'id',
        'order_id',
        'date',
        'month',
        'year',
        'revenue',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
