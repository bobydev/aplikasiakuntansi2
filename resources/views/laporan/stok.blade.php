@extends('layouts.layout') 
@section('content') 

<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-12"> 
            <div class="card"> 
                <div class="cardheader">Laporan Stok</div> 
                    <div class="table-responsive"> 
                        <table class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
                        
                        <thead> 
                            <tr align="center"> 
                                <th>Kode</th> 
                                <th>Nama</th> 
                                <th>Stok Awal</th> 
                                <th>Beli</th> 
                                <th>Retur</th> 
                                <th>Stok Total (Stok + Beli - retur)</th> 
                            </tr> 
                        </thead> 
                        
                        <tbody> 
                        
                        
                        @foreach ($data as $item) 
                            <tr align="center"> 
                                <td>{{ $item->kd_barang}}</td> 
                                <td>{{ $item->nm_barang}}</td> 
                                <td>{{ number_format($item->stok,0,',','.') }}</td> 
                                <td>{{ number_format($item->beli,0,',','.') }}</td> 
                                <td>{{ number_format($item->retur,0,',','.') }}</td> 
                                <td>{{ number_format(($item->stok+$item->beli)-$item->retur) }}</td> 
                            </tr>  
                        @endforeach 
                        
                        </tbody> 
                    </table> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection