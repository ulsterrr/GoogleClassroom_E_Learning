<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>

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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet">
    <link href="{{ asset('css/icons/icomoon/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


  </head>

  <body>
    <form action="{{ route('xuly-dangnhap') }}" method="POST">
    @csrf
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
      <div class="board">
        <img src="svgs/board.svg" alt="Board" />
      </div>
      <h1 class="fs-2 mb-3">Sign In</h1>

      <form>
        <div class="mb-3">
          <input
            type=""
            class="form-control py-3"
            name="ten_tai_khoan"
            placeholder="Username"
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
            name="mat_khau"
            placeholder="Password"
          />
        </div>
        <div class="d-flex form-check mb-3">
          <input
            class="form-check-input me-2"
            type="checkbox"
            value=""
            id="flexCheckDefault"
          />
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button type="submit" class="w-100 py-3 btn btn-primary">
          Sign In
        </button>
        <div class="my-2">OR</div>
        <a href="{{ route('quen-mat-khau') }}" class="d-block mb-3 text-primary">Forgot password?</a>
        <button class="w-100 py-3 btn btn-dark">Sign Up</button>
      </form>
    </div>
    </form>
  </body>
</html>
