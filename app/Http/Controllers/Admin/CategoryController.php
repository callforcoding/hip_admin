<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.list');
    }

    public function getCategory(Request $request, Category $category)
    {

        $data = $category->getData();
        return \Yajra\DataTables\DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditLocationData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })->rawColumns(['Actions'])
            ->make(true);
    }


    public function create()
    {
        //
    }



    public function store(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug'  => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $category->storeData($request->all());
        return response()->json(['success'=>'Category added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = new Category();
        $data = $category->findData($id);
        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="title" id="editTitle" value="'.$data->title.'">
                </div>
                <div class="form-group">
                    <label for="Name">Description:</label>
                    <textarea class="form-control" name="description" id="editDescription">'.$data->description.'
                    </textarea>
                </div>';
        return response()->json(['html'=>$html]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $category = new Category;
        $category->updateData($id, $request->all());
        return response()->json(['success'=>'Category updated successfully']);
    }


    public function destroy($id)
    {
        (new Category)->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
