<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'phone',
        'email',
        'city',
        'address',
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
     * Many-to-Many Relation with User
     *
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_supplier', 'supplier_id', 'user_id')->withTimestamps();
    }
}
