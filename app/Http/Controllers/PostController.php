<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PaginationRequest;
use App\Models\Post;
use App\Models\Image;
use Storage;
use Auth;
use Carbon\Carbon;
use BreadcrumbsHelper;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $total = Post::count();
      $number = 9;
      $totalPages = ceil($total / $number);
      $x = new BreadcrumbsHelper();
      $crumbs = $x->getCrumbs($request->path());
      return view('posts.index', ['totalPages' => $totalPages, 'crumbs' => $crumbs]);
    }

    public function paginate(Request $request)
    {
      $total = Post::count();
      $number = 9;
      $totalPages = ceil($total / $number);
      $this->validate($request, [
          'page' => 'required|numeric|min:1|max:'. $totalPages,
      ]);
      $offset = 1;
      $offset = ($request->input('page') - 1) * $number;
      $posts = Post::with(['images'=>function($query) {
                        return $query->limit(1);
                    }])
                    ->take($number)
                    ->offset($offset)
                    ->get();
      return response()->json([
          'posts' => $posts
      ]);
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
    public function show(Request $request, $id)
    {
        try {
            $x = new BreadcrumbsHelper();
            $crumbs = $x->getCrumbs($request->path());
            $post = Post::where('slug', '=', $id)->with('images')->firstOrFail();
            return view('posts.show', ['post' => $post, 'crumbs' => $crumbs]);
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
