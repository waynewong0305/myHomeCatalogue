<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($user)
    {
        $user = User::findOrFail($user);

        return view('profiles.index', compact('user'));
    }

    public function edit(User $user){

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'nickname' => 'required',
            'phone' => ['required', 'regex:/^(60)[0-9]{9,10}$/'],
            'address' => 'required',
            'image' => 'image'
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();

            auth()->user()->profile->update(array_merge($data, ['image' => "/storage/".$imagePath]));
        }else{
            auth()->user()->profile->update($data);
        }

        return redirect("/profile/{$user->id}");
    }
}
