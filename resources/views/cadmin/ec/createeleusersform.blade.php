@extends('cadmin.layouts.adminpages') 

@section('content')

<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">

   
    <a class="btn btn-sm btn-primary moveright" href="{{route('cadmin.polling.createeleusers')}}">Back</a>
    <h2>Create Users</h2>
    <hr>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
    @endif
    <form method="post" action="{{ route('cadmin.polling.storecsv') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name" class="col-md-3 col-form-label">Upload CSV File</label>
            <div class="col-md-10">
           
   
              <input type="file" name="csvfile" id="csvfile" required="required">
                 
               
           
            </div>
        </div>

              


        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-success">Upload Users</button>
            </div>
        </div>
    </form>


     <form method="post" action="{{ route('cadmin.polling.importcsv') }}" data-parsley-validate class="form-horizontal form-label-left">

       

        <div class="form-group">
            <label for="email" class="col-md-12 col-form-label">Uploaded CSV filename with extension as .csv</label>
            <div class="col-md-10">
                <input type="text" value="" id="csvname" name="csvname" class="form-control col-md-12 col-xs-12"> 
               
                
            </div>
        </div>

        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} ">
            <label class="col-sm-12 col-form-label" for="role_id">Role
                <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <select class="form-control" id="role_id" name="role_id">
                    @if(count($roles))
                    @foreach($roles as $row)
                    @if(stripos($row->name, "elec_") !== FALSE)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endif
                    @endforeach
                    @endif
                </select>
                @if ($errors->has('role_id'))
                <span class="help-block">{{ $errors->first('role_id') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12 col-form-label" for="acid">AC
                <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <select class="form-control" id="acid" name="acid">
                    @if(count($acs))
                    @foreach($acs as $ac)
                   
                    <option value="{{$ac->acid}}">{{$ac->acname}}</option>
                   
                    @endforeach
                    @endif
                </select>
                
            </div>
        </div>
       


        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-success">Create / Import Users</button>
            </div>
        </div>
    </form>
</main>
</div>
</div>

@endsection