@extends('layouts.backend.app')
@section('errors-message')
    @include('common.errors')
@stop

@section('susscess-message')
    @include('common.success')
@stop
@section('content')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show User Information Management</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
          <div class="profile_img">
            <div id="crop-avatar">
              <!-- Current avatar -->
              <img class="img-responsive avatar-view" src="{{ route('post.getPostImages', [Auth::user()->avatar]) }}" width="221" height="221" alt="Avatar" title="Change the avatar">
            </div>
          </div>
          <h3>User: {{ $user->name }}</h3>

          <ul class="list-unstyled user_data" style="word-wrap: break-word;">
            <li>
              <i class="fa fa-birthday-cake" aria-hidden="true"></i>
              Birthday: {{ date("d/m/Y", strtotime($user->birthday)) }}
            </li>
            <li>
              <i class="fa fa-address-card"></i> 
              Address: {{$user->address }}
            </li>

            <li>
              <i class="fa fa-phone-square" aria-hidden="true"></i>
              Phone: {{ $user->phone }}
            </li>

            <li>
              <i class="fa fa-mars-double" aria-hidden="true"></i>
              Gender: {{ $user->gender == \Config::get('common.MALE_GENDER') ? 'MALE' : 'FEMALE' }}
            </li>
            
            <li>
              <i class="fa fa-universal-access"></i> 
              Role: {{ $user->is_admin ? 'Admin' : 'User' }}
            </li>
            
            
            <li class="m-top-xs">
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
              State: {{ $user->is_active == \Config::get('common.USER_ACTIVE_DIGITAL') ? 'Active' : 'Blocked' }}
            </li>
          </ul>

          <a class="btn btn-success btn-block" data-toggle="modal" data-target="#backend-user-show-message"><i class="fa fa-envelope" aria-hidden="true"></i> Send Message</a>
          <a class="btn btn-danger btn-block" data-toggle="modal" data-target="#backend-user-change-active">
            <i class="fa fa-adjust" aria-hidden="true"></i> {{ $user->isActive() == 1 ? 'Block User' : 'Unblock User'  }}
          </a>
          <div id="backend-user-show-message" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Send Message To {{ $user->name }}</h4>
                </div>
                <form method="POST" action="{{ route('admin.user.message') }}">
                  <div class="modal-body">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$user->id}}">
                      <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" rows="5" id="message"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Send</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
          
          
          <!-- unblock or block user -->
          <div class="modal fade" id="backend-user-change-active" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Cập nhật tài khoản</h4>
                </div>
                <div class="modal-body">
                  <h5>ban co muon <span class="label label-warning">{{ $user->isActive() == 1 ? 'Block User' : 'Unblock User'  }}</span> không?</h5>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.user.update') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="hidden" name="isActive" value="{{ !$user->isActive() }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-danger">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end unblock or block user -->
        </div>
        
        <div class="col-md-9 col-sm-9 col-xs-12">


          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Active Posts</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Waiting Posts</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Hidden Posts</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Rejected Posts</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                <!-- start recent activity -->
                <div class="table-responsive">
                  <table class="table table-striped jambo_table check-action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">ID </th>
                        <th class="column-title">Created Date </th>
                        <th class="column-title">Type </th>
                        <th class="column-title">Created By </th>
                        <th class="column-title">Status </th>
                        <th class="column-title">Amount </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="check-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Number: ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($activePosts as $key => $post)
                      <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{ $post->id }}</td>
                        <td class=" ">{{ $post->created_at }}</td>
                        <td class=" ">{{ $post->type }}</td>
                        <td class=" ">{{ $post->user->name }}</td>
                        <td class=" ">{{ $post->state }}</td>
                        <td class="a-right a-right ">{{ number_format ( $post->price  , 0 , "." , "." ) }} VNĐ</td>
                        <td class="last">
                          <a href="{{ route('admin.post.show', [$post->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs admin-post-index-delete">
                            <i class="fa fa-trash-o"></i> Delete
                          </a>
                          <input id="post_id" type="hidden" value="{{ $post->id }}">
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- end recent activity -->

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                <!-- start user projects -->
                <div class="table-responsive">
                  <table class="table table-striped jambo_table check-action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">ID </th>
                        <th class="column-title">Created Date </th>
                        <th class="column-title">Type </th>
                        <th class="column-title">Created By </th>
                        <th class="column-title">Status </th>
                        <th class="column-title">Amount </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="check-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Number: ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($waitingPosts as $key => $post)
                      <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{ $post->id }}</td>
                        <td class=" ">{{ $post->created_at }}</td>
                        <td class=" ">{{ $post->type }}</td>
                        <td class=" ">{{ $post->user->name }}</td>
                        <td class=" ">{{ $post->state }}</td>
                        <td class="a-right a-right ">{{ number_format ( $post->price  , 0 , "." , "." ) }} VNĐ</td>
                        <td class="last">
                          <a href="{{ route('admin.post.show', [$post->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs admin-post-index-delete">
                            <i class="fa fa-trash-o"></i> Delete
                          </a>
                          <input id="post_id" type="hidden" value="{{ $post->id }}">
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- end user projects -->

              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <div class="table-responsive">
                  <table class="table table-striped jambo_table check-action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">ID </th>
                        <th class="column-title">Created Date </th>
                        <th class="column-title">Type </th>
                        <th class="column-title">Created By </th>
                        <th class="column-title">Status </th>
                        <th class="column-title">Amount </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="check-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Number: ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($hiddenPosts as $key => $post)
                      <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{ $post->id }}</td>
                        <td class=" ">{{ $post->created_at }}</td>
                        <td class=" ">{{ $post->type }}</td>
                        <td class=" ">{{ $post->user->name }}</td>
                        <td class=" ">{{ $post->state }}</td>
                        <td class="a-right a-right ">{{ number_format ( $post->price  , 0 , "." , "." ) }} VNĐ</td>
                        <td class="last">
                          <a href="{{ route('admin.post.show', [$post->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs admin-post-index-delete">
                            <i class="fa fa-trash-o"></i> Delete
                          </a>
                          <input id="post_id" type="hidden" value="{{ $post->id }}">
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
              <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                <div class="table-responsive">
                  <table class="table table-striped jambo_table check-action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">ID </th>
                        <th class="column-title">Created Date </th>
                        <th class="column-title">Type </th>
                        <th class="column-title">Created By </th>
                        <th class="column-title">Status </th>
                        <th class="column-title">Amount </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        <th class="check-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Number: ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($rejectedPosts as $key => $post)
                      <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{ $post->id }}</td>
                        <td class=" ">{{ $post->created_at }}</td>
                        <td class=" ">{{ $post->type }}</td>
                        <td class=" ">{{ $post->user->name }}</td>
                        <td class=" ">{{ $post->state }}</td>
                        <td class="a-right a-right ">{{ number_format ( $post->price  , 0 , "." , "." ) }} VNĐ</td>
                        <td class="last">
                          <a href="{{ route('admin.post.show', [$post->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs admin-post-index-delete">
                            <i class="fa fa-trash-o"></i> Delete
                          </a>
                          <input id="post_id" type="hidden" value="{{ $post->id }}">
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@stop