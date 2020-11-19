
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
                    <li class="{{ request()->is('admin')  ? 'page-active' : '' }}" ><a href="{{ url('admin') }}"><i class="la la-dashboard icon-element"></i> Dashboard</a></li>
                    <li class="{{ request()->is('admin/users*')  ? 'page-active' : '' }}"><a href="{{ url('admin/users') }}"><i class="la la-user icon-element"></i> Users <span class="badge badge-info radius-rounded p-1">3</span></a></li>
                    <li class="{{ request()->is('admin/plans*') || request()->is('admin/new-plan*') || request()->is('admin/edit-plan*')  ? 'page-active' : '' }}"><a href="{{ url('admin/plans') }}"><i class="la la-file-text-o icon-element"></i> Plans</a></li>
                    <li class="{{ request()->is('admin/transactions*')  ? 'page-active' : '' }}"><a href="{{ url('admin/transactions') }}"><i class="la la-line-chart icon-element"></i> Transactions</a></li>
                    <li class="{{ request()->is('admin/job-alert*')  ? 'page-active' : '' }}"><a href="{{ url('admin/job-alert') }}"><i class="la la-bell-o icon-element"></i> Jobs Alert</a></li>
                    
                    <li class="{{ request()->is('admin/add-job-category*') || request()->is('admin/all-job*') || request()->is('admin/job-category*')  ? 'page-active' : '' }}">
                        <a href="#"><i class="la la-briefcase icon-element"></i> Job Categories <span class="la la-caret-down btn-toggle"></span></a>
                        <ul class="dropdown-menu-item">
                            <li><a href="{{ url('admin/job-categories') }}"> Categories</a></li>
                            <li><a href="{{ url('admin/add-job-category') }}"> Add New Job Category</a></li>
                            <li><a href="{{ url('admin/job-sub-categories') }}"> Sub Categories</a></li>
                            <li><a href="{{ url('admin/add-job-sub-category') }}"> Add Sub Category</a></li>
                        </ul>
                    </li>

                    <li class="{{ request()->is('admin/profile*') || request()->is('admin/change-password*')  ? 'page-active' : '' }}">
                        <a href="#"><i class="la la-gear icon-element"></i> Settings <span class="la la-caret-down btn-toggle"></span></a>
                        <ul class="dropdown-menu-item">
                            <li><a href="{{ url('admin/profile') }}">Edit Profile</a></li>
                            <li><a href="{{ url('admin/change-password') }}">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('admin/manage-jobs*') || request()->is('admin/all-job*')  ? 'page-active' : '' }}">
                        <a href="#"><i class="la la-briefcase icon-element"></i> Job Ads <span class="la la-caret-down btn-toggle"></span></a>
                        <ul class="dropdown-menu-item">
                            <li><a href="{{ url('admin/manage-jobs') }}"> All Jobs</a></li>
                            <li><a href="{{ url('admin/manage-jobs') }}"> Manage Jobs</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('logout') }}"><i class="la la-power-off icon-element"></i> Logout</a></li>
                </ul>
            </div><!-- end side-menu-wrap -->
        </div>
    </div><!-- end dashboard-sidebar -->