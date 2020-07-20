@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Categories
                    <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('categories.create') }}">Add</a>
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
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('categories.edit',['category'=>$category->id]) }}" class="btn btn-warning" >Edit</a>
                                            <form method="POST" action="{{ route('categories.destroy',['category'=>$category->id]) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button onclick="return confirm('Are You sure?')" type="submit" class="btn btn-danger">Delete</button>

                                            </form>
                                            {{-- <a onclick="return confirm('Are You sure?')" href="{{ route('categories.destroy',['category'=>$category->id]) }}" class="btn btn-danger" >Delete</a> --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Category Empty</td>
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
