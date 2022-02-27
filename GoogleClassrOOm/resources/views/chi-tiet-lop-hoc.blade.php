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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
    <!-- Scripts -->

    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

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
      ">
        <a href="#" class="logo mr-3">
            <img src="{{ asset('svgs/logo.svg') }}" alt="Logo" />
        </a>

        <nav class="d-flex align-items-center gap-3">
            <a class="d-flex align-items-center text-secondary" href="#">Stream</a>
            <a class="d-flex align-items-center text-secondary" href="#">Classwork</a>
            <a class="d-flex align-items-center text-secondary" href="#">People</a>
        </nav>

        <div class="popup ms-auto">
            <div class="avatar me-3 cursor-pointer">
                <img src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
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
          ">
                <img class="popup__avatar cursor-pointer"
                    src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
                <p class="popup__email">youremail@gmail.com</p>
                <a class="popup__link" href="edit.html" target="_blank">Manage your account</a>
                <div class="popup__logout mt-auto cursor-pointer">Log Out</div>

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
        ">
            <h1 class="banner__class">{{ $class->tenlop }}</h1>
            <div class="fs-4">
                <span>Teacher: </span><span class="banner__teacher">{{ $class->TaiKhoan->hoten }}</span>
            </div>
            <div class="fs-4">
                <span>Subject: </span><span class="banner__subject">{{ $class->chude }}</span>
            </div>
            <div class="fs-4">
                <span>Room: </span><span class="banner__room">{{ $class->code }}</span>
            </div>
        </section>

        <!-- Content -->
        <section class="container mt-5">
            <div class="row">
                <div class="col col-lg-3 d-none d-lg-block">
                    <div class="border pt-4 px-4 pb-5">
                        <div class="mb-4">Upcoming</div>
                        <p class="mb-5">Woohoo, no work due soon!</p>
                        <a href="#" class="d-block text-success text-end">View All</a>
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
                        data-bs-toggle="modal" data-bs-target="#modal-input">
                        <div class="avatar me-3">
                            <img src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
                        </div>
                        <span class="text-white">Announce something to your class</span>
                    </button>

                    <div class="modal fade" id="modal-input" tabindex="-1" style="display: none" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <div class="d-flex align-items-center">
                                        <img class="avatar me-3"
                                            src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                                            alt="Avatar" />
                                        <div class="text-success">Write your announcement</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="px-3 mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2" class="text-black-50">Announcement</label>
                                    </div>
                                </div>

                                <div class="modal-footer d-flex justify-content-between">
                                    <div>
                                        <label class="upload cursor-pointer" for="upload">
                                            <img class="img-cover" src="svgs/upload.svg" alt="Upload" />
                                        </label>
                                        <input id="upload" type="file" />
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-secondary py-2 me-2"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary py-2" data-bs-dismiss="modal">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul>
                        <li class="bg-white px-3 py-4 rounded shadow">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="avatar me-3"
                                        src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg"
                                        alt="Avatar" />
                                    <h3 class="fs-5">Teacher</h3>
                                </div>
                                <div class="btn btn-dark text-white">&#x2716;</div>
                            </div>

                            <p class="border-bottom pb-3">Hi all my students!!</p>

                            <div class="fw-bold text-decoration-underline mb-4">
                                Comments:
                            </div>

                            <ul class="mt-2 border-bottom">
                                <li>
                                    <div
                                        class="
                        d-flex
                        align-items-center
                        justify-content-between
                        mb-3
                      ">
                                        <div class="d-flex align-items-center">
                                            <img class="avatar me-3"
                                                src="https://avatars.dicebear.com/api/adventurer-neutral/12345.svg"
                                                alt="Avatar" />
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
                                <img class="avatar me-3"
                                    src="https://avatars.dicebear.com/api/adventurer-neutral/123456.svg" alt="Avatar" />
                                <input class="flex-grow-1 border me-2 p-2" placeholder="Write your comment..." />
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
