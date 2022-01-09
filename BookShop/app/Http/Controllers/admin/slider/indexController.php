<?php

namespace App\Http\Controllers\admin\slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\mHelper;
use App\Models\slider;
use App\Helper\imageUpload;
use Illuminate\Support\Facades\File;

class indexController extends Controller
{
    public function index(){
        $data = slider::paginate(10);
        return view('admin.slider.index',['data'=>$data]);
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['image'] = imageUpload::singleupload(rand(1,900),"slider",$request->file('image'));
        if($all['image']!=""){
        $insert = slider::create($all);
        if($insert){
            return redirect()->back()->with('status','Slider Eklendi');
        }
        else{
            return redirect()->back()->with('status','Eklenemedi');
        }
    }
    else{
        return redirect()->back()->with('status','Eklenemedi');
    }

    }

    public function edit($id){

        $data = slider::where('id','=',$id)->get();
        return view('admin.slider.edit',['data'=>$data]);


    }

    public function update(Request $request){
        $id = $request->route('id');
        $data = slider::where('id','=',$id)->count();
        $all['image'] = imageUpload::singleuploadupdate(rand(1,900),"slider",$request->file('image'),$data,'image');
        if($all['image']!=""){
            $insert = slider::where('id','=',$id)->update($all);
            if($insert){
                return redirect()->back()->with('status','Slider Düzenlendi');
            }
            else{
                return redirect()->back()->with('status','Düzenlenmedi');
            }
        }
        else{
            return redirect()->back()->with('status','Düzenlenmedi');
        }
    }

    public function delete($id){

        $c = slider::where('id','=',$id)->count();
        if($c != 0){

            $w = slider::where('id','=',$id)->get();
            $bol = explode("/", $w[0]['image'], 4);
            File::deleteDirectory(public_path("images/yazar/".$bol[2]));
            $delete = slider::where('id','=',$id)->delete();

            if($delete){
                return redirect()->back()->with('status','Slider Başarıyla Silindi');
            }else{
                return redirect()->back()->with('status','Slider Silinemedi');
            }

        }else{
            return redirect('/');
        }
    }
}
