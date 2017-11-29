<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
use App\PostTag;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\FormAdd;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

    public function addNew(FormAdd $request){
        
        $slug = str_slug($request->title);
        $arr=$request->all();
        if($request->hasFile('input-file-preview')){
            $file = $request->file('input-file-preview');
            $file->move('img',$file->getClientOriginalName());
            $arr['thumbnail'] = $file->getClientOriginalName();
        }      
        $arr['slug'] = $slug;
        $arr['user_id'] = Auth::id();
        $post=Post::create($arr);
        $post->tags()->attach($request->tags);
        return redirect(route('admin.quanly'));
    }

    public function quanly(){        
    	return view('admin.quanly');
    }
    public function formAdd(){
        $category = Category::getCategory();
        $tag = Tag::all();
        return view('admin.formAdd',compact('category','tag'));
    }
    public function edit ($id){
        $edit=Post::find($id);
        $category = Category::getCategory();
        $user = User::all();
        $posttag=PostTag::all();
        $tag = Tag::all();
        return view('admin.edit',compact('edit','category','tag','posttag'));
    }
    public function update(FormAdd $request){
        $slug = str_slug($request->title);
        $arr=$request->all();
        if($request->hasFile('input-file-preview')){
            $file = $request->file('input-file-preview');
            $file->move('img',$file->getClientOriginalName());
            $arr['thumbnail'] = $file->getClientOriginalName();
        }      
        $arr['slug'] = $slug;
        $arr['user_id'] = Auth::id();
        //tìm id 
        // $post=Post::find($request->id);
        Post::find($request->id)->update($arr);
        //vứt id vào bảng post tag
        // $post->tags()->attach($request->tags);
        return redirect(route('admin.quanly'));
    }

    //Test bài viết
    public function test(Request $request){
        $random = Post::all()->random(2);
        $post = Post::detail($request->slug);

        return view('admin.test',compact('post','random'));
    }

    public function delete(Request $request){
        Post::find($request->id)->delete();
        return $request->id;
    }
    public function recycleBin(){
        return view('admin.recycleBin');

    }

    //khôi phục 
    public function restoreRecyclebin(Request $request){
        Post::onlyTrashed()->find($request->id)->restore();
        return $request->id;
    }

    //Xóa vĩnh viễn 
    public function deleteRecyclebin(Request $request){
        Post::onlyTrashed()->find($request->id)->forceDelete();
        return $request->id;
    }

    // public function pass(){
    //     return view('admin.test');
    // }
    // public function test(StoreBlogPost $request){
    //     // return redirect(route('test')); 
    //     // sử lý với database
    //     $data = $request->all();
    //     $data['password'] = bcrypt($data['password']);
    //     User::create($data);
    // }

    public function getRecyclebin(){
        $bin=Post::onlyTrashed()->where('user_id',Auth::id())->select(['id', 'title', 'thumbnail','status', 'deleted_at'])->get();
        return Datatables($bin)
        ->addColumn('action', function ($bin) {
                return '<button " class="btn btn-xs btn-primary restore" value="'.$bin->id.'"><i class="glyphicon glyphicon-repeat"></i> Khôi phục</button> <button class="btn btn-xs btn-danger delete" type="button" value="'.$bin->id.'"><i class="glyphicon glyphicon-trash"></i> Xóa</button> <button class="btn btn-xs btn-info " data-toggle="modal" data-target="#detail'.$bin->id.'" type="button" value="'.$bin->id.'"><i class="glyphicon glyphicon-eye-open"></i> Xem</button><div id="detail'.$bin->id.'" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style ="text-align : center">'.$bin->title.'</h4>
                          </div>
                          <div class="modal-body">
                            <img style="width : 100%" src="'.asset('img/'.$bin->thumbnail).'">

                            
                            <p>'.$bin->content.'</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>';
            })
        // ->addColumn('thumbnail',function($bin){
        //     return '<img style="width : 100%" src="img/'.$bin->thumbnail.'">';
        // })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
        
    }
    public function getList()
    {
        // return ;
        $post = Post::where('user_id',Auth::id())->select(['id','content', 'title', 'thumbnail','status', 'created_at'])->get();
        // dd($post->thumbnail);
        return Datatables($post)
        ->addColumn('action', function ($post) {
                return '<a href="edit/'.$post->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Sửa</a> <button class="btn btn-xs btn-danger delete" type="button" value="'.$post->id.'"><i class="glyphicon glyphicon-trash"></i> Xóa</button> <button class="btn btn-xs btn-info " data-toggle="modal" data-target="#detail'.$post->id.'" type="button" value="'.$post->id.'"><i class="glyphicon glyphicon-eye-open"></i> Xem</button><div id="detail'.$post->id.'" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style ="text-align : center ; background-color:#EDEDED">'.$post->title.'</h3>
                          </div>
                          <div class="modal-body">
                            <img style="width : 100%" src="'.asset('img/'.$post->thumbnail).'">

                            
                            <p>'.$post->content.'</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }

    //end->>>
}
