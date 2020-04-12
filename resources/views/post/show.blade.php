@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <img src="{{ $post->user->profile->getImage() }}" class="rounded-circle mr-3" style="max-width: 40px">
                <div class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}" class="text-dark mr-2">{{ $post->user->username }}</a>
                    <a href="#">Follow</a>
                </div>
            </div>
            <hr class="mv-3"/>
            <div>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}" class="text-dark">{{ $post->user->username }}</a>
                </span>
                {{ $post->caption }}
            </div>
        </div>
    </div>
</div>
@endsection