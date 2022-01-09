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
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0">Detay</h4>
                <p class="card-category">Burada Sipariş Detaylarını Görebilirsiniz</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="">
                      <th>Ad</th>
                      <th>Adres</th>
                      <th>Telefon</th>
                      <th>Mesaj</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{\App\Models\User::getField($data[0]['userid'],'name')}}</td>
                        <td>{{$data[0]['adres']}}</td>
                        <td>{{$data[0]['telefon']}}</td>
                        <td>{{$data[0]['mesaj']}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0">Verilen Sipariş</h4>
                <p class="card-category">Burada Sipariş Detaylarını Görebilirsiniz</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class="">
                      <th>Kitap Ad</th>
                      <th>Fİyatı</th>
                    </thead>
                    <tbody>
                      @foreach (json_decode($data[0]['json'],true) as $key => $value)
                      <tr>
                          <td>{{$value['name']}}</td>
                          <td>{{$value['fiyat']}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>



      </div>
    </div>
</div>

@endsection
