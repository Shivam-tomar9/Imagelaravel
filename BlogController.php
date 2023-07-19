<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog=Blog::all();
       return view('blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $blog= $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $blog->image = base64_encode($imageData);
        }
    
        $blog->save();
       
         return redirect()->route('index.blog')->with('success', 'Blog Added Successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog=Blog::find($id);
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
     
        $blog = Blog::find($id);
    
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
    
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $blog->image = base64_encode($imageData);
        }
    
       
        $blog->save();
        return redirect()->route('index.blog')->with('success', 'Blog updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->route('index.blog')->with('success','Successfully Delete');
    }
}
