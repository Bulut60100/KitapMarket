<?php
use App\Helper\mHelper;
use App\Models\yayinevi;
use App\Models\yazarlar;
use App\Models\kategoriler;
?>

@extends('layouts.app')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/kitap/detay/index">Anasayfa</a></li>
                <li class="active">{{$data[0]['name']}}</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-12 single-main-left">
            <div class="sngl-top">
                <div class="col-md-4 single-top-left">
                    <div class="flexslider">
                          <ul class="slides">
                            <li data-thumb="{{asset(mhelper::largeimage($data[0]['image']))}}">
                                <div style="width: 100%" class="thumb-image"> <img src="{{asset(mhelper::largeimage($data[0]['image']))}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                            </li>
                          </ul>
                    </div>
                    <!-- FlexSlider -->
                    <script src="{{asset('js/imagezoom.js')}}"></script>
                    <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
                    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />

                    <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                      $('.flexslider').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails"
                      });
                    });
                    </script>
                </div>
                <div class="col-md-8 single-top-right">
                    <div class="single-para simpleCart_shelfItem">
                    <h2>{{$data[0]['name']}}</h2>
                        <h5 class="item_price">{{$data[0]['fiyat']}} TL</h5>
                        <p>{{$data[0]['aciklama']}}</p>
                        <div class="available">
                    </div>
                        <ul class="tag-men">
                            <li><span>Kategori</span>
                        <span class="women1">&nbsp;&nbsp;: {{kategoriler::getfield($data[0]['kategori_id'],'name')}}</span></li>
                            <li><span>Yayın Evi</span>
                        <span class="women1">: {{yayinevi::getfield($data[0]['yayinevi_id'],'name')}}</span></li>
                            <li><span>Yazar</span>
                        <span class="women1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{yazarlar::getfield($data[0]['yazarid'],'name')}}</span></li>
                        </ul>
                            <a href="{{route('sepet.add',['id'=>$data[0]['id']])}}" class="add-cart item_add">Sepete EKle</a>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="latestproducts">
                <div class="product-one">
                    @foreach (\App\Models\kitaplar::inRandomOrder()->limit(3)->get() as $key => $value)

                    <div class="col-md-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="{{route('kitap.detay',['selflink'=>$value['selflink']])}}" class="mask"><img style="width: 200px; height: 250px" class="img-responsive zoom-img" src="{{asset(\App\Helper\mHelper::largeimage($value['image']))}}" alt="" /></a>
                            <div class="product-bottom">
                                <h3>{{$value['name']}}</h3>
                                <p>{{\App\Models\yazarlar::getField($value['yazarid'],"name")}}</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value['fiyat']}}</span></h4>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection
