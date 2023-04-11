<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class ClientController extends Controller
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

    public function index(){
        return view('clients.index');
    }

    public function store(){
        return view('clients.create');
    }
    
}
