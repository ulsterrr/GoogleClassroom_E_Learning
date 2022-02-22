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
                    

                    <div class="nav__list ">
                        <a href="#" class="nav__link active">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="{{ route('AdminInfo') }}" class="nav__link">
                          <i class='bx bxs-chip nav__icon' ></i>
                              <span class="nav__name">Administrator</span>
                        </a>
                        
                        <!-- a -->
                        <a class="dropdown-btn" style="padding-bottom: 8px">
                          <i class='bx bx-layer nav__icon' ></i>
                          <span class="nav__name">Lớp học
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span>
                          <i class='bx bxs-down-arrow' ></i>
                        </a>

                        <div class="dropdown-container">
                          <a href="{{route('ad-ds-lop')}}" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Danh sách lớp
                            </span>
                          </a>
                          <a href="{{ route('ad-ds-lop') }}" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Tạo mới lớp học
                            </span>
                          </a>
                                                                    
                        </div> 
                        <!-- a -->
                        <a class="dropdown-btn" style="padding-bottom: 8px">
                          <i class='bx bx-buoy nav__icon' ></i>
                          <span class="nav__name">Quản lý
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span>
                          <i class='bx bxs-down-arrow' ></i>
                        </a>

                        <div class="dropdown-container">
                          <a href="{{ route('ad-ds-ad') }}" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Danh sách Admin
                            </span>
                          </a>
                          <a href="#" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Danh sách Giảng viên
                            </span>
                          </a>
                          <a href="#" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Danh sách Học viên
                            </span>
                          </a>                                             
                        </div>
                        <!-- a --> 
                        <a class="dropdown-btn" style="padding-bottom: 8px">
                          <i class='bx bxs-add-to-queue nav__icon'></i>
                          <span class="nav__name">Thêm mới&nbsp;&nbsp;&nbsp;&nbsp;</span>
                          <i class='bx bxs-down-arrow' ></i>
                        </a>

                        <div class="dropdown-container">
                          <a href="#" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Tạo mới Admin
                            </span>
                          </a>
                          <a href="#" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Tạo mới Giảng viên
                            </span>
                          </a>
                          <a href="#" class="nav_drop_link">
                            <span style="padding-left: 31px">
                              <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                              Tạo mới Học viên
                            </span>
                          </a>                                             
                        </div>                              
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
                    <h1>Danh sách lớp học</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tìm Lớp Học</h3>
                    <div class="card-tools">
                        <form action="{{ route('ad-tim-lop') }}" method="get">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm">

                                <div class="input-group-append">
                                    <button name="submit" type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: auto;">
                  <table class="table table-head-fixed">
                    <thead>
                      <tr>
                        <th>Tên lớp</th>
                        <th>Chủ đề lớp học</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($key as $k )
                        <tr>
                            <td>{{ $k->tenlop }}</td>
                            <td>{{ $k->chude }}</td>
                            <td>
                              <a type="button" class="btn btn-block bg-gradient-primary btn-xs" href="{{route('ad-sua-lop', ['id'=>$k->id])}}">Sửa</a>
                              <a type="button" class="btn btn-block bg-gradient-danger btn-xs" onclick="return confirm('Bạn có chắc xóa lớp {{ $k->tenlop }}?')"
                                 href="{{ route('ad-xoa-lop',['id'=>$k->id]) }}" class="delete" data-confirm="Bạn có chắc muốn xóa lớp này?">Xóa</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!--===== MAIN JS =====-->
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
