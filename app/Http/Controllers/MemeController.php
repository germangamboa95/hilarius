<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemeRequest;
use App\Models\Meme;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Meme::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemeRequest $request)
    {

        $request->validated();

        $file = $request->file('meme');

        $location = Storage::put('memes', $file);


        $name = Str::snake($file->getClientOriginalName());

        $ending = $file->getClientOriginalExtension();

        $mime = $file->getClientMimeType();


        Meme::create([
            'public_name' => $name,
            'original_name' => $name,
            'mime' => $mime,
            'original_ending' => $ending,
            'location' => $location,
        ]);


        return redirect()->route('meme:list');
    }


    /**
     * Return the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loadMeme($memeName)
    {
        $meme = Meme::where('public_name', $memeName)->first();



        return response(Storage::get("$meme->location"))->header('content-type', "$meme->mime");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
