<?php
use App\Helper\sepetHelper;
?>
@extends('layouts.app')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="active">Sepetim</li>
            </ol>
        </div>
    </div>
</div>

<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>Sipariş</h2>
        </div>
        <div class="ckeckout-top">
        <div class="cart-items">
         <h3>Sepetim ({{sepetHelper::countdata()}})</h3>


        <div class="in-check" >
            <ul class="unit">
                <li><span>Resim</span></li>
                <li><span>Ürün Adı</span></li>
                <li><span>Fiyat</span></li>
                <li> </li>
                <div class="clearfix"> </div>
            </ul>
            @foreach (sepetHelper::allList() as $key => $value)

            <ul class="cart-header">
                <a href="{{route('sepet.remove',['id'=>$key])}}"><div class="close1"> </div></a>
                    <li class="ring-in"><img style="width: 82px; height:117px" src="{{$value['image']}}" class="img-responsive" alt=""></li>
                    <li><span class="name">{{$value['name']}}</span></li>
                    <li><span class="cost">{{$value['fiyat']}} TL</span></li>
                <div class="clearfix"> </div>
            </ul>

            @endforeach
        </div>
        </div>
     </div>

     <a href="{{route('sepet.complete')}}">Alışverişi Tamamla</a>

    </div>
</div>

@endsection
