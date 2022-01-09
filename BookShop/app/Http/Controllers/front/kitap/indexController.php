<?php

namespace App\Http\Controllers\front\kitap;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink){

        $c = kitaplar::where('selflink','=',$selflink)->count();
        if($c!=0){

            $w = kitaplar::where('selflink','=',$selflink)->get();
            return view('front.kitap.index',['data'=>$w]);

        }
        else{
            return redirect('/');
        }

    }
}
