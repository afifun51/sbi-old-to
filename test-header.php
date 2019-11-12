
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
                <!-- <a class="navbar-brand navbar-brand-desktop" href="home.php"> -->
				<a class="navbar-brand navbar-brand-desktop" href=""> 
                    <img class="side-nav-show-on-closed" src="assets/img/logo-mini.png" alt="Nova" style="width: 200px; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="assets/img/logo.png" alt="Nova" style="width: 75px; height: 35px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-3 px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Header User Dropdown -->
                    <div class="dropdown mx-3" style="margin-left: auto !important;">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <span class="d-md-block"><?php echo $fullName; ?></span>
                            <i class="nova-angle-down d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4" aria-labelledby="profileMenuInvoker">
                            <li class="unfold-item">
                                <!-- <a class="unfold-link d-flex align-items-center text-nowrap" href="home.php"> -->
								<a class="unfold-link d-flex align-items-center text-nowrap" href="">
                                    <span class="unfold-item-icon mr-3">
                      <i class="nova-user"></i>
                    </span> Home
                                </a>
                            </li>
                            <li class="unfold-item unfold-item-has-divider">
                                <!-- <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php"> -->
								<a class="unfold-link d-flex align-items-center text-nowrap" href="">
                                    <span class="unfold-item-icon mr-3">
                      <i class="nova-power-off"></i>
                    </span> Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Header User Dropdown -->

                    <!-- Info Sidebar Toggle -->
                    <a id="activityInvoker" class="header-invoker" href="#" aria-controls="activity" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#activity" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="300">
                        <i class="btn btn-sm btn-outline-primary nova-write" style="padding: 0.2rem 0.6rem"></i>
                    </a>
                    <!-- End Info Sidebar Toggle -->

                    <!-- Info Sidebar -->
                    <div id="activity" class="js-custom-scroll sidebar sidebar-light sidebar-right sidebar-full-height unfold-css-animation unfold-hidden position-fixed" aria-labelledby="activityInvoker">
                        <div class="d-flex align-items-center text-nowrap px-3 px-md-4 py-3">
                            <h5 class="mb-0"><?php echo $_SESSION['subject']; ?></h5>
                            <a id="activityClose" class="text-muted small ml-auto" href="#" aria-controls="activity" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#activity" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="300">
                                <i class="nova-close icon-text"></i>
                            </a>
                        </div>

                        <form>
                            <div class="card mb-3 mb-md-4">
                                <div class="card-header bg-primary d-flex align-items-center p-2">
                                    <h5 class="font-weight-semi-bold mb-0 ml-2">Informasi Ujian</h5>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-6">Mata Pelajaran</div>
                                        <div class="col-xl-6"><strong><?php echo $_SESSION['subject']; ?></strong></div>

                                        <div class="col-xl-6">Tingkat</div>
                                        <div class="col-xl-6"><strong>SMA / MA</strong></div>

                                        <div class="col-xl-6">Jumlah Soal</div>
                                        <div class="col-xl-6"><strong>90</strong></div>

                                        <div class="col-xl-6">Waktu Pengerjaan</div>
                                        <div class="col-xl-6"><strong>1.5 jam (90 menit)</strong></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3 mb-md-4">
                                <div class="card-header bg-primary d-flex align-items-center p-2">
                                    <h5 class="font-weight-semi-bold mb-0 ml-2">Status Jawaban Soal</h5>
                                </div>
                                <div class="card-body" style="overflow-y: scroll; height: 300px; padding-left: 2.5rem">
                                        <div class="d-flex flex-wrap mb-3 mb-md-4">

                                            <?php                   
                    $numberOfLine =  $numberOfQuestion/10 ;
                    $count = 0;
                    for ($r = 0; $r < $numberOfLine ; $r++) {
                        for ($c = 1; $c <= 10 && $count < $numberOfQuestion ; $c++) {                           
                            $mark = $qMark[($r*10)+$c] ;
                            $num = ($r*10)+$c;
                            $count = $count+1;
                            if($mark == 0) {
                                //echo '<td width="50" style="background-color:#FF0000">';
                                //echo '<a href="?qNum='.(($r*5)+$c).'>'.(($r*5)+$c).'</a>'.". ". $qAnswer[($r*5)+$c];;
                                //echo ". " ;
                                //echo $qAnswer[($r*5)+$c];
                                //echo "</td>";                             
                                echo '<a href="'.$test_page.'.php?qNum='.$num.'" class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-4">';
                                                echo '<span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">'.$num.'</span>'.$qAnswer[$num];
                                            echo '</a>';
                            } else if ($mark == 1) {            
                                echo '<a href="'.$test_page.'.php?qNum='.$num.'" class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-4">';
                                                echo '<span class="badge badge-sm badge-top-right badge-outside badge-blue badge-sm-question-status rounded-circle">'.$num.'</span> <span class="">'.$qAnswer[$num]."</span>";
                                            echo '</a>';
                            }  else if ($mark == 2) {           
                                echo '<a href="'.$test_page.'.php?qNum='.$num.'" class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-4">';
                                                echo '<span class="badge badge-sm badge-top-right badge-outside badge-primary badge-sm-question-status rounded-circle">'.$num.'</span>'.$qAnswer[$num];
                                            echo '</a>';
                            }
                        } 
                    }
                    
                ?>

                                        </div>
                                    </div>
                                <footer class="card-footer">
                                </footer>
                            </div>
                            <!-- End Card -->

                        </form>
                    </div>
                    <!-- End Info Sidebar -->
                </div>
            </div>
        </nav>
        <div class="timer-mobile alert bg-soft-success border-success d-flex align-items-center p-1 mb-0">
            <span style="margin-left: auto; margin-right: auto">
                     <strong>Sisa waktu :</strong> &nbsp;
                      <span class="badge badge-danger"><span id="m-jam"></span> : <span id="m-menit"></span> : <span id="m-detik"></span></span>
            </span>
        </div>
    </header>
    <!-- End Header -->
