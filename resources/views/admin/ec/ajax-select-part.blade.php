<option>--- Select PS Parts ---</option>
@if(!empty($parts))
  @foreach($parts as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif