  <div class="vertical-menu">

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
                  <img src="" alt="" height="40"
                      style="margin-top:20px; margin-left:-15px;">
              </span>
              <span class="logo-lg">
                  <img src="" alt="" height="40"
                      style="margin-top: 15px; margin-left:20px;">
              </span>
          </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
          <i class="fa fa-fw fa-bars"></i>
      </button>

      <div data-simplebar class="sidebar-menu-scroll">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <!-- <li class="menu-title">Menu</li> -->

                  <li>
                      <a href="{{route('university.dashboard')}}">
                          <i class="fas fa-tachometer-alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{route('university.colleges.index')}}">
                          <i class="fas fa-users"></i>
                          <span>Colleges</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{route('university.common-Settings.index')}}">
                          <i class="fas fa-users"></i>
                          <span>Common setting</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{route('university.courses.index')}}">
                          <i class="fas fa-users"></i>
                          <span>Courses</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{route('university.students.index')}}">
                          <i class="fas fa-users"></i>
                          <span>Students</span>
                      </a>
                  </li>
                
              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
