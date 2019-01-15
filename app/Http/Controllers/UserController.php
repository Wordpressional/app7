<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Traits\SettingsTrait;
use App\Brand;
use Shortcode;
use App\Colorsetting;

class UserController extends Controller
{
    use SettingsTrait;
    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        //dd($user->comments()->with('post','author')->latest()->limit(5)->get());
        
       Shortcode::enable();
        $shortcode = App('Shortcode');
    
        $colorsetting = Colorsetting::all();
        $branding = Brand::where('id', 1)->first();
        $data = $this->settingsAll();
        return view('users.show', [
            'user' => $user,
            'posts_count' => $user->posts()->count(),
            'comments_count' => $user->comments()->count(),
            'likes_count' => $user->likes()->count(),
            'posts' => $user->posts()->withCount('likes', 'comments')->latest()->limit(5)->get(),
            'comments' => $user->comments()->with('post','author')->latest()->limit(5)->get(),
            'data' => $data,
            'colorsetting' => $colorsetting,
            'branding' => $branding,
           
        ])->withShortcodes();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request)
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        $user->update($request->validated());

        return redirect()->route('users.edit')->withSuccess(__('users.updated'));
    }
}
