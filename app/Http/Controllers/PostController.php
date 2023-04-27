<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostHistory;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // $request->validate([
        //     'account' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        $validated = $request->validated();

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Password created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $previous_values = [
            'account' => $post->account,
            'username' => $post->username,
            'password' => $post->password,
        ];

        $post->update($request->all());

        $post_history = new PostHistory();
        $post_history->fill($previous_values);
        $post_history->post()->associate($post);
        $post_history->changed_at = now();
        $post_history->changed_by = auth()->id();
        $post_history->save();

        return redirect()->route('posts.index')
            ->with('success', 'Password updated successfully');
    }

    public function history(Post $post)
    {
        $postHistory = PostHistory::where('post_id', $post->id)->orderBy('changed_at', 'desc')->get();
    
        return view('posts.history', compact('postHistory'));
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Password deleted successfully');
    }
}
