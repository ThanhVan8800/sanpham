@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
@foreach($lstSanPham as $sp)    
    <a href="ten/{{$sp -> id}}"> {{$sp -> ten_san_pham }}</a><br/>
    <p>{{$sp->mo_ta}}</p>
    <p>{{$sp->so_luong}}</p>
    <p>{{$sp->gia}}</p>
    <p>{{$sp->hinh}}</p>
    <p>{{$sp->loai_san_pham_id}}</p>
    <p>{{$sp->mo_ta}}</p>
    @endforeach
@endsection