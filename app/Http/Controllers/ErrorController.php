<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ErrorController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function forbidden()
    {
        return view('error/forbidden');
    }

    public function unapprovedUser()
    {
        return view('error/unapprovedUser');
    }
}
