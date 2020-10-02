@extends('layouts.app')

@section('content')
<div class="container">
    <div class="meme-container mx-auto">
        <meme-upload-component></meme-upload-component>
        <meme-list-component></meme-list-component>
    </div>
</div>
@endsection