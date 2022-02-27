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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách Quản trị viên</h1>
                    </div>
                    <div class="col-sm-6">

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
                            <h3 class="card-title">Dữ liệu Quản trị viên</h3>
                            <div class="card-tools">
                                <form action="{{ route('ad-tim-ad') }}" method="get">
                                    @csrf
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Tìm kiếm">

                                        <div class="input-group-append">
                                            <button name="submit" type="submit" class="btn btn-default"><i
                                                    class="fas fa-search"></i></button>
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
                                        <th>Họ tên</th>
                                        <th>Tên tài khoản</th>
                                        <th>E-Mail</th>
                                        <th>Số điện thoại</th>
                                        <th>
                                            Giới tính
                                        </th>
                                        <th>Ngày sinh</th>
                                        <th>Loại Tài Khoản</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ad as $t)
                                        <tr>
                                            <td>{{ $t->hoten }}</td>
                                            <td>{{ $t->username }}</td>
                                            <td>{{ $t->email }}</td>
                                            <td>{{ $t->sdt }}</td>
                                            <td>
                                                <a class="float-center">
                                                    @if ($t->gioitinh == 0)
                                                        Nam
                                                    @elseif($t->gioitinh == 1)
                                                        Nữ
                                                    @else
                                                        Khác
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{{ $t->ngaysinh }}</td>
                                            <td>
                                                <a class="float-center">
                                                    @if ($t->maloaitk == 3)
                                                        Người quản trị
                                                    @elseif($t->maloaitk == 1)
                                                        Giảng viên
                                                    @else
                                                        Học viên
                                                    @endif
                                                </a>
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
