<?php
namespace App\Helper;
use Illuminate\Support\Facades\Session;

class sepetHelper{

    static function add($id,$fiyat,$image,$name){

        $sepet = Session::get('sepet');
        $array = [
            'id' => $id,
            'name'=> $name,
            'image'=> $image,
            'fiyat' => $fiyat
        ];
        Session::put('sepet.'.rand(1,900),$array);

    }

    static function allList(){
        $c = Session::get('sepet');
        return $c;
    }

    static function totalprice(){
        $data = self::allList();
        return collect($data)->sum('fiyat');
    }

    static function countdata(){
        return count(Session::get('sepet'));
    }

    static function remove($id){
        Session::forget('sepet.'.$id);
    }

}
