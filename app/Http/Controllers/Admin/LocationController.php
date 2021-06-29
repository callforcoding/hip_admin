<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{

    public function index()
    {
        return view('admin.location.list');
    }

    public function getLocations(Request $request, Location $location)
    {

        $data = $location->getData();
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


    public function store(Request $request, Location $location)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $location->storeData($request->all());
        return response()->json(['success'=>'Location added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $location = new Location;
        $data = $location->findData($id);
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
        $location = new Location();
        $location->updateData($id, $request->all());
        return response()->json(['success'=>'Location updated successfully']);
    }


    public function destroy($id)
    {
        (new Location)->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
