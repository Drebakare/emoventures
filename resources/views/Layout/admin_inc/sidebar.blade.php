
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-main">
                        <a class="nav-link" href="{{route('admin.retrieve-all-users')}}">
                            <i class="fas fa-user" aria-hidden="true"></i>
                            <span>All Users</span>
                        </a>
                    </li>
                    <li class="nav-main">
                        <a class="nav-link" href="{{route('admin.retrieve-all-orders')}}">
                            <i class="fas fa-tasks" aria-hidden="true"></i>
                            <span>Product Orders</span>
                        </a>
                    </li>
                    <li class="nav-main">
                        <a class="nav-link" href="{{route('admin.retrieve-all-appointments')}}">
                            <i class="fas fa-book-medical" aria-hidden="true"></i>
                            <span>Appointments</span>
                        </a>
                    </li>
                    <li class="nav-main">
                        <a class="nav-link" href="{{route('admin.product-category')}}">
                            <i class="fas fa-list-alt" aria-hidden="true"></i>
                            <span>Product Category</span>
                        </a>
                    </li>
                    {{--<li class="nav-main">
                        <a class="nav-link" href="#">
                            <i class="fas fa-money-bill" aria-hidden="true"></i>
                            <span> Withdrawal Requests</span>
                        </a>
                    </li>--}}
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="fas fa-plus" aria-hidden="true"></i>Add Function<span class="mega-sub-nav-toggle float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-3"></span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{route('admin.add-product')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Add Product</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('admin.add-hotel')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Add Hotel</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('admin.add-service')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Add Service</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('admin.add-review')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Add Customer's review</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            <i class="fas fa-edit" aria-hidden="true"></i>Customize<span class="mega-sub-nav-toggle float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-3"></span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="{{route('admin.contact-us')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Edit Company's contact</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('admin.about-us')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Edit About Us</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('admin.quote')}}">
                                    {{--<i class="fas fa-plus" aria-hidden="true"></i>--}}
                                    <span>Edit Quote</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main">
                        <a class="nav-link" href="{{route('admin.send-mail')}}">
                            <i class="fas fa-mail-bulk" aria-hidden="true"></i>
                            <span>Send Mail</span>
                        </a>
                    </li>
                    <li class="nav-main">
                        <a class="nav-link" href="{{route('admin.birthday')}}">
                            <i class="fas fa-birthday-cake" aria-hidden="true"></i>
                            <span>Birthday Celebrants</span>
                        </a>
                    </li>
                    <li class="nav-main">
                        <a class="nav-link" href="{{route('user.logout')}}">
                            <i class="fas fa-power-off" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="nav-parent d-none">
                        <a class="nav-link" href="#">
                            <i class="fas fa-list-alt" aria-hidden="true"></i>
                            <span>Forms</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="forms-basic.html">
                                    Basic
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="forms-advanced.html">
                                    Advanced
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="forms-validation.html">
                                    Validation
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="forms-layouts.html">
                                    Layouts
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="forms-wizard.html">
                                    Wizard
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="forms-code-editor.html">
                                    Code Editor
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent d-none">
                        <a class="nav-link" href="#">
                            <i class="fas fa-table" aria-hidden="true"></i>
                            <span>Tables</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="tables-basic.html">
                                    Basic
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="tables-advanced.html">
                                    Advanced
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="tables-responsive.html">
                                    Responsive
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="tables-editable.html">
                                    Editable
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="tables-ajax.html">
                                    Ajax
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="tables-pricing.html">
                                    Pricing
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="d-none">
                        <a class="nav-link" href="mailbox-folder.html">
                            <span class="float-right badge badge-primary">182</span>
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <span>Mailbox</span>
                        </a>
                    </li>
                    <li class="nav-parent d-none">
                        <a class="nav-link" href="#">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span>Maps</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="maps-google-maps.html">
                                    Basic
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="maps-google-maps-builder.html">
                                    Map Builder
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="maps-vector.html">
                                    Vector
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent d-none">
                        <a class="nav-link" href="#">
                            <i class="fas fa-asterisk" aria-hidden="true"></i>
                            <span>Extra</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a class="nav-link" href="extra-changelog.html">
                                    Changelog
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="extra-ajax-made-easy.html">
                                    Ajax Made Easy
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="d-none">
                        <a class="nav-link" href="../../../themeforest.net/item/porto-responsive-html5-template/4106987868f.html?ref=Okler">
                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            <span>Front-End <em class="not-included">(Not Included)</em></span>
                        </a>
                    </li>
                    <li class="nav-parent d-none">
                        <a class="nav-link" href="#">
                            <i class="fas fa-align-left" aria-hidden="true"></i>
                            <span>Menu Levels</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a>
                                    First Level
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a class="nav-link" href="#">
                                    Second Level
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a>
                                            Second Level Link #1
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            Second Level Link #2
                                        </a>
                                    </li>
                                    <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            Third Level
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a>
                                                    Third Level Link #1
                                                </a>
                                            </li>
                                            <li>
                                                <a>
                                                    Third Level Link #2
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>

            <hr class="separator d-none" />

            <div class="sidebar-widget widget-tasks d-none">
                <div class="widget-header">
                    <h6>Projects</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-0">
                        <li><a href="#">Porto HTML5 Template</a></li>
                        <li><a href="#">Tucson Template</a></li>
                        <li><a href="#">Porto Admin</a></li>
                    </ul>
                </div>
            </div>

            <hr class="separator d-none" />

            <div class="sidebar-widget widget-stats d-none">
                <div class="widget-header">
                    <h6>Company Stats</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul>
                        <li>
                            <span class="stats-title">Stat 1</span>
                            <span class="stats-complete">85%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                    <span class="sr-only">85% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 2</span>
                            <span class="stats-complete">70%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="stats-title">Stat 3</span>
                            <span class="stats-complete">2%</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">2% Complete</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>


    </div>

