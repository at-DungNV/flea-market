<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Province;
use App\Models\Category;
use BreadcrumbsHelper;
use View;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, BreadcrumbsHelper $bc)
    {
      
        $total = Post::where('state', '=', \Config::get('common.TYPE_POST_ACTIVE'))->count();
        $number = \Config::get('common.NUMBER_ITEM_PER_PAGE');
        
        $crumbs = $bc->getCrumbs($request->path());
        
        // input request parameters
        $q = $request->input('q');
        $address = $request->input('address');
        $type = $request->input('type');
        $order = $request->input('order');
        $category = $request->input('category');
        
        // start checking if page input is null or not
        $page = is_null($request->input('page')) ? 1 : $request->input('page');
        // end checking if page input is null or not
        $offset = 1;
        $offset = ($page - 1) * $number;
        // get posts
        $searchResult = Post::search($q, $address, $type, $category, $order, $total, $offset);
        $totalPages = ceil($searchResult['total'] / $number);
        $posts = $searchResult['posts'];
        $x = new Province();
        
        $data = array(
            'posts'  => $posts,
            'totalPages' => $totalPages,
            'crumbs' => $crumbs,
            'page' => $page,
            'addresses' => $x->getAddress(),
            'q' => $q,
            'address' => $address,
            'type' => $type,
            'category' => $category,
            'order' => $order
        );
        return view('frontend.home')->with($data);
    }
}
