<?php

namespace App\Http\Controllers\front\sepet;

use App\Helper\sepetHelper;
use App\Http\Controllers\Controller;
use App\Models\kitaplar;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(){
        return view('front.sepet.index');
    }

    public function add($id){
        $c = kitaplar::where('id','=',$id)->count();
        if($c!=0){
            $w = kitaplar::where('id','=',$id)->get();
            sepetHelper::add($id,$w[0]['fiyat'], asset($w[0]['image']),$w[0]['name']);
            return redirect()->back();

        }
        else{
            return redirect()->route('index');
        }
    }

    public function remove($id){

        sepetHelper::remove($id);
        return redirect()->back();

    }

    public function complete(){
        if(sepetHelper::countdata()!=0){
            return view('front.sepet.complete');
        }
        else{
            return redirect('/');
        }
    }

    public function completeStore(Request $request){

        $request->validate(['adres'=>'required','telefon'=>'required']);
        $adres = $request->input('adres');
        $telefon = $request->input('telefon');
        $mesaj = $request->input('mesaj');
        $json = json_encode(sepetHelper::allList());
        $array = [
            'userid' => Auth::id(),
            'adres'=>$adres,
            'telefon'=>$telefon,
            'mesaj'=>$mesaj,
            'json'=>$json
        ];

        $insert = order::create($array);
        if($insert){
            return redirect()->back()->with('status','Siparişiniz Alındı');
            //Session::forget('sepet');
        }
        else{
            return redirect()->back()->with('status','Sipariş Alınamadı');
        }
    }

    public function flush(){
        Session::forget('sepet');
        return redirect('/');
    }

}
