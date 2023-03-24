<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categogy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories= Categogy::all();
        return view('admin.category.list',compact('categories'));
    }
// -------------------------------------------------------------------------------------------------------------------
    public function create(){
        return view('admin.category.create');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function store(Request $request){
    // <!-- neu khong dien ten se bao loi -->
        $this->validate($request,
        ['name'=>'required' ],
        // ['name.requierd'=>'loiiiii']
        );
        $slug=Str::slug($request->name);
        $checkSlug=Categogy::where('slug',$slug)->first();
        while($checkSlug){
            $slug=$checkSlug->slug."-".Str::random(2);
        }
        Categogy::create([
            'name'=> $request->name,
            'slug'=>$slug,
        ]);
        return redirect()->route('admin.category.index')->with('success','create successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function edit($id){
        $category=Categogy::find($id);
        return view('admin.category.edit',compact('category'));
    }
// -------------------------------------------------------------------------------------------------------------------
    public function update(Request $request,$id){
        // <!-- neu khong dien ten se bao loi -->
        $this->validate($request,
        ['name'=>'required' ],
        // ['name.requierd'=>'loiiiii']
        );

        $slug=Str::slug($request->name);
        $checkSlug=Categogy::where('slug',$slug)->first();
        while($checkSlug){
            $slug=$checkSlug->slug.Str::random(2);
        }
        // $category=Categogy::find($id);
        // $category->update([
        //     'name'=> $request->name,
        //     'slug'=>$slug,
        // ]);
        
        Categogy::where('id',$id)->update([
            'name'=> $request->name,
            'slug'=>$slug,
        ]);
        return redirect()->route('admin.category.index',$id)->with('success','Update category successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function delete($id){
        Categogy::where('id',$id)->delete();
        return redirect()->route('admin.category.index')->with('success','Delete successfully');
    }
}
