@extends('layouts.layout') 
@section('content') 
@include('sweetalert::alert') 
@foreach ($barang as $brg)
<form action="{{route('barang.update', [$brg->kd_barang])}}" method="POST"> 
    @csrf 
    <input type="hidden" name="_method" value="PUT"> 
    <fieldset> 
        <legend>Sunting Data Barang</legend> 
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="addkdbrg">Kode Barang</label> 
                <input class="form-control" type="text" name="addkdbrg" value="{{$brg->kd_barang}}" readonly> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="addnmbrg">Nama Barang</label>
                <input id="addnmbrg" type="text" name="addnmbrg" class="form-control" value="{{$brg->nm_barang}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="Harga">Harga</label> 
                <input id="addharga" type="text" name="addharga" class="form-control" value="{{$brg->harga}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="Stok">Stok</label> 
                <input id="addstok" type="text" name="addstok" class="form-control" value="{{$brg->stok}}"> 
            </div>
        </fieldset> 
        
        <div class="col-md-10"> 
            <input type="submit" class="btn btn-success btn-send" value="Update"> 
                <a href="{{ route('barang.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a> 
        </div> <hr> 
</form> 
@endforeach
@endsection