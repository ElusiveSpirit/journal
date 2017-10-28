<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\duties as Duty;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duties = Duty::all();

        return view('journal')
            ->with('duties', $duties);
    }
}
