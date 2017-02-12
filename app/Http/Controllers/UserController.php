<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BreadcrumbsHelper;
use App\Models\User;
use Auth;
use Redirect;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $x = new BreadcrumbsHelper();
        $crumbs = $x->getCrumbs($request->path());
        return view('users.profile', ['crumbs' => $crumbs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(Request $request, $id)
    {
        $x = new BreadcrumbsHelper();
        $crumbs = $x->getCrumbs($request->path());
        return view('users.edit', ['crumbs' => $crumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      try {
          $input = $request->all();
          $user = User::findOrFail(Auth::user()->id);
          $user->fill($input);
          $user->save();
          return Redirect::back()
              ->withMessage('thanh cong roi nhe')
              ->withInput();
      } catch (Exception $saveException) {
          return Redirect::back()->withErrors('loi roi');
      }
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
