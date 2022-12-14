<body class="g-sidenav-show rtl bg-gray-200">
    <aside style="overflow: hidden"
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#" target="_blank">

                <img src="{{ asset('dash/img/logos/Untitled-3.png') }}" class="navbar-brand-img h-100"
                    style="margin-top: -53px;max-height: 60% !important;width: 75%;" alt="main_logo">
                {{-- <span class="me-1 font-weight-bold text-white"
                    style="
                font-weight: 900;
                margin-right: 15px !important;
            ">ذبائح</span> --}}
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100" style="height: 100%"
            id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/users' ? 'active' : '' }}"
                        href="{{ route('admin.users') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="nav-link-text me-1">الأعضاء</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/info' ? 'active' : '' }}"
                        href="{{ route('admin.info') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-database"></i>
                        </div>
                        <span class="nav-link-text me-1">البيانات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/teams' ? 'active' : '' }}"
                        href="{{ route('admin.teams') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-link-text me-1">اعضاء الفريق</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/partners' ? 'active' : '' }}"
                        href="{{ route('admin.partners') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <span class="nav-link-text me-1">الشركاء</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/articles' ? 'active' : '' }}"
                        href="{{ route('admin.articles') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <span class="nav-link-text me-1">المقالات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/Appcats' ? 'active' : '' }}"
                        href="{{ route('admin.Appcats') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile"></i>
                        </div>
                        <span class="nav-link-text me-1">أقسام البرمجة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/apps' ? 'active' : '' }}"
                        href="{{ route('admin.apps') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile"></i>
                        </div>
                        <span class="nav-link-text me-1">البرمجة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/motioncats' ? 'active' : '' }}"
                        href="{{ route('admin.motioncats') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile"></i>
                        </div>
                        <span class="nav-link-text me-1">أقسام الموشن</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/motions' ? 'active' : '' }}"
                        href="{{ route('admin.motions') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile"></i>
                        </div>
                        <span class="nav-link-text me-1">الموشن</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/graphiccats' ? 'active' : '' }}"
                        href="{{ route('admin.graphiccats') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile"></i>
                        </div>
                        <span class="nav-link-text me-1">أقسام الجرافيكس</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/graphics' ? 'active' : '' }}"
                        href="{{ route('admin.graphics') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile"></i>
                        </div>
                        <span class="nav-link-text me-1">الجرافيكس</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/cats' ? 'active' : '' }}"
                        href="{{ route('admin.cats') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-puzzle-piece"></i>
                        </div>
                        <span class="nav-link-text me-1">الأقسام</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/products' ? 'active' : '' }}"
                        href="{{ route('admin.products') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-tags"></i>
                        </div>
                        <span class="nav-link-text me-1">المنتجات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/services' ? 'active' : '' }}"
                        href="{{ route('admin.services') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <span class="nav-link-text me-1">الخدمات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/orders' ? 'active' : '' }}"
                        href="{{ route('admin.orders') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <span class="nav-link-text me-1">الطلبات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'admin/contacts' ? 'active' : '' }}"
                        href="{{ route('admin.contacts') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-link"></i>
                        </div>
                        <span class="nav-link-text me-1">تواصل معنا</span>
                    </a>
                </li>
            </ul>
            <div class="sidenav-footer position-absolute w-100" style="bottom: 0; left:9px">
                <div class="mx-3">
                    <a class="btn bg-gradient-primary mt-4 w-100" href="{{ route('logout') }}" type="button"><i
                            class="fas fa-sign-out-alt"></i> تسحيل الخروج</a>
                </div>
            </div>
        </div>
    </aside>
