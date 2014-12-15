<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from aqvatarius.com/themes/atlant/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Oct 2014 03:28:20 GMT -->
<head>
      @include('layouts.head')
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            @include('layouts.sidebar')

            <!-- PAGE CONTENT -->
            <div class="page-content">

                @include('layouts.navigation')
				@include('layouts.breadcrumb')
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                   @yield('content')
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        @include('layouts.messagebox')

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        {{HTML::script('js/plugins/jquery/jquery.min.js');}}
        {{HTML::script('js/plugins/jquery/jquery-ui.min.js');}}
        {{HTML::script('js/plugins/bootstrap/bootstrap.min.js');}}

        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        {{HTML::script('js/plugins/icheck/icheck.min.js');}}
        {{HTML::script('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');}}
        {{HTML::script('js/plugins/scrolltotop/scrolltopcontrol.js');}}

        {{HTML::script('js/plugins/morris/raphael-min.js');}}
        {{HTML::script('js/plugins/morris/morris.min.js');}}
        {{HTML::script('js/plugins/rickshaw/d3.v3.js');}}
        <!-- {{HTML::script('js/plugins/rickshaw/rickshaw.min.js');}} -->
        {{HTML::script('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');}}
        {{HTML::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');}}
        {{HTML::script('js/plugins/bootstrap/bootstrap-datepicker.js');}}
        {{HTML::script('js/plugins/owl/owl.carousel.min.js');}}
        {{HTML::script('js/plugins/bootstrap/bootstrap-select.js');}}

        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        {{HTML::script('js/ixepms.js');}}
        <!-- {{HTML::script('js/settings.js');}} -->
        {{HTML::script('js/plugins.js');}}
        {{HTML::script('js/actions.js');}}
        {{HTML::script('js/demo_dashboard.js');}}
        <!-- END TEMPLATE -->
        <!--START DATA TABLE TEMPLATES PLUGIN-->
        {{HTML::script('js/plugins/datatables/jquery.dataTables.min.js')}}
        <!--END DATA TABLE TEMPLATES PLUGIN-->
        @yield('script')
        @yield('department_script')

    <!-- END SCRIPTS -->
    </body>

<!-- Mirrored from aqvatarius.com/themes/atlant/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Oct 2014 03:33:38 GMT -->
</html>






