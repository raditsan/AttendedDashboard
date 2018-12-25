
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="@if (\Request::is('home','/')) active @endif"><a href="/home"><i class="fa fa-sticky-note-o"></i> <span>Report</span></a></li>
        <li class="treeview @if (\Request::is('employee_data','attended_master')) active @endif">
            <a href="#">
                <i class="fa fa-hdd-o"></i> <span>Master Data</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
                <li class="@if (\Request::is('employee_data')) active @endif"><a href="{{route('EmployeeData')}}">Employee Data</a></li>
                <li class="@if (\Request::is('attended_master')) active @endif"><a href="{{route('AttendedMaster')}}">Attended Master</a></li>
            </ul>
        </li>
    </ul>