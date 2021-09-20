@extends('products.layout')

@section('content')

    <div class="row row-cols-2 my-2 mx-0">
        <div class="col-auto mr-auto">
            <h2>Products List</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('products.create') }}" class="btn btn-success">New Product</a>
        </div>
    </div>


    <div class="col-lg-12 margin-tb">

        @if($message = \Illuminate\Support\Facades\Session::get('message'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

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
                    <td>
                        <img src="{{ \Illuminate\Support\Facades\URL::to($product->logo) }}" width="150px">
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info mr-2">Show</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                  onsubmit="return confirm('Sei sicuro?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger mr-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>

        {!! $products->links() !!}

    </div>




    </div>

@endsection
