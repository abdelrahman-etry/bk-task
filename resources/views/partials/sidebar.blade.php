<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BK Task</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/img/male.png') }}" class="img-circle elevation-2" alt="{{ auth()->user()->name }}">
            </div>
        
            <div class="info">
                <label class="d-block">{{ auth()->user()->name }}</label>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->route()->getName() === 'home' ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        
                        <p> Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('school.schools') }}" class="nav-link  {{ request()->route()->getPrefix() === '/school' ? ' active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p> Schools </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.students') }}" class="nav-link {{ request()->route()->getPrefix() === '/student' ? ' active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p> Students </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>