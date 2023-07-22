<?php

namespace App\Models;

use App\Traits\Numeric;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrder extends Model
{
    use HasFactory, SoftDeletes, Numeric;

    protected $table = 'detail_orders';
    protected $fillable = [
        'product_id', 'order_id', 'payment', 'quantity'
    ];

    protected function payment(): Attribute {
        return Attribute::make(
            get: fn (string $value) => $this->covertToMoney($value)
        );
    }

    /**
     * Get the product that owns the DetailOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
