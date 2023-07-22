<?php

namespace App\Models;

use App\Traits\DateTimeHelper as DateTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory, SoftDeletes, DateTimeTrait;

    protected $table = 'categories';
    protected $fillable = [
        'id', 'name', 'display_status', 'slug', 'root_category_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'display_status' => 'boolean',
    ];

    protected function deletedAt(): Attribute {
        return Attribute::make(
            get: fn (string | null $value) => $this->format($value)->getDateTime()
        );
    }

    /**
     * Get the rootCategory that owns the rootCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rootCategory(): BelongsTo
    {
        return $this->belongsTo(RootCategory::class, 'root_category_id', 'id');
    }

    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
