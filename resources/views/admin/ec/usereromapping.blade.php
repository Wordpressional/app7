@extends('admin.layouts.adminpages') 

@section('content')

<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">

   
    <a class="btn btn-sm btn-primary moveright" href="{{route('admin.polling.displayusers')}}">Back</a>
    <h2>Map Users</h2>
    <hr>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
    @endif
    


     <form method="post" action="{{ route('admin.polling.storeromapping') }}" data-parsley-validate class="form-horizontal form-label-left">

       

       
        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} ">
            <label class="col-sm-12 col-form-label" for="userid1">ERO
                <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <select class="form-control" id="userid1" name="userid1">
                    @if(count($users1))
                    @foreach($users1 as $row1)
                    
                    <option value="{{$row1->id}}">{{$row1->email}}</option>
                    
                    @endforeach
                    @endif
                </select>
               
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12 col-form-label" for="userid2">AERO
                <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <select class="form-control" id="userid2" name="userid2">
                    @if(count($users2))
                    @foreach($users2 as $row2)
                   
                    <option value="{{$row2->id}}">{{$row2->email}}</option>
                   
                    @endforeach
                    @endif
                </select>
                
            </div>
        </div>
       


        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-success">Map Users</button>
            </div>
        </div>
    </form>
</main>
</div>
</div>

@endsection