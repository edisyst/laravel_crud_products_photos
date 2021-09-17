@extends('products.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb mb-2">
            <div class="pull-left">
                <h2>Products List</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('products.create') }}" class="btn btn-success">New Product</a>
            </div>
        </div>

        @if($message = \Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="col-lg-12 margin-tb">
            <table class="table table-bordered">
                <tr>
                    <th width="150px">Prod.Name</th>
                    <th width="100px">Prod.Code</th>
                    <th width="250px">Details</th>
                    <th width="100px">Prod.Logo</th>
                    <th width="250px">Actions</th>
                </tr>

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->details }}</td>
                        <td>{{ $product->logo }}</td>
                        <td>
                            <a href="" class="btn btn-info">Show</a>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>




    </div>

@endsection
