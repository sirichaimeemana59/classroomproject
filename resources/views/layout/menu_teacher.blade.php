<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/teacher/list_subject') !!}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">{!! trans('messages.subjects.list_subjects') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/admin/student') !!}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">{!! trans('messages.student.list_student') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/teacher/approval_of_registration') !!}">
                <i class="mdi mdi-check-circle menu-icon"></i>
                <span class="menu-title">{!! trans('messages.Approval_of_registration') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/teacher/examination') !!}">
                <i class="mdi mdi-book-open menu-icon"></i>
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