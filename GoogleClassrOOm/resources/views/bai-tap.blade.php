<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Classwork</title>

    <!-- Tab icon -->
    <link rel="icon" href="{{ asset('svgs/board.svg') }}" />"

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
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
  </head>
  <body>
    <!-- Header -->
    <header
      class="
        fixed-top
        header
        shadow
        d-flex
        align-content-center
        gap-5
        px-4
        py-3
        bg-white
      "
    >
      <a href="#" class="logo mr-3">
        <img src="{{ asset('svgs/logo.svg') }}" alt="Logo" />
      </a>

      <nav class="d-flex align-items-center gap-3">
        <a class="d-flex align-items-center text-secondary" href="#">Bảng tin</a>
        <a class="d-flex align-items-center text-secondary" href="#"
          >Bài Tập</a
        >
        <a class="d-flex align-items-center text-secondary" href="#">Mọi người</a>
      </nav>

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
            >Quản lý tài khoản</a
          >
          <div class="popup__logout mt-auto cursor-pointer"><a class="btn btn-primary" href="{{ route('dang-xuat') }}">Log Out
          </a></div>

          <div class="popup__pseudo"></div>
        </div>
      </div>
    </header>

    <main class="container">
      <!-- Options -->
      <section
        class="
          d-flex
          justify-content-between
          align-items-center
          mb-5
          space-header
        "
      >
        <div class="d-flex align-items-center cursor-pointer">
          <div class="square me-2">
            <img src="{{ asset('svgs/profile.svg') }}" />
          </div>
          <span class="fs-6 text-primary">Bài tập của bạn</span>
        </div>
        <div class="d-flex align-items-center cursor-pointer ms-auto me-4">
          <div class="square me-2">
            <img src="{{ asset('svgs/gg-drive.svg') }}" />
          </div>
          <span class="fs-6 text-primary">Google Drive</span>
        </div>
   
      </section>

      <!-- Storage -->
      <section class="border py-4 px-3 bg-white mb-5">
        <div
          class="
            d-flex
            align-items-center
            justify-content-between
            border-bottom
            pb-3
            mb-4
          "
        >
          <h2 class="text-success">Bài Tập</h2>
          <div class="square cursor-pointer">
            <img src="{{ asset('svgs/menu.svg') }}" alt="Menu" />
          </div>
        </div>
        @foreach($baitap as $value)
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="square me-3">
              <img src="{{ asset('svgs/homework.svg') }}" alt="Homework" />
            </div>
            <span class="fs-5">{{$value->tieude}}</span>
          </div>

          <time class="text-black-50"> {{$value->thoigian}} </time>
        </div>
        @endforeach
      </section>

     
    </main>
  </body>
</html>
