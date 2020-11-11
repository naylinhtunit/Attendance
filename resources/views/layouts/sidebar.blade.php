<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">yathar <span class="badge badge-danger">HR</span></span>
        </a>

        <ul class="sidebar-nav">
            
            <li @if(Request::is('/')) class="sidebar-item active" @endif>
                <a class="sidebar-link" href="{{ url('/') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li> 

            <li 
                @if(
                    Request::is('company', 'department', 'role', 'holiday', 'leave_type', 'leave', 'attendance')
                    ) 
                    class="sidebar-item active" 
                @endif
            >
                <a data-target="#systems" data-toggle="collapse"
                    @if(
                        Request::is('company', 'department', 'role', 'holiday', 'leave_type', 'leave', 'attendance')
                        ) 
                        class="sidebar-link" 
                    @else
                    class="sidebar-link collapsed"
                    @endif
                >
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">System Management</span>
                </a>
                <ul id="systems"
                    @if(
                        Request::is('company', 'department', 'role', 'holiday', 'leave_type', 'leave', 'attendance')
                        ) 
                        class="sidebar-dropdown list-unstyled collapse show" 
                    @else
                    class="sidebar-dropdown list-unstyled collapse"
                    @endif
                    data-parent="#sidebar">
                    <li @if(Request::is('company')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/company') }}">
                            <span class="align-middle">Company</span>
                        </a>
                    </li>

                    <li @if(Request::is('department')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/department') }}">
                            <span class="align-middle">Department</span>
                        </a>
                    </li>

                    <li @if(Request::is('role')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/role') }}">
                            <span class="align-middle">Role</span>
                        </a>
                    </li>

                    <li @if(Request::is('holiday')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/holiday') }}">
                            <span class="align-middle">Public Holidays</span>
                        </a>
                    </li>

                    <li @if(Request::is('leave_type')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/leave_type') }}">
                            <span class="align-middle">Leave Type</span>
                        </a>
                    </li>

                    <li @if(Request::is('leave')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/leave') }}">
                            <span class="align-middle">Leave</span>
                        </a>
                    </li>

                    <li @if(Request::is('attendance')) class="sidebar-item active" @endif>
                        <a class="sidebar-link" href="{{ url('/attendance') }}">
                            <span class="align-middle">Attendance</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li @if(Request::is('employee')) class="sidebar-item active" @endif>
                <a class="sidebar-link" href="{{ url('/employee') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Employee</span>
                </a>
            </li>
        </ul>
    </div>
</nav>