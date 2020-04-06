@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="https://scontent-sof1-1.cdninstagram.com/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=scontent-sof1-1.cdninstagram.com&_nc_ohc=qp4DsZcNnS0AX8S8RvV&oh=dd318e1684b5f99cb9c1f2a2a8331d68&oe=5EB24046" alt="" class="rounded-circle">
        </div>
        <div class="col-md-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="">Add new post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
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
        <div class="col-md-4">
            <img src="https://scontent-sof1-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/91262065_235020361029636_1473875970998739216_n.jpg?_nc_ht=scontent-sof1-1.cdninstagram.com&_nc_cat=100&_nc_ohc=E9tPZ5C3piIAX_R6vvr&oh=7e038e4b38ba23a5f421e78b3252eb6f&oe=5EB5659B" alt="" class="w-100">
        </div>
        <div class="col-md-4">
            <img src="https://scontent-sof1-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/c2.0.745.745a/s640x640/91297308_531240134200162_5802082636145154238_n.jpg?_nc_ht=scontent-sof1-1.cdninstagram.com&_nc_cat=110&_nc_ohc=bPFB8aVTdiYAX-4OsiX&oh=3ee40ef778338e73a473f4067ba5b79c&oe=5EB39859" alt="" class="w-100">
        </div>
        <div class="col-md-4">
            <img src="https://scontent-sof1-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/c0.109.925.925a/s640x640/90429603_618090275709978_2696911208620941912_n.jpg?_nc_ht=scontent-sof1-1.cdninstagram.com&_nc_cat=106&_nc_ohc=cz1V5Qs5_TUAX-AFXYj&oh=e97a90e660e6570ebbf0f3183a3c8e89&oe=5EB2450D" alt="" class="w-100">
        </div>
    </div>
</div>
@endsection
