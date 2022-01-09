<?php
use App\Models\kategoriler;
use App\Models\kitaplar;
use App\Helper\sepetHelper;
?>
<!DOCTYPE html>
<html>
<head>
<title>BookShop</title>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="{{asset('css/style2.css')}}" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="{{asset('js/simpleCart.min.js')}}"> </script>
<link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!--dropdown-->
<script src="{{asset('js/jquery.easydropdown.js')}}"></script>
</head>
<body>

    <!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
                        @auth
                        <div class="box">
							<a style="text-decoration: none; color:White" href="">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                        </div>
                        <div class="box">
							<a onclick="event.preventDefault();document.getElementById('Logout-form').submit();" style="text-decoration: none; color:White" href="{{route('logout')}}">Çıkış Yap</a>
                            <form action="{{route('logout')}}" method="POST" id="Logout-form">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        @endauth
                        @guest
						<div class="box">
							<a style="text-decoration: none; color:White" href="{{url('login')}}">Giriş Yap</a>
						</div>
						<div class="box1">
							<a style="text-decoration: none; color:White" href="{{url('register')}}">Kayıt Ol</a>
						</div>
                        @endguest
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="{{route('sepet.index')}}">
							 <div class="total">
								<span class="">{{sepetHelper::totalprice()}} TL</span></div>
								<img src="{{asset('images/cart-1.png')}}" alt="" />
						</a>
						<p><a href="{{route('sepet.flush')}}" class="simpleCart_empty">Sepeti Temizle</a></p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="{{url('/')}}"><h1>Book Shop</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue"><li class="active"><a href="{{url('/')}}">Anasayfa</a></li>
                        @foreach (kategoriler::all() as $key => $value )
						<li class="grid"><a href="{{route('cat',['selflink'=>$value['selflink']])}}">{{$value['name']}}</a></li>
                        @endforeach
						<li class="grid"><a href="#">Kategoriler</a>
							<div class="mepanel">
								<div class="row">
									<div class="col1 me-one">
										@foreach (kategoriler::all() as $key => $value )
                                        <h4 style="color: gray"><a style="text-decoration: none" href="{{route('cat',['selflink'=>$value['selflink']])}}">{{$value['name']}}</a></h4>
                                        @endforeach
									</div>
								</div>
							</div>
						</li>
						<li class="grid"><a href="contact.html">Contact</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right">
				<div class="search-bar">
                    <form action="{{route('search')}}">
					<input type="text" name="q" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
                    </form>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>

    @yield('content')

    <div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">
					<p>© 2015 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

</body>
</html>

