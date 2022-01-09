<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
    <a href="{{ url('/dashboard') }}">
        <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
        </div>
        <div class="clearfix"></div>
    </a>
</li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Menu </li>

                    <!-- semestres-->
                    @can('semestres')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">Semestres</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('semestres.index')}}">Semestres_list</a></li>

                        </ul>
                    </li>
                    @endcan


               


                    <!-- students-->
                    @can('students')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                                    class="right-nav-text">students</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                            
                            <li> <a href="{{route('Students.index')}}">list_students</a> </li>
                           
                        </ul>
                    </li>
                    @endcan



                    <!-- Teachers-->
                    @can('teachers')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                    class="right-nav-text">Teachers</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Teachers.index')}}">List_teachers</a> </li>
                           
                        </ul>
                    </li>
                    @endcan


               

                    <!-- Subjects-->
                    @can('subject')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">Subjects</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subjects.index')}}">List_Subjects</a> </li>
                        </ul>
                    </li>
                    @endcan

                 
                 


                    <!-- quizzes-->
                    @can('quizzes')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">quizzes</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Quizzes.index')}}">quizzes_list</a> </li>
                              <li >
                           

                            <li >
                               <a href="{{ route('results.index') }}">
                                 <i class="fa fa-gears"></i>
                                  <span class="title">results</span>
                                    </a>
                             </li>

                              @can('add_quizze')
                              <li >
                               <a href="{{ route('topics.index') }}">
                              <i class="fa fa-gears"></i>
                               <span class="title">topics</span>
                                </a>
                               </li>

                               <li >
                            <a href="{{ route('questions.index') }}">
                             <i class="fa fa-gears"></i>
                              <span class="title">questions</span>
                             </a>
                            </li>
                              <li >
                           <a href="{{ route('questions_options.index') }}">
                           <i class="fa fa-gears"></i>
                          <span class="title">questions-options</span>
                          </a>
                           </li>
                           @endcan

                           </ul>
                         </li>
                         @endcan
                

                   
            
             

   

                    
            


               


                    <!-- Users-->
                    @can('users')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">Users</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('/' . ($page = 'users')) }}">List_users</a> </li>
                            <li> <a href="{{ url('/' . ($page = 'roles')) }}">users_roles</a> </li>
                            
                        </ul>
                    </li>
                    @endcan

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
