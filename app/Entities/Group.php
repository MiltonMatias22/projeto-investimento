<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'institution_id'
    ];

    //get relationship with user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //get relationship with institution
    public function institution(){
        return $this->belongsTo(Institution::class);     
    }

    //relationship N:N
    public function users(){
        return $this->belongsToMany(User::class, 'user_groups');
    }

}
