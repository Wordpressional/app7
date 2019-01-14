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
        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">@lang('dashboard.dashboard')</span>
            </a>
        </li>
       
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>CMS</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                    
 @role(['superadministrator','administrator','cms_administrator','cms_editor'])
     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.category')">
        <a class="nav-link {{ Request::is('admin/categories') || Request::is('admin/posts/*') ? 'active' : '' }}" href="{{ route('admin.categories') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.category')</span>
        </a>
    </li>

     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.tag')">
        <a class="nav-link {{ Request::is('admin/tags') || Request::is('admin/posts/*') ? 'active' : '' }}" href="{{ route('admin.tags') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.tag')</span>
        </a>
    </li>
     @endrole
    @role(['superadministrator','administrator','cms_administrator','cms_editor','cms_author'])
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.posts')">
        <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/posts/*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.posts')</span>
        </a>
    </li>
     @endrole
     @role(['superadministrator','administrator','cms_administrator','cms_editor'])
     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.pages')">
        <a class="nav-link {{ Request::is('admin/pages') || Request::is('admin/pages/*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.pages')</span>
        </a>
    </li>
   
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.comments')">
        <a class="nav-link {{ Request::is('admin/comments') || Request::is('admin/comments/*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.comments')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.users')">
        <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.authors.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.authors')</span>
        </a>
    </li> 
                </ul>
            </li>

            @endrole

            @role(['superadministrator','administrator','cms_administrator','cms_editor'])
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>FormBuilder</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                    

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/forms') || Request::is('admin/forms/*') ? 'active' : '' }}" href="{{ route('admin.forms.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Widget Forms</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/widgeteditor') || Request::is('admin/widgeteditor/*') ? 'active' : '' }}" href="{{ route('admin.widgeteditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Widget Editor</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/widgetcusteditor') || Request::is('admin/widgetcusteditor/*') ? 'active' : '' }}" href="{{ route('admin.widgetcusteditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Custom Widget Editor</span>
                    </a>
                </li>

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/csseditor') || Request::is('admin/csseditor/*') ? 'active' : '' }}" href="{{ route('admin.csseditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">CSS Editor</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/jseditor') || Request::is('admin/jseditor/*') ? 'active' : '' }}" href="{{ route('admin.jseditor') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">JS Editor</span>
                    </a>
                </li>

                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/cforms') || Request::is('admin/cforms/*') ? 'active' : '' }}" href="{{ route('admin.cforms.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Contact Forms</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/stables') || Request::is('admin/stables/*') ? 'active' : '' }}" href="{{ route('admin.stables.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Tables Management</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/stables') || Request::is('admin/stables/*') ? 'active' : '' }}" href="{{ route('admin.stables.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Rename Shortcodes</span>
                    </a>
                </li>
                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('/laravel-filemanager') || Request::is('/laravel-filemanager/*') ? 'active' : '' }}" href="{{ route('laravel-filemanager') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Upload Media Manager</span>
                    </a>
                </li>
            
        </ul>
    </li>
    @endrole
         @role(['superadministrator','administrator','cms_administrator'])
        <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                    

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/styles') || Request::is('admin/styles/*') ? 'active' : '' }}" href="{{ route('admin.styles') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Color Management</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/themes') || Request::is('admin/themes/*') ? 'active' : '' }}" href="{{ route('admin.themes') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Choose Themes</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/modules') || Request::is('admin/modules/*') ? 'active' : '' }}" href="{{ route('admin.modules') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Install Modules</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/branding') || Request::is('admin/branding/*') ? 'active' : '' }}" href="{{ route('admin.branding') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Branding</span>
                    </a>
                </li>
            
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
            
            
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                <a class="nav-link {{ Request::is('admin/users') ? ' active' : null }}" href="{{route('admin.users')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Users
                </a>
            </li>
           <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                <a class="nav-link {{ Request::is('admin/roles') ? ' active' : null }}" href="{{route('roles.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Roles
                </a>
            </li>
            <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                <a class="nav-link {{ Request::is('admin/permission') ? ' active' : null }}" href="{{route('permission.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Permissions
                </a>
            </li>
           
            </ul>
        </li>
         @endrole
        </ul>
    </section>
</aside>

