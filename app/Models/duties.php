<?php

namespace App\Models;

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


    public $fillable = [
        'name',
        'date',
        'is_night',
        'is_holiday',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'date' => 'date',
        'is_night' => 'integer',
        'is_holiday' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'date' => 'required',
        'user_id' => ['required', 'numeric']
    ];

    
}
