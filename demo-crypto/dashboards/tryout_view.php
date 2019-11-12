<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>Try Out CBT : SIMAK UI</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="assets/vendor/nova-icons/nova-icons.css" rel="stylesheet">

    <!-- CSS Implementing Libraries -->
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="assets/vendor/visavail-custom/css/visavail.css">
    <link rel="stylesheet" href="assets/vendor/jquery-shorten/src/jquery.shorten.css">

    <!-- CSS Nova Template -->
    <link rel="stylesheet" href="assets/css/theme.css">

    <style type="text/css">
    	.header-light .navbar-brand-wrapper {
		     background-color: white; 
		}

		@media (min-width: 992px) {
		  body.has-sidebar .main {
		     padding-left: 0 !important; 
		  }
		  body.has-sidebar.side-nav-closed .main,
		  body.has-sidebar.side-nav-minified .main {
		    padding-left: 4rem;
		  }
		}
		@media (min-width: 768px) {
			.card-header {
		    padding: 0.5rem 0.5rem !important;
		}	
		}

		@media (min-width: 1200px) {
		.mb-xl-5, .my-xl-5 {
		    margin-bottom: 0rem !important;
			}
		}

		@media (min-width: 800px) {
			.header-invoker {
				display: none;
			}

			.timer-mobile {
				display: none !important;
				position: absolute;
			}
		}

		@media (max-width: 800px) {
			.card-desktop {
				display: none;
			}

			.btn {
				margin-left: auto !important;
				margin-right: auto !important;
			}
		}

		.badge-question-status {
		    width: 2rem;
		    height: 2rem;
		    line-height: 2rem;
		}

		.badge-question-status-not-answered {
		    width: 2rem;
		    height: 2rem;
		    line-height: 2rem;
		    background-color: rgba(151, 153, 162, 0.18) !important;
		}

		.badge-sm-question-status {
		    width: 1.2rem;
		    height: 1.2rem;
		    line-height: 1.2rem;
		    font-size: 0.75rem;
		}

    </style>
  </head>

  <body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header header-light bg-white">
      <nav class="navbar flex-nowrap p-0">
        <div class="navbar-brand-wrapper col-auto">
          <!-- Logo For Mobile View -->
          <a class="navbar-brand navbar-brand-mobile" href="../../demo-crypto/dashboards/index.html">
            <img class="img-fluid w-100" src="../../assets/img/logo-mini.png" alt="Nova">
          </a>
          <!-- End Logo For Mobile View -->

          <!-- Logo For Desktop View -->
          <a class="navbar-brand navbar-brand-desktop" href="../../demo-crypto/dashboards/index.html">
            <img class="side-nav-show-on-closed" src="../../assets/img/logo-mini.png" alt="Nova" style="width: 200px; height: 33px;">
            <img class="side-nav-hide-on-closed" src="../../assets/img/logo.png" alt="Nova" style="width: 75px; height: 35px;">
          </a>
          <!-- End Logo For Desktop View -->
        </div>

        <div class="header-content col px-md-3 px-md-3">
          <div class="d-flex align-items-center">

            <!-- Header User Dropdown -->
            <div class="dropdown mx-3" style="margin-left: auto !important;">
              <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false"
                 data-unfold-event="click"
                 data-unfold-target="#profileMenu"
                 data-unfold-type="css-animation"
                 data-unfold-duration="300"
                 data-unfold-animation-in="fadeIn"
                 data-unfold-animation-out="fadeOut">
                <span class="d-md-block">David Walters</span>
                <i class="nova-angle-down d-md-block ml-2"></i>
              </a>

              <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4" aria-labelledby="profileMenuInvoker">
                <li class="unfold-item">
                  <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="nova-user"></i>
                    </span>
                    My Profile
                  </a>
                </li>
                <li class="unfold-item">
                  <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="nova-cup"></i>
                    </span>
                    Upgrade Plan
                  </a>
                </li>
                <li class="unfold-item">
                  <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="nova-folder"></i>
                    </span>
                    Latest Projects
                  </a>
                </li>
                <li class="unfold-item">
                  <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="nova-book"></i>
                    </span>
                    Get Support
                  </a>
                </li>
                <li class="unfold-item unfold-item-has-divider">
                  <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="nova-power-off"></i>
                    </span>
                    Sign Out
                  </a>
                </li>
              </ul>
            </div>
            <!-- End Header User Dropdown -->

            <!-- Info Sidebar Toggle -->
            <a id="activityInvoker" class="header-invoker" href="#" aria-controls="activity" aria-haspopup="true" aria-expanded="false"
               data-unfold-event="click"
               data-unfold-target="#activity"
               data-unfold-type="css-animation"
               data-unfold-animation-in="fadeInRight"
               data-unfold-animation-out="fadeOutRight"
               data-unfold-duration="300">
              <i class="nova-align-justify"></i>
            </a>
            <!-- End Info Sidebar Toggle -->

            <!-- Info Sidebar -->
            <div id="activity" class="js-custom-scroll sidebar sidebar-light sidebar-right sidebar-full-height unfold-css-animation unfold-hidden position-fixed" aria-labelledby="activityInvoker">
              <div class="border-bottom d-flex align-items-center text-nowrap px-3 px-md-4 py-3">
                <h5 class="mb-0">UTBK Saintek</h5>
                <a id="activityClose" class="text-muted small ml-auto" href="#" aria-controls="activity" aria-haspopup="true" aria-expanded="false"
                   data-unfold-event="click"
                   data-unfold-target="#activity"
                   data-unfold-type="css-animation"
                   data-unfold-animation-in="fadeInRight"
                   data-unfold-animation-out="fadeOutRight"
                   data-unfold-duration="300">
                  <i class="nova-close icon-text"></i>
                </a>
              </div>

              <form>

              	<div class="card mb-3 mb-md-4">
                <div class="card-header bg-primary d-flex align-items-center">
                  <h5 class="font-weight-semi-bold mb-0">Informasi Ujian</h5>
                </div>

                <div class="card-body">


                <div class="row">
                	<div class="col-xl-6">Mata Pelajaran</div>
                	<div class="col-xl-6"><strong>UTBK Saintek</strong></div>

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
                <div class="card-header bg-primary d-flex align-items-center">
                  <h5 class="font-weight-semi-bold mb-0">Status Jawaban Soal</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 300px; padding-left: 2.5rem">
                  <div class="d-flex flex-wrap mb-3 mb-md-4">
                    <div class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-primary badge-sm-question-status rounded-circle">1</span>A
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>


                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

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
                      <span class="badge badge-danger">1 : 45 : 23</span>
                      </span>
                  </div>
    </header>
    <!-- End Header -->

    <main class="main">
      <div class="content">
        <div class="py-4 px-3 px-md-4">

          <div class="row">
            <div class="col-xl-8 mb-3 mb-xl-5">
              

              <div class="card mb-3 mb-md-4">
              	

                <div class="card-header bg-primary d-flex align-items-center">
                  <h5 class="font-weight-semi-bold mb-0"><span class="badge badge-light mb-1 mr-2">UTBK Saintek</span>&nbsp;<span class="badge badge-light mb-1 mr-2">Matematika</span></h5>
                </div>
                <div class="card-body">
                  <h5>Soal Nomor : 1	</h5>
                  <p class="mb-0">A Google Docs scam that appears to be widespread began landing in users’ inboxes on Wednesday in what seemed to be a sophisticated phishing or malware attack. The deceptive invitation to edit a Google Doc – the popular app used for writing and sharing files – appeared to be spreading rapidly, with a subject line stating a contact has shared a document.

                  	A Google Docs scam that appears to be widespread began landing in users’ inboxes on Wednesday in what seemed to be a sophisticated phishing or malware attack. The deceptive invitation to edit a Google Doc – the popular app used for writing and sharing files – appeared to be spreading rapidly, with a subject line stating a contact has shared a document.

                  	A Google Docs scam that appears to be widespread began landing in users’ inboxes on Wednesday in what seemed to be a sophisticated phishing or malware attack. The deceptive invitation to edit a Google Doc – the popular app used for writing and sharing files – appeared to be spreading rapidly, with a subject line stating a contact has shared a document.

                  	A Google Docs scam that appears to be widespread began landing in users’ inboxes on Wednesday in what seemed to be a sophisticated phishing or malware attack. The deceptive invitation to edit a Google Doc – the popular app used for writing and sharing files – appeared to be spreading rapidly, with a subject line stating a contact has shared a document.

                  	A Google Docs scam that appears to be widespread began landing in users’ inboxes on Wednesday in what seemed to be a sophisticated phishing or malware attack. The deceptive invitation to edit a Google Doc – the popular app used for writing and sharing files – appeared to be spreading rapidly, with a subject line stating a contact has shared a document.
                  	
                  </p>
                  <br>
                  <div class="row mb-3 mb-md-4">
                    <div class="col-md">
                      <div class="form-check position-relative mb-2">
                        <input type="checkbox" class="form-check-input d-none" id="customCheckboxes1" name="option">
                        <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes1" data-icon="">A. Checkbox label</label>
                      </div>

                      <div class="form-check position-relative mb-2">
                        <input type="checkbox" class="form-check-input d-none" id="customCheckboxes2" name="option">
                        <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes2" data-icon="">B. Checkbox label</label>
                      </div>

                      <div class="form-check position-relative mb-2">
                        <input type="checkbox" class="form-check-input d-none" id="customCheckboxes3" name="option">
                        <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes3" data-icon="">C. Checkbox label</label>
                      </div>

                      <div class="form-check position-relative mb-2">
                        <input type="checkbox" class="form-check-input d-none" id="customCheckboxes4" name="option">
                        <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes4" data-icon="">D. Checkbox label</label>
                      </div>

                      <div class="form-check position-relative mb-2">
                        <input type="checkbox" class="form-check-input d-none" id="customCheckboxes5" name="option">
                        <label class="checkbox checkbox-xxs form-check-label ml-1" for="customCheckboxes5" data-icon="">E. Checkbox label</label>
                      </div>
                    </div>
                  </div>
                </div>
                <footer class="card-footer border-top">
                  <div class="d-flex flex-wrap mb-3">
                    <a class="btn btn-sm btn-primary mb-3 mr-3" href="#"><span class="nova-arrow-circle-left"></span> Soal Sebelumnya</a>
                    <a class="btn btn-sm btn-primary mb-3 mr-3" href="#">Soal Berikutnya <span class="nova-arrow-circle-right"></span></a>

                    <a class="btn btn-sm btn-soft-primary mb-3 mr-3" href="#">Tandai Ragu-ragu & Lanjut ke Soal Berikutnya</a>
                    <a class="btn btn-sm btn-success mb-3 mr-3" data-toggle="modal" data-target="#exampleModal" href="#"><span class="nova-save"></span> Selesai & Simpan</a>

                  </div>
                </footer>
              </div>
            </div>

            <div class="col-xl-4 mb-3 mb-xl-5">
            	<div class="row">
            		<div class="col-xl-12 mb-3 mb-xl-5 d-print-none">

              
<div class="card card-desktop mb-3 mb-md-4">
                <div class="card-header bg-primary d-flex align-items-center">
                  <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Informasi Ujian</h5>
                </div>

                <div class="card-body">


                <div class="row">
                	<div class="col-xl-6">Mata Pelajaran</div>
                	<div class="col-xl-6"><strong>UTBK Saintek</strong></div>

                	<div class="col-xl-6">Tingkat</div>
                	<div class="col-xl-6"><strong>SMA / MA</strong></div>

                	<div class="col-xl-6">Jumlah Soal</div>
                	<div class="col-xl-6"><strong>90</strong></div>

                	<div class="col-xl-6">Waktu Pengerjaan</div>
                	<div class="col-xl-6"><strong>1.5 jam (90 menit)</strong></div>
                </div>
                </div>
              </div>
            		</div>

            		<div class="col-xl-12 mb-3 mb-xl-5 d-print-none">
            			<!-- Card -->
			              
              
<div class="card card-desktop mb-3 mb-md-4">
                <div class="card-header bg-primary d-flex align-items-center">
                  <h5 class="font-weight-semi-bold mb-0"><span class="nova-alarm-clock"></span>&nbsp;&nbsp;Sisa Waktu</h5>
                </div>
                <div class="card-body">
                	<table class="text-center" style="margin-left: auto; margin-right: auto;">
                		<tr>
                			<td><h1>1</h1></td>
                			<td><h1>&nbsp;:&nbsp;</h1></td>
                			<td><h1>45</h1></td>
                			<td><h1>&nbsp;:&nbsp;</h1></td>
                			<td><h1>23</h1></td>
                		</tr>
                		<tr>
                			
                			<td>jam</td>
                			<td></td>
                			<td>menit</td>
                			<td></td>
                			<td>detik</td>
                		</tr>
                	</table>
                </div>
              </div>
			              <!-- End Card -->
            		</div>

            		<div class="col-xl-12 mb-3 mb-xl-5 d-print-none">
            			<!-- Card -->

              
<div class="card card-desktop mb-3 mb-md-4">
                <div class="card-header bg-primary d-flex align-items-center">
                  <h5 class="font-weight-semi-bold mb-0"><span class="nova-write"></span>&nbsp;&nbsp;Status Jawaban Soal</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 300px; padding-left: 2.5rem">
                  <div class="d-flex flex-wrap mb-3 mb-md-4">
                    <div class="badge badge-lg bg-soft-primary badge-question-status position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-primary badge-sm-question-status rounded-circle">1</span>A
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>


                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>



                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  
                    <div class="badge badge-lg bg-soft-light badge-question-status-not-answered position-relative font-weight-semi-bold text-primary p-0 mb-3 mr-5">
                      <span class="badge badge-sm badge-top-right badge-outside badge-light badge-sm-question-status rounded-circle">26</span>
                      _
                    </div>

                  </div>
                </div>
                <footer class="card-footer">
                </footer>
              </div>
              			<!-- End Card -->
            		</div>
            	</div>
            </div>
          </div>

      </div>

       
  </div>
    </main>


                    <!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="text-center border rounded p-3 p-md-4">
                        <i class="nova-help icon-text icon-text-xxl d-block text-warning mb-3 mb-md-4"></i>
                        <div class="h5 font-weight-semi-bold mb-2">Apakah Kamu yakin untuk menyeselaikan Try Out?</div>
                        <p class="mb-3 mb-md-4">Apabila Anda klik <strong>OK</strong>, Anda tidak dapat mengerjakan soal kembali.</p>

                        <div class="d-flex justify-content-center">
                          <a class="btn btn-success" href="#">OK</a>
                          <a class="btn btn-light ml-2" href="#">Batal</a>
                        </div>
                      </div>
					  </div>
					</div>

        <!-- Footer -->
        <footer class="small bg-white p-3 px-md-4 mt-auto d-print-none">
          <div class="row justify-content-between">
            <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
              <ul class="list-dot list-inline mb-0">
                <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
                <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
                <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
              </ul>
            </div>

            <div class="col-lg text-center mb-3 mb-lg-0">
              <ul class="list-inline mb-0">
                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="nova-twitter-alt"></i></a></li>
                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="nova-vimeo-alt"></i></a></li>
                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="nova-github"></i></a></li>
              </ul>
            </div>

            <div class="col-lg text-center text-lg-right">
              &copy; 2019 Developed. All Rights Reserved.
            </div>
          </div>
        </footer>
        <!-- End Footer -->

    <!-- JS Global Compulsory -->
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="../../assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- JS Implementing Libraries -->
    <script src="../../assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../../assets/vendor/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../assets/vendor/chartist-bar-labels/src/scripts/chartist-bar-labels.js"></script>
    <script src="../../assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../assets/vendor/resize-sensor/dist/resizeSensor.min.js"></script>
    <script src="../../assets/vendor/jquery-shorten/src/jquery.shorten.js"></script>
    <script src="../../assets/vendor/visavail-custom/js/visavail.js"></script>
    <script src="../../assets/vendor/clipboard/dist/clipboard.min.js"></script>

    <!-- JS Nova -->
    <script src="../../assets/js/hs.core.js"></script>
    <script src="../../assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="../../assets/js/components/hs.side-nav.js"></script>
    <script src="../../assets/js/components/hs.unfold.js"></script>
    <script src="../../assets/js/components/hs.flatpickr.js"></script>
    <script src="../../assets/js/components/hs.header-search.js"></script>
    <script src="../../assets/js/components/hs.select2.js"></script>
    <script src="../../assets/js/components/hs.chartist-area.js"></script>
    <script src="../../assets/js/components/hs.chartist-bar.js"></script>
    <script src="../../assets/js/components/hs.chartist-donut.js"></script>
    <script src="../../assets/js/components/hs.visavail-timeline.js"></script>
    <script src="../../assets/js/components/hs.clipboard.js"></script>

    <!-- JS Libraries Init. -->
    <script>
      $(document).on('ready', function () {
        // initialization of custom scroll
        $.HSCore.components.HSMalihuScrollBar.init($('.js-custom-scroll'));

        // initialization of sidebar navigation component
        $.HSCore.components.HSSideNav.init('.js-side-nav');

        // initialization of dropdown component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
          unfoldHideOnScroll: false,
          afterOpen: function () {
            // initialization of charts
            $.HSCore.components.HSChartistBar.init('#activity .js-bar-chart');

            setTimeout(function() {
              $('#activity .js-bar-chart').css('opacity', 1);
            }, 100);

            // help function for accordions in hidden block
            $('#headerProjects .accordion-header').on('click', function () {
              // vars
              var target = $(this).data('target');

              $(target).collapse('show');
            });
          }
        });

        // initialization of range datepicker
        $.HSCore.components.HSFlatpickr.init('#headerRightSidebarDatepicker', {
          locale: {
            weekdays: {
              shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
            }
          },
          nextArrow: '<i class="nova-arrow-right icon-text icon-text-xs"></i>',
          prevArrow: '<i class="nova-arrow-left icon-text icon-text-xs"></i>'
        });
        $.HSCore.components.HSFlatpickr.init('#rangeDatepicker2');
        $.HSCore.components.HSFlatpickr.init('#rangeDatepicker, #rangeDatepickerSales', {
          locale: {
            weekdays: {
              shorthand: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
            },
            rangeSeparator: ' - '
          },
          nextArrow: '<em class="nova-arrow-right"></em>',
          prevArrow: '<em class="nova-arrow-left"></em>'
        });

        // initialization of show on type module
        $.HSCore.components.HSHeaderSearch.init('.js-header-search');

        // initialization of show on type module
        $.HSCore.components.HSSelect2.init('.js-custom-select');

        // initialization of charts
        $.HSCore.components.HSChartistArea.init('.js-area-chart');
        $.HSCore.components.HSChartistBar.init('.js-bar-chart');
        $.HSCore.components.HSChartistDonut.init('.js-donut-chart');
        $.HSCore.components.HSVisavailTimeline.init('#chartTimeline');

        // initialization of clipboard
        $.HSCore.components.HSClipboard.init('.js-clipboard');

        $("input:checkbox").on('click', function() {
		  // in the handler, 'this' refers to the box clicked on
		  var $box = $(this);
		  if ($box.is(":checked")) {
		    // the name of the box is retrieved using the .attr() method
		    // as it is assumed and expected to be immutable
		    var group = "input:checkbox[name='" + $box.attr("name") + "']";
		    // the checked state of the group/box on the other hand will change
		    // and the current value is retrieved using .prop() method
		    $(group).prop("checked", false);
		    $box.prop("checked", true);
		  } else {
		    $box.prop("checked", false);
		  }
		});
      });

    </script>
  </body>
</html>