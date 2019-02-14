@extends('admin.layouts.master')

@section('content')
   
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
      
     <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
      </div>-->
      <a class="btn btn-sm btn-primary moveright" href="{{route('admin.users.create')}}">Add New User</a>
      <h2>{{$title}}</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @foreach($user->roles as $r)
                        {{$r->display_name}}
                    @endforeach
                    </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Role"></i> </a>
                        <a class="btn btn-danger" href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{ $users->links() }}
        </div>
      </div>
    </main>
  </div>
</div>
@endsection