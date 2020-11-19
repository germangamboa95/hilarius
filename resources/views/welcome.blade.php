@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="meme-container mx-auto">

        <div class="d-flex flex-column align-items-center">
            @foreach ($memes as $meme )
            <div  class="meme d-flex flex-column card p-3 mt-2">
                <div class="d-inline-flex p-1 justify-content-between">
                    <span class="font-weight-bold">Posted by {{$meme->user->username}} </span> 
                    <span>{{ $meme->created_at->diffForHumans()}}</span>
                </div>

                <img
                    loading="lazy"
                    class="img-fluid"
                    src="/memes/content/{{$meme->public_name}}"
                />
            </div>
            @endforeach
            <div class="mx-auto mt-3">
             {{ $memes->links()}}
            </div>
        </div>

    </div>
</div>
@endsection