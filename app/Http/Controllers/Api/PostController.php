<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Post::all(), 'Get successfully!');
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
            'title' => 'required|string|unique:posts',
            'short_title' => 'required|string|unique:posts',
            'summary' => 'required|string',
            'text_for_button' => 'required|string',
            'image_cover' => 'required|url|active_url',
            'content' => 'required',
            'id_category' => 'required|numeric|exists:categories,id',
            'time_event' => 'date'
        ]);

        $post = Post::create($request->all());

        return $this->sendResponse($post, 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return $this->sendResponse($post, 'Get successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $input = $request->validate([
            'title' => 'string|unique:posts',
            'short_title' => 'string|unique:posts',
            'summary' => 'string',
            'text_for_button' => 'string',
            'image_cover' => 'url|active_url',
            'id_category' => 'numeric|exists:categories,id',
            'time_event' => 'date'
        ]);

        $post->update($input);

        return $this->sendResponse($post, 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return $this->sendResponse($post, 'Deleted successfully!');
    }
}
