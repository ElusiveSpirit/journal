<?php

namespace App\Repositories;

use App\Models\arms;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class armsRepository
 * @package App\Repositories
 * @version October 28, 2017, 9:00 am UTC
 *
 * @method arms findWithoutFail($id, $columns = ['*'])
 * @method arms find($id, $columns = ['*'])
 * @method arms first($columns = ['*'])
*/
class armsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ip',
        'mask'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return arms::class;
    }
}
