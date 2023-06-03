<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Server;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServerController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Servers/Index',
            [
                'servers' => auth()->user()->servers,
            ],
        );
    }

    public function create()
    {
        return Inertia::render(
            'Servers/Create',
            [
                'user' => User::all(),

            ]
        );
    }

    public function show(Request $request)
    {
        return Inertia::render(
            'Servers/Edit',
            [
                'server' => Server::find($request->id),
            ]
        );
    }


    public function delete(Request $request)
    {
        $server = Server::find($request->id);
        $server->delete();

        return Redirect::to('servers');
    }


    public function store(Request $request)
    {
        Server::create([
            'user_id' => auth()->user()->id,
            'server_name' => $request->server_name,
            'ssh_user_name' => $request->ssh_user_name,
            'ssh_host_name' => $request->ssh_host_name,
            'ssh_password' => $request->ssh_password,

        ]);

        return Redirect::to('/servers');
    }


    public function update(Request $request, Server $server)
    {
        $servers = Server::find($request->id);
        $servers->user_id = auth()->user()->id;
        $servers->server_name = $request->server_name;
        $servers->ssh_user_name = $request->ssh_user_name;
        $servers->ssh_host_name = $request->ssh_host_name;
        $servers->ssh_password = $request->ssh_password;
        $servers->save();

        return Redirect::to('/servers');
    }


}