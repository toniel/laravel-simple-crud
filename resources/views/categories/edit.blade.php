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
                  <form action="{{ route('categories.update',['category'=>$category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $category->name }}">
                        @error('name')
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
