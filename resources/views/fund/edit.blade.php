@extends('layouts.admin')

@section('title')
Sumber Dana
@endsection

@section('title-card')
Edit Dana
@endsection

@section('menu-dana')
active
@endsection

@section('menu-dana-daftar')
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

        <form action="{{ route('fund.update', ['fund' => $fund->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Sumber Dana</label>
                <input name="fund" type="text""
                    class=" form-control {{$errors->first('fund') ? 'is-invalid':''}}" value="{{$fund->name}}" required minlength="3" maxlength="190">
                @error('fund')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
            <a href="{{ route('fund.index') }}" class="btn btn-secondary btn-md float-right mr-2">Kembali</a>
        </form>
    </div>
</div>
@endsection