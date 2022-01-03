<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>People</title>

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
  

    <link href="{{ asset('css/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
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
        <a class="d-flex align-items-center text-secondary" href="#">Stream</a>
        <a class="d-flex align-items-center text-secondary" href="#"
          >Classwork</a
        >
        <a class="d-flex align-items-center text-secondary" href="{{Route('dsSinhVien')}}">People</a>
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
            src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
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

    <!-- Teacher -->
    <section class="container border py-4 bg-white space-header">
      <div>
        <h2 class="text-success border-bottom pb-3 mb-4">Teacher</h2>

        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                alt="Avatar"
              />
            </div>
            <span class="fs-5">Teacher</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Requests -->
    <section class="container mt-4 border py-4 bg-white">
      <div>
        <h2 class="text-success border-bottom pb-3 mb-4">Request</h2>
      </div>

      <form class="d-flex gap-2 mb-4 border-bottom pb-3">
        <div class="flex-grow-1">
          <input
            type="email"
            class="form-control py-2"
            placeholder="Add Student by Email"
          />
        </div>
        <button type="submit" class="btn btn-primary">Find</button>
      </form>

      <ul class="d-flex flex-column gap-4">
        <li class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                alt="Avatar"
              />
            </div>
            <span class="fs-5">Student 1</span>
          </div>

          <div>
            <div class="d-inline-flex btn btn-primary me-2">Accept Request</div>
            <div class="d-inline-flex btn btn-primary">Decline Request</div>
          </div>
        </li>
        <li class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                alt="Avatar"
              />
            </div>
            <span class="fs-5">Student 1</span>
          </div>

          <div>
            <div class="d-inline-flex btn btn-primary me-2">Accept Request</div>
            <div class="d-inline-flex btn btn-primary">Decline Request</div>
          </div>
        </li>
      </ul>
    </section>
  </body>
</html>
