<!-- BEGIN .app-side -->
<aside class="app-side" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-profile -->
        <div class="user-profile">

            <h6 class="location-name fs-1">CITRMU</h6>
            <!-- <ul class="profile-actions">
                <li>
                    <a href="#">
                        <i class="icon-social-skype"></i>
                        <span class="count-label yellow"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="count-label green"></span>
                        <i class="icon-drafts"></i>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <i class="icon-export"></i>
                    </a>
                </li>
            </ul> -->
        </div>
        <!-- END .user-profile -->
        <!-- BEGIN .side-nav -->
        <nav class="side-nav">
            <!-- BEGIN: side-nav-content -->
            <ul class="unifyMenu" id="unifyMenu">
                <li class="active selected">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-laptop_windows"></i>
                        </span>
                        <span class="nav-title fw-bold">OVERVIEW</span>
                    </a>
                    <ul aria-expanded="false" class="collapse in">
                        <li>
                            <a href='../dashboard/index.php' <?php echo (strpos($_SERVER['REQUEST_URI'], 'dashboard/index') !== false) ? 'class="current-page"' : ''; ?>>Dashboard</a>
                        </li>
                        <?php if ($_SESSION['user_role'] === 'ADMIN' || $_SESSION['user_role'] === 'MANAGER' || $_SESSION['user_role'] === 'REQUESTOR') { ?>
                            <li>
                                <a href='../tickets/index.php' <?php echo (strpos($_SERVER['REQUEST_URI'], 'tickets/index') !== false) ? 'class="current-page"' : ''; ?>>Create Ticket</a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['user_role'] === 'ADMIN' || $_SESSION['user_role'] === 'MANAGER') { ?>
                            <li>
                                <a href='../service/index.php' <?php echo (strpos($_SERVER['REQUEST_URI'], 'service/index') !== false) ? 'class="current-page"' : ''; ?>>Create Service</a>
                            </li>
                        <?php } ?>
                        <?php if ($_SESSION['user_role'] === 'ADMIN') { ?>
                            <!-- <li>
                                <a href='../technician/index.php' <?php echo (strpos($_SERVER['REQUEST_URI'], 'technician/index') !== false) ? 'class="current-page"' : ''; ?> disabled>Create
                                    Technician</a>
                            </li> -->
                        <?php } ?>
                    </ul>
                </li>
                <?php if ($_SESSION['user_role'] === 'ADMIN') { ?>
                    <li class="active selected">
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-lock_outline"></i>
                            </span>
                            <span class="nav-title">Authentication</span>
                        </a>
                        <ul aria-expanded="false" class="collapse in">
                            <li>
                                <a href='../user/index.php' <?php echo (strpos($_SERVER['REQUEST_URI'], 'user/index') !== false) ? 'class="current-page"' : ''; ?>>User</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['user_role'] === 'ADMIN') { ?>
                    <!-- <li>
                        <a href="widgets.html">
                            <span class="has-icon">
                                <i class="icon-flash-outline"></i>
                            </span>
                            <span class="nav-title">Graph Widgets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-adjust2"></i>
                            </span>
                            <span class="nav-title">Cool Features</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="filters.html">Content Filter</a>
                            </li>
                            <li>
                                <a href="datepickers.html">Datepickers</a>
                            </li>
                            <li>
                                <a href='map-skins.html'>Gmap Skins</a>
                            </li>
                            <li>
                                <a href='vector-maps.html'>Vector Maps</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-tabs-outline"></i>
                            </span>
                            <span class="nav-title">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='profile.html'>Profile</a>
                            </li>
                            <li>
                                <a href='calendar.html'>Calendar</a>
                            </li>
                            <li>
                                <a href='gallery.html'>Gallery</a>
                            </li>
                            <li>
                                <a href='invoice.html'>Invoice</a>
                            </li>
                            <li>
                                <a href='timeline.html'>Timeline</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="faq.html">Faq's</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-layers"></i>
                            </span>
                            <span class="nav-title">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='custom-drag.html'>Drag &amp; Drop</a>
                            </li>
                            <li>
                                <a href='layout.html'>Default Layout</a>
                            </li>
                            <li>
                                <a href='layout-range-date-header.html'>Layout Date Range</a>
                            </li>
                            <li>
                                <a href='fixed-sidebar.html'>Fixed Sidebar</a>
                            </li>
                            <li>
                                <a href='layout-logo-left.html'>Logo on Left</a>
                            </li>
                            <li>
                                <a href='dark-header.html'>Dark Header</a>
                            </li>
                            <li>
                                <a href='dark-sidebar.html'>Dark Sidebar</a>
                            </li>
                            <li>
                                <a href='rtl.html'>RTL Layout</a>
                            </li>
                            <li>
                                <a href='boxed.html'>Boxed Layout</a>
                            </li>
                            <li>
                                <a href='boxed-slim-sidebar.html'>Boxed Slim Sidebar</a>
                            </li>
                            <li>
                                <a href='slim-sidebar.html'>Slim Sidebar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="comments.html">
                            <span class="has-icon">
                                <i class="icon-chat_bubble_outline"></i>
                            </span>
                            <span class="nav-title">Comments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-chart-area-outline"></i>
                            </span>
                            <span class="nav-title">Graphs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='c3-graphs.html'>C3 Graphs</a>
                            </li>
                            <li>
                                <a href='flot.html'>Flot Graphs</a>
                            </li>
                            <li>
                                <a href='morris.html'>Morris Graphs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-center_focus_strong"></i>
                            </span>
                            <span class="nav-title">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='form-inputs.html'>Form Inputs</a>
                            </li>
                            <li>
                                <a href='input-groups.html'>Inputs Groups</a>
                            </li>
                            <li>
                                <a href='checkbox-radio.html'>Checkbox &amp; Radio</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-beaker"></i>
                            </span>
                            <span class="nav-title">UI Elements</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='general-elements.html'>General Elements</a>
                            </li>
                            <li>
                                <a href='buttons.html'>Buttons</a>
                            </li>
                            <li>
                                <a href='tabs.html'>Tabs</a>
                            </li>
                            <li>
                                <a href="modals.html">Modals</a>
                            </li>
                            <li>
                                <a href='accordion.html'>Accordion</a>
                            </li>
                            <li>
                                <a href="labels-badges.html">Labels &amp; Badges</a>
                            </li>
                            <li>
                                <a href='notifications.html'>Notifications</a>
                            </li>
                            <li>
                                <a href='carousel.html'>Carousels</a>
                            </li>
                            <li>
                                <a href='list-items.html'>List Items</a>
                            </li>
                            <li>
                                <a href='cards.html'>Cards</a>
                            </li>
                            <li>
                                <a href='navbars.html'>Navbars</a>
                            </li>
                            <li>
                                <a href='popovers-tooltips.html'>Popovers &amp; Tooltips</a>
                            </li>
                            <li>
                                <a href='typography.html'>Typography</a>
                            </li>
                            <li>
                                <a href='icons.html'>Icons</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tables.html">
                            <span class="has-icon">
                                <i class="icon-border_outer"></i>
                            </span>
                            <span class="nav-title">Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="datatables.html">
                            <span class="has-icon">
                                <i class="icon-border_all"></i>
                            </span>
                            <span class="nav-title">Data Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="has-arrow" aria-expanded="false">
                            <span class="has-icon">
                                <i class="icon-lock_outline"></i>
                            </span>
                            <span class="nav-title">Authentication</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href='../user/index.php'>Users</a>
                            </li>
                            <li>
                                <a href='login.html'>Login</a>
                            </li>
                            <li>
                                <a href='signup.html'>Signup</a>
                            </li>
                            <li>
                                <a href='forgot-pwd.html'>Forgot Password</a>
                            </li>
                            <li>
                                <a href="locked-screen.html">Locked Screen</a>
                            </li>
                            <li>
                                <a href='error404.html'>Error 404</a>
                            </li>
                            <li>
                                <a href='error505.html'>Error 505</a>
                            </li>
                        </ul>
                    </li> -->
                <?php } ?>
            </ul>
            <!-- END: side-nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>
<!-- END: .app-side -->