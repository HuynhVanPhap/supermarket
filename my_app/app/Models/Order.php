<?php

namespace App\Models;

use App\Traits\DateTimeHelper;
use App\Traits\StatusTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory, StatusTrait, DateTimeHelper;

    protected $table = 'orders';
    protected $fillable = [
        'code', 'name', 'email', 'phone', 'address', 'status', 'date_receive', 'date_payment', 'user_id'
    ];

    protected function createdAt(): Attribute {
        return Attribute::make(
            get: fn (string | null $value) => $this->format($value, "D, \\n\g\à\y d, \\t\h\á\\n\g m, Y")->corvertVietnameseDay()
        );
    }

    protected function dateReceive(): Attribute {
        return Attribute::make(
            get: fn (string | null $value) => $this->format($value, "D, \\n\g\à\y d, \\t\h\á\\n\g m, Y")->corvertVietnameseDay()
        );
    }

    protected function datePayment(): Attribute {
        return Attribute::make(
            get: fn (string | null $value) => $this->format($value, "D, \\n\g\à\y d, \\t\h\á\\n\g m, Y")->corvertVietnameseDay()
        );
    }

    protected function status(): Attribute {
        return Attribute::make(
            get: fn (int $value) => __(ucwords(array_search($value, config('constraint.status.order'))))
        );
    }
    /**
     * Get all of the detailOrders for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOrders(): HasMany
    {
        return $this->hasMany(DetailOrder::class, 'order_id', 'id');
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
