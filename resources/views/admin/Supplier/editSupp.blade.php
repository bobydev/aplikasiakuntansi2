@extends('layouts.layout') 
@section('content') 
@include('sweetalert::alert') 
@foreach ($supplier as $supp)
<form action="{{route('supplier.update', [$supp->kd_supp])}}" method="POST"> 
    @csrf 
    <input type="hidden" name="_method" value="PUT"> 
    <fieldset> 
        <legend>Sunting Data Supplier</legend> 
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="addkdsupp">Kode Supplier</label> 
                <input class="form-control" type="text" name="addkdsupp" value="{{$supp->kd_supp}}" readonly> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="addnmsupp">Nama Supplier</label>
                <input id="addnmsupp" type="text" name="addnmsupp" class="form-control" value="{{$supp->nm_supp}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="addalamat">Alamat</label> 
                <input id="addalamat" type="text" name="addalamat" class="form-control" value="{{$supp->alamat}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="addnotelp">No. Telepon</label> 
                <input id="addnotelp" type="text" name="addnotelp" class="form-control" value="{{$supp->no_telp}}"> 
            </div>
        </fieldset> 
        
        <div class="col-md-10"> 
            <input type="submit" class="btn btn-success btn-send" value="Update"> 
                <a href="{{ route('supplier.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a> 
        </div> <hr> 
</form> 
@endforeach
@endsection