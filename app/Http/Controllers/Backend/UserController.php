<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Notification;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
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
        $users = User::Where('is_active', '=', \Config::get('common.USER_BLOCKED_DIGITAL'))->orderBy('created_at', 'desc')->get();
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
            $query = Post::where('user_id', '=', $id);
            $activePosts = $query
                          ->Where('state', '=', \Config::get('common.TYPE_POST_ACTIVE'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(\Config::get('common.PAGINATION_LIMIT'));
            $waitingPosts = $query
                          ->Where('state', '=', \Config::get('common.TYPE_POST_WAITING'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(\Config::get('common.PAGINATION_LIMIT'));
            $hiddenPosts = $query
                          ->Where('state', '=', \Config::get('common.TYPE_POST_HIDDEN'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(\Config::get('common.PAGINATION_LIMIT'));
            $rejectedPosts = $query
                          ->Where('state', '=', \Config::get('common.TYPE_POST_REJECTED'))
                          ->orderBy('created_at', 'desc')
                          ->paginate(\Config::get('common.PAGINATION_LIMIT'));
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
                             ->withErrors(trans('common.user.not_found_user'));
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
    public function update(Request $request)
    {
        $errors = trans('common.user.update_unsuccessfully');
        try {
            $user = User::findOrFail($request['id']);
            $user->setActive($request['isActive']);
            $user->save();
            return redirect()->route('admin.user.show', ['id' => $request['id']])
                             ->withMessage(trans('common.user.update_successfully'));
        } catch (Exception $modelNotFound) {
            return redirect()->route('admin.user.show', ['id' => $request['id']])->withErrors(trans('common.user.update_unsuccessfully'));
        }
        return redirect()->route('admin.user.show', ['id' => $request['id']])->withErrors($errors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $errors = trans('common.user.update_unsuccessfully');
        try {
            $user = User::findOrFail($id);
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->route('admin.user.index')
                             ->withMessage(trans('common.user.delete_successfully'));
        } catch (Exception $modelNotFound) {
            return redirect()->route('admin.user.index')->withErrors($errors);
        }
        return redirect()->route('admin.user.index')->withErrors($errors);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
        $id = $request['id'];
        $message = $request['message'];
        $errors = trans('common.user.send_message_unsuccesfully');
        try {
            $user = User::findOrFail($id);
            $data = array();
            $data['message'] = Auth::user()->name. " sent you a message: ".$message;
            $data['approver'] = Auth::user()->avatar;
            $notification = Notification::create([
                'user_id' => $id,
                'data' => json_encode($data)
            ]);
            
            // Announce that a new message has been posted
            event(new \App\Events\SendMessageEvent($user, $notification));
            
            return redirect()->route('admin.user.show',['id' => $id])
                             ->withMessage(trans('common.user.send_message_succesfully'));
        } catch (Exception $modelNotFound) {
            return redirect()->route('admin.user.show',['id' => $id])->withErrors(trans('common.user.send_message_unsuccesfully'));
        }
        return redirect()->route('admin.user.show',['id' => $id])->withErrors($errors);
    }
}
