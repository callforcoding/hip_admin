<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\SkillsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillsCategoryController extends Controller
{
    public function index()
    {
        //return (new SkillsCategory())->getData();
        return view('admin.skills_categ.list');
    }

    public function getSkillsCategory(Request $request, SkillsCategory $skills_categ)
    {

        $data = $skills_categ->getData();
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


    public function store(Request $request, SkillsCategory $skills_categ)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug'  => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $skills_categ->storeData($request->all());
        return response()->json(['success'=>'Skills Category added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $skills_categ = new SkillsCategory;
        $data = $skills_categ->findData($id);
        $html = '
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="editTitle" value="'.$data->name.'">
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" name="slug" id="editSLug" value="'.$data->slug.'">
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
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $skills_categ = new SkillsCategory();
        $skills_categ->updateData($id,$request->all());
        return response()->json(['success'=>'Skills Category updated successfully']);
    }


    public function destroy($id)
    {
        (new SkillsCategory())->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
