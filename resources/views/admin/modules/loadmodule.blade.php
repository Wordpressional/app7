
@extends('admin.layouts.keditorheader')

@section('content')

<h3> In Built Modules </h3>
 @if($module->count())
 

   <div class="panel panel-default">
    <div class="panel-body">
      
      <table class="table table-hover table-striped table-sm table-responsive-md">
        <thead>
          <th>Module Name</th>
          <th>Shortcode</th>
          <th>Module Description</th>
          <th>Status</th>
          <th>Activate/Deactivate</th>
          <th>Uninstall/Install</th>

          <tbody>

            @if($module->count())
             @foreach($module as $module)

                    <tr>
                     
                      <td>
                        
                        {{ $module->mdisplay_name }}
                        
                      </td>
                       <td>
                        
                        {{ $module->modulename }}
                      
                      </td>

                      <td>

                      {{ $module->mdescription }}
                      </td>

                      <td>

                      {{ $module->mstatus }} / {{ $module->mmstatus }}
                      </td>

                      <td>
                         @if($module->mmstatus == "inactive")
                         
                      <a class="btn btn-warning" href="{{ route('admin.module.activate',['id'=>$module->id]) }}">
                      
                          <span><i class="fa fa-toggle-on" aria-hidden="true"></i> Activate</span>
                      </a>
                            
                           @else
                       <a class="btn btn-warning" href="{{ route('admin.module.deactivate',['id'=>$module->id]) }}">
                      
                          <span><i class="fa fa-toggle-on" aria-hidden="true"></i> Deactivate</span>
                      </a>
                          @endif
                          
                      </td>
                      <td>
                     
                      
                       @if($module->mstatus == "uninstalled")
                       @if($module->mmstatus == "inactive")
                       @else
                      <a class="btn btn-danger" href="{{ route('admin.module.install',['id'=>$module->id]) }}">
                      
                          <span><i class="fa fa-download" aria-hidden="true"></i> Install</span>
                      </a>
                      @endif
                       @else

                      <a class="btn btn-danger" href="{{ route('admin.module.uninstall',['id'=>$module->id]) }}">
                      
                          <span><i class="fa fa-download" aria-hidden="true"></i> Uninstall</span>
                      </a>
                      
                      @endif
                      </td>

                    </tr>
                   

             @endforeach

             @else 
                  <tr>
                    <th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                      No forms are created yet 
                    </th>
                  </tr>

             @endif
          </tbody>
        </thead>
      </table>
    </div>
   </div>
  @else
<div class="page-header d-flex justify-content-between loadmodules">
     
      <a href="{{ route('admin.module.dumpmodules') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> Load Modules
      </a>
    </div>
@endif

@endsection
