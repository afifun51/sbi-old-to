<?php       
    require 'access.php';
    
    session_start();        
    $conn = mysqli_connect($server, $username, $password, $database);

    if (!isset($_SESSION['username']))
    {
        header('location: login.php');
        exit;
    }


    $prodireg1=$_SESSION['prodireg1'];
    $prodireg2=$_SESSION['prodireg2'];
    $prodireg3=$_SESSION['prodireg3'];
    
    $prodipar1=$_SESSION['prodipar1'];
    $prodipar2=$_SESSION['prodipar2'];
    $prodipar3=$_SESSION['prodipar3'];
    
    $prodivok1=$_SESSION['prodivok1'];
    $prodivok2=$_SESSION['prodivok2'];
    $prodivok3=$_SESSION['prodivok3'];
    
    $isempty=false;
    $error="";
        
    $username =  $_SESSION['username'];
    $temp = mysql_query("SELECT * FROM siswa WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $fullName = $myArray['name'];
    $school = $myArray['school'];
    $class = $myArray['class']; 
    $nis = $myArray['nis'];
    $nisn = $myArray['nisn'];

    $temp = mysql_query("SELECT * FROM hasil_tryout_kd WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $kd_benar = floatval($myArray['benar']);
    $kd_salah = floatval($myArray['salah']);    
    $kd_kosong = floatval($myArray['kosong']);  
    
        
    $temp = mysql_query("SELECT * FROM hasil_tryout_ka WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $ka_benar = floatval($myArray['benar']);
    $ka_salah = floatval($myArray['salah']);    
    $ka_kosong = floatval($myArray['kosong']);  
    
    
    $jumlah_benar = $kd_benar + $ka_benar;
    $jumlah_salah = $kd_salah + $ka_salah;
    $jumlah_kosong =$kd_kosong + $ka_kosong;
    
    $nilai_mentah =  (4 * $jumlah_benar) - $jumlah_salah;
    $nilai_baku     = ($nilai_mentah - 12.67)/65.96;
    $nilai_nasional = 500 + (100.0 * $nilai_baku);
        
    $prodi1 = "Ilmu Komputer - Regoler";
    $prodi2 = "Teknik Kimia - Regoler";
    $prodi3 = "Teknik Elektro - Regoler";   
    $nn_prodi1 = 695.6807;
    $nn_prodi2 = 681.7731;
    $nn_prodi3 = 678.7929;
    
    $keputusan1 = "NA";
    $keputusan2 = "NA";
    $keputusan3 = "NA"; 

    if($nilai_nasional > $nn_prodi1) $keputusan1 = "Diterima";
    else $keputusan1 = "Tidak diterima";
    if($nilai_nasional > $nn_prodi2) $keputusan2 = "Diterima";
    else $keputusan2 = "Tidak diterima";
    if($nilai_nasional > $nn_prodi3) $keputusan3 = "Diterima";
    else $keputusan3 = "Tidak diterima";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Try Out CBT : UTBK 2020</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

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


    <!-- CSS SBI Theme -->
    <link rel="stylesheet" href="assets/css/sbi-theme.css">

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
            .mb-xl-5,
            .my-xl-5 {
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

            .mobile {
                display: none;
            }
        }
        
        @media (max-width: 800px) {
            .card-desktop {
                display: none;
            }

            .desktop {
                display: none;
            }

            .btn {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .ml-auto-mobile {
                margin-left: auto !important
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
    
    
    <?php require 'header.php' ?>

    <main class="main">
        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="row">
                   

                    <div class="col-xl-8 mb-3 mb-xl-8 center">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-body">
                                <h1>Petunjuk Ujian!</h1>
                                <em class="text-blue">Tes Kemampuan Akademik (TKA) Saintek Ke-2</em>
                                <ol class="mt-4" style="text-align: justify;">
                                    <li>Kerjakan soal sesuai kemampuan anda, dilarang membuka buku atau catatan, menyontek, dan memberikan jawaban kepada peserta lain;</li>
                                    <li>Gunakan kertas buram yang disediakan apabila diperlukan untuk membantu pengerjaan;</li>
                                    <li>Pilihlah salah satu jawaban anda yang paling tepat. Anda dapat mengerjakan soal-soal yang mudah terlebih dahulu 
Gunakan tombol "<" untuk menuju ke soal sebelumnya dan tombol ">" untuk menuju ke soal selanjutnya;</li>
<li>Apabila anda sudah selesai mengerjakan tekan tombol "Selesai";</li>
<li>Perhatikan sisa waktu yang tersedia untuk mengerjakan soal;</li>
<li>Klik tombol mata pelajaran yang kalian pilih untuk memulai mengerjakan soal.</li>
                                </ol>
                                <h3 class="mt-4">Selamat Mengerjakan!</h3>
                            </div>
                            <div class="card-footer mb-1">
                                <center>
                                <a href="cbt_utbk_tkasaintek2.php" class="btn btn-lg btn-primary">Mulai Tes</a>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="small bg-white p-3 px-md-4 mt-auto d-print-none">
        <div class="col-lg text-center">
            &copy; 2020 Developed By Sanggar Belajar Indonesia. All Rights Reserved.
        </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- JS Global Compolsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- JS Implementing Libraries -->
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/vendor/select2/dist/js/select2.foll.min.js"></script>
    <script src="assets/vendor/chartist/dist/chartist.min.js"></script>
    <script src="assets/vendor/chartist-bar-labels/src/scripts/chartist-bar-labels.js"></script>
    <script src="assets/vendor/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/vendor/resize-sensor/dist/resizeSensor.min.js"></script>
    <script src="assets/vendor/jquery-shorten/src/jquery.shorten.js"></script>
    <script src="assets/vendor/visavail-custom/js/visavail.js"></script>
    <script src="assets/vendor/clipboard/dist/clipboard.min.js"></script>

    <!-- JS Nova -->
    <script src="assets/js/hs.core.js"></script>
    <script src="assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="assets/js/components/hs.side-nav.js"></script>
    <script src="assets/js/components/hs.unfold.js"></script>
    <script src="assets/js/components/hs.flatpickr.js"></script>
    <script src="assets/js/components/hs.header-search.js"></script>
    <script src="assets/js/components/hs.select2.js"></script>
    <script src="assets/js/components/hs.chartist-area.js"></script>
    <script src="assets/js/components/hs.chartist-bar.js"></script>
    <script src="assets/js/components/hs.chartist-donut.js"></script>
    <script src="assets/js/components/hs.visavail-timeline.js"></script>
    <script src="assets/js/components/hs.clipboard.js"></script>

    <!-- JS Libraries Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of custom scroll
            $.HSCore.components.HSMalihuScrollBar.init($('.js-custom-scroll'));

            // initialization of sidebar navigation component
            $.HSCore.components.HSSideNav.init('.js-side-nav');

            // initialization of dropdown component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                unfoldHideOnScroll: false,
                afterOpen: function() {
                    // initialization of charts
                    $.HSCore.components.HSChartistBar.init('#activity .js-bar-chart');

                    setTimeout(function() {
                        $('#activity .js-bar-chart').css('opacity', 1);
                    }, 100);

                    // help function for accordions in hidden block
                    $('#headerProjects .accordion-header').on('click', function() {
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

            // initialization of show on type modole
            $.HSCore.components.HSHeaderSearch.init('.js-header-search');

            // initialization of show on type modole
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