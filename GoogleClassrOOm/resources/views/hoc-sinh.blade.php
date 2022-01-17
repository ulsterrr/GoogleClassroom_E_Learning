<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Học Sinh</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
    <style>
      .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
      }
      
      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }
      
      .closebtn:hover {
        color: black;
      }
      </style>

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
            >Quản lý Tài Khoản</a
          >
          <div class="popup__logout mt-auto cursor-pointer"><a class="btn btn-primary" href="{{ route('dang-xuat') }}">Đăng xuất
          </a></div>

          <div class="popup__pseudo"></div>
        </div>
      </div>
    </header>
    <style>
      .p {
        margin-top: 85px;
      }
      </style>
    <section class="px-4 p mb-4">
      <button
        type="button"
        class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modal-student"
      >
      <i class="fa fa-plus" ></i>
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
              <h5 class="modal-title">Nhập mã lớp</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <form class="" action="{{Route('GiaNhapLop')}}" method="post">
              @csrf
              <div class="mx-3 my-3">
                <input name="classcode" class="form-control py-3" placeholder="Mã lớp..." />
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary py-2"
                  data-bs-dismiss="modal"
                >
                  Hủy
                </button>
                <button
                  type="submit"
                  class="btn btn-primary py-2"
                  data-bs-dismiss="modal"
                >
                  Gia Nhập
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <h6 style="color:Tomato;">
      <?php
      $message = Session::get('message');
      $none = "'none';";
      if($message){
        echo '<div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='.$none.'">&times;</span>
              <strong></strong>'.$message.'</div>';
        Session::put('message',null);
      }
      ?>
    </h6>
    <section>
      <div class="container">
        <div class="row">
          @foreach ($class->coLopHoc as $lopHoc)

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
                </div>

                <div
                  class="d-flex align-items-center justify-content-between mb-2"
                >
                  <span class="class-card__role fs-5">{{$lopHoc->TaiKhoan->hoten}}</span> 
                  <div>
                  <section>
 

    </section>
                  </div>
                </div>

                <p class="class-card__subjects truncate">
                  {{ $lopHoc->chude }}
                </p>

                <div class="class-card_code">
                  <span>Code: </span><span>{{ $lopHoc->code }}</span>
                </div>
              </div>
              <a href="{{ route('LopHoc',['id'=>$lopHoc->id]) }}" class="btn btn-primary mt-auto py-2">Go to Class</a>
            </div>
          </div>              
          @endforeach
        </div>
      </div> 
    </section>
  </body>
</html>
