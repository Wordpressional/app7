<option>--- Select District ---</option>
@if(!empty($dists))
  @foreach($dists as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif