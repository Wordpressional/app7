<main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
       <div class="container">
       
            {{ csrf_field() }}
            <div class="input-group inboxleft">
                <input type="text" class="form-control" name="q" id="q"
                    placeholder="Search users"> <span class="input-group-btn">
                    <button class="btn btn-default blosearch "  onclick="blosearchfunc()">
                        <span class="fa fa-search" ></span>
                    </button>
                    @if($blo1 == "ok")
                   <input type="text" value="{{ $blos->acid }}" id="acid" name="acid" style="display:none;"> 
                   
                    @elseif($blos)
                     @foreach($blos as $key => $blo)
                 
                    @if($blo)
                   <input type="text" value="{{ $blo->acid }}" id="acid" name="acid" style="display:none;"> 
                   @break;
                    @endif
                    @endforeach
                    @endif
                     <a class="btn btn-md btn-default moveright" href="{{route('admin.polling.showuserregreport')}}">Clear Search</a>
                </span>
            </div>

        
    </div>


    <br> 


      <div class="table-responsive">
      <table class="table table-striped table-bordered" id="example2">
          <thead>
            <tr>
              <th>Sl.No.</th>
              <th>Booth Officer Name</th>
              <th>Phone Number</th>
              <th>Designation</th>
              <th>PS / Parts</th>
              
             
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
             @if($blo1 == "ok")
           
                  <tr>
                  
                    <td>{{ $i++ }} </td>
                    <td>{{ $blos->bloname }}</td>
                    <td>{{ $blos->blophno }}</td>
                    <td>{{ $blos->blodesg }}</td>
                    <td>{{ $part_array[0] }}</td>
                    
                    
                    
                  </tr>
                  
                 
             @elseif($blos)
            
              @foreach($blos as $key => $blo)
                  <tr>
                  	@if($blo)
                    <td>{{ $i++ }} </td>
                    <td>{{ $blo->bloname }}</td>
                    <td>{{ $blo->blophno }}</td>
                    <td>{{ $blo->blodesg }}</td>
                    <td>{{ $part_array[$key] }}</td>
                    @endif
                    
                    
                  </tr>
                  @endforeach
                  @endif
                  
          </tbody>
        </table>
        
      </div>
    </main>
  </div>
</div>