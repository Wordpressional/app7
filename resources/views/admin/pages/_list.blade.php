@php 
//dd($data['n_companyname']->timezone);
@endphp
<table class="table table-hover table-striped table-sm table-responsive-md">
    <!--<caption>{{ trans_choice('pages.count', $pages->total()) }}</caption>-->
    <thead>
        <tr>
            <th>@lang('pages.attributes.title')</th>
            <th>@lang('pages.attributes.author')</th>
            
            <th>@lang('pages.attributes.posted_at')</th>
            <th>View</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
            <tr>

                <td>@if($page->trashed())
                    <strike style='color:red'>
                    <p style='color:blue'>{{ $page->display_name }}<p>
                    </strike>
                    @else
                    {{ $page->display_name }}
                    @endif
                </td>
                <td>{{ link_to_route('admin.users.edit', $page->author->displayname, $page->author) }}</td>
                
                <td>{{ humanize_date_with_timezone($page->created_at, 'd/m/Y H:i:s', $data['n_companyname']->timezone) }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('page.custompage', $page)}}" target="_blank">
                
                        <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                </a>
                </td>
                <td>
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    @if($page->trashed())
                    <a class="btn btn-warning" href="{{ route('admin.pages.restore', ['id' => $page->id]) }}">
                            
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('admin.pages.delete', ['id' => $page->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                    @else

                     <a class="btn btn-danger" href="{{ route('admin.pages.delete', ['id' => $page->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $pages->links() }}
</div>
