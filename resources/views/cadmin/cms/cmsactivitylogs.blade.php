@extends('cadmin.layouts.master')


@section('content')
   
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 ">
  
      <h2>Activity Logs</h2>

      <div class="table-responsive" style="padding:15px;">
        <table class="table table-striped table-bordered" id="example4">
          <thead>
            <tr>
              <th data-priority="1">Sl.no.</th>
              
              <th data-priority="2">Email</th>
             
              <th data-priority="3">Event Name</th>
               <th data-priority="4">Device Details</th>
                <th data-priority="5">Timestamp</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
              @foreach($cmsactivitylogdetails as $log)
                  <tr>
                    <td width="5">{{ $i++ }}</td>
                    
                     <td>{{ $log->useremail }}</td>
                      
                       <td>{{ $log->eventname }}</td>
                        <td>{{ $log->devicedetails }}</td>
                         <td>{{ humanize_date_with_timezone(Carbon::parse($log->timestamp), 'd/m/Y H:i:s', $data['n_companyname']->timezone) }}</td>
                    
                  </tr>
                  @endforeach
          </tbody>
        </table>
       
      </div>
    
    </main>
 
@endsection
@section('scripts')
<script type="text/javascript" language="javascript" >

$(document).ready(function() {
    $('#example4').DataTable({
       "paging": true,
       "language": {
    "search": "Search"
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