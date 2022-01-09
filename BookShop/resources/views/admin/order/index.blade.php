@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Siparişler</h4>
              <p class="card-category"> Buradan Siparişler ile ilgili işlemleri gerçekleştirebilirsiniz</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                      <tr>
                      <th>Alıcı</th>
                      <th>Adres</th>
                      <th>Telefon</th>
                      <th>Mesaj</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      </tr>
                  </thead>
                  <tbody>

                      @foreach ($data as $key => $value)

                    <tr>
                      <td>{{\App\Models\User::getField($value['userid'],'name')}}</td>
                      <td>{{$value['adres']}}</td>
                      <td>{{$value['telefon']}}</td>
                      <td>{{$value['mesaj']}}</td>
                      <td><a href="{{route('admin.order.detail',['id' => $value['id']])}}">Detay</td>
                      <td><a href="{{route('admin.order.delete',['id' => $value['id']])}}">Sil</td>
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
