@extends('layouts.dashHead')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('svgs/board.svg') }}">
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <title>Quản trị web</title>
</head>

<body id="body-pd">
    <header id="header"
        class="
        fixed-top
        header
        shadow
        d-flex
        justify-content-between
        px-4
        py-3
        bg-white
      ">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('Admin') }}" class="logo me-3">
            <img src="{{ asset('svgs/logo.svg') }}" alt="Logo" />
        </a>
        <span class="text-muted">
            <font size="+1">Quản trị</font>
        </span>

        <div class="popup ms-auto">
            <div class="avatar me-3 cursor-pointer">
                <img src="{{ asset('images/' . auth()->user()->hinhdaidien) }}" alt="Avatar" />
            </div>

            <div
                class="
            popup__content
            d-flex
            flex-column
            align-items-center
            shadow
            rounded-3
            bg-white
          ">
                <img class="popup__avatar cursor-pointer" src="{{ asset('images/' . auth()->user()->hinhdaidien) }}"
                    alt="Avatar" />
                <div class="d-flex gap-3">
                    <span class="flex-center text-nowrap d-none d-md-flex">{{ auth()->user()->hoten }}</span>
                </div>
                <p class="popup__email">{{ auth()->user()->email }}</p>
                <a class="popup__link" href="{{ route('youraccount') }}" target="_blank">Quản lý Tài Khoản</a>
                <div class="popup__logout mt-auto cursor-pointer"><a class="btn btn-primary"
                        href="{{ route('dang-xuat') }}">Đăng xuất
                    </a></div>

                <div class="popup__pseudo"></div>
            </div>
        </div>
    </header>
    <style>
        .p {
            margin-top: 75px;
        }

    </style>
    @include('layouts.dashSidebar')
    <div style="margin-top: 85px">
        <!-- Success And Fail/Error Alert -->
        <div class="row">
            @if (session('message.password'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close"
                        data-dismiss="alert">×</button>
                    <strong>{{ session('message.password') }}</strong>
                </div>
            @endif
        </div>
        <!-- End of Success And Fail/Error Alert -->
        <!-- Success And Fail/Error Alert -->
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
        </div>
        <!-- End of Success And Fail/Error Alert -->
        <!-- Success And Fail/Error Alert -->
        <div class="row">
            @if (session('message.profile'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('message.profile') }}</strong>
                    <p>Bạn có thể xem ở "chi tiết tài khoản"</p>
                </div>
            @endif
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thông tin Học viên</h1>
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
                                    @if ($gv->hinhdaidien)
                                        <img class="img-circle mx-auto d-block" width="200px"
                                            src="{{ asset('images/' . $gv->hinhdaidien) }}" alt="Ảnh đại diện">
                                    @else
                                        <img class="img-circle mx-auto d-block" width="200px"
                                            src="{{ asset('images/unnamed.png') }}" alt="Ảnh đại diện">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ $gv->hoten }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <b>Loại tài khoản</b> <a class="float-right">
                                            @if ($gv->maloaitk == 3)
                                                Người quản trị
                                            @elseif($gv->maloaitk == 1)
                                                Giảng viên
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
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Chi Tiết Tài Khoản</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                            data-toggle="tab">Tùy Chỉnh</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password"
                                            data-toggle="tab">Thay đổi mật khẩu</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#avt"
                                            data-toggle="tab">Thay đổi ảnh đại diện</a></li>
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
                                                    <h5>Thông tin Học Viên</h5>
                                                    <h6><b>Họ và Tên :</b></h6>
                                                    @if ($gv->hoten)
                                                        <p>{{ $gv->hoten }}</p>
                                                    @endif

                                                    <h6><b>Ngày sinh :</b></h6>
                                                    @if ($gv->ngaysinh)
                                                        <p>{{ $gv->ngaysinh }}</p>
                                                    @endif

                                                    <h6><b>Số điện thoại :</b></h6>
                                                    @if ($gv->sdt)
                                                        <p>{{ $gv->sdt }}</p>
                                                    @endif

                                                    <h6><b>Giới tính :</b></h6>
                                                    @if ($gv->gioitinh == 0)
                                                        Nam
                                                    @elseif($gv->maloaitk == 1)
                                                        Nữ
                                                    @else
                                                        Khác
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <h5></h5>
                                                    <h6><b>Trạng thái :</b></h6>
                                                    @if ($gv->hoatdong == 0)
                                                        <p>Đang hoạt động</p>
                                                    @else
                                                        <p>Tạm Khóa</p>
                                                    @endif

                                                    <h6><b>Loại tài khoản :</b></h6>
                                                    @if ($gv->maloaitk == 3)
                                                        Người quản trị
                                                    @elseif($gv->maloaitk == 1)
                                                        Giáo viên
                                                    @else
                                                        Học viên
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Garis Pembatas -->
                                            <hr>
                                            <!-- End of Garis Pembatas -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Thông tin tài khoản</h5>
                                                    <h6><b>Tên tài khoản :</b></h6>
                                                    @if ($gv->username)
                                                        <p>{{ $gv->username }}</p>
                                                    @endif

                                                    <h6><b>Số ID :</b></h6>
                                                    @if ($gv->id)
                                                        <p>{{ $gv->id }}</p>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-content -->

                                    <!-- Profile Setting Part -->
                                    <div class="tab-pane" id="settings">

                                        <!-- End of Success And Fail/Error Alert -->
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('add-sua-hs', ['id' => $gv->id]) }}">
                                            @csrf
                                            {{ method_field('POST') }}

                                            <h5>Thông tin</h5>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Họ và Tên</label>
                                                <div class="col-sm-10">
                                                    <input name="name" type="name" class="form-control"
                                                        placeholder="Họ tên" value="{{ $gv->hoten }}">
                                                    @if ($errors->has('name'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                                <div class="col-sm-10">
                                                    <input name="sdt" type="text" class="form-control"
                                                        value="{{ $gv->sdt }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input8" class="col-sm-2 col-form-label">Giới tính</label>
                                                <div class="col-sm-10">
                                                    <select name="gioitinh" class="form-control">
                                                        <option value="0">Nam</option>
                                                        <option value="1">Nữ</option>
                                                        <option value="NULL">Khác</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input5" class="col-sm-2 col-form-label">Ngày sinh</label>
                                                <div class="col-sm-10">
                                                    <input name="bird" type="date" class="form-control" id="input5">
                                                </div>
                                            </div>


                                            <!-- Garis Pembatas -->
                                            <hr>
                                            <!-- End of Garis Pembatas -->

                                            <h5>Tài Khoản</h5>
                                            <div class="form-group row">
                                                <label for="input8" class="col-sm-2 col-form-label">Loại tài
                                                    khoản</label>
                                                <div class="col-sm-10">
                                                    <select name="loaitk" class="form-control">
                                                        <option value="1">Giảng viên</option>
                                                        <option value="2">Học viên</option>
                                                        <option value="3">Admin</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="input8" class="col-sm-2 col-form-label">Trạng thái</label>
                                                <div class="col-sm-10">
                                                    <select name="hoatdong" class="form-control">
                                                        <option value="0">Hoạt động</option>
                                                        <option value="1">Không hoạt động</option>
                                                        <option value="3">Tạm Khóa</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <!-- Garis Pembatas -->
                                            <hr>
                                            <!-- End of Garis Pembatas -->

                                            <h5>Thông tin đăng nhập</h5>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tên tài khoản</label>
                                                <div class="col-sm-10">
                                                    <input name="username" type="text" class="form-control" readonly
                                                        value="{{ $gv->username }}">
                                                    @if ($errors->has('username'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('username') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" type="email" class="form-control"
                                                        placeholder="E-mail" value="{{ $gv->email }}">
                                                    @if ($errors->has('email'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button name="submit" type="submit" class="btn btn-primary">Thay
                                                        đổi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-content -->

                                    <!-- Change Password Part -->
                                    <div class="tab-pane" id="password">
                                        
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('add-doimk-hs', ['id' => $gv->id]) }}">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu
                                                    mới</label>
                                                <div class="col-sm-10">
                                                    <input name="new_password" type="password" class="form-control"
                                                        id="inputName" placeholder="Nhập mật khẩu mới">
                                                    @if ($errors->has('new_password'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('new_password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Nhập lại mật
                                                    khẩu
                                                </label>
                                                <div class="col-sm-10">
                                                    <input name="confirm_new_password" type="password"
                                                        class="form-control" id="inputEmail"
                                                        placeholder="Nhập lại mật khẩu mới.">
                                                    @if ($errors->has('confirm_new_password'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('confirm_new_password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button name="submit" type="submit" class="btn btn-danger">Xác
                                                        nhận</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="avt">

                                        <form class="form-horizontal" method="post"
                                            action="{{ route('add-avt-hs', ['id' => $gv->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <div class="col-md-12">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thay đổi ảnh đại diện</h3>
                                                    </div>
                                                    <!-- /.card-header -->

                                                    <div class="card-body">
                                                        <div class="widget-user-image">
                                                            @if ($gv->hinhdaidien)
                                                                <img class="img-circle mx-auto d-block" width="200px"
                                                                    src="{{ asset('images/' . $gv->hinhdaidien) }}"
                                                                    alt="Ảnh đại diện">
                                                            @else
                                                                <img class="img-circle mx-auto d-block" width="200px"
                                                                    src="{{ asset('images/unnamed.png') }}"
                                                                    alt="Ảnh đại diện">
                                                            @endif
                                                        </div>



                                                        <label>Ảnh đại diện của {{ $gv->hoten }}</label>

                                                        <div>
                                                            <label class="upload cursor-pointer" for="upload">
                                                                <img class="img-cover"
                                                                    src="{{ asset('svgs/upload.svg') }}"
                                                                    alt="Upload" />
                                                            </label>
                                                            <input id="upload" name="avatar" type="file"
                                                                class="form-control py-3"
                                                                placeholder="{{ asset('svgs/upload.svg') }}"
                                                                onchange="loadFile(event)" />

                                                        </div>
                                                        <p><img id="output" width="250" /></p>


                                                        <div class="callout callout-warning">
                                                            <p>Chọn ảnh đúng định dạng. Kích cỡ tệp ảnh không lớn
                                                                hơn 2MB.</p>
                                                        </div>
                                                        <button name="submit" type="submit"
                                                            class="btn btn-block bg-gradient-primary">Đăng
                                                            ảnh</button>


                                                    </div>
                                                    <!-- /.card-body -->
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
    </div>
    <!--===== MAIN JS =====-->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
