<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Image;
use App\Models\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::with('user')->get();
        $data = array(
            'posts'  => $posts
        );
        return view('backend.posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try {
          $post = Post::where('id', '=', $id)->with('images', 'user')->firstOrFail();
          return view('backend.posts.show', ['post' => $post]);
      } catch (NotFoundHttpException $ex) {
          return redirect()->action('PostController@index')
                           ->withErrors('khong tim thay');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $post = Post::where('id', '=', $id)->with('images', 'user')->firstOrFail();
            return view('backend.posts.edit', ['post' => $post]);
        } catch (NotFoundHttpException $ex) {
            return redirect()->action('PostController@index')
                             ->withErrors('khong tim thay');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $errors = "bi loi khi xoa";
        try {
            $post = Post::findOrFail($id);
            Image::where('post_id', '=', $id)->delete();
            Notification::where('post_id', '=', $id)->delete();
            $post->delete();
            return redirect()->route('admin.post.index')
                             ->withMessage("xoa thanh cong");
        } catch (Exception $modelNotFound) {
            return redirect()->route('admin.post.index')->withErrors("loi khi xoa");
        }
        return redirect()->route('admin.post.index')->withErrors($errors);
    }
}
