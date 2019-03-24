@extends('layoutsecom.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layoutsecom.errors-and-messages')
    <!-- Default box -->
        @if($customers)
            <div class="box">
                <div class="box-body">
                    <h2>Customers</h2>
                    @include('layoutsecom.search', ['route' => route('admin.customers.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-2">Email</td>
                                <td class="col-md-2">Status</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer['id'] }}</td>
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>@include('layoutsecom.status', ['status' => $customer['status']])</td>
                                <td>
                                    <form action="{{ route('admin.customers.destroy', $customer['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.customers.show', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                            <a href="{{ route('admin.customers.edit', $customer['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection