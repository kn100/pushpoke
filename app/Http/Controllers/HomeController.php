<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\PokeUser;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except(Auth::id());
        $pokesGiven = PokeUser::get()->where('user_id',Auth::id())->count();
        $pokesRecvd = PokeUser::get()->where('poked_user_id',Auth::id())->count();
        return view('home',compact('users','pokesGiven','pokesRecvd'));
    }
}
