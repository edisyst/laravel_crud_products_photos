@extends('products.layout')

@section('content')


    <div class="row justify-content-between">
        <div class="pull-left">
            <h2>To Do SHOW</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>


    <div class="row">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="My Product">
                </div>
                <div class="form-group col-md-6">
                    <label for="code">Product Code</label>
                    <input type="number" class="form-control" id="code" name="code">
                </div>
                <div class="form-group col-md-12">
                    <label for="details">Details</label>
                    <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="logo">Product Image</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>

            <div class="form-group">
                <button class="btn btn-success"> Submit</button>
            </div>

        </form>
    </div>



@endsection
