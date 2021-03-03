@extends('layouts.layout') 
@section('content') 
@include('sweetalert::alert') 

<form action="{{route('barang.update', [$barang->kd_brg])}}" method="POST"> 
    @csrf 
    <input type="hidden" name="_method" value="PUT"> 
    <fieldset> 
        <legend>Ubah Data Barang</legend> 
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="addkdbrg">Kode Barang</label> 
                <input class="form-control" type="text" name="addkdbrg" value="{{$barang->kd_barang}}" readonly> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="addnmbrg">Nama Barang</label>
                <input id="addnmbrg" type="text" name="addnmbrg" class="form-control" value="{{$barang->nm_barang}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="Harga">Harga</label> 
                <input id="addharga" type="text" name="addharga" class="form-control" value="{{$barang->harga}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="Stok">Stok</label> 
                <input id="addstok" type="text" name="addstok" class="form-control" value="{{$barang->stok}}"> 
            </div>