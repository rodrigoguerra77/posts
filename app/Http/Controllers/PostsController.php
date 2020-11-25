<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show registers
        $data['posts']=Posts::paginate(4);
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Form
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $fields = [
            'title' => 'required|string|unique:posts|max:200',
            'content' => 'required',
            'status' => 'required'
        ];
        $message = [
            'required' => 'The :attribute is required.',
            'string' => 'The :attribute is of type text.',
            'max' => 'The :attribute has a maximum of :max characters.',
            'unique' => 'The :attribute is unique.'
        ];

        $this->validate($request, $fields, $message);

        // Save data
        $dataPost = request()->except('_token');
        $dataPost['created_at'] = new \DateTime();

        Posts::insert($dataPost);

        return redirect('posts')->with('message', 'The post was saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Edit Form
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate
        $fields = [
            'title' => 'required|string|max:200',
            'content' => 'required',
            'status' => 'required'
        ];
        $message = [
            'required' => 'The :attribute is required.',
            'string' => 'The :attribute is of type text.',
            'max' => 'The :attribute has a maximum of :max characters.',
            'unique' => 'The :attribute is unique.'
        ];

        $this->validate($request, $fields, $message);
        
        // Update data
        $dataPost = request()->except(['_token', '_method']);
        Posts::where('id', '=', $id)->update($dataPost);

        return redirect('posts')->with('message', 'The post has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete data
        Posts::destroy($id);

        return redirect('posts')->with('message', 'The post was removed successfully!');
    }
}
