<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
            <div class="profile-pic">
                <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-account-check"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                </div>
                </a>
            </div>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin')}}">
            <span class="menu-icon">
                <i class="mdi mdi-view-dashboard"></i>
            </span>
            <span class="menu-title">لوحة التحكم</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="{{route('dashboard.category.index')}}" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-filter-variant"></i>
            </span>
            <span class="menu-title">الاقسام</span>
            </a>

        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard.product.index')}}">
            <span class="menu-icon">
                <i class="mdi mdi-tshirt-crew"></i>
            </span>
            <span class="menu-title">المنتجات</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/icons/mdi.html">
            <span class="menu-icon">
                <i class="mdi mdi-tag"></i>
            </span>
            <span class="menu-title">الكوبونات</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/basic-table.html">
            <span class="menu-icon">
                <i class="mdi mdi-package-variant"></i>
            </span>
            <span class="menu-title">الطلبات</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard.settings.index')}}">
            <span class="menu-icon">
                <i class="mdi mdi-settings"></i>
            </span>
            <span class="menu-title">اعدادات الموقع</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard.user.index')}}">
            <span class="menu-icon">
                <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">اعضاء الموقع</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('logout')}}">
            <span class="menu-icon">
                <i class="mdi mdi-logout"></i>
            </span>
            <span class="menu-title">تسجيل خروج</span>
            </a>
        </li>
    </ul>
</nav>
