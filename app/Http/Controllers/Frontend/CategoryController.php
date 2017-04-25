<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use BreadcrumbsHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $sql = 'select root.name  as root_name
                 , node1.name as node1_name
                 , node2.name as node2_name
                 , node3.name as node3_name
              from categories as root
            left outer
              join categories as node1
                on node1.parent_id = root.id
            left outer
              join categories as node2
                on node2.parent_id = node1.id
            left outer
              join categories as node3
                on node3.parent_id = node2.id
             where root.parent_id is null
            order
                by root_name
                 , node1_name
                 , node2_name
                 , node3_name';
      $categories = DB::select($sql);
      // dd($categories);
      $count = count($categories);
      $tem = array(
        
      );
      for ($i=0; $i < $count - 1; $i++) {
        $root = $this->getCombineArrays($categories[$i]->root_name, $categories[$i+1]->root_name);
        $node1 = $this->getCombineArrays($categories[$i]->node1_name, $categories[$i+1]->node1_name);
        $node2 = $this->getCombineArrays($categories[$i]->node2_name, $categories[$i+1]->node2_name);
        $node3 = $this->getCombineArrays($categories[$i]->node3_name, $categories[$i+1]->node3_name);
        // dd($root);
        array_push($node2, $node3);
        array_push($node1, $node2);
        array_push($root, $node1);
        array_push($tem, $root);
      }
      dd($tem);
      $x = new BreadcrumbsHelper();
      $crumbs = $x->getCrumbs($request->path());
      $data = array(
          'categories'  => $categories,
          'crumbs' => $crumbs
      );
      return view('frontend.categories.index')->with($data);
    }

    public function getCombineArrays($name1, $name2) {
      $array = array($name1);
      if (strcmp($name1, $name2)) {
        array_push($array, $name2);
      }
      return $array;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSidebarCategories()
    {
      $sql = 'select root.name  as root_name
                 , node1.name as node1_name
                 , node2.name as node2_name
                 , node3.name as node3_name
              from categories as root
            left outer
              join categories as node1
                on node1.parent_id = root.id
            left outer
              join categories as node2
                on node2.parent_id = node1.id
            left outer
              join categories as node3
                on node3.parent_id = node2.id
             where root.parent_id is null';
            // order
            //     by root_name
            //      , node1_name
            //      , node2_name
            //      , node3_name';
      $sql1 = 'select * from categories';
      $categories = DB::select($sql);
      return response()->json([
          'categories' => $categories
      ]);
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
        //
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
