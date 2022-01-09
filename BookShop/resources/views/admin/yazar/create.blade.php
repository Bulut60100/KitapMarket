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
              <h4 class="card-title">Yazar Ekle</h4>
              <p class="card-category">Yazar Evi Oluşturunuz</p>
            </div>
            <div class="card-body">
              <form action="{{route('admin.yazar.create.post')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Yazar Adı</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <label class="bmd-label-floating">Yazar resmi</label>
                        <input type="file" name="image">
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Yazar Bio</label>
                            <input type="text" name="bio" class="form-control">
                          </div>
                        </div>
                        </div>

                </div>
                <button type="submit" class="btn btn-primary pull-right">Yazar Ekle</button>
                <div class="clearfix"></div>
              </form>
            </div>
        </div>
      </div>
    </div>


@endsection
