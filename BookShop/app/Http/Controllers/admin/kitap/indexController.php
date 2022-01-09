<?php

namespace App\Http\Controllers\admin\kitap;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\kategoriler;
use App\Models\kitaplar;
use App\Models\yayinevi;
use App\Models\yazarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class indexController extends Controller
{
    public function index(){
        $data = kitaplar::paginate(10);
        return view('admin.kitap.index',['data'=>$data]);
    }

    public function create(){
        $yazar = yazarlar::all();
        $yayinevi = yayinevi::all();
        $kategori = kategoriler::all();
        return view('admin.kitap.create',['yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);
    }
    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink']= mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleupload(rand(1,900),'kitap',$request->file('image'));

        $insert = kitaplar::create($all);
        if($insert){
            return redirect()->back()->with('status','Kitap eklendi');

        }
        else{
            return redirect()->back()->with('status','Eklenmedi');
        }

    }

    public function edit($id){
        $c = kitaplar::where('id','=',$id)->count();
        if($c!=0){
            $data = kitaplar::where('id','=',$id)->get();
            $yazar = yazarlar::all();
            $yayinevi = yayinevi::all();
            $kategori = kategoriler::all();
            return view('admin.kitap.edit',['data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);
        }
        else{
            return redirect('/');
        }
    }

    public function update(Request $request){
        $id = $request->route('id');
        $c = kitaplar::where('id','=',$id)->count();
        if($c!=0){
            $data = kitaplar::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleuploadUpdate(rand(1,900),'kitap',$request->file('image'),$data,"image");
            $update = kitaplar::where('id','=',$id)->update($all);
            if($update){
                return redirect()->back()->with('status','Kitap Güncellendi');

            }
            else{
                return redirect()->back()->with('status','Güncellenemedi');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function delete($id){

        $c = kitaplar::where('id','=',$id)->count();
        if($c != 0){

            $w = kitaplar::where('id','=',$id)->get();
            $bol = explode("/", $w[0]['image'], 4);
            File::deleteDirectory(public_path("images/kitap/".$bol[2]));
            $delete = kitaplar::where('id','=',$id)->delete();

            if($delete){
                return redirect()->back()->with('status','Kitap Başarıyla Silindi');
            }else{
                return redirect()->back()->with('status','Kitap Silinemedi');
            }

        }else{
            return redirect('/');
        }
    }


}
