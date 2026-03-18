<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        return response('Bienvenido a la API de Chat de InSession ' . Auth::user()->nombre, 200);
    }
}
