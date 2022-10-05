<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/home') ? 'active' : '' }}" href="{{ route('home') }}">Admin Dashboard</a></li>
                        {{-- <li><a href="{{ route('dashboard_employ') }}">Employee Dashboard</a></li> --}}
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Employees</span>
                </li>
                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/employees') ? 'active' : '' }}" href="{{ route('employees') }}">All Employees</a></li>
                        <li><a class="{{ Request::url() == url('/holidays') ? 'active' : '' }}" href="{{ route('dtholidays') }}">Holidays</a></li>
                        <li><a class="{{ Request::url() == url('/leaves-admin') ? 'active' : '' }}" href="{{ route('leaves.admin') }}">Leaves (Admin) 
                        <li><a class="{{ Request::url() == url('/leaves') ? 'active' : '' }}" href="{{ route('leaves') }}">Leaves (Employee)</a></li>
                        {{-- <li><a class="{{ Request::url() == url('/leave-settings') ? 'active' : '' }}" href="{{ route('l.setting') }}">Leave Settings</a></li> --}}
                        {{-- <li><a href="{{ route('dtabsen') }}">Attendance (Admin)</a></li> --}}
                        <li><a class="{{ Request::url() == url('/attendance') ? 'active' : '' }}" href="{{ route('attendance') }}">Attendance (Employee)</a></li>
                        <li><a class="{{ Request::url() == url('/departments') ? 'active' : '' }}" href="{{ route('dtDepartment') }}">Departments</a></li>
                        <li><a class="{{ Request::url() == url('/designations') ? 'active' : '' }}" href="{{ route('dtdesignation') }}">Designations</a></li>
                        <li><a class="{{ Request::url() == url('/timesheet') ? 'active' : '' }}" href="{{ route('timesheet') }}">Timesheet</a></li>
                        <li><a class="{{ Request::url() == url('/shift-scheduling') ? 'active' : '' }}" href="{{ route('schedule') }}">Shift & Schedule</a></li>
                        <li><a class="{{ Request::url() == url('/overtime') ? 'active' : '' }}" href="{{ route('overtime') }}">Overtime</a></li>
                    </ul>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/clients') ? 'active' : '' }}" href="{{ route('dtclients') }}"><i class="la la-users"></i> <span>Clients</span></a>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/projects') ? 'active' : '' }}" href="{{ route('dtProjects') }}"><i class="la la-rocket"></i><span>Projects</span> </a>
                </li>
                        
                {{-- <li class="submenu">
                    <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/projects') ? 'active' : '' }}" href="{{ route('dtProjects') }}">Projects</a></li>
                        <li><a href="{{ route('task') }}">Tasks</a></li>
                        <li><a href="{{ route('taskboard') }}">Task Board</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="leads.html"><i class="la la-user-secret"></i> <span>Leads</span></a>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/ticket') ? 'active' : '' }}" href="{{ route('ticket') }}"><i class="la la-ticket"></i> <span>Tickets</span></a>
                </li>
                <li class="menu-title">
                    <span>HR</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-files-o"></i> <span> Sales </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/estimates') ? 'active' : '' }}" href="{{route('dtEstimate')}}">Estimates</a></li>
                        <li><a class="{{ Request::url() == url('/invoices') ? 'active' : '' }}" href="{{route('dtInvoices')}}">Invoices</a></li>
                        {{-- <li><a href="payments.html">Payments</a></li> --}}
                        <li><a class="{{ Request::url() == url('/expenses') ? 'active' : '' }}" href="{{route('dtExpense')}}">Expenses</a></li>
                        <li><a class="{{ Request::url() == url('/providentFund') ? 'active' : '' }}" href="{{ route('dtProvident') }}">Provident Fund</a></li>
                        <li><a class="{{ Request::url() == url('/taxes') ? 'active' : '' }}" href="{{ route('dtTaxes') }}">Taxes</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/categories') ? 'active' : '' }}" href="{{ route('dtCategories') }}">Categories</a></li>
                        <li><a class="{{ Request::url() == url('/budgets') ? 'active' : '' }}" href="{{ route('dtBudgets') }}">Budgets</a></li>
                        <li><a class="{{ Request::url() == url('/budget-expenses') ? 'active' : '' }}" href="{{ route('dtexpenses') }}">Budget Expenses</a></li>
                        <li><a class="{{ Request::url() == url('/revenues') ? 'active' : '' }}" href="{{ route('dtrevenues') }}">Budget Revenues</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/salary') ? 'active' : '' }}" href="{{ route('employee.salary') }}"> Employee Salary </a></li>
                        <li><a class="{{ Request::url() == url('/payroll-items') ? 'active' : '' }}" href="{{ route('p_type') }}"> Payroll Items </a></li>
                    </ul>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/policies') ? 'active' : '' }}" href="{{ route('policies') }}"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/expenses-reports') ? 'active' : '' }}" href="{{route('expenses-reports')}}"> Expense Report </a></li>
                        <li><a class="{{ Request::url() == url('/invoices-reports') ? 'active' : '' }}" href="{{route('Invoices-reports')}}"> Invoice Report </a></li>
                        {{-- <li><a href="payments-reports.html"> Payments Report </a></li> --}}
                        {{-- <li><a href="project-reports.html"> Project Report </a></li> --}}
                        {{-- <li><a href="task-reports.html"> Task Report </a></li> --}}
                        <li><a class="{{ Request::url() == url('/user-reports') ? 'active' : '' }}" href="{{route('user-reports')}}"> User Report </a></li>
                        <li><a class="{{ Request::url() == url('/employee-reports') ? 'active' : '' }}" href="{{route('employee-reports')}}"> Employee Report </a></li>
                        <li><a class="{{ Request::url() == url('/payslip-reports') ? 'active' : '' }}" href="{{route('payslip-reports')}}"> Payslip Report </a></li>
                        {{-- <li><a href="attendance-reports.html"> Attendance Report </a></li> --}}
                        {{-- <li><a class="{{ Request::url() == url('/leave-reports') ? 'active' : '' }}" href="{{route('leave-reports')}}"> Leave Report </a></li> --}}
                        {{-- <li><a href="daily-reports.html"> Daily Report </a></li> --}}
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Performance</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/performance-indicator') ? 'active' : '' }}" href="{{route('performindi')}}"> Performance Indicator </a></li>
                        {{-- <li><a href="performance.html"> Performance Review </a></li> --}}
                        <li><a class="{{ Request::url() == url('/performance-appraisal') ? 'active' : '' }}" href="{{route('performapp')}}"> Performance Appraisal </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/goal') ? 'active' : '' }}" href="{{ route('goal') }}"> Goal List </a></li>
                        <li><a class="{{ Request::url() == url('/goaltype') ? 'active' : '' }}" href="{{ route('goaltype') }}"> Goal Type </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-edit"></i> <span> Training </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ Request::url() == url('/training') ? 'active' : '' }}" href="{{ route('training') }}"> Training List </a></li>
                        <li><a class="{{ Request::url() == url('/trainer') ? 'active' : '' }}" href="{{ route('trainer') }}"> Trainers</a></li>
                        <li><a class="{{ Request::url() == url('/trainingtype') ? 'active' : '' }}" href="{{ route('trainingtype') }}"> Training Type </a></li>
                    </ul>
                </li>
                {{-- <li><a href="promotion.html"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li> --}}
                <li><a class="{{ Request::url() == url('/resignation') ? 'active' : '' }}" href="{{ route('resignation') }}"><i class="la la-external-link-square"></i> <span>Resignation</span></a>
                </li>
                <li><a class="{{ Request::url() == url('/terminations') ? 'active' : '' }}" href="{{ route('termination') }}"><i class="la la-times-circle"></i> <span>Termination</span></a></li>
                <li class="menu-title">
                    <span>Administration</span>
                </li>
                <li>
                    <a class="{{ Request::url() == url('/dataAssets') ? 'active' : '' }}" href="{{ route('dataAssets') }}"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        {{-- <li><a class="{{ Request::url() == url('/user-dashboard') ? 'active' : '' }}" href="{{ route('user-dashboard')}}"> User Dasboard </a></li> --}}
                        <li><a class="{{ Request::url() == url('/user-dashboard-jobs') ? 'active' : '' }}" href="{{ route('user-dashboard-jobs')}}"> Jobs Dasboard </a></li>
                        <li><a class="{{ Request::url() == url('/manage-jobs') ? 'active' : '' }}" href="{{ route('manage_jobs')}}"> Manage Jobs </a></li>
                        <li><a class="{{ Request::url() == url('/manage-resume') ? 'active' : '' }}" href="{{ route('manage-resume')}}"> Manage Resumes </a></li>
                        <li><a class="{{ Request::url() == url('/shortlist-candidate') ? 'active' : '' }}" href="{{ route('shortlist-candidate')}}"> Shortlist Candidates </a></li>
                        <li><a class="{{ Request::url() == url('/interview-questions') ? 'active' : '' }}" href="{{ route('interquest') }}"> Interview Questions </a></li>
                        <li><a class="{{ Request::url() == url('/offer-approval') ? 'active' : '' }}" href="{{route('offer-approval')}}"> Offer Approvals </a></li>
                        <li><a class="{{ Request::url() == url('/experience') ? 'active' : '' }}" href="{{ route('experience') }}"> Experience Level </a></li>
                        <li><a class="{{ Request::url() == url('/candidate') ? 'active' : '' }}" href="{{ route('candidate') }}"> Candidates List </a></li>
                        {{-- <li><a href="schedule-timing.html"> Schedule timing </a></li> --}}
                        {{-- <li><a href="apptitude-result.html"> Aptitude Results </a></li> --}}
                    </ul>
                </li>
                <li>
                    {{-- <a href="knowledgebase.html"><i class="la la-question"></i> <span>Knowledgebase</span></a> --}}
                </li>
                <li>
                    {{-- <a href="activities.html"><i class="la la-bell"></i> <span>Activities</span></a> --}}
                </li>
                <li>
                    <a class="{{ Request::url() == url('/users') ? 'active' : '' }}" href="{{route('users')}}"><i class="la la-user-plus"></i> <span>Users</span></a>
                </li>
                <li>
                    {{-- <a href="settings.html"><i class="la la-cog"></i> <span>Settings</span></a> --}}
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
