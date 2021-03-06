@extends('layoutsecom.front.mythemeapp')

@section('content')
<!-- Main content -->
<section class="ecartnatheme1 container content cartptheme1">
<div class="row">
<div class="box-body">
@include('layoutsecom.errors-and-messages')
</div>
<div class="col-md-12">
<h2> <i class="fa fa-home"></i> My Account</h2>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" @if(request()->input('tab') == 'profile') class="active" @endif><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
<li role="presentation" @if(request()->input('tab') == 'orders') class="active" @endif><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
<li role="presentation" @if(request()->input('tab') == 'address') class="active" @endif><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Addresses</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content customer-order-list">
<div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'profile')active @endif" id="profile">
{{$customer->name}} <br /><small>{{$customer->email}}</small>
<br /><br />
@if(!$orders->isEmpty())

@if(!$myorders[0]->id)
@else
@if($custtheme != "not present")

<a href="{{ route('demologine1') }}" target="_blank" class="btn btn-primary"> Demo Account Login </a>
@endif
@endif
@if($custtheme == "not present")

<form method="post" action="{{ route('createprofile') }}" class="createprofile">
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
  
<input type="submit" class="btn btn-warning" value="Create Demo Account" />
</form>

@endif
@endif
</div>
<div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'orders')active @endif" id="orders">
@if(!$orders->isEmpty())
<table class="table">
<tbody>
<tr>
<td>Date</td>
<td>Total</td>
<td class="text-center">Status</td>
<td class="text-center">Load Theme</td>
</tr>
</tbody>
<tbody>
@foreach ($orders as $key => $order)
@foreach ($qorders as $key => $qorder)


@if($qorder[0]->products[0]->pivot->order_id == $order['id'])
@if($order['customer_id'] == Auth::guard('checkout')->user()->id)


<tr>
<td>
<a data-toggle="modal" data-target="#order_modal_{{$order['id']}}" title="Show order" href="javascript: void(0)">{{ date('M d, Y h:i a', strtotime($order['created_at'])) }}</a>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="order_modal_{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="MyOrders">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Reference #{{$order['reference']}}</h4>
</div>
<div class="modal-body">
    <table class="table">
        <thead>
            <th>Address</th>
            <th>Payment Method</th>
            <th>Total</th>
            <th>Status</th>
            
        </thead>
        <tbody>
            <tr>
                <td>
                    <address>
                        <strong>{{$order['address']->alias}}</strong><br />
                        {{$order['address']->address_1}} {{$order['address']->address_2}}<br>
                    </address>
                </td>
                <td>{{$order['payment']}}</td>
                <td>{{ config('cart.currency_symbol') }} {{$order['total']}}</td>
                <td><p class="text-center" style="color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
                
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</td>
<td><span class="label @if($order['total'] != $order['total_paid']) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order['total'] }}</span></td>
<td><p class="text-center" style="padding:4px 10px 4px 10px; font-size: 14px; color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
<td>
@if($custthemes)
    


@foreach ($custthemes as $key1 => $custt)  @if($qorder[0]->products[0]->pivot->product_name == $custt->tname) {{$qorder[0]->products[0]->pivot->product_name}} <br><p class="text-center" style="padding:4px 10px 4px 10px; font-size: 14px; color: #ffffff; background-color: green">Loaded</p> @break;  @else  @if($key1+1 == count($custthemes)) @if($qorder[0]->products[0]->pivot->product_name != $custt->tname) @if($qorder[0]->products[0]->pivot->product_name == "Start Up") @else  {{$qorder[0]->products[0]->pivot->product_name}} <br><p class="text-center"><a href="{{ route('loadthemetodemo', ['order'=>$order['reference']]) }}" style="color: #ffffff; background-color: maroon; padding:4px 20px 4px 20px; font-size: 14px; "> Load</a></p> @endif @endif @endif @endif @endforeach



@endif

</td>
</tr>
@endif
@endif

@endforeach


@endforeach

</tbody>
</table>
{{ $orders->links() }}
@else
<p class="alert alert-warning">No orders yet. <a href="{{ route('home') }}">Shop now!</a></p>
@endif
</div>
<div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'address')active @endif" id="address">
<div class="row">
<div class="col-md-6">
<a href="{{ route('customere1.address.create', Auth::guard('checkout')->id()) }}" class="btn btn-primary">Create your address</a>
</div>
</div>
@if(!$addresses->isEmpty())
<table class="table">
<thead>
<th>Alias</th>
<th>Address 1</th>
<th>Address 2</th>
<th>City</th>
@if(isset($address->province))
<th>Province</th>
@endif
<th>State</th>
<th>Country</th>
<th>Zip</th>
<th>Phone</th>
<th>Actions</th>
</thead>
<tbody>
@foreach($addresses as $address)
<tr>
<td>{{$address->alias}}</td>
<td>{{$address->address_1}}</td>
<td>{{$address->address_1}}</td>
<td>{{$address->city}}</td>
@if(isset($address->province))
<td>{{$address->province->name}}</td>
@endif
<td>{{$address->state_code}}</td>
<td>{{$address->country->name}}</td>
<td>{{$address->zip}}</td>
<td>{{$address->phone}}</td>
<td>
<form method="post" action="{{ route('customere1.address.destroy', [Auth::guard('checkout')->id(), $address->id]) }}" class="form-horizontal">
<div class="btn-group">
<input type="hidden" name="_method" value="delete">
{{ csrf_field() }}
<a href="{{ route('customere1.address.edit', [Auth::guard('checkout')->id(), $address->id]) }}" class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>
</div>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@else
<br /> <p class="alert alert-warning">No address created yet.</p>
@endif
</div>
</div>
</div>
</div>
</div>
</section>
<!-- /.content -->
@endsection
