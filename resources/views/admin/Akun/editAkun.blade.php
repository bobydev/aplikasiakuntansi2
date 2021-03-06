@extends('layouts.layout') 
@section('content') 
@include('sweetalert::alert') 
@foreach ($akun as $akn)
<form action="{{route('akun.update', [$akn->no_akun])}}" method="POST"> 
    @csrf 
    <input type="hidden" name="_method" value="PUT"> 
    <fieldset> 
        <legend>Sunting Data Akun</legend> 
        <div class="form-group row"> 
            <div class="col-md-5"> 
                <label for="addnoakun">Kode Akun</label> 
                <input class="form-control" type="text" name="addnoakun" value="{{$akn->no_akun}}"> 
            </div> 
            
            <div class="col-md-5"> 
                <label for="addnmakun">Nama Akun</label>
                <input id="addnmakun" type="text" name="addnmakun" class="form-control" value="{{$akn->nm_akun}}"> 
            </div> 
            
        </fieldset> 
        
        <div class="col-md-10"> 
            <input type="submit" class="btn btn-success btn-send" value="Update"> 
                <a href="{{ route('akun.index') }}"><input type="Button" class="btn btn-primary btn-send" value="Kembali"></a> 
        </div> <hr> 
</form> 
@endforeach
@endsection