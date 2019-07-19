<style>
  .modal-body label{
    font-weight: 500;
    margin-bottom: -9px;
  }
  .modal-body input{
    margin-bottom: 15px;
  }
  .modal-header {
    border-bottom-color: #cde5ea!important
  }
  .glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
  }
  
  @-webkit-keyframes spin2 {
      from { -webkit-transform: rotate(0deg);}
      to { -webkit-transform: rotate(360deg);}
  }
  
  @keyframes spin {
      from { transform: scale(1) rotate(0deg);}
      to { transform: scale(1) rotate(360deg);}
  }
</style>
@extends('admin.layout_master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{!!route('profile',['type'=>1])!!}">Hồ sơ</a></li>
        <li class="active">Chi tiết hồ sơ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if($admin->avatar != null)
              <img style="min-height:100px;" class="profile-user-img img-responsive img-circle" src="{!! asset('admin/img/'.$admin->avatar) !!}" alt="User profile picture">
              @else
              <div class="form-group" style="border-radius: 50%;
                width: 150px;
                height: 150px;
                background-color: aquamarine;
                position: relative;
                margin: auto;">
                <label style="position: absolute;
                top: 30%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%)" for="exampleInputFile">Ảnh nền</label>
                <input style="width: 87%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%)" type="file" id="exampleInputFile" name="img_cover">
              </div>
              @endif
              <h3 class="profile-username text-center">{{$admin->name}}</h3>
              @if ($admin->level == 1)
              <p class="text-muted text-center">role admin</p>
              @elseif ($admin->level == 2)
              <p class="text-muted text-center">role editor</p>
              @endif
             

              <ul class="list-group list-group-unbordered">
                <li style="cursor:pointer;" class="list-group-item statusPending">
                  <a href="{!!route('profile',['type'=>1])!!}">
                    <b>Tổ chức sự kiện</b> <a title="Tổng số tổ chức sự kiên đang chờ phê duyệt" class="pull-right">{{$countEvent}}</a>
                  </a>
                </li>
                </a>
                <li style="cursor:pointer;" class="list-group-item statusPending">
                  <a href="{!!route('profile',['type'=>2])!!}">
                  <b>Nhân sự sự kiện</b> <a title="Tổng số nhân sự sự kiên đang chờ phê duyệt" class="pull-right">{{$countStaff}}</a>
                  </a>
                </li>
                <li style="cursor:pointer;" class="list-group-item statusPending">
                  <a href="{!!route('profile',['type'=>3])!!}">
                  <b>Thiết bị sự kiện</b> <a title="Tổng số thiết bị đang chờ phê duyệt" class="pull-right">{{$countDevice}}</a>
                  </a>
                </li>
                <li style="cursor:pointer;" class="list-group-item statusPending">
                  <b>Tin tức</b> <a title="Tổng số tin tức chờ phê duyệt" class="pull-right">{{count($countAdminBlog)}}</a>
                </li>
                <li style="cursor:pointer;" class="list-group-item statusPending">
                    <b>Nhận xét đánh giá</b> <a title="Tổng số nhận xét đánh giá của khách hàng đang chờ phê duyệt" class="pull-right">{{count($countAdminComment)}}</a>
                  </li>
                @can('admin', $level = 1)
                <li class="list-group-item" style="order-bottom: none;background: #f9f9f9;">
                  <b>Tổng số tài khoản user</b> <a title="Tổng số tài khoản user" class="pull-right">{{$countUsers}}</a>
                </li>
                <li class="list-group-item" style="order-top: none;background: #f9f9f9;">
                    <b>Tổng số tài khoản editor</b> <a title="Tổng số tài khoản editor" class="pull-right">{{$countEditor}}</a>
                </li>
                @endcan
              </ul>

              <a href="{{ url('admincp/logouts') }}" class="btn btn-primary btn-block"><b>Logout</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              @if (Request::get('type') == 1)
              <li class="active"><a href="#event" data-toggle="tab">Danh sách tổ chức sự kiện chờ phê duyệt</a></li>
              @elseif (Request::get('type') == 2)
              <li class="active"><a href="#event" data-toggle="tab">Danh sách nhân sự sự kiện chờ phê duyệt</a></li>
              @elseif (Request::get('type') == 3)
              <li class="active"><a href="#event" data-toggle="tab">Danh sách thiết bị sự kiện chờ phê duyệt</a></li>
              @endif
              <li><a href="#blogs" data-toggle="tab">Tin tức</a></li>
              <li><a href="#comment" data-toggle="tab">Ý kiến khách hàng</a></li>
              @can('admin', $level = 1)
              <li><a href="#activity" data-toggle="tab">List account</a></li>
              @endcan
              @can('admin', $level = 1)
                <li><a href="#settings" data-toggle="tab">Thêm tài khoản nguời dùng</a></li>
              @endcan
              
              {{-- <li><a href="#divice" data-toggle="tab">Thiết bị sự kiện</a></li>  --}}
            </ul>
            <div class="tab-content">
                <div  class="active tab-pane" id="event">
                    @if ( Session::has('success') )
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                      </div>
                    @endif
                    <div style="display:none;" id="alert_delete_list_pr" class="alert alert-success alert-dismissible">
                        <span id="alert_delete_list"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                    </div>
                    @if ($errors->any())
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                      </div>
                    @endif
                    <div id="alert_delete_pr" class="alert alert-success alert-dismissible">
                        <span id="alert_delete"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="box" style="border:none;">
                      <div class="box-header">
                        @if(!Request::get('type'))
                        <h3>Danh sách các sự kiện chờ phê duyệt</h3>
                        @endif
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" style="position:relative;">
                        <div id="loadding" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;background:white;opacity:0.8;z-index:99;text-align:center;padding-top:86px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>STT</th>
                            <th>Title</th>
                            <th>Người đăng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                          </tr>
                          </thead>
                          <tbody>
                          @php
                            $i =1;
                            $post_user = \Auth::user()->name;  
                          @endphp
                          @foreach ($eventsPending as $event)
                          <tr class="event_row">
                            <input class="getIdEvent" type="hidden" name="id_user" value="{{$event->id}}">
                            <td class="event_col">{{$i++}}</td>
                            <td class="event_col">{{$event->title}}</td>
                            <td class="event_col">{{$event->name}}</td>
                            <td class="event_col">
                              <button class="btn btn-sm btn-warning btnStatus"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chờ phê duyệt...
                              <select onchange="myEventChangeStatus(this,{{$event->id}})" name="" class="selectStatus" style="background-color: #f2f3f3;outline: none;border: none;min-width: 50px;font-size: 13px;border-radius: 3px;color:#333;">
                                <option title="Chờ phê duyệt" value="0">Pending</option>
                                <option title="Hoạt động" value="1">Active</option>
                                <option title="vô hiêu hóa" value="2">Deactive</option>
                              </select>
                            </button>
                            </td>
                            <td class="event_col">
                                <a href="{!!route('managerEdit',['id'=>$event->id,'type'=> $event->type,'post-user' => $post_user])!!}"><span style="cursor:pointer;" title="sửa" class="btn_edit_frm_event badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                                <a href="javascript:void(0)" class="deleteEvent" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                            </td>
                          </tr>
                          @endforeach
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>STT</th>
                            <th>Title</th>
                            <th>Người đăng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                          </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->
              @can('admin', $level = 1)
              <div class=" tab-pane" id="activity">
                {{--  thong bao them user thanh cong  --}}
                @if ( Session::has('success') )
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                  </div>
                @endif
                
                {{--  thông báo lôi validate  --}}
                @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                  </div>
                @endif
                  <div class="box" style="border:none;">
                      <div class="box-header">
                        <h3 class="box-title">Danh sách tài khoản người user</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tr>
                            <th style="width: 10px">#</th>
                            <th style="width:35%">Tài khoản</th>
                            <th>Level</th>
                            <th style="width: 100px">action</th>
                          </tr>
                          @php
                            $i= 1;  
                          @endphp
                          @foreach ($users as $user)
                          <tr>
                            <input class="getIdUesr" type="hidden" name="id_user" value="{{$user->id}}">
                            <input class="avatarUser" type="hidden" value="{{$user->avatar}}">
                            <td>{{$i++."."}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if ($user->level == 2)
                                <span title="sửa" class="badge bg-yellow">editor</span>
                                @elseif ($user->level == 3)
                                <span title="xóa" class="badge bg-green">user post</span>
                                @endif
                            </td>
                            <td>
                              <span title="sửa" class="btn_edit_frm badge bg-light-blue" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></span>
                              <span title="xóa" class="delete_btn_frm badge bg-red"><i class="fa fa-trash"></i></span>
                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Launch demo modal
                    </button>  --}}

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <form action="admin-change-user" name="frmUser" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="id_user" type="hidden" name="id_user" value="">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 style="font-size:20px;font-weight:500;" class="modal-title" id="exampleModalLabel">Cập nhật tài khoản user</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="position:relative;">
                              <div id="status_load" style="position:absolute;top:0;left:0;background:white;width:100%;height:100%;text-align:center;padding-top:86px;display:none;z-index:99;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                              <label style="width:20%;font-weight:400;vertical-align:-webkit-baseline-middle" for="ac">Tài khoản</label>
                              <input id="upated_name_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="text" name="name" id="name"><br>
                              <label style="width:20%;font-weight:400;" for="pass">Mật khẩu hiện tại</label>
                              <input id="upated_pass_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="password" name="pass" id="pass"><br>
                              <label style="width:20%;font-weight:400;" for="sl_level">Level</label>
                              <select name="level" id="sl_level" style="width:30%;border-color:#eae2e3;margin-bottom:10px;border-top: none;border-right: none;border-left: none;outline: none;">
                                <option title="có quyền đăng,phê duyệt,sửa,xóa bài viết" value="2">Editor</option>
                                <option title="có quyền đăng,sửa bài viết" value="3">User post</option>
                              </select><br>

                              <label style="width:20%;font-weight:400;" for="mkn">Avatar</label>
                              <div>
                                <img id="idAvatar" src="" alt="" style="width: 147px;transform: translateX(80%);border: 2px solid #1b75ce;padding: 2px;">
                                <input id="upated_pass_user_avatar" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;margin-top: 25px;transform: translateX(30%);" type="file" name="file" id="pass"><br>
                              </div>

                              <label style="width:20%;font-weight:400;" for="mkn">Mật khẩu mới</label>
                              <input id="upated_repass_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="password" name="repass" id="repass"><br>
                              <label style="width:20%;font-weight:400;" for="xmkn">Xác nhận mật khẩu</label>
                              <input  id="upated_cfpass_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="password" name="cfpass" id="confirmpass">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
              </div>
              @endcan
              <!-- /.tab-pane -->
              @can('admin', $level = 1)
              <div class="tab-pane" id="settings">
                @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                    </button>
                  </div>
                @endif
                <form class="form-horizontal" action="admin-add-user" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tài khoản</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{!! old('name') !!}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Mật khẩu</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputEmail" placeholder="" name="pass" value="{!! old('pass') !!}">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail" placeholder="" name="repass" value="{!! old('name') !!}">
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Avatar</label>
                    <input id="upated_pass_user_add" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;margin-top: 25px;transform: translateX(3%) translateY(-18px);" type="file" name="file" id="pass"><br>
                  </div>
                  <div class="form-group">
                    <label for="selectlevel" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-10">
                      <select style="width:30%;height:35px;border-color:#d2d6de;" name="level" id="selectlevel" >
                        <option value="">Chọn quyền cho người dùng</option>
                        <option value="2">Editor</option>
                        <option value="3">User</option>
                      </select>
                    </div>
                  </div>
                  {{--  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>  --}}
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              @endcan
              <div class="tab-pane" id="blogs">
                  <div id="loadding_blog" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;background:white;opacity:0.8;z-index:99;text-align:center;padding-top:86px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                  <div class="row">
                      <div class="col-xs-12">
                        <div class="box" style="border:none;">
                          <div class="box-header">
                            <h3 class="box-title">Tin tức</h3>
              
                            <div class="box-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              
                                <div class="input-group-btn">
                                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body table-responsive no-padding">
                            <table id="dbtbl" class="table table-hover">
                              <tr>
                                <th>ID</th>
                                <th>Tiê đề</th>
                                <th>Người đăng bài</th>
                                <th>Ngày đăng</th>
                                <th>Trạng tháy</th>
                                <th>Chức năng</th>
                              </tr>
                              @php
                                  $i=1;
                              @endphp
                              @foreach ($blogs as $blog)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->name}}</td>
                                <td>{{$blog->created_at}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning btnStatus"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chờ phê duyệt...
                                      <select onchange="myEventChangeStatusBlog(this,{{$blog->id}})" name="" class="selectStatus" style="background-color: #f2f3f3;outline: none;border: none;min-width: 50px;font-size: 13px;border-radius: 3px;color:#333;">
                                        <option title="Chờ phê duyệt" value="0">Pending</option>
                                        <option title="Hoạt động" value="1">Active</option>
                                        {{-- <option title="vô hiêu hóa" value="2">Deactive</option> --}}
                                      </select>
                                    </button>
                                </td>
                                <td>
                                    <a href=""><span style="cursor:pointer;" title="sửa" class="btn_edit_frm_event badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                                    <a href="javascript:void(0)" class="deleteEvent" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                                </td>
                              </tr>
                              @endforeach
                            </table>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                  </div>
              </div>
              <div class="tab-pane" id="comment">
                <div id="loadding_comment" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;background:white;opacity:0.8;z-index:99;text-align:center;padding-top:86px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                <div class="row">
                    <div class="col-xs-12">
                      <div class="box" style="border:none;">
                        <div class="box-header">
                          <h3 class="box-title">Nhận xét - đánh giá</h3>
            
                          <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
            
                              <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                          <table id="dbtbl" class="table table-hover">
                            <tr>
                              <th>ID</th>
                              <th>Tên</th>
                              <th>avatar</th>
                              <th>Ngày đăng</th>
                              <th>Trạng tháy</th>
                              <th>Chức năng</th>
                            </tr>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($custommer as $custom)
                            <tr>
                              <td>{{$i}}</td>
                              <td>{{$custom->name}}</td>
                              <td>
                                <img style="width:100px;border: 2px solid #116fbf;padding: 3px;;" src="{!! asset('admin/img/'.$custom->avatar) !!}" alt="ảnh khác hàng">
                              </td>
                              <td>{{$custom->created_at}}</td>
                              <td>
                                  <button class="btn btn-sm btn-warning btnStatus"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chờ phê duyệt...
                                    <select onchange="myEventChangeStatusCustommer(this,{{$custom->id}})" name="" class="selectStatus" style="background-color: #f2f3f3;outline: none;border: none;min-width: 50px;font-size: 13px;border-radius: 3px;color:#333;">
                                      <option title="Chờ phê duyệt" value="0">Pending</option>
                                      <option title="Hoạt động" value="1">Active</option>
                                      {{-- <option title="vô hiêu hóa" value="2">Deactive</option> --}}
                                    </select>
                                  </button>
                              </td>
                              <td>
                                  <a href="{{route('custommer-edit',['slug'=>$custom->slug])}}"><span style="cursor:pointer;" title="sửa" class="btn_edit_frm_event badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                                  <a href="javascript:void(0)" class="deleteEvent" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                </div>
            </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<script>
    document.getElementById('alert_delete_pr').style.display = 'none';
    var btn_show_user = document.getElementsByClassName('btn_edit_frm');
    var getIdUesr = document.getElementsByClassName('getIdUesr');
    var delete_btn_frm = document.getElementsByClassName('delete_btn_frm');
    var avatarUser = document.getElementsByClassName('avatarUser');
    for(let i =0; i<btn_show_user.length; i++){
      btn_show_user[i].addEventListener('click',function(){
        document.getElementById('status_load').style.display = 'block';
        var _token =  $('meta[name="csrf-token"]').attr('content');  
        let id = getIdUesr[i].value;
        let avatarCurrent = avatarUser[i];
        console.log(avatarCurrent);
        $.ajax({
          url: "admin-show-user",
          type: 'POST',
          data:{"id": id,"_token": _token},
          success: function(data){
            //console.log(data.user.name);
            document.getElementById('id_user').value = data.user.id;
            document.getElementById('upated_name_user').value = data.user.name;
            document.getElementById('upated_pass_user').value = data.user.password;
            document.getElementById('sl_level').value = (data.user.level == 2)?2:3;
            console.log(document.getElementById('idAvatar'));
            document.getElementById('idAvatar').src = '{{asset('')}}/admin/img/'+avatarCurrent.value;
            //'{{asset('')}}/admin/img/'+data.partner.photo_prtner;

            document.getElementById('status_load').style.display = 'none';
          }
      });
      })
    }
    for(let i =0; i<delete_btn_frm.length; i++){
      delete_btn_frm[i].addEventListener('click',function(){
        let id = getIdUesr[i].value;
        let _token =  $('meta[name="csrf-token"]').attr('content');
        if(confirm('bạn có muốn xóa user này không')){
          let objdel = $(this).parent().parent();
          $.ajax({
            url: "admin-delete-user",
            type: 'POST',
            data:{"id": id,"_token": _token},
            success: function(data){
              document.getElementById('alert_delete_pr').style.display = 'block';
              document.getElementById('alert_delete').innerText = data.success;
              objdel.remove();
            }
        });
        }
      });
    }

    function myEventChangeStatus(obj,id){
      let status = obj.options[obj.selectedIndex].value;
      let _token =  $('meta[name="csrf-token"]').attr('content');
      let ids = id;
      document.getElementById('loadding').style.display = 'block';
      let parentRemove = obj.parentNode.parentNode.parentNode;
      
      //var selectStatus = document.getElementsByClassName('selectStatus')[index];
      if(confirm('xác nhận trạng thái')){
        $.ajax({
          url: "admin-change-status",
          type: 'POST',
          data:{"status": status,'id':ids,"_token": _token},
          success: function(data){
            document.getElementById('alert_delete_pr').style.display = 'block';
            document.getElementById('alert_delete').innerText = data.success;
            if(data){
              document.getElementById('loadding').style.display = 'none';
              parentRemove.remove();
              alert('Bạn đã phê duyệt thành công');
              if(status == 0){
                obj.parentNode.classList.add('btn-warning');
                obj.parentNode.style.backgroundColor = '#d58512';
                obj.parentNode.style.borderColor = '#d58512';
                //obj.parentNode.innerText = 'Chờ phê duyệt...';
              }else if(status == 1){
                obj.parentNode.style.backgroundColor = '#13c76c';
                obj.parentNode.style.borderColor = '#13c76c';
                //obj.parentNode.innerText = 'Hoạt động';
              }
              else if(status == 2){
                obj.parentNode.style.backgroundColor = '#cec8bf';
                obj.parentNode.style.borderColor = '#cec8bf';
                //obj.parentNode.innerText = 'Vô hiệu hóa';
              }
            }
          }
        });
      }else{
        document.getElementById('loadding').style.display = 'none';
      }
      
    }
    function myEventChangeStatusBlog(obj,id){
      let status = obj.options[obj.selectedIndex].value;
      let _token =  $('meta[name="csrf-token"]').attr('content');
      let ids = id;
      document.getElementById('loadding_blog').style.display = 'block';
      let parentRemove = obj.parentNode.parentNode.parentNode;
      if(confirm('xác nhận trạng thái')){
        $.ajax({
          url: "admin-change-blogs-status",
          type: 'POST',
          data:{"status": status,'id':ids,"_token": _token},
          success: function(data){
            document.getElementById('alert_delete_pr').style.display = 'block';
            document.getElementById('alert_delete').innerText = data.success;
            if(data){
              document.getElementById('loadding_blog').style.display = 'none';
              parentRemove.remove();
              alert('Bạn đã phê duyệt thành công');
            }
          }
        });
      }else{
        document.getElementById('loadding_blog').style.display = 'none';
      }
    }
    function myEventChangeStatusCustommer(obj,id){
      let status = obj.options[obj.selectedIndex].value;
      let _token =  $('meta[name="csrf-token"]').attr('content');
      let ids = id;
      document.getElementById('loadding_comment').style.display = 'block';
      let parentRemove = obj.parentNode.parentNode.parentNode;
      if(confirm('xác nhận trạng thái')){
        $.ajax({
          url: "admin-change-custommer-status",
          type: 'POST',
          data:{"status": status,'id':ids,"_token": _token},
          success: function(data){
            document.getElementById('alert_delete_pr').style.display = 'block';
            document.getElementById('alert_delete').innerText = data.success;
            if(data){
              document.getElementById('loadding_comment').style.display = 'none';
              parentRemove.remove();
              alert('Bạn đã phê duyệt thành công');
            }
          }
        });
      }else{
        document.getElementById('loadding_comment').style.display = 'none';
      }
    }
  </script>
  <script src="{{asset('')}}/admin/js/litsEvent.js"></script>
@endsection
