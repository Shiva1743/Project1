<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                @if(Session::get('SessionData.userRole') == '0')
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <!-- <span class="badge rounded-pill bg-info float-end">04</span> -->
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <!-- <span class="badge rounded-pill bg-info float-end">04</span> -->
                        <span key="t-dashboards">Student Dashboards</span>
                    </a>
                </li>
                @endif
                @if(Session::get('SessionData.userRole') == '0')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Create Subjects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('SubjectList')}}" key="t-task-list">Subject List</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="true">
                    </ul>
                </li>

                <!-- <li class="menu-title" key="t-apps">Apps</li> -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-task"></i>
                        <span key="t-tasks">Create Tests</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('TestList')}}" key="t-task-list">Test List</a></li>
                    </ul>
                </li>
                @endif
                @if(Session::get('SessionData.userRole') == '1')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Your Task</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('SubjectListS')}}" key="t-user-grid">Subjects</a></li>
                    </ul>
                </li>
                @endif

                @if(session()->has('SessionData'))
                    @if(Session::get('SessionData.userRole') == '1')
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                            <i class="bx bx-detail"></i>
                            <span key="t-blog">Your Score</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('result')}}" key="t-blog-list">Result</a></li>
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->