  <?php 

function has_taken_first_tryout($username) {
        $jawaban_tryout_ipa_query_result = mysql_query("SELECT * FROM jawaban_tryout_ipa WHERE userid = '$username' ");
        $jawaban_tryout_ipa_arr_rows = mysql_num_rows($jawaban_tryout_ipa_query_result);
        

        $jawaban_tryout_ips_query_result = mysql_query("SELECT * FROM jawaban_tryout_ips WHERE userid = '$username' ");
        $jawaban_tryout_ips_arr_rows = mysql_num_rows($jawaban_tryout_ips_query_result);
        return $jawaban_tryout_ipa_arr_rows > 0 || $jawaban_tryout_ips_arr_rows > 0;
    }
    
   ?>

   <!-- Header -->
    <header class="header header-light bg-white">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="home.php">
                    <img class="img-fluid w-100" src="assets/img/logo-mini.png" alt="Nova">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="home.php">
                    <img class="side-nav-show-on-closed" src="assets/img/logo-mini.png" alt="Nova" style="width: 200px; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="assets/img/logo.png" alt="Nova" style="width: 75px; height: 35px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-3 px-md-3">
                <div class="d-flex align-items-center">

                    <div class="dropdown" style="margin-left: auto !important;">
                      <a id="dropdownBadgesPrimary" class="btn btn-sm btn-primary dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        <span class="align-middle">Tryout</span>
                        <i class="nova-angle-down icon-text icon-text-xs align-middle ml-3"></i>
                      </a>

                  <div class="dropdown-menu dropdown-menu-primary p-0" aria-labelledby="dropdownBadgesPrimary" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 46px, 0px);">

                        <?php if (has_taken_first_tryout($username)) {
                            echo '<a class="dropdown-item media align-items-center py-2 px-3" href="#" style="color: #636363; background-color: #3199b9;">';
                            echo '  Mulai Tryout';
                            echo '</a>';
                        } else {
                            echo '<a class="dropdown-item media align-items-center py-2 px-3" href="choose-test-type-to-one.php">';
                            echo '  Mulai Tryout';
                            echo '</a>';
                        } ?>
                    <!-- <a class="dropdown-item media align-items-center py-2 px-3" href="choose-test-type-to-two.php">
                      Tryout Kedua
                    </a> -->
                  </div>
                </div>

                    <a class="link-dark mx-3 desktop" href="home.php">Home</span></a>

                    <!-- Header User Dropdown -->
                    <div class="dropdown mx-3 ml-auto-mobile">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <span class="d-md-block"><?php echo $fullName; ?></span>
                            <i class="nova-angle-down d-md-block ml-2"></i>
                        </a>

                        <ol id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4" aria-labelledby="profileMenuInvoker">
                            <li class="unfold-item mobile">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="home.php">
                                    <span class="unfold-item-icon mr-3">
                                      <i class="nova-user"></i>
                                    </span> Home
                                </a>
                            </li>

                            <li class="unfold-item desktop">
                            <li class="unfold-item desktop">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php">
                                    <span class="unfold-item-icon mr-3">
                      <i class="nova-power-off"></i>
                    </span> Keluar
                                </a>
                            </li>

                            <li class="unfold-item unfold-item-has-divider mobile">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php">
                                    <span class="unfold-item-icon mr-3">
                      <i class="nova-power-off"></i>
                    </span> Keluar
                                </a>
                            </li>
                        </ol>
                    </div>
                    <!-- End Header User Dropdown -->
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->
