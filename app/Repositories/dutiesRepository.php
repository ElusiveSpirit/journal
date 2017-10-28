<?php

namespace App\Repositories;

use App\Models\duties;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class dutiesRepository
 * @package App\Repositories
 * @version October 28, 2017, 9:51 am UTC
 *
 * @method duties findWithoutFail($id, $columns = ['*'])
 * @method duties find($id, $columns = ['*'])
 * @method duties first($columns = ['*'])
*/
class dutiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return duties::class;
    }
}
