@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                   <div class="form-group">
                       <label for="">Pilih Kategori</label>
                       <select class="form-control" name="" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group">
                       <label for="">Produk</label>
                       <select class="form-control" name="" id="produk"></select>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('extraScripts')
    <script>
        $(document).ready(function(e){
            $('#category_id').on('change',function(){
                $('#produk').html('')//mengosongkan dropdown
                let id = $(this).val()
                const url = route('categories.show',{category:id}) //menggunakan library ziggy, route sama seperti laravel
                axios.get(url).then(response=>{
                    console.log(response)
                    let output='';
                    $.each(response.data.products, (key,val)=>{
                        console.log(val)
                        output +=`<option>${val.name}</option>`
                    })
                    $('#produk').append(output)
                })
            })
        })
    </script>
@endpush
