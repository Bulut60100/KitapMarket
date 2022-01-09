<?php
namespace App\Helper;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class imageUpload{
    static function singleupload($name,$directory,$file){

        $rand = $name;
        $dir = 'images/'.$directory.'/'.$rand;
        $dirlarge = $dir.'/large';

        if(!empty($file)){

            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            if(!File::exists($dirlarge)){
                File::makeDirectory($dirlarge,0755,true);
            }

            $filename = rand(1,9000).'.'.$file->getClientOriginalExtension();
            $path = public_path($dir.'/'.$filename);
            $path2 = public_path($dirlarge.'/'.$filename);

            Image::make($file->getrealpath())->save($path2);
            Image::make($file->getrealpath())->resize(250,250)->save($path);
            return $dir."/".$filename;
        }
        else{
            return "";
        }

    }


    static function singleuploadUpdate($name,$directory,$file,$data,$field){

        $rand = $name;
        $dir = 'images/'.$directory.'/'.$rand;
        $dirlarge = $dir.'/large';

        if(!empty($file)){

            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true);
            }
            if(!File::exists($dirlarge)){
                File::makeDirectory($dirlarge,0755,true);
            }
            File::delete('public/'.$data[0]['field']);
            $filename = rand(1,9000).'.'.$file->getClientOriginalExtension();
            $path = public_path($dir.'/'.$filename);
            $path2 = public_path($dirlarge.'/'.$filename);

            Image::make($file->getrealpath())->save($path2);
            Image::make($file->getrealpath())->resize(250,250)->save($path);
            return $dir."/".$filename;
        }
        else{
            return $data[0][$field];
        }

    }


}
