<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('assets/img/sidebar-2.jpg')}}">

    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Admin Paneli
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item active  ">
          <a class="nav-link" href="{{route('admin.index')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('admin.order.index')}}">
              <i class="material-icons">notifications</i>
              <p>Siparişler</p>
            </a>
          </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('admin.kitap.index')}}">
            <i class="material-icons">person</i>
            <p>Kitaplar</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('admin.kategori.index')}}">
            <i class="material-icons">content_paste</i>
            <p>Kategori</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('admin.yayinevi.index')}}">
            <i class="material-icons">library_books</i>
            <p>Yayın Evi</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('admin.yazar.index')}}">
            <i class="material-icons">bubble_chart</i>
            <p>Yazarlar</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('admin.slider.index')}}">
            <i class="material-icons">location_ons</i>
            <p>Slider</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
