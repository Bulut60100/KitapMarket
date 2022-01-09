<?php

namespace App\Models;

use Facade\Ignition\DumpRecorder\DumpHandler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yazarlar extends Model
{
    protected $guarded = [];

    static function getField($id,$field){

        $c = yazarlar::where('id','=',$id)->count();
        if($c!=0){
            $w = yazarlar::where('id','=',$id)->get();
            return $w[0][$field];
        }
        else{
            return "Silinmiş Yazar";
        }

    }
}

