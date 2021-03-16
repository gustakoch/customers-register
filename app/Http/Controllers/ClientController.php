<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::all();

        return view('home', ['clients' => $clients]);
    }

    public function create() {
        return view('create');
    }

    public function store() {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'max:50'],
            'photo' => ['required', 'image', 'max:2048']
        ]);

        $imagePath = request('photo')->store('uploads', 'public');

        Client::create(array_merge(
            $data,
            ['photo' => $imagePath]
        ));

        return redirect()->route('client.index');
    }

    public function show() {
    }

    public function edit() {
    }

    public function update() {
    }

    public function destroy() {
    }
}
