<table class="table table-striped table-sm">
    <caption>{{ trans_choice('users.count', $users->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('users.attributes.name')</th>
            <th>@lang('users.attributes.email')</th>
            <th>@lang('users.attributes.registered_at')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ link_to_route('cadmin.authors.edita', $user->fullname, $user) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ humanize_date_with_timezone($user->registered_at, 'd/m/Y H:i:s', $data['n_companyname']->timezone) }}</td>
                <td>
                    <a href="{{ route('cadmin.authors.edita', $user) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
