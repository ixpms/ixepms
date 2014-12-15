<!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    @include('layouts.profile')
                    <li class="xn-title">Navigation</li>
		              <li class="xn-openable">
                        <a href="javascript:;"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
                        <ul>

                           <!-- <li><a href="{{{URL::to('task/dash',1)}}}"><span class="fa fa-desktop"></span> <span class="xn-text">General Dashboard</span></a></li> -->

                           <li><a href="{{{URL::to('task/dash',2)}}}"><span class="fa fa-desktop"></span> <span class="xn-text">General Dashboard</span></a></li>
                           <li><a href="{{{URL::to('task/dash',3)}}}"><span class="fa fa-desktop"></span> <span class="xn-text">My Dashboard</span></a></li>
                        </ul>
                        </li>
                        <li>
                        <a href="{{{route('user.index')}}}"><span class="fa fa-users"></span> <span class="xn-text"> Manage Users</span></a>
                        </li>
                         <li class="xn-openable">
                            <a href=""><span class="fa fa-files-o"></span> <span class="xn-text">Assessment</span></a>

                                <ul>
                                        <li><a href="{{ route('assessment.index') }}"><span class="fa fa-file"></span> <span class="xn-text">Do My Assessment</span></a></li>
                                        <li><a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Peer Assessment</span></a></li>
                                        <li><a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Supervisorial Assessment</span></a></li>

                                </ul>
                        </li>
                        <li>
                            <a href="{{{route('behavioralsub.index')}}}"><span class="fa fa-folder-open"></span> <span class="xn-text">Manage Assessments</span></a>
                        </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->