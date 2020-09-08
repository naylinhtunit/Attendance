<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">{{ config('app.name', 'Attendance') }}</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/company') }}">
                    <i class="fa fa-building-o" aria-hidden="true"></i> <span class="align-middle">Company</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/department') }}">
                    <i class="fa fa-building-o" aria-hidden="true"></i> <span class="align-middle">Department</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/role') }}">
                    <i class="fa fa-user" aria-hidden="true"></i> <span class="align-middle">Role</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/employee') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span class="align-middle">Employee</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/holiday') }}">
                    <i class="fa fa-gift" aria-hidden="true"></i> <span class="align-middle">Public Holidays</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/leave_type') }}">
                    <i class="fa fa-pagelines" aria-hidden="true"></i> <span class="align-middle">Leave Type</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/leave') }}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> <span class="align-middle">Leave</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/attendance') }}">
                    <i class="fa fa-clock-o" aria-hidden="true"></i> <span class="align-middle">Attendance</span>
                </a>
            </li>
        </ul>
    </div>
</nav>