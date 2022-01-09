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
              <h4 class="card-title">Yazar Düzenle</h4>
              <p class="card-category">{{$data[0]['name']}}</p>
            </div>
            <div class="card-body">
              <form action="{{route('admin.yazar.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="bio" class="form-control" value="{{$data[0]['bio']}}">
                          </div>
                        </div>
                        </div>

                </div>
                <button type="submit" class="btn btn-primary pull-right">Yazar Düzenle</button>
                <div class="clearfix"></div>
              </form>
            </div>
        </div>
      </div>
    </div>


@endsection
