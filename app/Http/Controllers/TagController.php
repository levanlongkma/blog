<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Yajra\Datatables\Facades\Datatables;
class TagController extends Controller
{
    public function showTag(){
    	return view('admin.showTag');
    }

    // edit tag ->>>
    public function edit(Request $request){
    	$name = $request->tag;
        $slug = str_slug($request->tag);
        Tag::where('id', $request->id)->update(array('name' => $name,'slug' => $slug));
        return $request->all();
    }

    //delete tag ->>>>
    public function delete(Request $request){
    	Tag::find($request->id)->delete();
    	return $request->id;
    }

    //create tag ->>>>
    public function create(Request $request){
    	$arr = $request->all();
        $arr['slug'] = str_slug($request->name); //thêm trường slug vào mảng arr
        Tag::create($arr);
        return $arr;
    }

    //tagRecycleBin ->>>>
    public function tagRecycleBin(){
    	return view('admin.tagRecycleBin');
    }

    //delete tagRecycleBin 
    public function DeleteTagRecycleBin(Request $request){
        Tag::onlyTrashed()->find($request->id)->forceDelete();
        return $request->id;
    }

    //khôi phục 
    public function RestoreTagRecycleBin(Request $request){
        Tag::onlyTrashed()->find($request->id)->restore();
        return $request->id;
    }

    //list tagRecycleBin ----->
    public function GetListTagRecycleBin(){
        $tag=Tag::onlyTrashed()->select(['id', 'name', 'slug', 'deleted_at'])->get();
        return Datatables($tag)
        ->addColumn('action', function ($tag) {
                return '<button " class="btn btn-xs btn-primary restore" value="'.$tag->id.'"><i class="glyphicon glyphicon-repeat"></i> Khôi phục</button> <button class="btn btn-xs btn-danger delete" type="button" value="'.$tag->id.'"><i class="glyphicon glyphicon-trash"></i> Xóa</button>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);       
    }


    public function getList(){
	    $tag = Tag::select(['id','name','slug','created_at'])->get();
	        return Datatables($tag)
	        ->addColumn('action', function ($tag) {
	               return ' <button class="btn btn-xs btn-danger delete" type="button" value="'.$tag->id.'"><i class="glyphicon glyphicon-trash"></i> Xóa</button> <button class="btn btn-xs btn-info " data-toggle="modal" data-target="#edit'.$tag->id.'" type="button" value="'.$tag->id.'"><i class="glyphicon glyphicon-edit"></i> Sửa</button><div id="edit'.$tag->id.'" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style="text-align:center">Edit tag</h3>
                          </div>
                          <div class="modal-body">
                          	<input name="tag" style="width:100% ; height:40px" id="'.$tag->id.'" value="'.$tag->name.'">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                            <button type="button" class="btn btn-success edit" value="'.$tag->id.'" data-dismiss="modal">Sửa</button>
                          </div>
                        </div>

                      </div>
                    </div>';
	            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }
}
