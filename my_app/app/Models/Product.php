<?php

namespace App\Models;

use App\Traits\DateTimeHelper as DateTimeTrait;
use App\Traits\Numeric;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Numeric, DateTimeTrait;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'display_status',
        'slug',
        'category_id',
        'image',
        'price',
        'discount_percent',
        'stock',
        'description'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'display_status' => 'boolean',
    ];

    /**
     * Custom attribute price_discount
     */
    public function getPriceDiscountAttribute()
    {
        return $this->caculateDiscount($this->covertToBackEndFormat($this->price), $this->discount_percent);
    }

    protected function price(): Attribute {
        return Attribute::make(
            get: fn (string $value) => $this->covertToMoney($value)
        );
    }

    protected function deletedAt(): Attribute {
        return Attribute::make(
            get: fn (string | null $value) => $this->format($value)->getDateTime()
        );
    }

    /**
 * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'products_index';
    }

}
