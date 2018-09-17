<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    protected $table   = 'user_socials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'social_network',
        'social_id',
        'social_email',
        'social_avatar',
        'user_id',
        'social_email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
