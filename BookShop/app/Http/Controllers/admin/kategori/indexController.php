<?php

namespace App\Http\Controllers\admin\kategori;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\kategoriler;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data = kategoriler::paginate(10);
        return view('admin.kategori.index',['data'=>$data]);
    }

    public function create(){
        return view('admin.kategori.create');
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = kategoriler::create($all);
        if($insert){
            return redirect()->back()->with('status','Kategori eklendi');
        }
        else{
            return redirect()->back()->with('status','eklenemedi');
        }
    }

    public function edit($id){
        $data = kategoriler::where('id','=',$id)->get();
        return view('admin.kategori.edit',['data'=>$data]);
    }

    public function update(Request $request){
        $id = $request->route('id');
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $update = kategoriler::where('id','=',$id)->update($all);
        if($update){
            return redirect()->back()->with('status','Kategori düzenlendi');
        }
        else{
            return redirect()->back()->with('status','düzenlenmedi');
        }
    }public function delete($id){
        $delete = kategoriler::where('id','=',$id)->delete();
        return redirect()->back();
    }
}
