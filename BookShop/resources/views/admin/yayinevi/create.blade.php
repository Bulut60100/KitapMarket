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
              <h4 class="card-title">Yayın Evi Ekle</h4>
              <p class="card-category">Yayın Evi Oluşturunuz</p>
            </div>
            <div class="card-body">
              <form action="{{route('admin.yayinevi.create.post')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Yayın Evi Adı</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Yayın Evi Ekle</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
