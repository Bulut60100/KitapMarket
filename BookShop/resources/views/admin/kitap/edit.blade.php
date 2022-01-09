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


          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Kitap Düzenle</h4>
              <p class="card-category">{{$data[0]['name']}}</p>
            </div>
            <div class="card-body">
              <form action="{{route('admin.kitap.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}">
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        @if ($data[0]['image']!="")
                        <img src="{{asset($data[0]['image'])}}" style="width: 120px; height:120px" alt="">
                        @endif
                        <input type="file" name="image">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select name="yazarid" class="form-control" id="">
                            @foreach ($yazar as $key => $value )
                            <option @if ($value['id'] == $data[0]['yazarid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
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
                            <option @if ($value['id'] == $data[0]['yayinevi_id']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
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
                            <option @if ($value['id'] == $data[0]['kategori_id']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" name="fiyat" class="form-control" value="{{$data[0]['fiyat']}}">
                      </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="text" name="aciklama" class="form-control" value="{{$data[0]['aciklama']}}">
                          </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary pull-right">Kitap Düzenle</button>
                <div class="clearfix"></div>
              </form>
            </div>
        </div>
      </div>
    </div>


@endsection
