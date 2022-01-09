<?php

namespace App\Http\Controllers\admin\yazar;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\yazarlar;
use Illuminate\Http\Request;
use App\Helper\imageUpload;
use Illuminate\Support\Facades\File;

class indexController extends Controller
{
    public function index(){
        $data = yazarlar::paginate(10);
        return view('admin.yazar.index',['data'=>$data]);
    }

    public function create(){
        return view('admin.yazar.create');
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleupload(rand(1,9000),"yazar",$request->file('image'));
        $insert = yazarlar::create($all);
        if($insert){
            return redirect()->back()->with('status','Yazar Eklendi');
        }
        else{
            return redirect()->back()->with('status','Eklenemedi');
        }
    }

    public function edit($id){
        $c = yazarlar::where('id','=',$id)->count();
        if($c!=0){
            $data = yazarlar::where('id','=',$id)->get();
         return view('admin.yazar.edit',['data'=>$data]);
        }
        else{
            return redirect('/');
        }
    }

    public function update(Request $request){
        $id = $request->route('id');
        $c = yazarlar::where('id','=',$id)->count();
        if($c!=0){
            $data = yazarlar::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleuploadUpdate(rand(1,9000),"yazar",$request->file('image'),$data,"image");
            $update = yazarlar::where('id','=',$id)->update($all);
            if($update){
                return redirect()->back()->with('status','Yazar Güncellendi');
            }
            else{
                return redirect()->back()->with('status','GÜncellenemedi');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function delete($id){

        $c = Yazarlar::where('id','=',$id)->count();
        if($c != 0){

            $w = Yazarlar::where('id','=',$id)->get();
            $bol = explode("/", $w[0]['image'], 4);
            File::deleteDirectory(public_path("images/yazar/".$bol[2]));
            $delete = Yazarlar::where('id','=',$id)->delete();

            if($delete){
                return redirect()->back()->with('status','Yazar Başarıyla Silindi');
            }else{
                return redirect()->back()->with('status','Yazar Silinemedi');
            }

        }else{
            return redirect('/');
        }
    }

}
