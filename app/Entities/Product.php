<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_id',
        'name',
        'description',
        'indexer',
        'interest_rate'
    ];

    public $timestamps = true;

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function valueFromUser(User $user)
    {
        // calc all applications in a produc
        $inflows = $this->moviments()->product($this)->applications()->sum('value');
        $outflows = $this->moviments()->product($this)->outflows()->sum('value');
        
        return $inflows - $outflows;
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }
}
