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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
</head>

<body>
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
        <div class="board">
            <img src="{{ asset('svgs/logo.svg') }}" alt="Board" />
        </div>
        <h1 class="fs-2 mb-3">Thay đổi thông tin tài khoản</h1>

        <form action="{{ route('xl-cap-nhat-tai-khoan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input class="form-control py-3" name="username" value="{{ auth()->user()->username }}"
                    placeholder="Username" readonly />
            </div>
            <div class="mb-3">
                <input type="password" class="form-control py-3" placeholder="Password" name="password" />
            </div>
            <div class="mb-3">
                <input name="" type="password" class="form-control py-3" placeholder="Confirm Password" />
            </div>
            <div class="mb-3">
                <input class="form-control py-3" name="hoten" value="{{ auth()->user()->hoten }}"
                    placeholder="Full Name" />
            </div>
            <div class="mb-3">
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control py-3"
                    placeholder="Email" />
            </div>
            <div class="mb-3">
                <input name="sdt" value="{{ auth()->user()->sdt }}" type="number" class="form-control py-3"
                    placeholder="Phone Number" />
            </div>
            <div class="mb-3">
                <input name="image" type="file" class="form-control py-3" placeholder="Chọn ảnh" accept="image/*"
                    onchange="loadFile(event)" />

            </div>
            <p><img id="output" width="200" /></p>
            <button type="submit" class="w-100 py-3 btn btn-primary">
                Xác nhận
            </button>
        </form>
    </div>
</body>

</html>
