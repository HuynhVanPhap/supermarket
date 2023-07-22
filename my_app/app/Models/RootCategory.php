<?php

namespace App\Models;

use App\Traits\DateTimeHelper as DateTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RootCategory extends Model
{
    use HasFactory, SoftDeletes, DateTimeTrait;

    protected $table = 'root_categories';
    protected $fillable = [
        'id', 'name', 'display_status', 'slug'
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
     * Get all of the categories for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'root_category_id', 'id');
    }
}
