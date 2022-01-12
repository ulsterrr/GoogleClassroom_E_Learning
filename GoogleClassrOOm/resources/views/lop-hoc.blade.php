<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stream</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <a class="d-flex align-items-center text-secondary" href="{{Route('dsSinhVien',['id'=>$layInfoLop->id])}}">People</a>
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
      <!-- Banner -->
      <section
        class="
          d-flex
          flex-column
          gap-2
          space-header
          banner
          text-white
          bg-secondary
          px-3
          py-4
          rounded
        "
      >
        <h1 class="banner__class">{{ $layInfoLop->tenlop }}</h1>
        <div class="fs-4">
          <span>Teacher: </span
          ><span class="banner__teacher">{{$layInfoLop->TaiKhoan->hoten}}</span>
        </div>
        <div class="fs-4">
          <span>Subject: </span
          ><span class="banner__subject">{{ $layInfoLop->chude }}</span>
        </div>
        <div class="fs-4">
          <span>Room: </span><span class="banner__room">{{ $layInfoLop->code }}</span>
        </div>
      </section>

      <!-- Content -->
      <section class="container mt-5">
        <div class="row">
          <div class="col col-lg-3 d-none d-lg-block">
            <div class="border pt-4 px-4 pb-5">
              <div class="mb-4">Sắp đến hạn</div>
              <p class="mb-5">Tuyệt vời, không có bài tập nào sắp đến hạn!</p>
              <a href="#" class="d-block text-success text-end">Xem tất cả</a>
            </div>
          </div>

          <div class="col col-lg-9">
            <!-- Click to show input area -->
            <button
              class="
                d-flex
                align-items-center
                shadow
                rounded
                px-3
                py-4
                bg-success
                text-primary
                cursor-pointer
                w-100
                mb-4
              "
              data-bs-toggle="modal"
              data-bs-target="#modal-input"
            >
              <div class="avatar me-3">
                <img
                  src="{{ asset('images/'.auth()->user()->hinhdaidien) }}"
                  alt="Avatar"
                />
              </div>
              <span class="text-white">Thêm một nội dung vào lớp học của bạn</span>
            </button>
            <form action="{{route('themBaiDang',['id'=>$layInfoLop->id])}}" method="post" enctype="multipart/form-data">
              @csrf
            <div
              class="modal fade"
              id="modal-input"
              tabindex="-1"
              style="display: none"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header mb-3">
                    <div class="d-flex align-items-center">
                      <img
                        class="avatar me-3"
                        src="{{ asset('images/'.auth()->user()->hinhdaidien) }}"
                        alt="Avatar"
                      />
                      <div class="text-success">Viết nột dung của bạn</div>
                    </div>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>

                  <div class="px-3 mb-3">
                  <input type="text" placeholder="Tiêu đề" name="tieude">
                  <input type="text" placeholder="Chủ đề" name="chude">
                    <div class="form-floating" style="padding-top: 5px;" >
                      <textarea
                      name="noidung"
                        class="form-control"
                        placeholder="Leave a comment here"
                        id="floatingTextarea2"
                        style="height: 100px"
                      ></textarea>
                      <label for="floatingTextarea2" class="text-black-50"
                        >Nội dung</label
                      >
                    </div>
                  </div>
                  <h5 style="padding-left:10px;">Hạn nộp</h5>
                  <input type="datetime-local" name="deadline" style="margin:10px;">
                  <div class="modal-footer d-flex justify-content-between">
                    <div>
                      <label class="upload cursor-pointer" for="upload">
                        <img
                          class="img-cover"
                          src="{{ asset('svgs/upload.svg') }}"
                          alt="Upload"
                        />
                      </label>
                      <input name="file" id="upload" type="file" />
                    </div>
                    <div class="d-flex">
                      <button
                        type="button"
                        class="btn btn-secondary py-2 me-2"
                        data-bs-dismiss="modal"
                      >
                        Hủy
                      </button>
                      <button
                        type="submit"
                        class="btn btn-primary py-2"
                        data-bs-dismiss="modal"
                      >
                        Đăng
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>

          @foreach($baidang as $value)
            <ul style="padding-bottom:20px;">
              <li class="bg-white px-3 py-4 rounded shadow">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center mb-3">
                    <img
                      class="avatar me-3"
                      src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                      alt="Avatar"
                    />
                    <h3 class="fs-5">{{$layInfoLop->TaiKhoan->hoten}}</h3>
                  </div>
                  <div class="btn btn-dark text-white">&#x2716;</div>
                </div>

                <p class="border-bottom pb-3">{{$value->noidung}}</p>

                <div class="fw-bold text-decoration mb-4">
                  Nhận xét về lớp học:
                </div>

                <ul class="mt-2 border-bottom">
                  <li>
                    <div
                      class="
                        d-flex
                        align-items-center
                        justify-content-between
                        mb-3
                      "
                    >
                      <div class="d-flex align-items-center">
                        <img
                          class="avatar me-3"
                          src="https://avatars.dicebear.com/api/adventurer-neutral/12345.svg"
                          alt="Avatar"
                        />
                        <div>
                          <h3 class="fs-6">Student</h3>
                          <time class="text-black-50">10 th 11</time>
                        </div>
                      </div>
                      <div class="btn btn-dark text-white">&#x2716;</div>
                    </div>
                    <p>Hi there!</p>
                  </li>
                </ul>

                <form class="d-flex align-items-center mt-4">
                  <img
                    class="avatar me-3"
                    src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                    alt="Avatar"
                  />
                  <input
                    class="flex-grow-1 border me-2 p-2"
                    placeholder="Write your comment..."
                  />
                  <button type="submit" class="btn btn-primary">Send</button>
                </form>
              </li>
            </ul>

@endforeach
            <ul>
              <li class="bg-white px-3 py-4 rounded shadow">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center mb-3">
                    <img
                      class="avatar me-3"
                      src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                      alt="Avatar"
                    />
                    <h3 class="fs-5">Teacher</h3>
                  </div>
                  <div class="btn btn-dark text-white">&#x2716;</div>
                </div>

                <p class="border-bottom pb-3">Hi all my students!!</p>

                <div class="fw-bold text-decoration mb-4">
                  Nhận xét về lớp học:
                </div>

                <ul class="mt-2 border-bottom">
                  <li>
                    <div
                      class="
                        d-flex
                        align-items-center
                        justify-content-between
                        mb-3
                      "
                    >
                      <div class="d-flex align-items-center">
                        <img
                          class="avatar me-3"
                          src="https://avatars.dicebear.com/api/adventurer-neutral/12345.svg"
                          alt="Avatar"
                        />
                        <div>
                          <h3 class="fs-6">Student</h3>
                          <time class="text-black-50">10 th 11</time>
                        </div>
                      </div>
                      <div class="btn btn-dark text-white">&#x2716;</div>
                    </div>
                    <p>Hi there!</p>
                  </li>
                </ul>

                <form class="d-flex align-items-center mt-4">
                  <img
                    class="avatar me-3"
                    src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                    alt="Avatar"
                  />
                  <input
                    class="flex-grow-1 border me-2 p-2"
                    placeholder="Write your comment..."
                  />
                  <button type="submit" class="btn btn-primary">Send</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
