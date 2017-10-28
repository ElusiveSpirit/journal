<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'roles' => $this->getRoleCases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $role = $input['role'];
        unset($input['role']);

        $user = User::create($input);
        if ($role != '-') {
            $user->syncRoles([$role]);
        }

        Flash::success('Пользователь создан');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => $this->getRoleCases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if (empty($user)) {
            Flash::error('Пользователь не найден');

            return redirect(route('users.index'));
        }
        $input = $request->all();

        if ($input['role'] == '-') {
            $user->syncRoles([]);
        } else {
            $user->syncRoles([$input['role']]);
        }
        unset($input['role']);


        foreach ($input as $key => $value) {
            if ($key[0] != '_' && !($key == 'password' && $value == '')) {
                $user[$key] = $value;
            }
        }
        $user->save();

        return view('users.edit')->with('user', $user)
            ->with('roles', $this->getRoleCases());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if (empty($user)) {
            Flash::error('Пользователь не найден');

            return redirect(route('users.index'));
        }

        $user->delete();

        Flash::success('Пользователь удалён');

        return redirect(route('users.index'));
    }

    private function getRoleCases()
    {
        $ret = [
            '-' => '---------'
        ];
        foreach (Role::all() as $role) {
            $ret[$role->name] = $role->name;
        }
        return $ret;
    }
}
