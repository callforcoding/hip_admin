<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    public function index()
    {
        return view('admin.contracts.list');
    }

    public function getContract(Request $request, Contract $Contract)
    {

        $data = $Contract->getData();
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


    public function store(Request $request, Contract $Contract)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $Contract->storeData($request->all());
        return response()->json(['success'=>'Location added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Contract = new Contract;
        $data = $Contract->findData($id);
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
        $Contract = new Contract();
        $Contract->updateData($id, $request->all());
        return response()->json(['success'=>'Job updated successfully']);
    }


    public function destroy($id)
    {
        (new Contract)->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
