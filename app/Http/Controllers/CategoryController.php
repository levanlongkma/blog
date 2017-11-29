<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Facades\Datatables;
class CategoryController extends Controller
{
    public function showCategory(){
    	return view('admin.showCategory');
    }

    // edit category ->>>
    public function edit(Request $request){
        $name = strtoupper($request->category);
        $slug = str_slug($request->category);
    	Category::where('id', $request->id)->update(array('name' => $name,'slug' => $slug));
    	return $request->all();
    }

    //delete category ->>>>
    public function delete(Request $request){
    	Category::find($request->id)->delete();
    	return $request->id;
    }

    //create category ->>>>
    public function create(Request $request){
    	$arr = $request->all();
        $arr['name'] = strtoupper($request->name);
        $arr['slug'] = str_slug($request->name); //thêm trường slug vào mảng arr
        Category::create($arr);
        return $arr;
    }

    //categoryRecycleBin ->>>>
    public function categoryRecycleBin(){
    	return view('admin.categoryRecycleBin');
    }

    //delete categoryRecycleBin 
    public function DeleteCategoryRecycleBin(Request $request){
        Category::onlyTrashed()->find($request->id)->forceDelete();
        return $request->id;
    }

    //khôi phục 
    public function RestoreCategoryRecycleBin(Request $request){
        Category::onlyTrashed()->find($request->id)->restore();
        return $request->id;
    }

    //list categoryRecycleBin ----->
    public function GetListCategoryRecycleBin(){
        $category=Category::onlyTrashed()->select(['id', 'name', 'slug', 'deleted_at'])->get();
        return Datatables($category)
        ->addColumn('action', function ($category) {
                return '<button " class="btn btn-xs btn-primary restore" value="'.$category->id.'"><i class="glyphicon glyphicon-repeat"></i> Khôi phục</button> <button class="btn btn-xs btn-danger delete" type="button" value="'.$category->id.'"><i class="glyphicon glyphicon-trash"></i> Xóa</button>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);       
    }


    public function getList(){
	    $category = Category::select(['id','name','slug','created_at'])->get();
	        return Datatables($category)
	        ->addColumn('action', function ($category) {
	               return ' <button class="btn btn-xs btn-danger delete" type="button" value="'.$category->id.'"><i class="glyphicon glyphicon-trash"></i> Xóa</button> <button class="btn btn-xs btn-info " data-toggle="modal" data-target="#edit'.$category->id.'" type="button" value="'.$category->id.'"><i class="glyphicon glyphicon-edit"></i> Sửa</button><div id="edit'.$category->id.'" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style="text-align:center">Edit Category</h3>
                          </div>
                          <div class="modal-body">
                          	<input name="category" style="width:100% ; height:40px" id="'.$category->id.'" value="'.$category->name.'">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                            <button type="button" class="btn btn-success edit" value="'.$category->id.'" data-dismiss="modal">Sửa</button>
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
