
    <div class="dashboard-sidebar">
        <div class="dashboard-nav-trigger">
           <div class="dashboard-nav-trigger-btn">
               <i class="la la-bars"></i> Dashboard Navigation
           </div>
        </div>
        <div class="dashboard-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
            </div><!-- end humburger-menu -->
            <div class="side-menu-wrap">
                <ul class="side-menu-ul">
                    <li class="{{ request()->is('employer/dashboard')  ? 'page-active' : '' }}" ><a href="{{ url('employer/dashboard') }}"><i class="la la-dashboard icon-element"></i> Dashboard</a></li>
                    <li class="{{ request()->is('employer/switch')  ? 'page-active' : '' }}" ><a href="{{ url('employer/switch') }}"><i class="la la-user icon-element"></i> Switch To Care-Giver</a></li>
                    <li class="{{ request()->is('employer/transactions')  ? 'page-active' : '' }}" ><a href="{{ url('employer/transactions') }}"><i class="la la-money icon-element"></i> Transactions</a></li>
                    <li class="{{ request()->is('employer/messages*')  ? 'page-active' : '' }}"><a href="{{ url('employer/messages') }}"><i class="la la-envelope icon-element"></i> Messages </a></li>
                    <li class="{{ request()->is('employer/job-feeds')  ? 'page-active' : '' }}" ><a href="{{ url('employer/job-feeds') }}"><i class="la la-briefcase icon-element"></i> Job Feeds</a></li>
                    <li class="{{ request()->is('employer/profile*') || request()->is('employer/change-password*')  ? 'page-active' : '' }}">
                        <a href="#"><i class="la la-gear icon-element"></i> Settings <span class="la la-caret-down btn-toggle"></span></a>
                        <ul class="dropdown-menu-item">
                            <li><a href="{{ url('employer/profile') }}">Edit Profile</a></li>
                            <li><a href="{{ url('employer/change-password') }}">Change Password</a></li>
                        </ul>
                    </li>                    
                    <li class="{{ request()->is('employer/manage-jobs*') || request()->is('employer/manage-care-givers*') || request()->is('employer/post-new-job*')  ? 'page-active' : '' }}">
                        <a href="#"><i class="la la-briefcase icon-element"></i> Jobs <span class="la la-caret-down btn-toggle"></span></a>
                        <ul class="dropdown-menu-item">
                            <li><a class="{{ request()->is('employer/manage-jobs*')  ? 'page-active' : '' }}" href="{{ url('employer/manage-jobs') }}">Manage My Jobs</a></li>
                            <li><a href="{{ url('employer/manage-care-givers') }}">Manage Care Givers   </a></li>
                            <li><a href="{{ url('employer/post-new-job') }}">Post New Job</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('logout') }}"><i class="la la-power-off icon-element"></i> Logout</a></li>
                    {{-- <li><a href="{{ url('logout') }}"><i class="la la-trash icon-element"></i> Delete Account</a></li> --}}
                </ul>
            </div><!-- end side-menu-wrap -->
        </div>
    </div><!-- end dashboard-sidebar -->