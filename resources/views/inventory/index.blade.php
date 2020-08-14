@extends('layouts.admin')

@section('title')
Inventaris Barang
@endsection

@section('title-card')
Daftar Barang
@endsection

@section('menu-barang')
active
@endsection

@section('menu-barang-daftar')
active
@endsection


@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="form-group mb-4">
    <label for="">Filter</label>
    <div class="row">
        <div class="col-sm-3">
            Sumber Dana
            <select data-column="11" class="form-control" name="fund_id" id="filter-satuan">
                <option value="">Pilih sumber dana</option>
                @foreach ($funds as $fund)
                <option value="{{$fund->name}}">{{$fund->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            Kategori Barang
            <select data-column="10" class="form-control" name="category_id" id="filter-category">
                <option value="">Pilih kategori barang</option>
                @foreach ($categories as $ctg)
                <option value="{{$ctg->name}}">{{$ctg->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table table-responsive table-striped table-bordered table-hover" style="width:100%" id="table_id">
            <thead>
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Barang</th>
                    <th class="align-middle">Merek</th>
                    <th class="align-middle">Jumlah</th>
                    <th class="align-middle">Nomor Mesin</th>
                    <th class="align-middle">Satuan</th>
                    <th class="align-middle">Tanggal Beli</th>
                    <th class="align-middle">Lokasi</th>
                    <th class="align-middle">Kondisi</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Harga</th>
                    <th class="align-middle">Kategori</th>
                    <th class="align-middle">Sumber Dana</th>
                    <th class="align-middle" style="width: 165px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="info"></div>
@endsection

@section('modal')
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="" id="form-delete" class="form-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="form-btn_delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready( function () {
        var table = $('#table_id').DataTable({
            processing:true,
            serverside:true,
            ajax:"{{ route('getdata.inventory') }}",
            dom: "<'row'<'col-sm-12 col-md-6'<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'l>>><'col-sm-12 col-md-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11 ]
                    },
                    pageSize: 'A4'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11 ]
                    }
                },
            ],
            columns:[
                {data:'name'},
                {data:'brand'},
                {data:'amount'},
                {data:'machine_number'},
                {data:'unit'},
                {data:'date'},
                {data:'location'},
                {data:'condition'},
                {data:'status'},
                {data:'price'},
                {data:'category'},
                {data:'fund'},
                {data:'aksi', sortable:false},
            ],
        });

        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        $('#table_id tbody').on('click', 'button', function () {
            var url = $(this).data('remote');
            $('#modal-delete').modal('show');
            $('#form-delete').attr('action', url);

            var tr = $(this).closest('tr');
            var row = table.row(tr).data();
            document.getElementById('modal-body').innerHTML = 'Apakah anda yakin menghapus kategori <strong>' + row.name + '</strong> ?';
        });

        $('#filter-satuan').change(function () {
            table.column( $(this).data('column'))
            .search( $(this).val() )
            .draw();
        });

        $('#filter-category').change(function () {
            table.column( $(this).data('column'))
            .search( $(this).val() )
            .draw();
        });
    });
</script>
@endsection