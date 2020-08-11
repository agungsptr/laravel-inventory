@extends('layouts.admin')

@section('title')
Kategori Post
@endsection

@section('title-card')
Tambah Kategori
@endsection

@section('menu-kategori')
active
@endsection

@section('menu-kategori-tambah')
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

        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Kategori</label>
                <input name="category" type="text" class=" form-control {{$errors->first('category') ? 'is-invalid':''}}"
                    value="{{old('category')}}" maxlength="190" minlength="3" required>
                @error('category')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection