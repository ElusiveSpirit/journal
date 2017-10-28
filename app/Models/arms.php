<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class arms
 * @package App\Models
 * @version October 28, 2017, 9:00 am UTC
 *
 * @property string ip
 * @property string mask
 */
class arms extends Model
{
    use SoftDeletes;

    public $table = 'arms';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ip',
        'mask'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ip' => 'string',
        'mask' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ip' => 'required',
        'mask' => 'required'
    ];

    
}
