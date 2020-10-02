@extends('layouts.app')

@section('content')
<div class="container">
    <div class="meme-container mx-auto">
        @auth
        <meme-upload-component></meme-upload-component>
        @endauth
        <meme-list-component></meme-list-component>
    </div>
</div>
@endsection