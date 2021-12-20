<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student</title>

    <!-- Tab icon -->
    <link rel="icon" href="./svgs/board.svg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />

    <<!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

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
        <img src="svgs/logo.svg" alt="Logo" />
      </a>

      <div class="d-flex gap-3">
        <span class="flex-center text-nowrap d-none d-md-flex"
          >Welcome student</span
        >
        <input class="form-control py-2" placeholder="Search for class" />
        <button class="btn btn-primary py-2">Search</button>
        <button class="btn btn-dark py-2">Log Out</button>
      </div>
    </header>

    <section class="px-4 space-header mb-4">
      <button
        type="button"
        class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modal-student"
      >
        Find class
      </button>

      <div
        class="modal fade"
        id="modal-student"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Class Code</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <form class="">
              <div class="mx-3 my-3">
                <input class="form-control py-3" placeholder="Class code" />
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary py-2"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button
                  type="button"
                  class="btn btn-primary py-2"
                  data-bs-dismiss="modal"
                >
                  Find
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
