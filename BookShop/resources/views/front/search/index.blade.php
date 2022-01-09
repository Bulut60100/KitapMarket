<?php
use App\Models\kitaplar;
use App\Models\kategoriler;
use App\Models\yazarlar;
?>

@extends('layouts.app')
@section('content')


<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                @foreach ($data as $key => $value )

                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="{{route('kitap.detay',['selflink'=>$value['selflink']])}}" class="mask"><img style="width: 200px; height: 200px" class="img-responsive zoom-img" src="{{asset($value['image'])}}" alt="" /></a>
                        <div class="product-bottom">
                            <h3>{{$value['name']}}</h3>
                            <p>{{yazarlar::getField($value['yazarid'],'name')}}</p>
                            <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value['fiyat']}} TL</span></h4>
                        </div>
                        <div class="srch">
                            <span>-50%</span>
                        </div>
                    </div>
                </div>

                @endforeach
                {{$data->links()}}

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>

@endsection
