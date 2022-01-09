<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yayinevi extends Model
{
    protected $guarded = [];

    static function getField($id,$field){

        $c = yayinevi::where('id','=',$id)->count();
        if($c!=0){
            $w = yayinevi::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else{
            return "Silinmiş Kategori";
        }

    }
}
