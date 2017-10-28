<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class orders
 * @package App\Models
 * @version October 28, 2017, 12:25 pm UTC
 *
 * @property string name
 * @property integer user_id
 * @property integer duty_id
 */
class orders extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];

    public function duty()
    {
        return $this->belongsTo('App\Models\duties');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public $fillable = [
        'name',
        'user_id',
        'duty_id',
        'is_night'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'user_id' => 'integer',
        'duty_id' => 'integer',
        'is_night' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'user_id' => 'required',
    ];

    
}
