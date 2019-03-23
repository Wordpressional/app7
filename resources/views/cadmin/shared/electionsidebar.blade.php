<!-- sidebar.blade.php -->

<aside class="main-sidebar">
    <section class="sidebar">    
        
        <ul class="sidebar-menu" data-widget="tree">

             <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollingDashboard">
        <a class="nav-link {{ Request::is('cadmin/dashboard') ? 'active' : '' }}" href="{{ route('cadmin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">Polling Dashboard</span>
            </a>
        </li>
        @role(['elec_returningofficer', 'elec_presidingofficer' , 'elec_asistantreturningofficer'] )
         <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PrePoll">
        <a class="nav-link push-right {{ Request::is('cadmin/showpollingform') ? 'active' : '' }}" href="{{ route('cadmin.polling.showpollingform') }}" data-transition="fade">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">Pre Poll</span>
            </a>
        </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i> <span>During Poll</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
      <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="StartPolling">
        <a class="nav-link {{ Request::is('cadmin/showpollingstarted') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.showpollingstarted') }}">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Start Polling</span>
        </a>
    </li>
              

     <li class="nav-item pollingdata" role="presentation" data-toggle="tooltip" data-placement="right" title="PollingDataEntry-2Hourly">
        <a class="nav-link {{ Request::is('cadmin/showpollingdataperhr') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.showpollingdataperhr') }}">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Polling Data Entry - 2Hourly</span>
        </a>
    </li>

    <li class="nav-item pollingdata" role="presentation" data-toggle="tooltip" data-placement="right" title="PollingExceptionEntry">
        <a class="nav-link {{ Request::is('cadmin/showpollingexceptiondata') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.showpollingexceptiondata') }}">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">Polling Exception Entry</span>
        </a>
    </li>

       </ul>
            </li>

        <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="AfterPoll">
        <a class="nav-link {{ Request::is('cadmin/showpollingvoterdata') ? 'active' : '' }}" href="{{ route('cadmin.polling.showpollingvoterdata') }}">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">After Poll</span>
            </a>
        </li>
         @endrole
         <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Profile">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="{{ route('cadmin.ec.profile') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Profile</span>
                    </a>
                </li>

         @role( 'elec_asistantreturningofficer' )
         <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Profile">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.displayerousers')}}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">RO Logins</span>
                    </a>
                </li>    
         @endrole    

         @role( 'elec_bootlevelofficer' )
         <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Profile">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.materialslist')}}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Materials List</span>
                    </a>
                </li> 
         @endrole
       @role(['elec_superadmin'] )
       <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                    

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="MailConfiguration">
                    <a class="nav-link {{ Request::is('cadmin/styles') || Request::is('cadmin/styles/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Mail Configuration</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="SMSConfiguration">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">SMS Configuration</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="MyAccount">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.accountsettings')}}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">My Account</span>
                    </a>
                </li>

                
               
            
        </ul>
    </li>
       @endrole
         @role(['elec_returningofficer', 'elec_presidingofficer', 'elec_asistantreturningofficer', 'elec_bootlevelofficer'] )
        <li> 
        @if(session('user_is_switched'))
        
        <a style="color:#ffffff;" href="{{ route('cadmin.user.elerestore') }}"><i class="fa fa-undo"></i><span>&nbsp;&nbsp;Return to CEO</span></a>
        
        @endif
               
        </li>
        @endrole
       
        @role(['elec_ceo'])
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-area-chart"></i> <span>Reports</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                   <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="ROReport">
                    <a class="nav-link {{ Request::is('cadmin/forms') || Request::is('cadmin/forms/*') ? 'active' : '' }}" href="{{ route('cadmin.polling.showuserroreport')}}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">RO Report</span>
                    </a>
                </li>

                 

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollDayReport">
                    <a class="nav-link {{ Request::is('cadmin/forms') || Request::is('cadmin/forms/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Poll Day Report</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollDayBeforeReport">
                    <a class="nav-link {{ Request::is('cadmin/widgeteditor') || Request::is('cadmin/widgeteditor/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Poll Day Before Report</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="CurrentPollDayReport">
                    <a class="nav-link {{ Request::is('cadmin/widgetcusteditor') || Request::is('cadmin/widgetcusteditor/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Current Poll Day Report</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollInterruptionReport">
                    <a class="nav-link {{ Request::is('cadmin/csseditor') || Request::is('cadmin/csseditor/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Poll Interruption Report</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollDayExceptionReport">
                    <a class="nav-link {{ Request::is('cadmin/jseditor') || Request::is('cadmin/jseditor/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Poll Day Exception Report</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="ModificationPollDayReport">
                    <a class="nav-link {{ Request::is('cadmin/cforms') || Request::is('cadmin/cforms/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Modification Poll Day Report</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollDayVoterTurnoutReport">
                    <a class="nav-link {{ Request::is('cadmin/stables') || Request::is('cadmin/stables/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Poll Day Voter Turnout Report</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="PollProgressChart">
                    <a class="nav-link {{ Request::is('cadmin/stables') || Request::is('cadmin/stables/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Poll Progress Chart</span>
                    </a>
                </li>
                
            
        </ul>

         @endrole
             @role(['elec_ceo'])
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>User Management</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
            
           
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="UsersLoginList">
                <a class="nav-link {{ Request::is('cadmin/users') ? ' active' : null }}" href="{{ route('cadmin.polling.displayusers') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                 Users Login List
                </a>
            </li>

            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="BoothOfficersList">
                <a class="nav-link {{ Request::is('cadmin/users') ? ' active' : null }}" href="{{route('cadmin.polling.showuserregreport')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                 Booth Officers List
                </a>
            </li>

            
          
           
            
            </ul>
        </li>

            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.activitylog')">
        <a class="nav-link {{ Request::is('cadmin/activitylogs') ? 'active' : '' }}" href="{{ route('cadmin.polling.activitylogs') }}">
            <i class="fa fa-history" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">Activity Logs</span>
            </a>
        </li>
        @endrole
        </ul>
    </section>
</aside>

