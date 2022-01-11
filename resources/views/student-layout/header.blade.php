            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('admins/images/logo-sm.png') }}" alt="" height="40"
                                        style="margin-top:20px; margin-left:-15px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('admins/images/logo.png') }}" alt="" height="40"
                                        style="margin-top: 15px; margin-left:20px;">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('admins/images/logo-sm.png') }}" alt="" height="40"
                                        style="margin-top:20px; margin-left:-15px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('admins/images/logo.png') }}" alt="" height="40"
                                        style="margin-top: 15px; margin-left:20px;">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                data-toggle="fullscreen">
                                <i class="uil-minus-path"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('admins/images/avatar2.png') }}" alt="Header Avatar">
                                <span
                                    class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15"></span>
                                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('student.profile') }}"><i
                                        class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span
                                        class="align-middle">My Profile</span></a>
                                <a class="dropdown-item" href="{{ route('student.changepassword') }}"><i
                                        class="uil uil-lock-alt font-size-18 align-middle text-muted mr-1"></i> <span
                                        class="align-middle">Change Password</span></a>
                                <a class="dropdown-item" href="{{ route('student.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i>
                                    <span class="align-middle">Sign out</span></a>

                                <form id="logout-form" action="{{ route('student.logout')}}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

                    

                    </div>
                </div>
            </header>
