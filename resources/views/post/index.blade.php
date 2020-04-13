@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="offset-3 col-6">
            <a href="/profile/{{ $post->user->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
            <div class="pt-2 pb-4">
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}" class="text-dark">{{ $post->user->username }}</a>
                </span>
                {{ $post->caption }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection