<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\yayinevi;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data = yayinevi::paginate(10);
        return view('admin.yayinevi.index',['data'=>$data]);
    }

    public function create(){
        return view('admin.yayinevi.create');
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = yayinevi::create($all);
        if($insert){
            return redirect()->back()->with('status','yayın evi eklendi');
        }
        else{
            return redirect()->back()->with('status','eklenemedi');
        }
    }

    public function edit($id){
        $data = yayinevi::where('id','=',$id)->get();
        return view('admin.yayinevi.edit',['data'=>$data]);
    }

    public function update(Request $request){
        $id = $request->route('id');
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $update = yayinevi::where('id','=',$id)->update($all);
        if($update){
            return redirect()->back()->with('status','yayın evi düzenlendi');
        }
        else{
            return redirect()->back()->with('status','düzenlenmedi');
        }
    }public function delete($id){
        $delete = yayinevi::where('id','=',$id)->delete();
        return redirect()->back();
    }



}
