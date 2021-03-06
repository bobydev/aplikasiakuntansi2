@extends('layouts.layout') 
@section('content') 
@include('sweetalert::alert') 
<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
    <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
</div> <hr> 
<div class="card-header py-3" align="right"> 
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-add"> 
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah 
    </button> 
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
    <div class="card-body"> 
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark"> 
                    <tr align="center"> 
                        <th>Kode Barang</th> 
                        <th>Nama Barang</th> 
                        <th>Harga Barang</th>
                        <th>Stok Barang</th> 
                        <th>Opsi</th> 
                    </tr>                 
                </thead>
                <tbody>
                @foreach($barang as $brg) 
                    <tr align="center"> 
                        <td>{{ $brg->kd_barang}}</td> 
                        <td>{{ $brg->nm_barang}}</td> 
                        <td>{{ number_format($brg->harga)}}</td> 
                        <td>{{ number_format($brg->stok)}}</td> 
                        <td align="center">
                            <a href="{{route('barang.edit',[$brg->kd_barang])}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"> 
                            <!-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-add"> -->
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                            <!-- </button>  -->
                            </a>
                            <a href="/barang/hapus/{{$brg->kd_barang}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"> 
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                            </a> 
                        </td> 
                    </tr>
                @endforeach 
                </tbody> 
            </table> 
        </div> 
    </div> 
</div>

<div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog modal-xs"> 
 
    <form action="{{ action('BarangController@store') }}" method="POST"> 
        @csrf

        <div class="modal-content"> 
        <div class="modal-header"> 
            <h4 class="modal-title">Tambah Data User</h4> 
        </div>

        <div class="modal-body"> 
            <div class="form-group">
                <label class="col-lg-20 control-label">Kode Barang</label>
            <div class="col-lg-20">
                <input type="text" name="addkdbrg" id="addkdbrg" class="form-control">
        </div>
             
        <div class="form-group">
            <label class="col-lg-20 control-label">Nama Barang</label>
        <div class="col-lg-20">
            <input type="text" name="addnmbrg" id="addnmbrg" class="form-control">
        </div>

        <div class="form-group">
            <label class="col-lg-20 control-label">Harga Barang</label>
        <div class="col-lg-20">
            <input type="number" name="addharga" id="addharga" class="form-control">
        </div>

        <div class="form-group">
            <label class="col-lg-20 control-label">Stok</label>
        <div class="col-lg-20">
            <input type="number" name="addstok" id="addstok" class="form-control">
        </div>

    </div> 
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button> 
                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                </div> 
                @endsection
            </div>
        </form> 
    </div> 
</div> 
