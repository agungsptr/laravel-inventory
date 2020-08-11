@extends('layouts.admin')

@section('title')
Inventaris Barang
@endsection

@section('title-card')
Tambah Barang
@endsection

@section('menu-barang')
active
@endsection

@section('menu-barang-tambah')
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

        <form action="{{ route('inventory.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Sumber Dana</label>
                <select class="form-control" name="fund_id" id="" required>
                    <option value="">Pilih sumber dana</option>
                    @foreach ($funds as $fund)
                    <option value="{{$fund->id}}">{{$fund->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input name="name" type="text" class=" form-control {{$errors->first('name') ? 'is-invalid':''}}"
                    value="{{old('name')}}" maxlength="190" minlength="" required>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kategori Barang</label>
                <select class="form-control" name="category_id" id="" required>
                    <option value="">Pilih kategori barang</option>
                    @foreach ($categories as $ctg)
                    <option value="{{$ctg->id}}">{{$ctg->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Merek</label>
                <input name="brand" type="text" class=" form-control {{$errors->first('brand') ? 'is-invalid':''}}"
                    value="{{old('brand')}}" maxlength="190" minlength="" required>
                @error('brand')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kuantitas</label>
                <input name="amount" type="text" onkeypress="isInputNumber(event)"
                    class=" form-control {{$errors->first('amount') ? 'is-invalid':''}}" value="{{old('amount')}}"
                    maxlength="190" minlength="" required>
                @error('amount')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Satuan</label>
                <select class="form-control" name="unit" id="" required>
                    <option value="">Pilih Unit</option>
                    <option value="BUAH">Buah</option>
                    <option value="UNIT">Unit</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nomor Mesin</label>
                <input name="machine_number" type="text"
                    class=" form-control {{$errors->first('machine_number') ? 'is-invalid':''}}"
                    value="{{old('machine_number')}}" maxlength="190" minlength="">
                @error('machine_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        <label id="date" for="">Tanggal Beli</label>
                        <input type="datetime-local"
                            class="form-control {{$errors->first('buy_date') ? 'is-invalid':''}}" name="buy_date"
                            value="{{old('buy_date')}}">
                        @error('buy_date')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Lokasi</label>
                <input name="location" type="text"
                    class=" form-control {{$errors->first('location') ? 'is-invalid':''}}" value="{{old('location')}}"
                    maxlength="190" minlength="" required>
                @error('location')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kondisi</label>
                <input name="condition" type="text"
                    class=" form-control {{$errors->first('condition') ? 'is-invalid':''}}" value="{{old('condition')}}"
                    maxlength="190" minlength="" required>
                @error('condition')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" name="status" id="" required>
                    <option value="">Pilih status</option>
                    <option value="TERPAKAI">Terpakai</option>
                    <option value="TIDAK_TERPAKAI">Tidak Terpakai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input onkeypress="isInputNumber(event)" name="price" type="text"
                    class=" form-control {{$errors->first('price') ? 'is-invalid':''}}" value="{{old('price')}}"
                    maxlength="190" minlength="">
                @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Penanggung Jawab</label>
                <input name="pj" type="text" class=" form-control {{$errors->first('pj') ? 'is-invalid':''}}"
                    value="{{old('pj')}}" maxlength="190" minlength="" required>
                @error('pj')
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