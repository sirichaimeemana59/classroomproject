<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/student/list_subject') !!}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">{!! trans('messages.Register_courses') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/admin/student') !!}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">{!! trans('messages.student.friend') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/student/class_schedule') !!}">
                <i class="mdi mdi-projector-screen menu-icon"></i>
                <span class="menu-title">{!! trans('messages.class_schedule') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/student/test/examination') !!}">
                <i class="mdi mdi-grease-pencil menu-icon"></i>
                <span class="menu-title">{!! trans('messages.examination.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>