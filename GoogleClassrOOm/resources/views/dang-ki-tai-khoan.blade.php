<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    <!-- Tab icon -->
    <link rel="icon" href="./svgs/board.svg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/reset.css" />
  </head>

  <body>
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
      <h1 class="fs-2">Sign Up</h1>
      <div class="board">
        <img src="svgs/board.svg" alt="Board" />
      </div>
      <p class="fs-2">Please fill your information</p>

      <form action="{{route('dang-ki')}}" method="post">
          @csrf
        <div class="mb-3">
          <input name = "Username"
            type="text"
            class="form-control py-3"
            placeholder="Username"
          />
        </div>
        <div class="mb-3">
          <input name = "password"
            type="password"
            class="form-control py-3"
            placeholder="Password"
          />
        </div>
        <div class="mb-3">
          <input name="Fullname" class="form-control py-3" placeholder="Full name" />
        </div>
        <div class="mb-3">
          <input name="email" type="email" class="form-control py-3" placeholder="Email" />
        </div>
        <div class="mb-3">
          <input name="Phone" class="form-control py-3" placeholder="Phone (8 numbers)" />
        </div>
        <div class="flex-center my-4">
          <span class="me-2">Birthday</span>
          <input name="date" type="date" />
        </div>
        <button type="submit" class="w-100 btn py-3 btn-primary">
          Sign Up
        </button>
      </form>
    </div>
  </body>
</html>
