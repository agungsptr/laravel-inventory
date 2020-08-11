@extends('layouts.admin')

@section('title')
Manage User
@endsection

@section('title-card')
Edit User
@endsection

@section('menu-user')
active
@endsection

@section('menu-user-list')
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

        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nama</label>
                <input name="name" type="text""
                    class=" form-control {{$errors->first('name') ? 'is-invalid':''}}" value="{{$user->name}}" required minlength="3" maxlength="190">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input name="username" type="text" class="form-control {{$errors->first('username') ? 'is-invalid':''}}"
                    value="{{$user->username}}" required readonly minlength="3" maxlength="190">
                @error('username')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" type="password"
                    class="form-control {{$errors->first('password') ? 'is-invalid':''}}" required minlength="6" maxlength="190">
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Konfirmasi Password</label>
                <input name="password_conf" type="password"
                    class="form-control {{$errors->first('password_conf') ? 'is-invalid':''}}" required minlength="6" maxlength="190">
                @error('password_conf')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-md float-right mr-2">Kembali</a>
        </form>
    </div>
</div>
@endsection