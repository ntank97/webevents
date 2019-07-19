@extends('admin.layout_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Đối tác
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admincp/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Đối tác</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" style="border:none;">
        <div class="box-header with-border">
          <h3 class="box-title">table</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            </div>
        @endif
        <div id="alert_delete_partner" class="alert alert-success alert-dismissible">
            <span id="alert_delete_partner"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
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
        <div style="clear: both;"></div>
        <div class="box-body">
            {{-- content data table --}}
            <div class="box" style="border:none;">
                <div class="box-header">
                    <h3 class="box-title"></h3>Danh sách
                    @if (count($partner) == 0)
                    <button type="button" class="btn btn-primary" style="float:right;margin-right:25px;" data-toggle="modal" data-target="#exampleModal3">Thêm</button>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên đối tác</th>
                        <th>Logo</th>
                        <th>Ngày tạo</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;    
                    @endphp
                    @foreach ($partner as $partner)
                    <tr>
                        <input class="getIdUesrPartner" type="hidden" name="id_user" value="{{$partner->id}}">
                        <td>{{$i++}}</td>
                        <td>{{$partner->name}}
                        </td>
                        <td>{{$partner->photo_prtner}}</td>
                        <td>{{$partner->created_at}}</td>
                        <td>
                            <a href="javascript:void(0)"><span style="cursor:pointer;background:#00a65a;" title="thêm" class="btn_edit_frm_partner_add badge  bg-gree" data-toggle="modal" data-target="#exampleModal3"><i class="fa fa-plus-circle"></i></span></a>
                            <a href="javascript:void(0)"><span style="cursor:pointer;" title="sửa" class="btn_edit_frm_partner_edit badge bg-light-blue"  data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-edit"></i></span></a>
                            <a href="javascript:void(0)" class="deleteEvent" href=""><span style="cursor:pointer;" title="xóa" class="delete_btn_frm_partner badge bg-red"><i class="fa fa-trash"></i></span></a>
                        </td>
                    </tr>
                      {{--  form sua  --}}
                      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="partner-add-edit" name="frmUser" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input id="id_user" type="hidden" name="id" value="{{$partner->id}}">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 style="font-size:20px;font-weight:500;" class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body" style="position:relative;">
                                <div id="status_load_add_partner" style="position:absolute;top:0;left:0;background:white;width:100%;height:100%;text-align:center;padding-top:86px;display:none;z-index: 99;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                <label style="width:20%;font-weight:400;vertical-align:-webkit-baseline-middle" for="ac">Tài đối tác</label>
                                <input id="upated_name_user_partner" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="text" name="name" id="name"><br>
                                <label style="width:20%;font-weight:400;margin-top:25px;" for="pass">Logo</label>
                                <img id="upated_pass_user_partner_img" src="" alt="" style="width: 50%;margin-top: 25px;border: 3px solid #47e8c3;padding: 3px;">
                                <input id="upated_pass_user_partner" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;margin-top: 25px;transform: translateX(30%);" type="file" name="file" id="pass"><br>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên đối tác</th>
                        <th>Logo</th>
                        <th>Ngày tạo</th>
                        <th>Chức năng</th>
                    </tr>
                    </tfoot>
                    </table>
                   {{--  form them  --}}
                   <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="partner-add-edit" name="frmUser" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            {{-- <input id="id_user" type="hidden" name="id_user" value=""> --}}
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 style="font-size:20px;font-weight:500;" class="modal-title" id="exampleModalLabel">Thêm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body" style="position:relative;">
                                <div id="status_load" style="position:absolute;top:0;left:0;background:white;width:100%;height:100%;text-align:center;padding-top:86px;display:none;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>
                                <label style="width:20%;font-weight:400;vertical-align:-webkit-baseline-middle" for="ac">Tên đối tác</label>
                                <input id="upated_name_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="text" name="name" id="name"><br>
                                <label style="width:20%;font-weight:400;margin-top: 25px;" for="pass">Logo</label>
                                <input id="upated_pass_user" style="width:70%;border-top:none;border-right:none;border-left:none;outline:none;" type="file" name="file" id="pass"><br>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                   
                </div>
                <!-- /.box-body -->
            </div>
        {{-- end-content-datatable --}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
    document.getElementById('alert_delete_partner').style.display = 'none';
    var btn_edit_frm_partner_edit = document.getElementsByClassName('btn_edit_frm_partner_edit');
    var getIdUesrPartner = document.getElementsByClassName('getIdUesrPartner');
    var delete_btn_frm_partner = document.getElementsByClassName('delete_btn_frm_partner');
    for(let i=0; i<btn_edit_frm_partner_edit.length; i++){
        btn_edit_frm_partner_edit[i].addEventListener('click',function(){
            document.getElementById('status_load_add_partner').style.display = 'block';
                var _token =  $('meta[name="csrf-token"]').attr('content');  
                let id = getIdUesrPartner[i].value;
                $.ajax({
                url: "partner-show-data",
                type: 'POST',
                data:{"id": id,"_token": _token},
                success: function(data){
                    document.getElementById('upated_name_user_partner').value = data.partner.name;
                    document.getElementById('upated_pass_user_partner_img').src = '{{asset('')}}/admin/img/'+data.partner.photo_prtner;
                    document.getElementById('status_load_add_partner').style.display = 'none';
                }
            });
        });
    }
    //delete
    for(let i =0; i<delete_btn_frm_partner.length; i++){
        delete_btn_frm_partner[i].addEventListener('click',function(){
          let id = getIdUesrPartner[i].value;
          let _token =  $('meta[name="csrf-token"]').attr('content');
          if(confirm('bạn có thực sự muốn xóa không')){
            let objdel = $(this).parent().parent().parent();
            $.ajax({
              url: "partner-delete-data",
              type: 'POST',
              data:{"id": id,"_token": _token},
              success: function(data){
                document.getElementById('alert_delete_partner').style.display = 'block';
                document.getElementById('alert_delete_partner').innerText = data.success;
                objdel.remove();
              },
              error: function(data) {
                alert(data.responseJSON.success); 
              }    
          });
          }
        });
      }
</script>
@endsection
