<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
      $sql1 = 'select * from categories';
      $categories = DB::select($sql);
      dd($categories);
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
