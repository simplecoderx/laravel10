<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Password::latest()->paginate(5);
        
        return view('password.index',compact('password'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('password.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
    
        Password::create($request->all());
     
        return redirect()->route('password.index')
                        ->with('success','Password created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Password $post)
    {
        return view('password.show',compact('password'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $post)
    {
        return view('password.edit',compact('password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $post)
    {
        $request->validate([
            'account' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $post->update($request->all());
    
        return redirect()->route('password.index')
                        ->with('success','Password updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $post)
    {
        $post->delete();
    
        return redirect()->route('password.index')
                        ->with('success','Password deleted successfully');
    }
}