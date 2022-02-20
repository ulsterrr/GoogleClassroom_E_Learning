<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>

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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
  </head>

  <body>
    <!-- <form action="{{ route('dang-nhap') }}" method="POST"> -->
    
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
      <div class="board">
        <img src="{{ asset('svgs/board.svg') }}" alt="Board" />
      </div>
      <h1 class="fs-2 mb-3">Quên Mật Khẩu</h1>
      
      <form action="{{route('quenMatKhau')}}" method="post">
      @csrf
        <div class="mb-3">
          <input
            class="form-control py-3"
            placeholder="Tài Khoản"
            name="tai_khoan"
          />
        </div>
        <!-- <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
            placeholder="Email"
            name="email"
          />
        </div> -->
        <div class="mb-3">
            <input
              type="text"
              class="form-control py-3"
              placeholder="SĐT hoặc Email"
              name="Phone"
            />
          </div>
          <div class="mb-3">
            <input
              type="password"
              class="form-control py-3"
              placeholder="Mật khẩu mới"
              name="newpass"
            />
          </div>
        <!-- <div class="mb-3">
          <input
            type="password"
            class="form-control py-3"
            placeholder="Confirm Password"
            name="check-newpass"
          />
        </div> -->
        
        <button type="submit" class="w-100 py-3 btn btn-primary mb-3">      
         Xác nhận
        </button>
        
       
      </form>
    </div>
</form>
  </body>
</html>
