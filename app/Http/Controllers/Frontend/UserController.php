<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use BreadcrumbsHelper;
use App\Models\User;
use App\Models\Post;
use Auth;
use Redirect;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request, BreadcrumbsHelper $bc)
    {
        $crumbs = $bc->getCrumbs($request->path());
        return view('frontend.users.profile', ['crumbs' => $crumbs]);
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
    public function edit(Request $request, $id, BreadcrumbsHelper $bc)
    {
        $crumbs = $bc->getCrumbs($request->path());
        return view('frontend.users.edit', ['crumbs' => $crumbs]);
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
          $request['birthday'] = date("Y-m-d", strtotime($request['birthday']));
          $input = $request->all();
          $user = User::findOrFail(Auth::user()->id);
          $user->fill($input);
          $user->save();
          return Redirect::back()
              ->withMessage(trans('frontend/common.post.update_successfully'))
              ->withInput();
      } catch (Exception $saveException) {
          return Redirect::back()->withErrors(trans('frontend/common.post.update_unsuccessfully'));
      }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
      try {
            $user = User::findOrFail(Auth::user()->id);
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = $request->password;
                $user->save();
                return Redirect::back()->withMessage(trans('frontend/common.user.change_password_successfully'));
            }
            return Redirect::back()->withErrors(trans('frontend/common.user.password_not_match'));
        } catch (Exception $saveException) {
            return Redirect::back()->withErrors(trans('frontend/common.error_message'));
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getApprovalPosts(Request $request, BreadcrumbsHelper $bc)
    {
      $crumbs = $bc->getCrumbs($request->path());
      $approvalPosts = Post::getPostsByState(\Config::get('common.TYPE_POST_ACTIVE'));
      $waitingPosts = Post::getPostsByState(\Config::get('common.TYPE_POST_WAITING'));
      $hiddenPosts = Post::getPostsByState(\Config::get('common.TYPE_POST_HIDDEN'));
      $rejectedPosts = Post::getPostsByState(\Config::get('common.TYPE_POST_REJECTED'));
      $data = array(
          'crumbs'  => $crumbs,
          'approvalPosts' => $approvalPosts,
          'waitingPosts' => $waitingPosts,
          'hiddenPosts' => $hiddenPosts,
          'rejectedPosts' => $rejectedPosts
      );
                    
                    
      return view('frontend.users.posts')->with($data);
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