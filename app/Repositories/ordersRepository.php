<?php

namespace App\Repositories;

use App\Models\orders;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ordersRepository
 * @package App\Repositories
 * @version October 28, 2017, 12:25 pm UTC
 *
 * @method orders findWithoutFail($id, $columns = ['*'])
 * @method orders find($id, $columns = ['*'])
 * @method orders first($columns = ['*'])
*/
class ordersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'user_id',
        'duty_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return orders::class;
    }
}
