<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'purchase_price',
        'sell_price',
        'info',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'pivot',
    ];

    /**
     * Many-to-Many Relation with Product 
     *
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_product', 'product_id', 'user_id')->withTimestamps();
    }
}


