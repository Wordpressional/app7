@extends('admin.layouts.master')

@section('content')
<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
      
      <!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Permission</h1>
      </div>-->
      <a class="btn btn-sm btn-primary moveright" href="{{route('permission.create')}}">Add New Permission</a>
      <h2>{{$title}}</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Name</th>
              <th>Display Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
             
              @foreach($permissions as $row)
               @php $j = 1 @endphp

                 @foreach($permodules as $per)
                
              

                @if($per->pername == $row->name)
                    
                  
                <tr>
                
                <td>{{ $row->name }}</td>
                <td>{{ $row->display_name }}</td>
                <td>{{ $row->description }}</td>

                <td>
                 

                  
                
                 
                 
                </td>
              </tr>

              @break;

              @else
              @php $j++ @endphp
              @php $last = count($permodules)+1 @endphp

              @if($j == $last)
              <tr>
                
                <td>{{ $row->name }}</td>
                <td>{{ $row->display_name }}</td>
                <td>{{ $row->description }}</td>

                <td>

                 @if($per->pername == $row->name)

                 

                 @else
                 <div class="btn-group">
                    <a class="btn btn-primary" href="{{ route('permission.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a class="btn btn-danger" href="{{ route('permission.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                  </div>
                  
                 @endif
                </td>
              </tr>
               @endif
                @endif

              
              @endforeach
               
             
              @endforeach
          </tbody>
        </table>
        {{ $permissions->links() }}
      </div>
    </main>
  </div>
</div>

@endsection