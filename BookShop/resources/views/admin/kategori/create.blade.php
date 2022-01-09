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
              <h4 class="card-title">Kategori Ekle</h4>
              <p class="card-category">Kategori Oluşturunuz</p>
            </div>
            <div class="card-body">
              <form action="{{route('admin.kategori.create.post')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Kategori Adı</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Kategori Ekle</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
