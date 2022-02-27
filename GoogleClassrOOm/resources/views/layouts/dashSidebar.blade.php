<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div class="p">


            <div class="nav__list ">
                <a href="#" class="nav__link active">
                    <i class='bx bx-grid-alt nav__icon'></i>
                    <span class="nav__name">Dashboard</span>
                </a>

                <a href="{{ route('AdminInfo') }}" class="nav__link">
                    <i class='bx bxs-chip nav__icon'></i>
                    <span class="nav__name">Administrator</span>
                </a>

                <!-- a -->
                <a class="dropdown-btn" style="padding-bottom: 8px">
                    <i class='bx bx-layer nav__icon'></i>
                    <span class="nav__name">Lớp học
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    <i class='bx bxs-down-arrow'></i>
                </a>

                <div class="dropdown-container">
                    <a href="{{ route('ad-ds-lop') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Danh sách lớp
                        </span>
                    </a>
                    <a href="{{ route('ad-ds-lop') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Tạo mới lớp học
                        </span>
                    </a>

                </div>
                <!-- a -->
                <a class="dropdown-btn" style="padding-bottom: 8px">
                    <i class='bx bx-buoy nav__icon'></i>
                    <span class="nav__name">Quản lý
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    <i class='bx bxs-down-arrow'></i>
                </a>

                <div class="dropdown-container">
                    <a href="{{ route('ad-ds-ad') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Danh sách Admin
                        </span>
                    </a>
                    <a href="{{ route('ad-ds-gv') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Danh sách Giảng viên
                        </span>
                    </a>
                    <a href="{{ route('ad-ds-hs') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Danh sách Học viên
                        </span>
                    </a>
                </div>
                <!-- a -->
                <a class="dropdown-btn" style="padding-bottom: 8px">
                    <i class='bx bxs-add-to-queue nav__icon'></i>
                    <span class="nav__name">Thêm mới&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <i class='bx bxs-down-arrow'></i>
                </a>

                <div class="dropdown-container">
                    <a href="{{ route('ad-tao-ad') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Tạo mới Admin
                        </span>
                    </a>
                    <a href="{{ route('ad-tao-gv') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Tạo mới Giảng viên
                        </span>
                    </a>
                    <a href="{{ route('ad-tao-hs') }}" class="nav_drop_link">
                        <span style="padding-left: 31px">
                            <i class='bx bxs-right-arrow'></i>&nbsp;&nbsp;
                            Tạo mới Học viên
                        </span>
                    </a>
                </div>
            </div>
        </div>


        <a href="#" class="nav__link">
            <i class='bx bx-cog nav__icon'></i>
            <span class="nav__name">Cài đặt</span>
        </a>
    </nav>
</div>