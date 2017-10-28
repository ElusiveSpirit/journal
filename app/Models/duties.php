<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class duties
 * @package App\Models
 * @version October 28, 2017, 9:51 am UTC
 *
 * @property string name
 * @property date date
 * @property integer is_night
 * @property integer is_holiday
 * @property integer user_id
 */
class duties extends Model
{
    use SoftDeletes;

    public $table = 'duties';
    

    protected $dates = ['deleted_at'];


    public function orders()
    {
        return $this->hasMany('App\Models\orders', 'duty_id');
    }

    public function getUserOrder($user_id)
    {
        foreach ($this->orders as $order) {
            if ($order->user_id == $user_id) {
                return $order;
            }
        }
        return null;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public $fillable = [
        'date',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
    ];

    
}
