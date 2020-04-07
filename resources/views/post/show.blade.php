@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-md-4">
            <div>
                <h3>
                    {{ $post->user->username }}
                </h3>
                {{ $post->caption }}
            </div>
        </div>
    </div>
</div>
@endsection