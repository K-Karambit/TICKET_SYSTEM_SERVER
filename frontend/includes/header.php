<!-- BEGIN .app-heading -->
<header class="app-header">
    <div class="container-fluid">
        <div class="row gutters">
            <div class="col-sm-7 col-8">
                <a class="mini-nav-btn float-left" href="#" id="app-side-mini-toggler">
                    <i class="icon-sort"></i>
                </a>
                <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler float-left"
                    aria-expanded="true">
                    <i class="icon-chevron-thin-left"></i>
                </a>
                <a href="../../../frontend\views\dashboard\index.php"
                    class="logo float-left ml-4 h-100 d-flex align-items-center justify-content-center">
                    <!-- <img src="../../../frontend\assets\img\logo.svg" alt="Google Dashboards" /> -->
                    <h6 class="text-success display-6 fs-3">CITRMU Helpdesk Support System</h6>
                </a>
            </div>
            <div class="col-sm-5 col-4">
                <ul class="header-actions">
                    <!-- <li>
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-notifications_none"></i>
                            <span class="count-label">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="notifications">
                            <ul class="imp-notify">
                                <li>
                                    <div class="icon">W</div>
                                    <div class="details">
                                        <p><span>Wilson</span> The best Dashboard design I have seen ever.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">J</div>
                                    <div class="details">
                                        <p><span>John Smith</span> Jhonny sent you a message. Read now!</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon secondary">R</div>
                                    <div class="details">
                                        <p><span>Justin Mezzell</span> Stella, Added you as a Friend. Accept it!
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" id="todos" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-person_outline"></i>
                            <span class="count-label red">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="todos">
                            <ul class="stats-widget">
                                <li>
                                    <h4>$37895</h4>
                                    <p>Revenue <span>+2%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="87"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h4>4,897</h4>
                                    <p>Downloads <span>+39%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="65"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            <span class="sr-only">65% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h4>2,219</h4>
                                    <p>Uploads <span class="text-secondary">-7%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="42"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 42%">
                                            <span class="sr-only">42% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li>
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <img class="avatar"
                                src="../../../frontend/private/user-images/<?php echo $_SESSION['unique_id']; ?>/<?php echo $_SESSION['img_user_profile_picture']; ?>"
                                alt="Admin Dashboards" />
                            <span class="user-name">
                                <?php echo $_SESSION['user_username']; ?>
                            </span>
                            <i class="icon-chevron-small-down"></i>
                        </a>
                        <div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
                            <ul class="user-settings-list">
                                <li>
                                    <a href="../../../frontend/views/user/user-profile.php">
                                        <div class="icon">
                                            <i class="icon-account_circle"></i>
                                        </div>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../error.php">
                                        <div class="icon red">
                                            <i class="icon-cog3"></i>
                                        </div>
                                        <p>Settings</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="../../../error.php">
                                        <div class="icon yellow">
                                            <i class="icon-schedule"></i>
                                        </div>
                                        <p>Activity</p>
                                    </a>
                                </li>
                            </ul>
                            <div class="logout-btn">
                                <a class="btn btn-primary" id="logout">Logout</a>
                            </div>
                            <script>
                                const logoutButton = document.getElementById('logout');

                                logoutButton.addEventListener('click', function () {
                                    // Destroy the session
                                    sessionStorage.removeItem('PHPSESSID');

                                    // Clear local storage
                                    localStorage.clear();

                                    // Clear cookies
                                    document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/; domain=" + document.domain;

                                    // Redirect the user to the login page
                                    window.location.href = '../../../frontend/auth/index.php';
                                });
                            </script>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- END: .app-heading -->