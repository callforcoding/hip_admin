<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public $category_all;
    public function __construct()
    {
        $this->category_all = $this->all_categories();
    }
    public function index()
    {
        return view('admin.sub_categories.list');
    }

    public function getSubCateg(Request $request, SubCategory $sub_categ)
    {
       $data = $sub_categ->getData();

        return \Yajra\DataTables\DataTables::of($data)
            ->editColumn("category_id",function($data) {
                return $this->category_all[$data->category_id];
            })->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditLocationData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })->rawColumns(['Actions'])->make(true);
    }


    public function create()
    {
        //
    }


    public function store(Request $request, SubCategory $sub_categ)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'abstract' => 'required',
            'category_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $sub_categ->storeData($request->all());
        return response()->json(['success'=>'SubCategory added successfully']);
    }



    public function show($id)
    {
        //
    }

    public static function all_categories() {
        return (new Category())->getData()->pluck("title","id");
    }

    public function edit($id)
    {
        $sub_categ = new SubCategory();
        $data = $sub_categ->findData($id);
        $html = '
        <div class="form-group">
        <select class="form-control" name="category_id" id="category_id">
        <option value="">Select Category</option>';
        foreach($this->category_all as $key=>$value){
            $html .='<option '.($key==$data->category_id?"selected='selected'":"").' value='.$key.'>'.$value.'</option>';
        }
        $html .='</select>
     </div>

     <div class="form-group">
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value='.$data->title.'>
     </div>

     <div class="form-group">
        <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug" value='.$data->slug.'>
     </div>

     <div class="form-group">
        <textarea  class="form-control" name="abstract" id="abstract" placeholder="Enter Abstract">'.($data->abstract).'</textarea>
     </div>
     ';

        return response()->json(['html'=>$html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'abstract' => 'required',
            'category_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $sub_categ = new SubCategory();
        $sub_categ->updateData($id, $request->all());
        return response()->json(['success'=>'Sub-Category updated successfully']);
    }


    public function destroy($id)
    {
        (new SubCategory())->deleteData($id);
        return response()->json(['success'=>'Sub-Category deleted successfully']);
    }
}
