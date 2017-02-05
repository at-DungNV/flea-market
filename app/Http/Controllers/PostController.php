<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Image;
use Storage;
use Auth;
use Carbon\Carbon;
use BreadcrumbsHelper;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $x = new BreadcrumbsHelper();
      $crumbs = $x->getCrumbs($request->path());
      $posts = Post::with(['images'=>function($query) {
          return $query->limit(1);
      }])->get();
      return view('posts.index', ['posts' => $posts, 'crumbs' => $crumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $x = new BreadcrumbsHelper();
      $crumbs = $x->getCrumbs($request->path());
      return view('posts.create', ['crumbs' => $crumbs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // store post
        $user_id = Auth::user()->id;
        $request['user_id'] = $user_id;
        $request['slug'] = str_slug($request->input('title'), '-');
        $post = Post::create($request->all());

        // store images
        $images = $request->file('images');
        $post->storeImages($images);
        return redirect()->action('PostController@create')->withMessage('tao thanh cong');
    }

    public function getPostImages($filename)
    {
      $file = Storage::disk('local')->get($filename);
      return new Response($file, 200);
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
            $post = Post::where('slug', '=', $id)->with('images')->firstOrFail();
            return view('posts.show', ['post' => $post]);
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
        //
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
        //
    }
}
