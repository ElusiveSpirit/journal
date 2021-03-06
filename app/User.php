<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    public function arm()
    {
        return $this->belongsTo('App\Models\arms');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'rank', 'arm_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function get_cases()
    {
        $users = User::all();
        $users_cases = [];
        foreach ($users as $user) {
            $users_cases[$user['id']] = $user['username'];
        }
        return $users_cases;
    }
}
