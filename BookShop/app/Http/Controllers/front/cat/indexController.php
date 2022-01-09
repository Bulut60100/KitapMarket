<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Models\kategoriler;
use App\Models\kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink){
        $c = kategoriler::where('selflink','=',$selflink)->count();
        if($c!=0){
            $w = kategoriler::where('selflink','=',$selflink)->get();
            $data = kitaplar::where('kategori_id','=',$w[0]['id'])->paginate(10);
            return view('front.cat.index',['info'=>$w, 'data'=>$data]);
        }
        else{
            return redirect('/');
        }
    }
}
