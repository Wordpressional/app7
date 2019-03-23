<!-- sidebar.blade.php -->

<aside class="main-sidebar">
    <section class="sidebar">    
        <!--<div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Username</p>
            </div>
        </div>-->
        <ul class="sidebar-menu" data-widget="tree">

             <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.dashboard')">
        <a class="nav-link {{ Request::is('cadmin/dashboard') ? 'active' : '' }}" href="{{ route('cadmin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">@lang('dashboard.dashboard')</span>
            </a>
        </li>

        <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Profile">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="{{ route('cadmin.dashboard.profile') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Profile</span>
                    </a>
                </li>
       
            
                   
                    
 @role(['superadministrator','administrator','cms_administrator','cms_editor'])

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>CMS</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.category')">
        <a class="nav-link {{ Request::is('cadmin/categories') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.categories') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.category')</span>
        </a>
    </li>

     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.tag')">
        <a class="nav-link {{ Request::is('cadmin/tags') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.tags') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.tag')</span>
        </a>
    </li>
    
    
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.posts')">
        <a class="nav-link {{ Request::is('cadmin/posts') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.posts')</span>
        </a>
    </li>
     
     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.pages')">
        <a class="nav-link {{ Request::is('cadmin/pages') || Request::is('cadmin/pages/*') ? 'active' : '' }}" href="{{ route('cadmin.pages.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.pages')</span>
        </a>
    </li>
   
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.comments')">
        <a class="nav-link {{ Request::is('cadmin/comments') || Request::is('cadmin/comments/*') ? 'active' : '' }}" href="{{ route('cadmin.comments.index') }}">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.comments')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Authors">
        <a class="nav-link {{ Request::is('cadmin/users') || Request::is('cadmin/users/*') ? 'active' : '' }}" href="{{ route('cadmin.authors.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.authors')</span>
        </a>
    </li> 
               

           

             </ul>
            </li>
            @endrole

            @role('cms_subscriber')

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>CMS</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

     

     
    
    
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.posts')">
        <a class="nav-link {{ Request::is('cadmin/posts') || Request::is('cadmin/posts/*') ? 'active' : '' }}" href="{{ route('cadmin.posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.posts')</span>
        </a>
    </li>
     
     
   
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.comments')">
        <a class="nav-link {{ Request::is('cadmin/comments') || Request::is('cadmin/comments/*') ? 'active' : '' }}" href="{{ route('cadmin.comments.index') }}">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.comments')</span>
        </a>
    </li>

   
               

           

             </ul>
            </li>
            @endrole
            @role(['superadministrator','administrator','cms_administrator','cms_editor'])
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Page Builder</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                    

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Widget Forms">
                    <a class="nav-link {{ Request::is('cadmin/forms') || Request::is('cadmin/forms/*') ? 'active' : '' }}" href="{{ route('cadmin.forms.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Widget Forms</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Widget Editor">
                    <a class="nav-link {{ Request::is('cadmin/widgeteditor') || Request::is('cadmin/widgeteditor/*') ? 'active' : '' }}" href="{{ route('cadmin.widgeteditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Widget Editor</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Custom Widget Editor">
                    <a class="nav-link {{ Request::is('cadmin/widgetcusteditor') || Request::is('cadmin/widgetcusteditor/*') ? 'active' : '' }}" href="{{ route('cadmin.widgetcusteditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Custom Widget Editor</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="CSS Editor">
                    <a class="nav-link {{ Request::is('cadmin/csseditor') || Request::is('cadmin/csseditor/*') ? 'active' : '' }}" href="{{ route('cadmin.csseditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">CSS Editor</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="JS Editor">
                    <a class="nav-link {{ Request::is('cadmin/jseditor') || Request::is('cadmin/jseditor/*') ? 'active' : '' }}" href="{{ route('cadmin.jseditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">JS Editor</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Contact Forms">
                    <a class="nav-link {{ Request::is('cadmin/cforms') || Request::is('cadmin/cforms/*') ? 'active' : '' }}" href="{{ route('cadmin.cforms.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Contact Forms</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Tables Management">
                    <a class="nav-link {{ Request::is('cadmin/stables') || Request::is('cadmin/stables/*') ? 'active' : '' }}" href="{{ route('cadmin.stables.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Tables Management</span>
                    </a>
                </li>

            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Mail Configuration">
                <a class="nav-link {{ Request::is('cadmin/static/indexmailconfig') || Request::is('cadmin/static/*') ? 'active' : '' }}" href="{{ route('cadmin.mailconfig.indexmailconfig') }}">
                <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">Mail Configuration</span>
                </a>
            </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Rename Shortcodes">
                    <a class="nav-link {{ Request::is('cadmin/stables') || Request::is('cadmin/stables/*') ? 'active' : '' }}" href="{{ route('cadmin.forms.smanagement') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Rename Shortcodes</span>
                    </a>
                </li>
                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Upload Media Manager">
                    <a class="nav-link {{ Request::is('/laravel-filemanager') || Request::is('/laravel-filemanager/*') ? 'active' : '' }}" href="{{ route('laravel-filemanager') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Upload Media Manager</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Upload Media Manager">
                    <a class="nav-link {{ Request::is('/laravel-filemanager') || Request::is('/laravel-filemanager/*') ? 'active' : '' }}" href="{{ route('cadmin.forms.menubuilder') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Menu Builder</span>
                    </a>
                </li>
            
        </ul>
    </li>
    @endrole
         @role(['superadministrator','administrator','cms_administrator','cms_editor'])
        <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
         @endrole          
            @role(['superadministrator','administrator','cms_administrator','cms_editor'])        

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Color Management">
                    <a class="nav-link {{ Request::is('cadmin/styles') || Request::is('cadmin/styles/*') ? 'active' : '' }}" href="{{ route('cadmin.styles') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Color Management</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Choose Themes">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="{{ route('cadmin.themes') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Choose Themes</span>
                    </a>
                </li>
                 @endrole
                 @role(['superadministrator','administrator','cms_administrator'])  
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Install Modules">
                    <a class="nav-link {{ Request::is('cadmin/modules') || Request::is('cadmin/modules/*') ? 'active' : '' }}" href="{{ route('cadmin.modules') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Install Modules</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Branding">
                    <a class="nav-link {{ Request::is('cadmin/branding') || Request::is('cadmin/branding/*') ? 'active' : '' }}" href="{{ route('cadmin.branding') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Branding</span>
                    </a>
                </li>
           @endrole
                 @role(['superadministrator','administrator','cms_administrator','cms_editor'])  
        </ul>
    </li>
     @endrole
        
            @role(['superadministrator','administrator','cms_administrator'])
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>RBAC</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
            
            
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link {{ Request::is('cadmin/users') ? ' active' : null }}" href="{{route('cadmin.users')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Users
                </a>
            </li>
           <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Roles">
                <a class="nav-link {{ Request::is('cadmin/roles') ? ' active' : null }}" href="{{route('roles.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Roles
                </a>
            </li>
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Permissions">
                <a class="nav-link {{ Request::is('cadmin/permission') ? ' active' : null }}" href="{{route('permission.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Permissions
                </a>
            </li>
           
            </ul>
        </li>
         @endrole
          @role(['cms_administrator','cms_superadministrator'])
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>User Management</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
            
           
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="UsersLoginList">
                <a class="nav-link {{ Request::is('cadmin/users') ? ' active' : null }}" href="{{ route('cadmin.cms.cmsdisplayusers') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                 Users Login List
                </a>
            </li>   
          
           
            
            </ul>
        </li>

            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.activitylog')">
        <a class="nav-link {{ Request::is('cadmin/activitylogs') ? 'active' : '' }}" href="{{ route('cadmin.cms.cmsactivitylogs') }}">
            <i class="fa fa-history" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">Activity Logs</span>
            </a>
        </li>
        @endrole

        @role('superadministrator')
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>User Management</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
            
           
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="UsersLoginList">
                <a class="nav-link {{ Request::is('cadmin/users') ? ' active' : null }}" href="{{ route('cadmin.cms.displayallusers') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                 Users Login List
                </a>
            </li>   
          
           
            
            </ul>
        </li>

            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.activitylog')">
        <a class="nav-link {{ Request::is('cadmin/activitylogs') ? 'active' : '' }}" href="{{ route('cadmin.commactivitylogs') }}">
            <i class="fa fa-history" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">Activity Logs</span>
            </a>
        </li>
        @endrole

        @role(['cms_administrator', 'cms_editor'] )
          <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Downloads</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
              

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Color Management">
                    <a class="nav-link {{ Request::is('cadmin/styles') || Request::is('cadmin/styles/*') ? 'active' : '' }}" href="{{ route('cadmin.static.starterform') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Starter Kit</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Choose Themes">
                    <a class="nav-link {{ Request::is('cadmin/themes') || Request::is('cadmin/themes/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Standard Kit</span>
                    </a>
                </li>
                 
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="Install Modules">
                    <a class="nav-link {{ Request::is('cadmin/modules') || Request::is('cadmin/modules/*') ? 'active' : '' }}" href="#">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Enterprise Kit</span>
                    </a>
                </li>
               
             
        </ul>
    </li>
     @endrole
        

         @role(['cms_administrator', 'cms_editor', 'cms_author', 'cms_subscriber', 'superadministrator', 'cms_superadministrator'] )
        <li> 
        @if(session('user_is_switched'))
        
        <a style="color:#ffffff;" href="{{ route('cadmin.dashboard.cmsrestoreuser') }}"><i class="fa fa-undo"></i><span>&nbsp;&nbsp;Return to CMS cadmin</span></a>
        
        @endif
               
        </li>
        @endrole

        </ul>
    </section>
</aside>

