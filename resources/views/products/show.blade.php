@extends('products.layout')

@section('content')


    <div class="row justify-content-between">
        <div class="pull-left">
            <h2>Show Product</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>


    <div class="row">

        <div class="form-group col-md-12">
            <label for="name">Product Name</label>
            <strong>{{ $product->name }}</strong>
        </div>
        <div class="form-group col-md-12">
            <label for="code">Product Code</label>
            <strong>{{ $product->code }}</strong>
        </div>
        <div class="form-group col-md-12">
            <label for="details">Details</label>
            <strong>{{ $product->details }}</strong>
        </div>

        <div class="form-group col-md-12">
            <label for="logo">Product Image</label>
            <img src="{{ \Illuminate\Support\Facades\URL::to($product->logo) }}" width="350px">
        </div>

        <a href="{{ route('products.edit', $product) }}" class="btn btn-success mr-2">Edit Product</a>

    </div>



@endsection
