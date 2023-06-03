<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadContent;
use Inertia\Inertia;
use App\Models\Content;
use App\Models\Platform;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContentController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Contents/Index',
            [
                'contents' => auth()->user()->contents()->with('platform','server')->get(),
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Contents/Create',
            [
                'platforms' => Platform::all(),
                'servers' => Server::all(),

            ]
        );
    }

    public function show(Request $request)
    {
        return Inertia::render(
            'Contents/Edit',
            [
                'content' => Content::with("platform", "server")->find($request->id),
                'platforms' => Platform::all(),
                'servers' => Server::all(),
            ]
        );

    }
    public function delete(Request $request)
    {
        $content = Content::find($request->id);

        $content->delete();

        return Redirect::to('/contents');
    }

    public function store(Request $request)
    {
        $content = Content::create([
            'user_id' => auth()->user()->id,
            'content_name' => $request->content_name,
            'platform_id' => $request->platform_id,
            'server_id' => $request->server_id,
            'url' => $request->url,
            'folder_path' => $request->folder_path,
            'media_type' => $request->media_type
        ]);

        DownloadContent::dispatch($content);

        return Redirect::to('/contents');
    }

    public function update(Request $request, Content $content)
    {
        $contents = Content::find($request->id);

        $contents->content_name = $request->content_name;
        $contents->platform_id = $request->platform_id;
        $contents->server_id = $request->server_id;
        $contents->url = $request->url;
        $contents->media_type = $request->media_type;
        $contents->save();

        return Redirect::to('/contents');
    }

}
