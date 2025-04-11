<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Dashboard | T-Shirt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- CSS -->
  <?php
  require_once "layouts/libs_css.php";
  ?>

</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <!-- HEADER -->
    <?php
    require_once "layouts/header.php";

    require_once "layouts/siderbar.php";
    ?>

    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <div class="row">
            <div class="col">

              <div class="h-100">
                <div class="row mb-3 pb-1">
                  <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                      <div class="flex-grow-1">
                        <h4 class="fs-16 mb-1">Good Morning, Shark!</h4>
                        <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                      </div>
                      <div class="mt-3 mt-lg-0">
                        <form action="javascript:void(0);">
                          <div class="row g-3 mb-0 align-items-center">
                           
                            <!--end col-->
                            <div class="col-auto">
                              <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                            </div>
                            <!--end col-->
                          </div>
                          <!--end row-->
                        </form>
                      </div>
                    </div><!-- end card header -->
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
<div class="row">
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Doanh Thu</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $revenue['revenue']; ?>"></span>k </h4>
                        <a href="" class="text-decoration-underline">Xem chi tiết</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-success-subtle rounded fs-3">
                            <i class="bx bx-dollar-circle text-success"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-danger fs-14 mb-0">
                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $totalDH['completed_orders']; ?>"></span></h4>
                        <a href="?act=don-hangs" class="text-decoration-underline">Xem chi tiết</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-info-subtle rounded fs-3">
                            <i class="bx bx-shopping-bag text-info"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Người Dùng</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $totalUser['total_users']; ?>"></span></h4>
                        <a href="?act=nguoi-dungs" class="text-decoration-underline">Xem chi tiết</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                            <i class="bx bx-user-circle text-warning"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Lợi nhuận</p>
                </div>
                <div class="flex-shrink-0">
                    <h5 class="text-success fs-14 mb-0">
                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                    </h5>
                </div>
            </div>
            <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $revenue['revenue']; ?>"></span>k </h4>
                    <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                </div>
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-success-subtle rounded fs-3">
                        <i class="bx bx-dollar-circle text-success"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Repeat similar block for total orders, users, and profit 
 <?php
// Example function to fetch revenue data
function getRevenueData() {
    // This should be replaced with your actual database query
    // For demonstration, we'll create dummy data
    return [
        'months' => ['August', 'Sep', 'Oct', 'Nov', 'Dec'],
        'revenues' => [1000, 1500, 2000, 2500, 3000]
    ];
}

// Fetch the revenue data
$data = getRevenueData();
$bieudoArray = json_encode($data['revenues']); // Revenue data for the chart
$bieudoArrayMoth = json_encode($data['months']); // Month names for the chart
?>
 
 Chart Section -->
 <div class="card-body p-0 pb-2">
    <div class="w-100">
        <div id="bieu-do" class="apex-charts" dir="ltr"></div>
        <script>
            var options = {
                series: [{
                    name: "Lợi nhuận",
                    data: <?= $bieudoArray ?> // Revenue data
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: { enabled: false }
                },
                dataLabels: { enabled: false },
                stroke: { width: [5], curve: 'smooth' },
                title: { text: 'Lợi Nhuận Theo Tháng', align: 'left' },
                xaxis: { categories: <?= $bieudoArrayMoth ?> }, // Month names
                tooltip: { shared: true, intersect: false },
                grid: { borderColor: '#f1f1f1' }
            };

            var chart = new ApexCharts(document.querySelector("#bieu-do"), options);
            chart.render();
        </script>
    </div>
</div>
                      </div><!-- end card body -->
                    </div><!-- end card -->
                  </div><!-- end col -->

                  <!-- end col -->
                </div>


                <div class="row">
                  <div class="col-xl-4">
                    <div class="card card-height-100">
                      <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh mục sản phẩm</h4>
                        <div class="flex-shrink-0">
                          <div class="dropdown card-header-dropdown">
<a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#">Download Report</a>
                              <a class="dropdown-item" href="#">Export</a>
                              <a class="dropdown-item" href="#">Import</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- end card header -->

                      <div class="card-body">
                        <div id="bieu-do-tron" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' data-colors-minimal='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]' data-colors-interactive='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]' data-colors-galaxy='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]' class="apex-charts" dir="ltr"></div>
                        <script>
                          var options = {
                            series: <?= $Dmsp2 ?>,
                            chart: {
                              width: 380,
                              type: 'pie',
                            },
                            labels: <?= $Dmsp1 ?>,
                            responsive: [{
                              breakpoint: 480,
                              options: {
                                chart: {
                                  width: 200
                                },
                                legend: {
                                  position: 'bottom'
                                }
                              }
                            }]
                          };

                          var chart = new ApexCharts(document.querySelector("#bieu-do-tron"), options);
                          chart.render();
                        </script>
                      </div>
                    </div> <!-- .card-->
                  </div> <!-- .col-->

                 

                    
                           
                          </table><!-- end table -->
                        </div>
                      </div>
                    </div> <!-- .card-->
                  </div> <!-- .col-->
                </div> <!-- end row-->

              </div> <!-- end .h-100-->

            </div> <!-- end col -->
          </div>

        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
<div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © Velzon.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-end d-none d-sm-block">
                Design & Develop by Themesbrand
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->



  <!--start back-to-top-->
  <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
  </button>
  <!--end back-to-top-->

  <!--preloader-->
  <div id="preloader">
    <div id="status">
      <div class="spinner-border text-primary avatar-sm" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>

  <div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
      <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <?php
  require_once "layouts/libs_js.php";
  ?>

</body>

</html>