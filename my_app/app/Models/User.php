<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone',
        'address',
        'password',
        'role_id'
    ];

    /**
     * The attributes that automatically be included in the array or JSON form of the model, provided that you've added the appropriate accessor.
     * @var array<int, string>
     */
    protected $appends = [
        'pending_orders_number',
        'processing_orders_number',
        'shipped_orders_number',
        'received_orders_number',
        'paymented_orders_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Count pending orders
     */
    public function getPendingOrdersNumberAttribute()
    {
        return (!blank($this->orders))
            ? $this->orders->toQuery()->whereStatus(config('constraint.status.order.pending'))->count()
            : 0;
    }

    /**
     * Count Processing orders
     */
    public function getProcessingOrdersNumberAttribute()
    {
        return (!blank($this->orders))
            ? $this->orders->toQuery()->whereStatus(config('constraint.status.order.processing'))->count()
            : 0;
    }

    /**
     * Count shipped orders
     */
    public function getShippedOrdersNumberAttribute()
    {
        return (!blank($this->orders))
            ? $this->orders->toQuery()->whereStatus(config('constraint.status.order.shipped'))->count()
            : 0;
    }

    /**
     * Count received orders
     */
    public function getReceivedOrdersNumberAttribute()
    {
        return (!blank($this->orders))
            ? $this->orders->toQuery()->whereStatus(config('constraint.status.order.received'))->count()
            : 0;
    }

    /**
     * Count paymented orders
     */
    public function getPaymentedOrdersNumberAttribute()
    {
        return (!blank($this->orders))
            ? $this->orders->toQuery()->whereStatus(config('constraint.status.order.paymented'))->count()
            : 0;
    }

    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Get all of the orders for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
