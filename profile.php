<?php       
    require 'access.php';
    
    session_start();        
    $conn = mysqli_connect($server, $username, $password, $database);

    if (!isset($_SESSION['username']))
    {
        header('location: login.php');
        exit;
    }
    
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

    $temp = mysql_query("SELECT * FROM pilihanprodi WHERE userid = '$username' ");
    $myArray = mysql_fetch_array($temp);
    $prodireg1 = $myArray['prodireg1']; 
    $prodireg2 = $myArray['prodireg2']; 
    $prodireg3 = $myArray['prodireg3']; 
    $prodipar1 = $myArray['prodipar1']; 
    $prodipar2 = $myArray['prodipar2']; 
    $prodipar3 = $myArray['prodipar3']; 
    $prodivok1 = $myArray['prodivok1']; 
    $prodivok2 = $myArray['prodivok2']; 
    $prodivok3 = $myArray['prodivok3']; 

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
        
    $prodi1 = "Ilmu Komputer - Reguler";
    $prodi2 = "Teknik Kimia - Reguler";
    $prodi3 = "Teknik Elektro - Reguler";   
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

    function prodi_display($prodi) {
        if ($prodi == "") {
            return "<em>Anda belum memilih</em>";
        }
        else {
            return $prodi;
        } 
    }
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
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    
    <?php require 'header.php' ?>

    <main class="main">
        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="row">
                    <div class="col-xl-5 mb-xl-5">

                    <div class="col-xl-12 mb-xl-6">
                        <div class="card">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Data Siswa</h5>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-xl-6">Username</div>
                                    <div class="col-xl-4"><strong><?php echo $username; ?></strong></div>

                                    <div class="col-xl-6">Nama</div>
                                    <div class="col-xl-6"><strong><?php echo $fullName; ?> </strong></div>

                                    <div class="col-xl-6">Sekolah</div>
                                    <div class="col-xl-6"><strong><?php echo $school; ?></strong></div>

                                    <div class="col-xl-6">Kelas</div>
                                    <div class="col-xl-6"><strong><?php echo $class; ?></strong></div>

                                    <div class="col-xl-6">NIS</div>
                                    <div class="col-xl-6"><strong><?php echo $nis; ?></strong></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mb-xl-12">
                        <div class="card">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Pilihan Prodi</h5>
                                <a href="course-selection.php" class="btn btn-sm btn-primary right ml-auto"><span class="nova-pencil"></span>&nbsp; Ubah Pilihan Prodi</a>
                            </div>

                            <div class="card-body p-3 mb-0">
                                <div id="accordion4">
                                    <div class="accordion accordion-bordered accordion-rounded mb-2">
                                        <header id="heading10" class="accordion-header" aria-expanded="true" aria-controls="collapse10" data-toggle="collapse" data-target="#collapse10">
                                            <h5 class="mb-0">PROGRAM REGULER</h5>
                                            <i class="accordion-control nova-angle-down icon-text ml-auto"></i>
                                        </header>

                                        <div id="collapse10" class="collapse show" aria-labelledby="heading10" data-parent="#accordion4" style="">
                                            <div class="accordion-body">
                                                <ol>
                                                    <li><?php  echo prodi_display($prodireg1);?></li>
                                                    <li><?php  echo prodi_display($prodireg2);?></li>
                                                    <li><?php  echo prodi_display($prodireg3);?></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion accordion-bordered accordion-rounded mb-2">
                                        <header id="heading11" class="accordion-header collapsed" aria-expanded="false" aria-controls="collapse11" data-toggle="collapse" data-target="#collapse11">
                                            <h5 class="mb-0">PROGRAM PARALEL</h5>
                                            <i class="accordion-control nova-angle-down icon-text ml-auto"></i>
                                        </header>

                                        <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion4">
                                            <div class="accordion-body">
                                                <ol>
                                                    <li><?php  echo prodi_display($prodipar1);?></li>
                                                    <li><?php  echo prodi_display($prodipar2);?></li>
                                                    <li><?php  echo prodi_display($prodipar3);?></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion accordion-bordered accordion-rounded">
                                        <header id="heading12" class="accordion-header collapsed" aria-expanded="false" aria-controls="collapse12" data-toggle="collapse" data-target="#collapse12">
                                            <h5 class="mb-0">PROGRAM VOKASI</h5>
                                            <i class="accordion-control nova-angle-down icon-text ml-auto"></i>
                                        </header>

                                        <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion4">
                                            <div class="accordion-body">
                                               <ol>
                                                    <li><?php  echo prodi_display($prodivok1);?></li>
                                                    <li><?php  echo prodi_display($prodivok2);?></li>
                                                    <li><?php  echo prodi_display($prodivok3);?></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="col-xl-7 mb-3 mb-xl-7">

                    <div class="col-xl-12 mb-3 mb-xl-12">
                        <div class="card mb-3 mb-md-4">
                            <div class="card-header border-bottom d-flex align-items-center">
                                <h5 class="font-weight-semi-bold mb-0"><span class="nova-id-badge"></span>&nbsp;&nbsp;Hasil</h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive-xl">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                            <th class="text-left">Prodi Pilihan</th>
                                            <th class="text-left">NN Prodi</th>     
                                            <th class="text-left">NN Siswa</th>     
                                            <th class="text-left">NN Hasil</th>     
                                            </tr>
                                            </thead>
                                            
                                            <tbody class="table-hover">
                                            
                                            <tr>
                                            <td class="text-left"> <?php echo $prodi1 ?> </td>
                                            <td class="text-left"><?php echo $nn_prodi1 ?> </td>
                                            <td class="text-left"><?php echo $nilai_nasional?> </td>
                                            <td class="text-left"><?php echo $keputusan1?> </td>
                                            </tr>
                                            
                                            <tr>
                                            <td class="text-left"> <?php echo $prodi2 ?> </td>
                                            <td class="text-left"><?php echo $nn_prodi2 ?> </td>
                                            <td class="text-left"><?php echo $nilai_nasional?> </td>
                                            <td class="text-left"><?php echo $keputusan2?> </td>
                                            </tr>
                                            
                                            <tr>
                                            <td class="text-left"> <?php echo $prodi3 ?> </td>
                                            <td class="text-left"><?php echo $nn_prodi3 ?> </td>
                                            <td class="text-left"><?php echo $nilai_nasional?> </td>
                                            <td class="text-left"><?php echo $keputusan3?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="evaluation.php" class="btn btn-sm btn-primary">Lihat Selengkapnya</a>
                            </div>
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

    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- JS Implementing Libraries -->
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/vendor/select2/dist/js/select2.full.min.js"></script>
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