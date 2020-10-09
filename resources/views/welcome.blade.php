@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="meme-container mx-auto">
        @auth
        <meme-upload-component></meme-upload-component>
        @endauth
        <div class="mt-5 d-flex flex-column align-items-center">
            @foreach ($memes as $meme )
            <div  class="meme d-flex flex-column  card p-3  mt-5">
                <img
                    loading="lazy"
                    class="img-fluid"
                    src="/memes/content/{{$meme->public_name}}"
                />
            </div>
            @endforeach
            <div class="mx-auto mt-5">
             {{ $memes->links()}}
            </div>
        </div>

    </div>
</div>
@endsection