<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class WelcomeController extends Controller
{
    public function index()
    {
      return view('welcome');
    }
}