@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Products
                    <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('products.create') }}">Add</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                   <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('products.edit',['product'=>$product->id]) }}" class="btn btn-warning" >Edit</a>
                                            <form method="POST" action="{{ route('products.destroy',['product'=>$product->id]) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button onclick="return confirm('Are You sure?')" type="submit" class="btn btn-danger">Delete</button>

                                            </form>
                                            {{-- <a onclick="return confirm('Are You sure?')" href="{{ route('products.destroy',['product'=>$product->id]) }}" class="btn btn-danger" >Delete</a> --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Product Empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
