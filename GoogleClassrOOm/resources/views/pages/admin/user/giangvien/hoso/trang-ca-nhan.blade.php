@extends('layouts.dashHead')

@section('title', 'Admin - Teacher Profile Page Manager')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin Giảng viên</h1>
                    </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="widget-user-image">
                            @if($gv->hinhdaidien)
                                <img class="img-circle mx-auto d-block" width="200px"  src="{{ asset('images/'.$gv->hinhdaidien) }}" alt="Ảnh đại diện">
                            @else
                                <img class="img-circle mx-auto d-block" width="200px"  src="{{ asset('images/unnamed.png') }}" alt="Ảnh đại diện">
                            @endif
                        </div>

                      <h3 class="profile-username text-center">{{ $gv->hoten }}</h3>

                      <ul class="list-group list-group-unbordered mb-3">

                        <li class="list-group-item">
                            <b>Loại tài khoản</b> <a class="float-right">
                                @if($gv->maloaitk == 3)
                                    Người quản trị
                                @elseif($gv->maloaitk == 2)
                                    Giáo viên
                                @else
                                    Học viên
                                @endif
                            </a>
                        </li>                       
                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.col -->
                <!-- Profile Details -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Chi Tiết Tài Khoản</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tùy Chỉnh</a></li>
                            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Thay đổi mật khẩu</a></li>
                        </ul>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <!-- Profile Details -->
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Thông tin Giảng Viên</h5>
                                            <h6>Họ Tên :</h6>
                                            @if($teacher->hoten)
                                                <p>{{ $teacher->hoten }}</p>
                                        
                                            @endif

                                            <h6>Ngày sinh :</h6>
                                            @if($teacher->ngaysinh)
                                                <p>{{ $teacher->ngaysinh }}</p>
                                           
                                            @endif

                                            <h6>Số điện thoại :</h6>
                                            @if($teacher->sdt)
                                                <p>{{ $teacher->sdt }}</p>
                                            
                                            @endif

                                            <h6>Giới tính :</h6>
                                            @if($teacher->gioitinh)
                                                <p>{{ $teacher->gioitinh }}</p>
                                            
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <h5></h5>
                                            <h6>Trạng thái :</h6>
                                            @if($teacher->hoatdong == 0)
                                                <p>Đang hoạt động</p>
                                            @else
                                                <p>Đã xóa</p>
                                           @endif

                                            <h6>Loại tài khoản :</h6>
                                            <a class="float-right">
                                                @if(auth()->user()->maloaitk == 3)
                                                    Người quản trị
                                                @elseif(auth()->user()->maloaitk == 2)
                                                    Giáo viên
                                                @else
                                                    Học viên
                                                @endif
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Thông tin tài khoản</h5>
                                            <h6>Tên tài khoản :</h6>
                                            @if($teacher->username)
                                                <p>{{ $teacher->username }}</p>
                                        
                                            @endif

                                            <h6>Số ID :</h6>
                                            @if($teacher->id)
                                                <p>{{ $teacher->id }}</p>
                                            
                                            @endif

                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-content -->

                            <!-- Profile Setting Part -->
                            <div class="tab-pane" id="settings">
                                <!-- Success And Fail/Error Alert -->
                                <div class="row">
                                    @if (session('message.profile'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ session('message.profile') }}</strong>
                                            <p>Bạn có thể xem ở chi tiết tài khoản</p>
                                        </div>
                                    @endif
                                </div>
                                <!-- End of Success And Fail/Error Alert -->
                                <form class="form-horizontal" method="post" action="{{ route('ad-sua-gv')}}">
                                    @csrf
                                    {{ method_field('PUT') }}

                                    <h5>Thông tin</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Họ Tên</label>
                                        <div class="col-sm-10">
                                            <input  name="name" type="name" class="form-control" placeholder="Họ tên" value="{{ $teacher->hoten }}">
                                            @if($errors->has('name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('name')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{ $teacher->tempat_lahir }}">
                                        </div>
                                    </div>

                                    

                                    

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <input name="jenis_kelamin" type="text" class="form-control" placeholder="Jenis Kelamin" value="{{ $teacher->jenis_kelamin }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input8" class="col-sm-2 col-form-label">Giới tính</label>
                                        <div class="col-sm-10">
                                            <select name="kelas" class="form-control">
                                                    <option value="0">Nam</option>
                                                    <option value="1">Nữ</option>
                                                    <option value="NULL">Khác</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <h5>INFO AKADEMIK</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIP*</label>
                                        <div class="col-sm-10">
                                            <input  name="nip" type="text" class="form-control" placeholder="Nomor NIP" value="{{ $teacher->nip }}">
                                            @if($errors->has('nip'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nip')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input name="jabatan" type="text" class="form-control" placeholder="Jabatan, misal: Komandan Kompi RPL" value="{{ $teacher->jabatan }}">
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <h5>INFO AKUN</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Username*</label>
                                        <div class="col-sm-10">
                                            <input  name="username" type="text" class="form-control" placeholder="Username" value="{{ $teacher->username }}">
                                            @if($errors->has('username'))
                                                <div class="text-danger">
                                                    {{ $errors->first('username')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">E-mail*</label>
                                        <div class="col-sm-10">
                                            <input  name="email" type="email" class="form-control" placeholder="E-mail" value="{{ $teacher->email }}">
                                            @if($errors->has('email'))
                                                <div class="text-danger">
                                                    {{ $errors->first('email')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No. Telp*</label>
                                        <div class="col-sm-10">
                                            <input  name="no_telp" type="text" class="form-control" placeholder="No. Telp" value="{{ $teacher->no_telp }}">
                                            @if($errors->has('no_telp'))
                                                <div class="text-danger">
                                                    {{ $errors->first('no_telp')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-content -->

                            <!-- Change Password Part -->
                            <div class="tab-pane" id="password">
                                <!-- Success And Fail/Error Alert -->
                                <div class="row">
                                    @if (session('message.password'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ session('message.password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <!-- End of Success And Fail/Error Alert -->
                                <form class="form-horizontal" method="post" action="/Okemin/User/Teacher/Profile/changePassword/{{ $teacher->id }}">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input name="new_password" type="password" class="form-control" id="inputName" placeholder="Your New Password">
                                                @if($errors->has('new_password'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('new_password')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Confirm New Password</label>
                                        <div class="col-sm-10">
                                            <input name="confirm_new_password" type="password" class="form-control" id="inputEmail" placeholder="Enter Your New Password, Again.">
                                            @if($errors->has('confirm_new_password'))
                                                <div class="text-danger">
                                                    {{ $errors->first('confirm_new_password')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button name="submit" type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
              <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
