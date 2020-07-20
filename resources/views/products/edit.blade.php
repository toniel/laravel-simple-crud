@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Category

                </div>

                <div class="card-body">
                <form action="{{ route('products.update',['product'=>$product->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            value="{{ $product->name }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="0">Select Category</option>
                            @foreach ($categories as $category)
                            <option {{ $product->category_id==$category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Product price</label>
                        <input id="price" class="form-control @error('price') is-invalid @enderror" type="number" name="price"
                            value="{{ $product->price }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
