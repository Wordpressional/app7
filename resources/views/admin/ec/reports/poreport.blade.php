@extends('admin.layouts.masterelection')


@section('content')
   
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 ">
  
      <h2>Returning Officer Report</h2>

      <div class="table-responsive" style="padding:15px;">
        <table class="table table-striped table-bordered" id="example4">
          <thead>
            <tr>
              <th >Sl.No.</th>
              
              <th >AC.No. and AC Name</th>
             
              <th >Total RO's Registered</th>
              <th >Send Notification</th>
                
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
              @foreach($Elemaclists as $aclist)
                  <tr>
                    <td width="5">{{ $i++ }}</td>
                    
                     <td><center>{{ $aclist->acno }}<br>{{ $aclist->acname }}</center></td>
                      
                       <td><center>{{ $lc[$aclist->acno] }}/{{ $lc2[$aclist->acno] }}</center></td>
                        
                       <td><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>&nbsp;&nbsp;<a href="#"><i class="fa fa-mobile" aria-hidden="true" style="font-size: 30px;"></i></a></td>   
                    
                  </tr>
                  @endforeach
          </tbody>
        </table>
       
      </div>
    
    </main>
  </div>
</div>
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
    


});
});
</script>

@endsection