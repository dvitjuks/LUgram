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
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles/index', compact('user', 'follows'));
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

    public function followers($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $users = User::where('username', $username)->firstOrFail()->profile->followers->pluck('username');
        $followers = User::whereIn('username', $users)->orderBy('created_at', 'desc')->get();
        return view('/profiles/followers', array_merge(compact('followers'), ['main' => $user]));
    }

    public function following($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $users = User::where('username', $username)->firstOrFail()->following->pluck('user.username');
        $following = User::whereIn('username', $users)->orderBy('created_at', 'desc')->get();
        return view('/profiles/following', array_merge(compact('following'), ['main' => $user]));
    }
}
