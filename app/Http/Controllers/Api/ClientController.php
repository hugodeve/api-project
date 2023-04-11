<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|unique:clients,cpf',
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $client = Client::create([
            'cpf' => $request->cpf,
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
        ]);

        return response()->json([
            'message' => 'Cliente registrado exitosamente',
            'client' => $client
        ], 201);
    }

    public function index(Request $request)
    {
        $clients = Client::query();

        if ($request->has('cpf')) {
            $clients->where('cpf', 'like', '%' . $request->cpf . '%');
        }

        if ($request->has('name')) {
            $clients->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('birthdate')) {
            $clients->whereDate('birthdate', '=', $request->birthdate);
        }

        if ($request->has('gender')) {
            $clients->where('gender', '=', $request->gender);
        }

        if ($request->has('address')) {
            $clients->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->has('state')) {
            $clients->where('state', 'like', '%' . $request->state . '%');
        }

        if ($request->has('city')) {
            $clients->where('city', 'like', '%' . $request->city . '%');
        }

        $clients = $clients->get();

        dd($clients);

        return view('clients.index', compact('clients'));
    }
}
