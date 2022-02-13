@extends('layouts.adhead')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
      "
    >
	<div class="header__toggle">
		<i class='bx bx-menu' id="header-toggle"></i>
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="{{ route('Admin') }}" class="logo me-3">
        <img src="{{ asset('svgs/logo.svg') }}" alt="Logo" />
      </a>
	  <span class="text-muted"><font size="+1">Quản trị</font></span>

      <div class="popup ms-auto">
        <div class="avatar me-3 cursor-pointer">
          <img
          src="{{ asset('images/'.auth()->user()->hinhdaidien) }}"
            alt="Avatar"
          />
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
          "
        >
          <img
            class="popup__avatar cursor-pointer"
            src="{{ asset('images/'.auth()->user()->hinhdaidien) }}"
            alt="Avatar"
          />
          <div class="d-flex gap-3">
            <span class="flex-center text-nowrap d-none d-md-flex"
              >{{ auth()->user()->hoten }}</span>       
          </div>
          <p class="popup__email">{{ auth()->user()->email }}</p>
          <a class="popup__link" href="{{ route('youraccount') }}" target="_blank"
            >Quản lý Tài Khoản</a
          >
          <div class="popup__logout mt-auto cursor-pointer"><a class="btn btn-primary" href="{{ route('dang-xuat') }}">Đăng xuất
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
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div class="p">
                    

                    <div class="nav__list">
                        <a href="#" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="{{ route('AdminInfo') }}" class="nav__link  active">
                            <i class='bx bxs-chip nav__icon' ></i>
                                <span class="nav__name">Hồ sơ QTV</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Người dùng</span>
                        </a>
                        
                        <a href="#" class="nav__link">
                          <i class='bx bx-wallet-alt nav__icon' ></i>
                            <span class="nav__name">Lớp học</span>
                        </a>

                        <a href="#" class="nav__link">
                          <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Kho chứa</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-hdd nav__icon' ></i>
                            <span class="nav__name">Dữ liệu</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Thống kê</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="nav__link">
                    <i class='bx bx-cog nav__icon' ></i>
                    <span class="nav__name">Cài đặt</span>
                </a>
            </nav>
        </div>
        <div style="margin-top: 85px">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Hồ sơ</h1>
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
                              <div class="text-center">
                                    @if(auth()->user()->hinhdaidien)
                                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.auth()->user()->hinhdaidien) }}" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.auth()->user()->hinhdaidien) }}" alt="User profile picture">
                                    @endif
                                </div>
        
                              <h3 class="profile-username text-center">{{ auth()->user()->hoten }}</h3>
        
                              <p class="text-muted text-center">{{ auth()->user()->hoten }}</p>
        
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Loại tài khoản</b> <a class="float-right">
                                        @if(auth()->user()->maloaitk == 3)
                                            Người quản trị
                                        @elseif(auth()->user()->maloaitk == 2)
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
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Chi tiết hồ sơ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Thay đổi thông tin</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Thay đổi mật khẩu</a></li>
                                </ul>
        
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Thông tin quản trị viên</h5>
                                                <h6>Name :</h6>
                                                @if(auth()->user()->hoten)
                                                    <p>{{ auth()->user()->hoten }}</p>
                                                @else
                                                    <p>???</p>
                                                @endif
        
                                                <h6>Username :</h6>
                                                @if(auth()->user()->username)
                                                    <p>{{ auth()->user()->username }}</p>
                                                @else
                                                    <p>???</p>
                                                @endif
        
                                                <h6>E-mail :</h6>
                                                @if(auth()->user()->email)
                                                    <p>{{ auth()->user()->email }}</p>
                                                @else
                                                    <p>???</p>
                                                @endif
        
                                            
                                            </div>
                                        </div>
        
        
        
                                    </div>
                                    <!-- /.post -->
        
                                    </div>
        
                                    <!-- Profile Setting Part -->
                                    <div class="tab-pane" id="settings">
                                        <!-- Success And Fail/Error Alert -->
                                        <div class="row">
                                            @if (session('message.profile'))
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ session('message.profile') }}</strong>
                                                    <p>Bạn có thể xem nó trong Chi tiết hồ sơ</p>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- End of Success And Fail/Error Alert -->
                                        <form class="form-horizontal" method="post" action="#">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Họ và tên</label>
                                                <div class="col-sm-10">
                                                    <input name="name" type="name" class="form-control" id="inputName" placeholder="Name" value="{{ auth()->user()->username }}">
                                                </div>
                                            </div>
        
                                            <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label" >Tên tài khoản</label>
                                                    <div class="col-sm-10">
                                                        <input name="username" type="username" class="form-control" id="inputName" readonly placeholder="Username" value="{{ auth()->user()->username }}">
                                                    </div>
                                                </div>
        
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>
        
                                           
        
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button name="submit" type="submit" class="btn btn-primary">Thay đổi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
        
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
                                        <form class="form-horizontal" method="post" action="#">
                                            @csrf
                                            {{ method_field('POST') }}
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu hiện tại</label>
                                                <div class="col-sm-10">
                                                    <input name="current_password" type="password" class="form-control" id="inputName" placeholder="">
                                                    @if($errors->has('current_password'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('current_password')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                                    <div class="col-sm-10">
                                                        <input name="new_password" type="password" class="form-control" id="inputName" placeholder="">
                                                        @if($errors->has('new_password'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('new_password')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
        
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới</label>
                                                <div class="col-sm-10">
                                                    <input name="confirm_new_password" type="password" class="form-control" id="inputEmail" placeholder="">
                                                    @if($errors->has('confirm_new_password'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('confirm_new_password')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button name="submit" type="submit" class="btn btn-danger">Xác nhận</button>
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
                </div>
        
        </div>
        <!--===== MAIN JS =====-->
        <script src="{{ asset('js/main.js') }}"></script>
      </body>
</html>