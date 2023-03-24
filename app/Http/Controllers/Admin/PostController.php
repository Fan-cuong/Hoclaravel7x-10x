<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;


use App\Http\Controllers\Controller;
use App\Models\Categogy;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts= Post::paginate(10);
        return view('admin.post.list',compact('posts'));
// -------------------------------------------------------------------------------------------------------------------   
    }
    public function create(){
        $categories= Categogy::all();
        return view('admin.post.create',compact('categories'));
    }
// -------------------------------------------------------------------------------------------------------------------
    public function store(Request $request){
        // dd($request);
         $this->validate($request,
            [
                'title'=>'required' ,
                'description'=>'required' ,
                'content'=>'required' ,
                'image'=>'required' ,
                'category_id'=>'required' 
            ]
        );
        $slug=Str::slug($request->name);
        $checkSlug=Post::where('slug',$slug)->first();
        if($checkSlug){
            $slug=$checkSlug->slug."-".Str::random(2);
        }
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name_file=$file->getClientOriginalName();

            $extension=$file->getClientOriginalExtension();

            if(strcasecmp($extension, 'jpg') === 0
                || strcasecmp($extension,'png') === 0
                || strcasecmp($extension,'jepg') === 0 ) {
                    $image = Str::random(5)."-". $name_file;
                    while(file_exists("image/post/". $image)){
                        $image = Str::random(5)."-". $name_file;
                    }
                $file->move('image/post',$image);
            }
        }
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            // 'content'=>$request->content,
            'content'=>$request->get('content'),
            'image'=>$image,
            'view_counts'=>0,
            'user_id'=>1,  
            // Auth::id(),
            'new_post'=>$request->new_post ?:0,
            'slug'=>$slug,
            'category_id'=>$request->category_id,
            'hightlight_post'=>$request->hightlight_post ?1:0,
        ]);

        return redirect()->route('admin.post.index')->with('success','create post successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function edit($id){
        $post=Post::find($id);
        $categories= Categogy::all();
        return view('admin.post.edit',compact('post','categories'));
    }
// -------------------------------------------------------------------------------------------------------------------
    public function update(Request $request,$id){
        // dd($request);
         // <!-- neu khong dien ten se bao loi -->
         $this->validate($request,
            [
                'title'=>'required' ,
                'description'=>'required' ,
                'content'=>'required' ,
                'category_id'=>'required',
            ]
         //  ['image'=>'required' ,
         // ['name.requierd'=>'loiiiii']
        );
        $slug=Str::slug($request->name);
        $checkSlug=Post::where('slug',$slug)->first();
        if($checkSlug){
            $slug=$checkSlug->slug.Str::random(2);
        }
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name_file=$file->getClientOriginalName();

            $extension=$file->getClientOriginalExtension();

            if(strcasecmp($extension, 'jpg') === 0
                || strcasecmp($extension,'png') === 0
                || strcasecmp($extension,'jepg') === 0 ) {
                    $image = Str::random(5)."-". $name_file;
                    while(file_exists("image/post/". $image)){
                        $image = Str::random(5)."-". $name_file;
                    }
                $file->move('image/post',$image);
            }
        }
        $post=Post::find($id);
        $post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            // 'content'=>$request->get'(content)',
            // 'image'=>isset($image) ? $image : $post->get('image'),
            'image'=>isset($image) ? $image : $post->image,
            // 'view_counts'=>0,
            // 'user_id'=>1,  // Auth::id()
            'new_post'=>$request->new_post ? 1 : 0,
            'slug'=>$slug,
            'category_id'=>$request->category_id,
            'hightlight_post'=>$request->hightlight_post ? 1 : 0,
        ]);

        return redirect()->route('admin.post.index', $id)->with('success','Update post successfully');
    }
// -------------------------------------------------------------------------------------------------------------------
    public function delete($id){
        Post::where('id',$id)->delete();
        return redirect()->route('admin.post.index')->with('success','Delete successfully');
    }
}
