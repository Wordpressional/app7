@extends('admin.layouts.masterelection')


@section('content')
   
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
      
    
    

      <a class="btn btn-sm btn-primary moveright" href="{{route('admin.polling.createeleusers')}}">Add New User</a>
      <h2>{{$title}}</h2>




      <div class="container">
        <form action="{{ url('/admin/usersearch')}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search users"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="fa fa-search"></span>
                    </button>
                     <a class="btn btn-md btn-default moveright" href="{{route('admin.polling.displayusers')}}">Clear Search</a>
                </span>
            </div>
        </form>
    </div>

    <br>

      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="example1">
          <thead>
            <tr>
              <th data-priority="1">Sl.no.</th>
              <th data-priority="2">Name</th>
              <th data-priority="3">Email</th>
              <th data-priority="4">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
              @foreach($users as $user)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    
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
        {{ $users->links() }}
      </div>
    </main>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" language="javascript" >

$(document).ready(function() {
    $('#example1').DataTable({
       "paging": false,
       "language": {
    "search": false
  },
  "responsive": true,
    "columnDefs": [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 4, targets: 3 },
                
            ]   
       
    });


} );
</script>

@endsection