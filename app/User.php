<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'pivot',
    ];

    /**
     * Many-to-Many Relation with Company
     *
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'user_company', 'user_id', 'company_id')->withTimestamps();
    }

    /**
     * Many-to-Many Relation with Product 
     *
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'user_product', 'user_id', 'product_id')->withTimestamps();
    }

    /**
     * Many-to-Many Relation with Cost
     *
     */
    public function costs()
    {
        return $this->belongsToMany(Cost::class, 'user_cost', 'user_id', 'cost_id')->withTimestamps();
    }

    /**
     * Many-to-Many Relation with Costumer 
     *
     */
    public function costumers()
    {
        return $this->belongsToMany(Costumer::class, 'user_costumer', 'user_id', 'costumer_id')->withTimestamps();
    }

    /**
     * Many-to-Many Relation with Supplier
     *
     */
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'user_supplier', 'user_id', 'supplier_id')->withTimestamps();
    }
   
}
