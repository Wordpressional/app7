<!-- sidebar.blade.php -->

<aside class="main-sidebar">
    <section class="sidebar">    
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Pyrupay</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>CMS</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   
                     <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.dashboard')">
        <a class="nav-link {{ Request::is('cadmin/dashboard') ? 'active' : '' }}" href="{{ route('cadmin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.dashboard')</span>
        </a>
    </li>

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

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.users')">
        <a class="nav-link {{ Request::is('cadmin/users') || Request::is('cadmin/users/*') ? 'active' : '' }}" href="{{ route('cadmin.users.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.users')</span>
        </a>
    </li> 
                </ul>
            </li>

        </ul>
    </section>
</aside>