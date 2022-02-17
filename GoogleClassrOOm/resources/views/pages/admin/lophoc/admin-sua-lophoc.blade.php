@extends('layouts.dashHead')
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

                        <a href="{{ route('AdminInfo') }}" class="nav__link ">
                            <i class='bx bxs-chip nav__icon' ></i>
                                <span class="nav__name">Hồ sơ QTV</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Người dùng</span>
                        </a>
                        
                        <a href="#" class="nav__link active">
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
                    <h1>Lớp Học</h1>
                    </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tùy chỉnh lớp</h3>
                </div>

                <div class="card-body">
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                <form role="form" action="{{ route('add-sua-lop',['id'=>$lophoc->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Tên Lớp Học</label>
                        <div class="col-sm-10">
                          <input value="{{ $lophoc->tenlop }}" name="tenlop" type="name" class="form-control" id="input1" placeholder="Tên Lớp Học">
                            @if($errors->has('nama_mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_mapel')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Chủ đề</label>
                        <div class="col-sm-10">
                          <input value="{{ $lophoc->chude }}" name="chude" type="text" class="form-control" id="input2" placeholder="Chủ đề">
                            @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-block bg-gradient-primary">Xác nhận</button>
                </form>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <div class="d-none" id="card-refresh-content">
                1234
            </div>
        </div>
        <!-- /.col -->
    </section>
</div>
    <!-- /.content -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
