@extends('admin.layouts.masterelection')


@section('content')
   
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
      
    
     

      <a class="btn btn-sm btn-primary moveright" href="{{route('admin.polling.createeleusers')}}" style="margin-left:30px;">Create Users</a>

      <a class="btn btn-sm btn-primary moveright" href="{{route('admin.polling.listusers')}}">Map Users</a>
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
              <th data-priority="4">Role</th>
              <th data-priority="5">Actions</th>
              <th data-priority="6">Switch User</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
              @foreach($users as $key => $user)
               @if($user->roles[0]->name == "elec_ceo"  || $user->roles[0]->name == "elec_returningofficer"  || $user->roles[0]->name == "elec_presidingofficer"  || $user->roles[0]->name == "elec_sectorofficer" || $user->roles[0]->name == "elec_asistantreturningofficer" || $user->roles[0]->name == "elec_bootlevelofficer")
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    
                     <td>{{ $user->roles[0]->display_name}}</td>
                   
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('admin.eleusers.editelec', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Role"></i> </a>
                        

                      </div>
                    </td>
                      <td><form action="{{ route('admin.user.eleswitch') }}" method="POST">
                    <input type="hidden" name="new_user_id" value="{{ $user->id }}">
                   
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info"><i class="fa fa-sign-in" style="font-size: 20px;" aria-hidden="true"></i> Login</button>
                </form></td>
                 @endif
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