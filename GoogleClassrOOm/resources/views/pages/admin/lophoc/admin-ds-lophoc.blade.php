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
        <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    	<link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    	<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    	<link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    	<link rel="stylesheet" href="{{ asset('css/components.css') }}" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      .labl {
        display : block;
        width: 210px;
        height:115px;
      }
      .labl > input{ /* HIDE RADIO */
      visibility: hidden; /* Makes input not-clickable */
      position: absolute; /* Remove input from document flow */
      }
      .labl > input + div{ /* DIV STYLES */
      cursor:pointer;
      border:2px solid transparent;
      }
      .labl > input:checked + div{ /* (RADIO CHECKED) DIV STYLES */
      border: 1px solid #ff6600;
      }
    </style>
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
          <section class="px-4 p mb-4">
            <button
              type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#modal-teacher"
            >
            Thêm lớp
              
            </button>
      
            <div
              class="modal fade"
              id="modal-teacher"
              tabindex="-1"
              style="display: none"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header center">
                    <h4 class="center" style="justify-content: center;text-align: center;">Thêm lớp học</h4>
                  </div>
      
              <form class="add-class center" action="{{route('add-tao-lop')}}" method="post">
                @csrf
                
                <div class="mx-3 my-3">
                
                  <div class="mb-3">
                    <input name="classname" class="form-control py-3" placeholder="Tên lớp" />
                  </div>
                  <div class="mb-3">
                    <input name="subject" class="form-control py-3" placeholder="Chủ đề" />
                  </div>
                  <div>
                    <p>Chọn ảnh nền</p>
                    <div class="backgrounds">
                      <div class="background h-100 cursor-pointer">
                      <label class="labl">
                      <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15344962/media/6564bb2cf0975c926b603b7133486307.jpg?compress=1&resize=1600x1200"/>
                        <img 
                          class="img-cover rounded"
                          src="https://cdn.dribbble.com/users/1338391/screenshots/15344962/media/6564bb2cf0975c926b603b7133486307.jpg?compress=1&resize=1600x1200"
                          alt="Background"
                        />
                      </label>
                      </div>
                      <div class="background h-100 cursor-pointer ">
                      <label class="labl">
                      <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15322399/media/4290a3ccff443d96fe1c8d990211254e.jpg?compress=1&resize=1600x1200" />
                        <img 
                          class="img-cover rounded"
                          src="https://cdn.dribbble.com/users/1338391/screenshots/15322399/media/4290a3ccff443d96fe1c8d990211254e.jpg?compress=1&resize=1600x1200"
                          alt="Background"
                        />
                        </label>
                      </div>
                      
                      <div class="background h-100 cursor-pointer ">
                      <label class="labl">
                      <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200" />
                        <img 
                          class="img-cover rounded"
                          src="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200"
                          alt="Background"
                        />
                        </label>
                      </div>
                      <div class="background h-100 cursor-pointer " >
                      <label class="labl">
                        <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15318231/media/4c725fe4efbaa9d498f39f13600e396a.jpg?compress=1&resize=1600x1200" />
                        <img 
                          class="img-cover rounded"
                          src="https://cdn.dribbble.com/users/1338391/screenshots/15318231/media/4c725fe4efbaa9d498f39f13600e396a.jpg?compress=1&resize=1600x1200"
                          alt="Background"
                        />
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
      
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                    Thêm
                  </button>
                </div>
              </form>
                </div>
              </div>
            </div>
          </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách Lớp</h1>
                    </div>
                <div class="col-sm-6">               
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách lớp</h3>
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
                <div class="card-body" style="height: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Tên Lớp</th>
                        <th>Chủ đề</th>
                        <th>Tùy chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($lophoc as $k )
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
              </div>
            </div>
          </div>
  </section>
        </div>
<!--===== MAIN JS =====-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
