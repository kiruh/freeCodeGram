@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="https://scontent-sof1-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-sof1-1.cdninstagram.com&_nc_ohc=qp4DsZcNnS0AX8S8RvV&oh=dd318e1684b5f99cb9c1f2a2a8331d68&oe=5EB24046" alt="" class="rounded-circle">
        </div>
        <div class="col-md-8 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $user->username }}</h1>
                <div>
                    <a href="/p/create" class="btn btn-primary">Add post</a>
                    <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary">Edit profile</a>
                </div>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-md-4 mb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
