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

    public function show($id) {
        $client = Client::find($id);

        if (!$client) {
            return redirect()->route('client.index');
        }

        return view('edit', ['client' => $client]);
    }

    public function edit($id) {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'max:50'],
            'photo' => ''
        ]);

        if (request('photo')) {
            $imagePath = request('photo')->store('uploads', 'public');

            Client::whereId($id)->update(array_merge(
                $data,
                ['photo' => $imagePath]
            ));

            return redirect()->route('client.index');
        }

        Client::whereId($id)->update($data);

        return redirect()->route('client.index');
    }

    public function destroy($id) {
        $client = Client::find($id);

        $client->delete();

        return redirect()->route('client.index');
    }
}
