<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher</title>

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
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
  </head>

  <body>
    <!-- Header -->
    <header
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
      <a href="#" class="logo me-3">
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
            src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
            alt="Avatar"
          />
          <p class="popup__email">youremail@gmail.com</p>
          <a class="popup__link" href="#" target="_blank"
            >Manage your account</a
          >
          <div class="popup__logout mt-auto cursor-pointer">Log Out</div>

          <div class="popup__pseudo"></div>
        </div>
      </div>

      <div class="d-flex gap-3">
        <span class="flex-center text-nowrap d-none d-md-flex"
          >Xin chào {{ auth()->user()->hoten }}</span
        >
    
        <a class="btn btn-dark py-2" href="{{ route('dang-xuat') }}">Log Out
        </a>
      </div>
    </header>

    <section class="px-4 space-header mb-4">
      <button
        type="button"
        class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modal-teacher"
      >
      <a style="color:white;text-decoration:none " href="{{ route('ThemLop') }}">Add new class</a>
        
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
          

            <form class="">
              <div class="mx-3 my-3">
                <div class="mb-3">
                  <input class="form-control py-3" placeholder="Class Name" />
                </div>
                <div class="mb-3">
                  <input class="form-control py-3" placeholder="Subject" />
                </div>
                <div class="mb-3">
                  <input class="form-control py-3" placeholder="Room" />
                </div>
                <div>
                  <p>Choose background</p>
                  <div class="backgrounds">
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15344962/media/6564bb2cf0975c926b603b7133486307.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15322399/media/4290a3ccff443d96fe1c8d990211254e.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15318231/media/4c725fe4efbaa9d498f39f13600e396a.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary btn-modal"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-dismiss="modal"
                >
                  Add
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Class cards -->
    <section>
      <div class="container">
        <div class="row">
          @foreach ($dsLop as $lopHoc)

          <div class="col-md-4 col-lg-3 mb-5">
            <div class="d-flex flex-column h-100">
              <img
                src="{{ $lopHoc->hinh }}"
                class="img-cover h-50"
                alt="Card background"
              />
              <div class="class-card__body my-2">
                <div
                  class="d-flex align-items-center justify-content-between mb-2"
                >
                  <h5 class="class-card__classname">{{ $lopHoc->tenlop }}</h5>
                  <a href="{{route('XoaLop',['id'=>$lopHoc->id])}}"><div class="btn btn-dark fs-6">&#x2716;</div></a>
                </div>

                <div
                  class="d-flex align-items-center justify-content-between mb-2"
                >
                  <span class="class-card__role fs-5">Teacher</span>
                  <div class="btn btn-dark"><a style="color:white;text-decoration:none " href="{{ route('SuaLop',['id'=>$lopHoc->id]) }}">Edit</a></div>
                </div>

                <p class="class-card__subjects truncate">
                  {{ $lopHoc->chude }}
                </p>

                <div class="class-card_code">
                  <span>Code: </span><span>{{ $lopHoc->code }}</span>
                </div>
              </div>
              <button class="btn btn-primary mt-auto py-2">Go to Class</button>
            </div>
          </div>              
          @endforeach
        </div>
      </div>
    </section>
  </body>
</html>
