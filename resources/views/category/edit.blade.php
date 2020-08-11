@extends('layouts.admin')

@section('title')
Kategori Post
@endsection

@section('title-card')
Edit Kategori
@endsection

@section('menu-kategori')
active
@endsection

@section('menu-kategori-daftar')
active
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Kategori</label>
                <input name="category" type="text""
                    class=" form-control {{$errors->first('category') ? 'is-invalid':''}}" value="{{$category->name}}" required minlength="3" maxlength="190">
                @error('category')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary btn-md float-right mr-2">Kembali</a>
        </form>
    </div>
</div>
@endsection