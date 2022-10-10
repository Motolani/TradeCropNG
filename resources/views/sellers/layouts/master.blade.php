<!DOCTYPE html>
    <html lang="en">

        <head>
            @include('sellers.layouts.head')
        </head>

    <body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                   
                    @include('sellers.layouts.header')
                    <!-- Start Content-->
                    <div class="container-fluid">
        
                        @yield('content')
                         <!-- start page title -->
                    
                    </div>    
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    @include('sellers.layouts.footer')
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout width, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                            id="light-mode-check" checked />
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                            id="dark-mode-check" />
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked />
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check" />
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>


                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-sellers-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="{{asset('assets1/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets1/js/app.min.js')}}"></script>

        <!-- third party js -->
        <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
        <script src="{{asset('assets1/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{asset('assets1/js/pages/demo.dashboard-analytics.js')}}"></script>
        <!-- end demo js-->

        <!-- third party js -->
        <script src="{{asset('assets1/js/vendor/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('assets1/js/vendor/dataTables.select.min.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{asset('assets1/js/pages/demo.datatable-init.js')}}"></script>
    </body>
</html>