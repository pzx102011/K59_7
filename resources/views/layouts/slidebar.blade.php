@php use App\Enums\UserRoleEnum; @endphp
    <!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a class="d-block">{{ Auth::user()->name }}</a>
                    <a class="d-block text-sm">{{ implode(', ', Auth::user()->getRoleNames()->toArray()) }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-header">DZIENNIK</li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            @if(Auth::user()->hasPermissionTo('view-grades'))
                                <li class="nav-item">
                                    <a href="{{ route('grades.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>Oceny</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    @if(Auth::user()->hasAnyPermission('manage-subjects','manage-users'))
                        <li class="nav-header">ZARZĄDZANIE</li>
                        @if(Auth::user()->hasPermissionTo('manage-subjects'))
                            <li class="nav-item menu-open">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('subjects.index') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Przedmioty</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(Auth::user()->hasPermissionTo('manage-users'))
                            <li class="nav-item menu-open">
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link">
                                            <i class="fas fa-users-cog"></i>
                                            <p>Użytkownicy</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endif

                    <li class="nav-header"></li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <p>Wyloguj</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
        @endauth

        @guest
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">Dziennik Ocen</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-header"></li>
                    <li class="nav-item menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('login.index') }}" class="nav-link">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <p>Zaloguj się</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        @endguest

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar-->
</aside>
<!-- /.Main Sidebar Containe -->
