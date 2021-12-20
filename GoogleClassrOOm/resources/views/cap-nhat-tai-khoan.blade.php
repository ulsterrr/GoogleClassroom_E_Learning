<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Account</title>

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
  </head>

  <body>
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
      <div class="board">
        <img src="svgs/board.svg" alt="Board" />
      </div>
      <h1 class="fs-2 mb-3">Edit your account</h1>

      <form>
        <div class="mb-3">
          <input class="form-control py-3" placeholder="Username" />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
            placeholder="Password"
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
            placeholder="Confirm Password"
          />
        </div>
        <div class="mb-3">
          <input class="form-control py-3" placeholder="Full Name" />
        </div>
        <div class="mb-3">
          <input type="email" class="form-control py-3" placeholder="Email" />
        </div>
        <div class="mb-3">
          <input
            type="number"
            class="form-control py-3"
            placeholder="Phone Number"
          />
        </div>
        <button type="submit" class="w-100 py-3 btn btn-primary">
          Confirm
        </button>
      </form>
    </div>
  </body>
</html>
