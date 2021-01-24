<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
       return Blog::all();
    }

    public function options(Request $request)
    {
        return response()->json("options", 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if($request->user()->admin) {
            return response()->json("Sorry, een admin kan geen resources aanmaken.", 403);;
        }
        else {
            $blog =  Blog::create([
                'title' => $request['title'],
                'content' => $request['content'],
                'user_id' => 1
            ]);
            return response()->json($blog, 201);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return Blog::find($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Blog $blog)
    {

        $blog->update($request->all());

        return response()->json($blog, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, Blog $blog)
    {

        if($request->user()->admin) {
            $blog->delete();
        }
        elseif ($request->user()->id == $blog->user_id) {
            $blog->delete();
        }
        else return response()->json("Sorry, je hebt geen recht deze blog te verwijderen.", 403);

    }
}
