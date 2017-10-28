<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\duties as Duty;
use App\Models\orders as Order;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    private $dutyNames;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->dutyNames = [
            'ЧШ',
            'ПД',
            'ОТСГ',
            'НН',
            'ОУ',
            'ОКСБ',
            'ДК',
        ];
    }

    public function __invoke()
    {
        $duties = Duty::orderBy('date', 'asc')->get();
        $userDuties = [];
        foreach ($duties as $duty) {
            $userDuties[$duty->date->format('Y-m-d')] = $duty->getUserOrder(Auth::id());
        }

        return view('home', [
            'duties' => $duties,
            'dutyNames' => $this->dutyNames,
            'userDuties' => $userDuties
        ]);
    }
}
