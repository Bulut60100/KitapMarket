<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriler extends Model
{
    protected $guarded = [];

    static function getField($id,$field){

        $c = kategoriler::where('id','=',$id)->count();
        if($c!=0){
            $w = kategoriler::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else{
            return "Silinmiş Kategori";
        }

    }
}
