<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('page-title', 'Page Title') - Laravel 5 Blog - Backend</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="{{ asset('assets/css/backend.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- Mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Laravel Blog</span>
            <!-- Logo for regular state and mobile devices -->
            <span class="logo-lg">Laravel Blog</span>
        </a>
        <!-- /Logo -->

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ $user->avatar }}?s=25" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ $user->avatar }}?s=90" class="img-circle" alt="User Image">

                                <p>
                                    {{ $user->name }}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{ URL::route('auth.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- /Main Header -->

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ $user->avatar  }}?s=45" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ $user->name }}</p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li class="treeview">
                    <a href="{{ URL::route('admin.posts.index') }}"><i class="fa fa-files-o"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ URL::route('admin.posts.index') }}"><i class="fa fa-eye"></i> List Posts</a></li>
                        <li><a href="{{ URL::route('admin.posts.create') }}"><i class="fa fa-plus"></i> Add a Post</a></li>
                        <li class="treeview">
                            <a href="{{ URL::route('admin.tags.index') }}"><i class="fa fa-tags"></i> <span>Tags</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="{{ URL::route('admin.tags.index') }}"><i class="fa fa-eye"></i> List Tags</a></li>
                                <li><a href="{{ URL::route('admin.tags.create') }}"><i class="fa fa-plus"></i> Add a Tag</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{ URL::route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ URL::route('admin.users.index') }}"><i class="fa fa-eye"></i> List Users</a></li>
                        <li><a href="{{ URL::route('admin.users.create') }}"><i class="fa fa-plus"></i> Add an User</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{ URL::route('admin.roles.index') }}"><i class="fa fa-sitemap"></i>Roles and Permissions<i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ URL::route('admin.roles.index') }}">List Roles</a></li>
                        <li><a href="{{ URL::route('admin.roles.create') }}">Add a Role</a> </li>
                        <li><a href="{{ URL::route('admin.permissions.index') }}">List Permissions</a> </li>
                        <li><a href="{{ URL::route('admin.permissions.create') }}">Add a Permission</a> </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>@yield('page-title', 'Page Header')</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">@yield('breadcrumb-title', 'Dashboard')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Powered by Laravel
        </div>
        <!-- Default to the left -->
    </footer>
</div>

<script src="{{ asset('assets/js/backend.js') }}"></script>
</body>
</html>
