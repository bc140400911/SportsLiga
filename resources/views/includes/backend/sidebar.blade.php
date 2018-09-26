<div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs">

    <!-- BEGIN DEFAULT SIDEBAR -->
    <div class="ks-column ks-sidebar ks-info">
        <div class="ks-wrapper ks-sidebar-wrapper">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item ks-user dropdown">
                    <a class="nav-link "  href="{{route('admin-profile')}}" >
                        <img src="https://ui-avatars.com/api/?name={{ucfirst(Auth::user()->first_name)}}+{{ucfirst(Auth::user()->last_name)}}" width="36" height="36" class="ks-avatar rounded-circle">
                        <div class="ks-info">
                            <div class="ks-name">{{ucfirst(Auth::user()->first_name)}} {{ucfirst(Auth::user()->last_name)}}</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('admin')}}" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-futbol-o"></span>
                        <span>Dashboard</span>
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link"  href="{{route('teams-panel')}}" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-dashboard"></span>
                        <span>Teams</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link user-class"  href="{{route('users-panel.index')}}" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-user"></span>
                        <span>User</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link"  href="{{route('show-comments')}}" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-comments-o"></span>
                        <span>Comments</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END DEFAULT SIDEBAR -->
    <div class="ks-column ks-page">
        <div class="ks-page-header">
            <section class="ks-title">
                <h3>@yield('dashboard_title')</h3>
            </section>
        </div>
        <div class="ks-page-content">
            <div class="ks-page-content-body">
                <div class="container-fluid ks-rows-section">
                    @yield('site_stats')
                    @yield('admin_stats')
                    @yield('Admins_section')
                </div>
            </div>
        </div>
    </div>
</div>
