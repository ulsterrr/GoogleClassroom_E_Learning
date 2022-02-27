<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    <!-- Tab icon -->
    <link rel="icon" href="{{ asset('svgs/board.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
</head>

<body>
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
        <h1 class="fs-2">Đăng Kí</h1>
        <div class="board">
            <img src="svgs/board.svg" alt="Board" />
        </div>
        <p class="fs-2">Điền vào thông tin đăng kí của bạn</p>

        <form action="{{ route('dang-ki') }}" method="post">
            @csrf
            <div class="mb-3">
                <input name="Username" type="text" class="form-control py-3" placeholder="Tên tài khoản" />
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control py-3" placeholder="Mật khẩu" />
            </div>
            <div class="mb-3">
                <input name="Fullname" class="form-control py-3" placeholder="Họ và Tên" />
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control py-3" placeholder="Email" />
            </div>
            <div class="mb-3">
                <input name="Phone" class="form-control py-3" placeholder="Số điện thoại" />
            </div>
            <div class="flex-center my-4">
                <span class="me-2">Ngày sinh</span>
                <input id="datepicker" name="date" type="date" />
            </div>
            <button type="submit" class="w-100 btn py-3 btn-primary">
                Đăng kí
            </button>
        </form>
    </div>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>

</html>
