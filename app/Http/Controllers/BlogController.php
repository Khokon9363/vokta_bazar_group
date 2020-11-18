<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function getBlogs()
    {
        return response()->json(Blog::all(),200);
    }
    public function publishedBlogs()
    {
        return response()->json(Blog::where('status',1)->get(),200);
    }
    public function saveBlog(Request $request)
    {
        $imgName = time() . '.' . $request->image->extension();
        $request->image->storeAs('blogs',$imgName,'public');

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->short_desc = $request->short_desc;
        $blog->long_desc = $request->long_desc;
        $blog->image = $imgName;
        $blog->save();
        return response()->json('Uploaded',200);
    }
    public function deleteBlog($id)
    {
        Blog::destroy($id);
        return response()->json('Deleted',200);
    }
    public function activeBlog($id)
    {
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();
        return response()->json('Active',200);
    }
    public function deactiveBlog($id)
    {
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();
        return response()->json('Deactive',200);
    }

}
