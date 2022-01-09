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
              <h4 class="card-title">Slider Düzenle</h4>
            </div>
            <div class="card-body">
              <form action="{{route('admin.slider.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                  <div class="row">
                    <div class="col-md-12">
                        @if ($data[0]['image']!="")
                        <img src="{{asset($data[0]['image'])}}" style="width: 120px; height:120px" alt="">
                        @endif
                        <input type="file" name="image">
                    </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary pull-right">Slider Düzenle</button>
                <div class="clearfix"></div>
              </form>
            </div>
        </div>
      </div>
    </div>


@endsection
