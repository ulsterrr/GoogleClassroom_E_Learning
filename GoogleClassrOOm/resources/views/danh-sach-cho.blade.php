<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>People</title>

    <!-- Tab icon -->
    <link rel="icon" href="asset('./svgs/board.svg')" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <!-- Script -->
    <script>
    var deleteLinks = document.querySelectorAll(".delete");

    for (var i = 0; i <script deleteLinks.length; i++) {
    deleteLinks[i].addEventListener("click", function (event) {
    event.preventDefault();

    var choice = confirm(this.getAttribute("data-confirm"));

    if (choice) {
      window.location.href = this.getAttribute("href");
    }
    });
    }
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href=   "{{ asset('css/bootstrap.min.css') }}"  />
    <link rel="stylesheet" href=  "{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href=   "{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}"  />
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
        <img src="{{asset('svgs/logo.svg')}}" alt="Logo" />
      </a>

      <nav class="d-flex align-items-center gap-3">
        <a class="d-flex align-items-center text-secondary" href="#">Stream</a>
        <a class="d-flex align-items-center text-secondary" href="#"
          >Classwork</a
        >
        <a class="d-flex align-items-center text-secondary" href="#">People</a>
      </nav>

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
          <a class="popup__link" href="edit.html" target="_blank"
            >Manage your account</a
          >
          <div class="popup__logout mt-auto cursor-pointer">Log Out</div>

          <div class="popup__pseudo"></div>
        </div>
      </div>
    </header>
    <!-- Teacher -->

    
    <section class="container border py-4 bg-white space-header">
      <div>
        <h2 class="text-success border-bottom pb-3 mb-4">Giáo viên</h2>

        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="{{ asset('images/'.$lophoc->TaiKhoan->hinhdaidien) }}"
                alt="Avatar"
              />
            </div>
            <span class="fs-5">{{$lophoc->TaiKhoan->hoten}}</span>
          </div>
        </div>
      </div>
    </section>
    <section class="container border py-4 bg-white " style = "padding-top:15px;">
 
      <div>
        <h2 class="text-success border-bottom pb-3 mb-4">Học viên</h2>
        @foreach($dsHocvien as $hocvien)
          @if($hocvien->trangthai==1)
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
          

            <div class="avatar me-3">
              <img
                src="{{ asset('images/'.$hocvien->TaiKhoan->hinhdaidien) }}"
                alt="Avatar"
              />
            </div>
            <span class="fs-5">{{$hocvien->TaiKhoan->hoten}}</span>
         
          </div>
     
        </div>
      <br>
        @endif
        @endforeach
      </div>

    </section>
    @if(Session::has("success"))
									<div class="alert alert-success alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('success')}}</div>
								@elseif(Session::has("failed"))
									<div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                  @elseif(Session::has("error"))
									<div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('error')}}</div>
								@endif
    <!-- Requests -->
    <section class="container mt-4 border py-4 bg-white" style = "padding-top: 15px;">
      <div>
        <h2 class="text-success border-bottom pb-3 mb-4">Danh sách chờ</h2>
      </div>

      <form class="d-flex gap-2 mb-4 border-bottom pb-3" action="{{route('AddMail',['id'=>$lophoc->id])}}" method="post">
        @csrf
        <div class="flex-grow-1">
          <input
            type="email"
            class="form-control py-2"
            placeholder="Add Student by Email"
            name="addmail"
          />
        </div>
        <button type="submit" class="btn btn-primary">Find</button>
      </form>

      <ul class="d-flex flex-column gap-4">
      @foreach($dsHocvien as $hocvien)
          @if($hocvien->trangthai==0)
        <li class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <img
                src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                alt="Avatar"
              />
            </div>
            <span class="fs-5">{{$hocvien->TaiKhoan->hoten}}</span>
          </div>
          <div>
            <a href="{{route('confirmstudent',['idtaikhoan'=>$hocvien->taikhoanid,'idlop'=>$hocvien->lophocid])}}"><div class="d-inline-flex btn btn-primary me-2">Accept Request</div></a>
      
            <a href="{{route('deletestudent',['idtaikhoan'=>$hocvien->taikhoanid,'idlop'=>$hocvien->lophocid])}}"><div class="d-inline-flex btn btn-primary">Decline Request</div></a>
          </div>
        </li>
        @endif
        @endforeach
      </ul>
    </section>
  </body>
</html>
