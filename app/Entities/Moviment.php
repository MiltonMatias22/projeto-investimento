<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Moviment.
 *
 * @package namespace App\Entities;
 */
class Moviment extends Model implements Transformable
{
    use TransformableTrait;

    use SoftDeletes;
    use Notifiable;

    public $timestamps = true;

    protected $table   = 'moviments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'group_id',
        'product_id',
        'value',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeApplications($query)
    {
        return $query->where('type', 1);
    }

    public function scopeOutflows($query)
    {
        return $query->where('type', 2);
    }

    public function scopeProduct($query, $product)
    {
        return $query->where('product_id', $product->id);
    }

}
