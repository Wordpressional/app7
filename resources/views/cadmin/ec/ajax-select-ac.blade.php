<option>--- Select AC ---</option>
@if(!empty($acs))
  @foreach($acs as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif