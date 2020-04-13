<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $follows = auth()->user() ? auth()->user()->following->contains($user) : false;
        return view('profile.show', compact('user', 'follows'));
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
