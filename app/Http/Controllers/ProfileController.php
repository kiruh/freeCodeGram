<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(User $user)
    {
        $follows = auth()->user() ? auth()->user()->following->contains($user->profile) : false;
        $postsCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function() use ($user) {
                return $user->posts->count();
            }
        );
        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function() use ($user) {
                return $user->profile->followers->count();
            }
        );
        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function() use ($user) {
                return $user->following->count();
            }
        );
        return view('profile.show', compact(
            'user',
            'follows',
            'postsCount',
            'followersCount',
            'followingCount'
        ));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => ['url', 'nullable'],
            'image' => '',
        ]);
        if(request()->image) {
            // save image
            $imagePath = $data['image']->store('profile', 'public');
            
            // fit image to square
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $data = array_merge($data, [
                'image' => $imagePath
            ]);
        }
        $user->profile->update($data);
        
        return redirect("/profile/{$user->id}");
    }
}
