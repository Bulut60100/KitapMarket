@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">


        @if (session('status'))
        <div class="alert alert-primary" role="alert">
        {{session("status")}}
        </div>
        @endif


        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Kitap Ekle</h4>
              <p class="card-category">Yeni Kitap Oluşturunuz</p>
            </div>
            <div class="card-body">
              <form action="{{route('admin.kitap.create.post')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Kitap Adı</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label class="bmd-label-floating">Kitap resmi</label>
                        <input type="file" name="image">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select name="yazarid" class="form-control" id="">
                            @foreach ($yazar as $key => $value )
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <select name="yayinevi_id" class="form-control" id="">
                            @foreach ($yayinevi as $key => $value )
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <select name="kategori_id" class="form-control" id="">
                            @foreach ($kategori as $key => $value )
                            <option value="{{$value['id']}}">{{$value['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating">Kitap Fiyatı</label>
                        <input type="text" name="fiyat" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating">Kitap Açıklama</label>
                        <input type="text" name="aciklama" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

                <button type="submit" class="btn btn-primary pull-right">Kitap Ekle</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
