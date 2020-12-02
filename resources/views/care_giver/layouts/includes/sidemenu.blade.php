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
        <li class="{{ request()->is('care-giver')  ? 'page-active' : '' }}"><a href="{{ url('care-giver') }}"><i class="la la-dashboard icon-element"></i> Dashboard</a></li>
        <li class="{{ request()->is('care-giver/messages*')  ? 'page-active' : '' }}"><a href="{{ url('care-giver/messages') }}"><i class="la la-envelope icon-element"></i> Messages</a></li>
        <li class="{{ request()->is('care-giver/plan*')  ? 'page-active' : '' }}"><a href="{{ url('care-giver/plans') }}"><i class="la la-bookmark icon-element"></i> Plans</a></li>
        <li class="{{ request()->is('care-giver/transactions*')  ? 'page-active' : '' }}"><a href="{{ url('care-giver/transactions') }}"><i class="la la-line-chart icon-element"></i>Transactions</a></li>
        <li class="{{ request()->is('care-giver/applied-jobs*')  ? 'page-active' : '' }}"><a href="{{ url('care-giver/applied-jobs') }}"><i class="la la-bell-o icon-element"></i>Applied Jobs</a></li>
        <li class="{{ request()->is('care-giver/approved-jobs*')  ? 'page-active' : '' }}"><a href="{{ url('care-giver/approved-jobs') }}"><i class="la la-bell-o icon-element"></i>Approved Jobs</a></li>
        <li class="{{ request()->is('care-giver/new-jobs*')  ? 'page-active' : '' }}"><a href="{{ url('care-giver/new-jobs') }}"><i class="la la-bell-o icon-element"></i>New Jobs</a></li>
        <li class="{{ request()->is('care-giver/profile*') || request()->is('care-giver/change-password*')  ? 'page-active' : '' }}">
          <a href="#"><i class="la la-gear icon-element"></i> Settings <span class="la la-caret-down btn-toggle"></span></a>
          <ul class="dropdown-menu-item">
            <li><a href="{{ url('care-giver/profile') }}">Edit Profile</a></li>
            <li><a href="{{ url('care-giver/change-password') }}">Change Password</a></li>
          </ul>
        </li>
        <li><a href="{{ url('logout') }}"><i class="la la-power-off icon-element"></i> Logout</a></li>
      </ul>
    </div><!-- end side-menu-wrap -->
  </div>
</div><!-- end dashboard-sidebar -->