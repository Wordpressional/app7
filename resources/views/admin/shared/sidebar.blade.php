<!-- sidebar.blade.php -->

<aside class="main-sidebar">
    <section class="sidebar">    
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Username</p>
            </div>
        </div>
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

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.posts')">
        <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/posts/*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.posts')</span>
        </a>
    </li>

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
        <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.users')</span>
        </a>
    </li> 
                </ul>
            </li>
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
                        <span class="nav-link-text">Forms</span>
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
                    <a class="nav-link {{ Request::is('admin/stables') || Request::is('admin/stables/*') ? 'active' : '' }}" href="{{ route('admin.stables.index') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Upload Media Manager</span>
                    </a>
                </li>
            
        </ul>
        <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                    

                 <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/forms') || Request::is('admin/forms/*') ? 'active' : '' }}" href="{{ route('admin.styles') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Color Management</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/cforms') || Request::is('admin/cforms/*') ? 'active' : '' }}" href="{{ route('admin.themes') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Choose Themes</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="FormBuilder">
                    <a class="nav-link {{ Request::is('admin/stables') || Request::is('admin/stables/*') ? 'active' : '' }}" href="{{ route('admin.branding') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                        <span class="nav-link-text">Branding</span>
                    </a>
                </li>
            
        </ul>
        </ul>

    </section>
</aside>