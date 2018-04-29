<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
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
     * Many-to-Many Relation with Costumer 
     *
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_costumer', 'costumer_id', 'user_id')->withTimestamps();
    }
}
