@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.slider.create')}}" class="btn btn-succes">Yeni slider Ekle</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Slider</h4>
              <p class="card-category"> Buradan Slider ile ilgili işlemleri gerçekleştirebilirsiniz</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                      <tr>
                      <th>Önizleme</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      </tr>
                  </thead>
                  <tbody>

                      @foreach ($data as $key => $value)

                    <tr>
                      <td><img src="{{asset($value['image'])}}" style="width: 120px; height: 120px" alt=""></td>
                      <td><a href="{{route('admin.slider.edit',['id' => $value['id']])}}">Düzenle</td>
                      <td><a href="{{route('admin.slider.delete',['id' => $value['id']])}}">Sil</td>
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
