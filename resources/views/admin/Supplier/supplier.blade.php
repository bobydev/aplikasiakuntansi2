@extends('layouts.layout') 
@section('content') 
@include('sweetalert::alert') 
<div class="d-sm-flex align-items-center justify-content-between mb-4"> 
    <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
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
                        <th>Kode Supplier</th> 
                        <th>Nama Supplier</th> 
                        <th>Alamat</th>
                        <th>No. Telepon</th> 
                        <th>Opsi</th> 
                    </tr>                 
                </thead>
                <tbody>
                @foreach($supplier as $supp) 
                    <tr align="center"> 
                        <td>{{ $supp->kd_supp }}</td> 
                        <td>{{ $supp->nm_supp }}</td> 
                        <td>{{ $supp->alamat }}</td> 
                        <td>{{ $supp->no_telp }}</td> 
                        <td align="center">
                            <a href="{{route('supplier.edit',[$supp->kd_supp])}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"> 
                            <!-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-add"> -->
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                            <!-- </button>  -->
                            </a>
                            <a href="/supplier/hapus/{{$supp->kd_supp}}" onclick="return confirm('Yakin Ingin menghapus data?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"> 
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
    
    <form action="{{ action('SupplierController@store') }}" method="POST"> 
            @csrf

        <div class="modal-content"> 
        <div class="modal-header"> 
            <h4 class="modal-title">Tambah Data Supplier</h4> 
        </div>

             
        <div class="modal-body"> 
            <div class="form-group">
                <label class="col-lg-20 control-label">Kode Supplier</label>
            <div class="col-lg-20">
                <input type="text" name="addkdsupp" id="addkdsupp" class="form-control">
        </div>
             
        <div class="form-group">
            <label class="col-lg-20 control-label">Nama Supplier</label>
        <div class="col-lg-20">
            <input type="text" name="addnmsupp" id="addnmsup" class="form-control">
        </div>

        <div class="form-group">
            <label class="col-lg-20 control-label">Alamat</label>
        <div class="col-lg-20">
            <input type="text" name="addalamat" id="addalamat" class="form-control">
        </div>

        <div class="form-group">
            <label class="col-lg-20 control-label">No. Telepon</label>
        <div class="col-lg-20">
            <input type="text" name="addnotelp" id="addnotelp" class="form-control">
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
