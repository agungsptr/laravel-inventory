@extends('layouts.admin')

@section('title')
Sumber Dana
@endsection

@section('title-card')
Tambah Dana
@endsection

@section('menu-dana')
active
@endsection

@section('menu-dana-tambah')
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

        <form action="{{ route('fund.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Sumber Dana</label>
                <input name="fund" type="text" class=" form-control {{$errors->first('fund') ? 'is-invalid':''}}"
                    value="{{old('fund')}}" maxlength="190" minlength="3" required>
                @error('fund')
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