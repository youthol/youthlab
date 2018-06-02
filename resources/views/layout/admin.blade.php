<!DOCTYPE html>
<html>

<head>
    <title>微信小程序后台管理系统 - 山东理工大学</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/flat-admin.css')}}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/blue-sky.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/blue.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/red.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/theme/yellow.css')}}">

</head>

<body>
<div class="app app-default">
    <!-- Sidebar -->
    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="../home/index.html">
                <span class="highlight">SDUT</span>
                <span>mina</span>
            </a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="active">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </div>
                        <div class="title">Admin</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section">
                                <i class="fa fa-file-o" aria-hidden="true"></i>权限管理</li>
                            <li>
                                <a href="../user/index.html">User</a>
                            </li>
                            <li>
                                <a href="../role/index.html">Role</a>
                            </li>
                            <li>
                                <a href="../permission/index.html">Permission</a>
                            </li>
                            <li class="line"></li>
                            <li class="section">
                                <i class="fa fa-file-o" aria-hidden="true"></i>数据管理</li>
                            <li>
                                <a href="#">Menu</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                        </div>
                        <div class="title">Feature</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section">
                                <i class="fa fa-file-o" aria-hidden="true"></i>功能列表</li>
                            <li>
                                <a href="#">绩点</a>
                            </li>
                            <li>
                                <a href="#">成绩</a>
                            </li>
                            <li>
                                <a href="#">综测</a>
                            </li>
                            <li>
                                <a href="../../feature/jianzhi/index.html">资管委兼职</a>
                            </li>
                            <li>
                                <a href="#">宿舍卫生</a>
                            </li>
                            <li>
                                <a href="#">考试地点</a>
                            </li>
                            <li>
                                <a href="#">荣誉称号</a>
                            </li>
                            <li>
                                <a href="../../feature/xiaoli/index.html">校历</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                        </div>
                        <div class="title">Pages</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="section">
                                <i class="fa fa-file-o" aria-hidden="true"></i> Admin</li>
                            <li>
                                <a href="#">Form</a>
                            </li>
                            <li>
                                <a href="#">Table</a>
                            </li>
                            <li class="line"></li>
                            <li class="section">
                                <i class="fa fa-file-o" aria-hidden="true"></i> Landing</li>
                            <li>
                                <a href="../login/index.html">Login</a>
                            </li>
                            <li>
                                <a href="../register/index.html">Register</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <ul class="menu">
                <li>
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="flag-icon flag-icon-th flag-icon-squared"></span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- /.Sidebar -->

    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
        <div class="dropdown-background">
            <div class="bg"></div>
        </div>
        <div class="dropdown-container">
            {{list}}
        </div>
    </script>

    <!-- Container -->
    <div class="app-container">
        <!-- Container Navbar -->
        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#">
                                <span class="highlight">SDUT</span>
                                <span>mina</span>
                            </a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="../../../assets/images/profile.png">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title">Dashboard</li>
                        <li class="navbar-search hidden-sm">
                            <input id="search" type="text" placeholder="Search..">
                            <button class="btn-search">
                                <i class="fa fa-search"></i>
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown notification">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                </div>
                                <div class="title">New Orders</div>
                                <div class="count">0</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Ordering</li>
                                    <li class="dropdown-empty">No New Ordered</li>
                                    <li class="dropdown-footer">
                                        <a href="#">View All
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown notification warning">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                </div>
                                <div class="title">Unread Messages</div>
                                <div class="count">99</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Message</li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-warning pull-right">10</span>
                                            <div class="message">
                                                <img class="profile" src="https://placehold.it/100x100">
                                                <div class="content">
                                                    <div class="title">"Payment Confirmation.."</div>
                                                    <div class="description">Alan Anderson</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-warning pull-right">5</span>
                                            <div class="message">
                                                <img class="profile" src="https://placehold.it/100x100">
                                                <div class="content">
                                                    <div class="title">"Hello World"</div>
                                                    <div class="description">Marco Harmon</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-warning pull-right">2</span>
                                            <div class="message">
                                                <img class="profile" src="https://placehold.it/100x100">
                                                <div class="content">
                                                    <div class="title">"Order Confirmation.."</div>
                                                    <div class="description">Brenda Lawson</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="#">View All
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown notification danger">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </div>
                                <div class="title">System Notifications</div>
                                <div class="count">10</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Notification</li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">8</span>
                                            <div class="message">
                                                <div class="content">
                                                    <div class="title">New Order</div>
                                                    <div class="description">$400 total</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">14</span>
                                            Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">5</span>
                                            Issues Report
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="#">View All
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown profile">
                            <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="profile-img" src="../../../assets/images/profile.png">
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">Scott White</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="#">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">5</span>
                                            My Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Setting
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.Container Navber -->


        <!-- Container Footer -->
        <footer class="app-footer">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copyright">
                        Copyright © 2018 SDUT. Powered by YouthLab.
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.Container Footer -->
    </div>
    <!-- /.Container -->
</div>

<script type="text/javascript" src="{{asset('/assets/js/vendor.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/app.js')}}"></script>

</body>

</html>