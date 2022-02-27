@extends('layouts.dashHead')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="{{ asset('svgs/board.svg') }}">
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
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        <!-- End of Success And Fail/Error Alert -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm mới Admin</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tạo mới Admin</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        

                        <form role="form" action="{{ route('add-tao-ad') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <h5>Nhập dữ liệu</h5>
                            <div class="form-group row">
                                <label for="input1" class="col-sm-2 col-form-label">Tên tài khoản</label>
                                <div class="col-sm-10">
                                    <input name="username" type="name" class="form-control" id="input1"
                                        placeholder="Tên tài hoản">
                                    @if ($errors->has('username'))
                                        <div class="text-danger">
                                            {{ $errors->first('username') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu
                                    mới</label>
                                <div class="col-sm-10">
                                    <input name="new_password" type="password" class="form-control" id="inputName"
                                        placeholder="">
                                    @if ($errors->has('new_password'))
                                        <div class="text-danger">
                                            {{ $errors->first('new_password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Nhập lại mật
                                    khẩu mới</label>
                                <div class="col-sm-10">
                                    <input name="confirm_new_password" type="password" class="form-control"
                                        id="inputEmail" placeholder="">
                                    @if ($errors->has('confirm_new_password'))
                                        <div class="text-danger">
                                            {{ $errors->first('confirm_new_password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="input4" class="col-sm-2 col-form-label">Họ và Tên</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="input4"
                                        placeholder="Nguyễn Văn ABC">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input11" class="col-sm-2 col-form-label">E-mail*</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" id="input11"
                                        placeholder="E-mail">
                                    @if ($errors->has('email'))
                                        <div class="text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input5" class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input name="sdt" type="text" class="form-control" id="input5"
                                        placeholder="VD: 0909909990">
                                    @if ($errors->has('sdt'))
                                        <div class="text-danger">
                                            {{ $errors->first('sdt') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="input5" class="col-sm-2 col-form-label">Ngày sinh</label>
                                <div class="col-sm-10">
                                    <input name="ngaysinh" type="date" class="form-control" id="input5">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Giới tính</label>
                                <div class="col-sm-10">
                                    <select name="gioitinh" class="form-control">

                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        <option value="3">Khác</option>

                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <select name="hoatdong" class="form-control">

                                        <option value="0">Hoạt động</option>
                                        <option value="1">Không hoạt động</option>
                                        <option value="3">Tạm Khóa</option>

                                    </select>
                                </div>
                            </div>

                            <button name="submit" type="submit" class="btn btn-block bg-gradient-primary">Tạo
                                mới</button>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
                
            </div>
            <!-- /.col -->
        </section>
        <!-- /.content -->
    </div>
    <!--===== MAIN JS =====-->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
