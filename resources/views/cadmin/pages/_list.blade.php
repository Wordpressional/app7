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
                <td>@if($thisuser->isCMSAdmin() == "yes" || $thisuser->isSAdmin() == "yes" || $thisuser->isSuperadministrator() == "yes") 

                    @if($page->author)
                    {{ link_to_route('cadmin.authors.edita', $page->author->name, $page->author) }} @else {{ $page->author->name }} 
                    @endif

                @endif</td>
                
                <td>{{ humanize_date_with_timezone($page->created_at, 'd/m/Y H:i:s', $data['n_companyname']->timezone) }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('page.custompage', $page)}}" target="_blank">
                
                        <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                </a>
                </td>
                <td>
                    <a href="{{ route('cadmin.pages.edit', $page) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    @if($page->trashed())
                    @if($thisuser->isCMSEditor() == "yes" || $thisuser->isCMSAuthor() == "yes")
                    @if($page->createdby == $thisuser->id)
                    <a class="btn btn-warning" href="{{ route('cadmin.pages.restore', ['id' => $page->id]) }}">
                            
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('cadmin.pages.delete', ['id' => $page->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                    @else
                     <a class="btn btn-warning" href="{{ route('cadmin.pages.restore', ['id' => $page->id]) }}">
                            
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('cadmin.pages.delete', ['id' => $page->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                    @else
                    @if($thisuser->isCMSEditor() == "yes" || $thisuser->isCMSAuthor() == "yes")
                    @if($page->createdby == $thisuser->id)

                     <a class="btn btn-danger" href="{{ route('cadmin.pages.delete', ['id' => $page->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @else
                    
                    @endif
                    @else
                    <a class="btn btn-danger" href="{{ route('cadmin.pages.delete', ['id' => $page->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $pages->links() }}
</div>
