<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    protected $table   = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'phone',
        'barth',
        'sex',
        'notes',
        'email',
        'password',
        'status',
        'permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * .
     *
     * @param $value
     */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value; 
    }

    //relationship N:N
    public function groups(){
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    // use pattern mutator to format fields
    public function getFormattedCpfAttribute(){
        $cpf = $this->attributes['cpf'];
        return substr($cpf, 0, 3).'.'.
            substr($cpf, 3, 3).'.'.
            substr($cpf, 7, 3).'-'.
            substr($cpf, -2);
    }

    public function getFormattedPhoneAttribute(){        
        $phone = $this->attributes['phone'];
        //for 11 digits
        if(strlen($phone) == 11)
            return "(".substr($phone, 0, 2).") ".substr($phone, 2, 5)."-".substr($phone, -4);
        //for 10 digits
        if(strlen($phone) == 10)
            return "(".substr($phone, 0, 2).") ".substr($phone, 2, 4)."-".substr($phone, -4);

    }

    public function getFormattedBarthAttribute(){
        $barth = $this->attributes['barth'];        
        $barth = explode('-', $barth);
        if(count($barth) != 3){
            return "erro";
        }
        return "$barth[2]/$barth[1]/$barth[0]";
    }

}
