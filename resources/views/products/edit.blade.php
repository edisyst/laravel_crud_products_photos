@extends('products.layout')

@section('content')


    <div class="row justify-content-between">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>


    <div class="row">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="code">Product Code</label>
                    <input type="number" class="form-control" id="code" name="code" value="{{ $product->code }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="details">Details</label>
                    <textarea class="form-control" id="details" name="details" rows="3">{{ $product->details }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="logo">Product Image</label>
                <img src="{{ \Illuminate\Support\Facades\URL::to($product->logo) }}" width="350px">
                <input type="hidden" class="form-control" name="old_logo" value="{{ $product->logo }}">
            </div>

            <div class="form-group">
                <label for="logo">Change Image</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>

            <div class="form-group">
                <button class="btn btn-success">Update</button>
            </div>

        </form>
    </div>



@endsection
