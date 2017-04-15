<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $data = array(
            'users'  => $users
        );
        return view('backend.users.index')->with($data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBlockedUsers()
    {
        $users = User::Where('is_active', '=', \Config::get('common.USER_BLOCKED_DIGITAL'))->get();
        $data = array(
            'users'  => $users
        );
        return view('backend.users.blockedUsers')->with($data);
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
            $user = User::where('id', '=', $id)->firstOrFail();
            $activePosts = Post
                          ::where('user_id', '=', $id)
                          ->Where('state', '=', \Config::get('common.TYPE_POST_ACTIVE'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(8);
            $waitingPosts = Post
                          ::where('user_id', '=', $id)
                          ->Where('state', '=', \Config::get('common.TYPE_POST_WAITING'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(8);
            $hiddenPosts = Post
                          ::where('user_id', '=', $id)
                          ->Where('state', '=', \Config::get('common.TYPE_POST_HIDDEN'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(8);
            $rejectedPosts = Post
                          ::where('user_id', '=', $id)
                          ->Where('state', '=', \Config::get('common.TYPE_POST_REJECTED'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(8);
                          
            $data = array(
                'user'  => $user,
                'activePosts' => $activePosts,
                'waitingPosts' => $waitingPosts,
                'hiddenPosts' => $hiddenPosts,
                'rejectedPosts' => $rejectedPosts
            );
            return view('backend.users.show', $data);
        } catch (NotFoundHttpException $ex) {
            return redirect()->action('UserController@index')
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
        $errors = "bi loi khi cap nhat";
        try {
            $user = User::findOrFail($id);
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->route('admin.user.index')
                             ->withMessage("cap nhat thanh cong");
        } catch (Exception $modelNotFound) {
            return redirect()->route('admin.user.index')->withErrors("loi khi cap nhat");
        }
        return redirect()->route('admin.user.index')->withErrors($errors);
    }
}
