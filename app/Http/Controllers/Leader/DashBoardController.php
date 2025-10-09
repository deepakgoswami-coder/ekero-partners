<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{

    public function dashboard(){
        return view("leader.dashboard");
    }
}
