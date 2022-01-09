@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.kitap.create')}}" class="btn btn-succes">Yeni Kitap Ekle</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Kitap Listesi</h4>
              <p class="card-category"> Buradan Kitaplar ile ilgili işlemleri gerçekleştirebilirsiniz</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                      <tr>
                      <th>İsim</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      </tr>
                  </thead>
                  <tbody>

                      @foreach ($data as $key => $value)

                    <tr>
                      <td>{{$value['name']}}</td>
                      <td><a href="{{route('admin.kitap.edit',['id' => $value['id']])}}">Düzenle</td>
                      <td><a href="{{route('admin.kitap.delete',['id' => $value['id']])}}">Sil</td>
                    </tr>

                    @endforeach

                  </tbody>
                </table>
                {{$data->links()}}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
