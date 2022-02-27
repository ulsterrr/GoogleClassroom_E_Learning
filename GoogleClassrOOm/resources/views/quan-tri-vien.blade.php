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
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <script>
        $(document).ready(function() {
            var ctx = $("#chart-line");
            var ct = $("#chart-lin");
            var myLineChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Admin", "Giảng viên", "Học viên"],
                    datasets: [{
                        data: [{{ $ad }}, {{ $gv }}, {{ $hs }}],
                        backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)",
                            "rgba(200, 50, 255, 0.5)"
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Tổng số tài khoản: {{ $tk }}'
                    }
                }
            });
            var myLineChar = new Chart(ct, {
                type: 'pie',
                data: {
                    labels: ["Đang hoạt động", "Không hoạt động", "Tạm khóa"],
                    datasets: [{
                        data: [{{ $hd }}, {{ $khd }}, {{ $k }}],
                        backgroundColor: ["rgba(0, 254, 0 , 1)", "rgba(255, 157, 0, 1)",
                            "rgba(209, 198, 181, 1)"
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Trạng thái tài khoản'
                    }
                }
            });
        });
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
        <h1>Trang chủ Admin</h1>
        <div class="container-fluid">
        <div class="row">

            <div class="col-sm-8 col-md-6">
                <div class="">
                    <div class="card">
                        <div class="card-header">Thống kê tài khoản</div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor"
                                style="display: block; width: 299px; height: 200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-8 col-md-6">
                <div class="">
                    <div class="card">
                        <div class="card-header">Trạng thái tài khoản</div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-lin" width="299" height="200" class="chartjs-render-monitor"
                                style="display: block; width: 299px; height: 200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--===== MAIN JS =====-->
        <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
