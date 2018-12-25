
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="@if (\Request::is('index','/')) active @endif"><a href="/index"><i class="fa fa-laptop"></i> <span>Attended</span></a></li>
    <li class="treeview @if (\Request::is('attended_data')) active @endif">
        <a href="#">
            <i class="fa fa-folder"></i> <span>Master Data</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li class="@if (\Request::is('attended_data')) active @endif"><a href="{{route('AttendedData')}}">Attended Data</a></li>
        </ul>
    </li>
</ul>