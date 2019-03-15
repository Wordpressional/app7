@extends('admin.layouts.master')


@section('content')
   
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
   
      <h2>{{$title}}</h2>


      <div class="container">
        <form action="{{ url('/admin/cmsuserSearch')}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search users"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="fa fa-search"></span>
                    </button>
                     <a class="btn btn-md btn-default moveright" href="{{route('admin.cms.cmsdisplayusers')}}">Clear Search</a>
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
              <th data-priority="4">Role</th>
              <th data-priority="5">Actions</th>
              <th data-priority="6">Switch User</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
              @foreach($users as $key => $user)
               
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    
                     <td>{{ $user->roles[0]->display_name}}</td>
                   
                     <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('admin.authors.edita', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Role"></i> </a>
                        

                      </div>
                    </td>
                   
                      <td><form action="{{ route('admin.dashboard.cmsswitchuser') }}" method="POST">
                    <input type="hidden" name="new_user_id" value="{{ $user->id }}">
                   
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info"><i class="fa fa-sign-in" style="font-size: 20px;" aria-hidden="true"></i> Login</button>
                </form></td>
                 
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