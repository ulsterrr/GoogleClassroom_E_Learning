<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Tab icon -->
    <link rel="icon" href="{{ asset('svgs/board.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{asset('css/components.css')}}" />

  </head>

  <body>
    <!-- Header -->
    <header class="header fixed-top shadow d-flex px-4 py-3 bg-white">
      <a href="#" class="logo mr-3">
        <img src="{{ asset('svgs/logo.svg') }}" alt="Logo" />
      </a>

      <div class="popup ms-auto">
        <div class="avatar me-3 cursor-pointer">
          <img
            src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
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
            >Manage your account</a
          >
          <div class="popup__logout mt-auto cursor-pointer"><a class="btn btn-primary" href="{{ route('dang-xuat') }}">Log Out
          </a></div>

          <div class="popup__pseudo"></div>
        </div>
      </div>
    </header>

    <section class="dashboard container">
      <div class="dashboard__header">
        <img
        src="{{ asset('images/'.auth()->user()->hinhdaidien) }}"
          alt="Avatar"
          class="dashboard__avatar"
        />
        <h1 class="dashboard__username">{{ auth()->user()->hoten }} - (ID: {{ auth()->user()->id }})</h1>
      </div>

      <div class="dashboard__info">
        <h3 class="dashboard__info-title">Thông tin tài khoản</h3>
        <ul class="dashboard__info-items">
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Tài khoản</span>
            <span>{{ auth()->user()->username }}</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Mật khẩu</span>
            <span>**********</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Họ tên</span>
            <span>{{ auth()->user()->hoten }}</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Email</span>
            <span>{{ auth()->user()->email }}</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Số điện thoại</span>
            <span>{{ auth()->user()->sdt }}</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Loại tài khoản</span>
            <span>{{ auth()->user()->loaiTaiKhoan->tenloaitk }}</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Hoạt động</span>
            <span>Đang hoạt động</span>
          </li>
        </ul>
        <a
          class="dashboard__submit btn btn-primary text-white"
          href="{{ route('cap-nhat-tai-khoan') }}"
          target="_blank"
          >Edit</a
        >
      </div>
    </section>
  </body>
</html>
