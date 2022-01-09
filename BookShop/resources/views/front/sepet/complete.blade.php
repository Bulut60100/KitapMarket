@extends('layouts.app')
@section('content')


<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Anasayfa</a></li>
                <li class="active">Alışverişi Tamamla</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--contact-start-->
<div class="contact">
    <div class="container">
        <div class="contact-top heading">
            <h2>Bilgileri Doldurunuz</h2>
        </div>
        @if (session('status'))
            {{session('status')}}
        @endif
            <div class="contact-text">
                <div class="col-md-12 contact-right">
                    <form action="{{route('sepet.completeStore')}}" method="POST">
                       {{ csrf_field() }}
                        <input type="text" name="adres" required placeholder="Adres">
                        @if ($errors->has('adres'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('adres')}}</strong>
                        </span>
                        @endif
                        <input type="text" name="telefon" required placeholder="Phone">
                        <textarea placeholder="Message" name="mesaj" required=""></textarea>
                        <div class="submit-btn">
                            <input type="submit" value="SİPARİŞİ TAMAMLA">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
    </div>
</div>

@endsection
