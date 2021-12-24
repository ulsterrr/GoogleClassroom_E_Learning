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
        <img src="svgs/logo.svg" alt="Logo" />
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
            src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
            alt="Avatar"
          />
          <p class="popup__email">youremail@gmail.com</p>
          <a class="popup__link" href="edit.html" target="_blank"
            >Manage your account</a
          >
          <div class="popup__logout mt-auto cursor-pointer">Log Out</div>

          <div class="popup__pseudo"></div>
        </div>
      </div>
    </header>

    <section class="dashboard container">
      <div class="dashboard__header">
        <img
          src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
          alt="Avatar"
          class="dashboard__avatar"
        />
        <h1 class="dashboard__username">Your name - (ID: 12345)</h1>
      </div>

      <div class="dashboard__info">
        <h3 class="dashboard__info-title">Thông tin tài khoản</h3>
        <ul class="dashboard__info-items">
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Tài khoản</span>
            <span>12345</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Mật khẩu</span>
            <span>12345</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Họ tên</span>
            <span>12345</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Email</span>
            <span>12345</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Số điện thoại</span>
            <span>12345</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Ảnh đại diện</span>
            <img
              src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
              alt="Avatar"
              class="avatar"
            />
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Mã loại tài khoản</span>
            <span>12345</span>
          </li>
          <li class="dashboard__info-item">
            <span class="dashboard__info-item-left">Hoạt động</span>
            <span>12345</span>
          </li>
        </ul>
        <a
          class="dashboard__submit btn btn-primary text-white"
          href="edit.html"
          target="_blank"
          >Edit</a
        >
      </div>
    </section>
  </body>
</html>
