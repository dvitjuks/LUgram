<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($username)
    {;
        $user = User::where('username', $username)->firstOrFail();
        return view('profiles/index', ['user' => $user]);
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $this->authorize('update', $user->profile);
        return view('profiles/edit', ['user' => $user]);
    }

    public function update($username)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        $user = User::where('username', $username)->firstOrFail();
        $this->authorize('update', $user->profile);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
            $image->save();
            auth()->user()->profile->update(array_merge($data, ['image' => $imagePath]));
        } else {
            auth()->user()->profile->update($data);
        }
        return redirect("/profile/{$user->username}");
    }
}
