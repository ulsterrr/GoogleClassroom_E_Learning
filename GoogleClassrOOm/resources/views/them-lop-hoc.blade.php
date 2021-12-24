<!DOCTYPE html>
<html lang="vn">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Class</title>

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
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href= "{{ asset('css/common.css ') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
   

    <!-- Scripts -->
    <script src="js/bootstrap.min.js" defer></script>
    <script src="js/main.js" defer></script>
    <style>
.labl {
    display : block;
    width: 300px;
    height:130px;
}
.labl > input{ /* HIDE RADIO */
    visibility: hidden; /* Makes input not-clickable */
    position: absolute; /* Remove input from document flow */
}
.labl > input + div{ /* DIV STYLES */
    cursor:pointer;
    border:2px solid transparent;
}
.labl > input:checked + div{ /* (RADIO CHECKED) DIV STYLES */
    border: 1px solid #ff6600;
}
      </style>
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

      <div class="d-flex gap-3">
        <span class="flex-center text-nowrap d-none d-md-flex"
          >Welcome Teacher</span
        >
        <button class="btn btn-dark py-2">Log Out</button>
      </div>
    </header>

    <form class="add-class" action="{{route('themlop')}}" method="post">
      @csrf
      <div class="mx-3 my-3">
        <div class="mb-3">
          <input name="classname" class="form-control py-3" placeholder="Class Name" />
        </div>
        <div class="mb-3">
          <input name="subject" class="form-control py-3" placeholder="Subject" />
        </div>
        <div>
          <p>Choose background</p>
          <div class="backgrounds">
            <div class="background h-100 cursor-pointer">
            <label class="labl">
            <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15344962/media/6564bb2cf0975c926b603b7133486307.jpg?compress=1&resize=1600x1200"/>
              <img 
                class="img-cover rounded"
                src="https://cdn.dribbble.com/users/1338391/screenshots/15344962/media/6564bb2cf0975c926b603b7133486307.jpg?compress=1&resize=1600x1200"
                alt="Background"
              />
            </label>
            </div>
            <div class="background h-100 cursor-pointer ">
            <label class="labl">
            <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15322399/media/4290a3ccff443d96fe1c8d990211254e.jpg?compress=1&resize=1600x1200" />
              <img 
                class="img-cover rounded"
                src="https://cdn.dribbble.com/users/1338391/screenshots/15322399/media/4290a3ccff443d96fe1c8d990211254e.jpg?compress=1&resize=1600x1200"
                alt="Background"
              />
              </label>
            </div>
            
            <div class="background h-100 cursor-pointer ">
            <label class="labl">
            <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200" />
              <img 
                class="img-cover rounded"
                src="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200"
                alt="Background"
              />
              </label>
            </div>
            <div class="background h-100 cursor-pointer " >
            <label class="labl">
              <input type="radio" name="radioname" value="https://cdn.dribbble.com/users/1338391/screenshots/15318231/media/4c725fe4efbaa9d498f39f13600e396a.jpg?compress=1&resize=1600x1200" />
              <img 
                class="img-cover rounded"
                src="https://cdn.dribbble.com/users/1338391/screenshots/15318231/media/4c725fe4efbaa9d498f39f13600e396a.jpg?compress=1&resize=1600x1200"
                alt="Background"
              />
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary btn-modal"
          data-bs-dismiss="modal"
        >
          Cancel
        </button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
          Add
        </button>
      </div>
    </form>
  </body>
</html>
