<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return inertia('Auth/Register');
    }

    public function serviceTerms(){
        return inertia('ServiceTerms');
    }
}
