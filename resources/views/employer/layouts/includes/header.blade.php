<!-- Menu -->

<header class="header-area header-desktop">
  <div class="header-menu-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="menu-full-width">
            <div class="logo">
              <a href="#"><img src="{{ asset('web/images/logo2.png') }}" alt="logo"></a>
            </div><!-- end logo -->
            <div class="logo-right-content">
              <div class="header-action-button d-flex align-items-center">
                <div class="user-action-wrap">
                  <div class="notification-item">
                    <div class="dropdown">
                      <button class="notification-btn dot-status online-status dropdown-toggle" type="button" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar != null ? asset('uploads/profile_pictures/'.Auth::user()->avatar) : asset('web/images/avatar.png')}}" alt="{{Auth::user()->first_name}}">
                      </button>
                      <div class="dropdown-menu" aria-labelledby="userDropdownMenu">
                        <div class="mess-dropdown">
                          <div class="mess__title d-flex align-items-center">
                            <div class="image dot-status online-status">
                              <a href="#">
                                <img src="{{ Auth::user()->avatar != null ? asset('uploads/profile_pictures/'.Auth::user()->avatar) : asset('web/images/avatar.png')}}" alt="{{Auth::user()->first_name}}">
                              </a>
                            </div>
                            <div class="content">
                              <h4 class="widget-title font-size-16">
                                <a href="#">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                              </h4>
                              <span class="email">{{Auth::user()->email}}</span>
                            </div>
                          </div><!-- end mess__title -->
                          <div class="mess__body">
                            <ul class="list-items">                              
                              <li class="mb-0">
                                <a href="{{ url('employer/switch') }}" class="d-block">
                                  <i class="la la-user"></i> Switch to Care-Giver
                                </a>
                              </li>
                              <li class="mb-0">
                                <a href="{{ url('employer/profile') }}" class="d-block">
                                  <i class="la la-user"></i> Profile
                                </a>
                              </li>
                              <li class="mb-0">
                                <a href="{{ url('employer/post-new-job') }}" class="d-block">
                                  <i class="la la-plus"></i> Post a Job
                                </a>
                              </li>
                              <li class="mb-0">
                                <a href="{{ url('employer/change-password') }}" class="d-block">
                                  <i class="la la-lock"></i> Change Password
                                </a>
                              </li>
                              <li class="mb-0">
                                <div class="section-block mt-2 mb-2"></div>
                              </li>
                              <li class="mb-0">
                                <a href="{{ route('logout') }}" class="d-block">
                                  <i class="la la-power-off"></i> Logout
                                </a>
                              </li>
                            </ul>
                          </div><!-- end mess__body -->
                        </div><!-- end mess-dropdown -->
                      </div><!-- end dropdown-menu -->
                    </div><!-- end dropdown -->
                  </div>
                </div>
              </div>

            </div><!-- end logo-right-content -->
          </div><!-- end menu-full-width -->
        </div><!-- end col-lg-12 -->
      </div><!-- end row -->
    </div><!-- end container-fluid -->
  </div><!-- end header-menu-wrapper -->
  <div class="side-nav-container">
    <div class="humburger-menu">
      <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
    </div><!-- end humburger-menu -->
  </div><!-- end side-nav-container -->
</header>