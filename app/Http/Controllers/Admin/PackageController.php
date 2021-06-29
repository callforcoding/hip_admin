<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
        return view('admin.package.list');
    }

    public function getPackages(Request $request, Package $package)
    {

        $data = $package->getData();
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

    public static function ValidateFun(array $data){
        $validator = Validator::make($data, [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'cost' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        return 1;
    }

    public function store(Request $request, Package $package)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'cost' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        //self::ValidateFun($request->all());
        $package->storeData($request->all());
        return response()->json(['success'=>'Package added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $package = new Package();
        $data = $package->findData($id);
        $html = '
        <div class="form-group">
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value='.$data->title.'>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Enter SUB-Title" value='.$data->subtitle.'>
        </div>
        <div class="form-group">
            <textarea  class="form-control" name="slug" id="slug" placeholder="Enter Slug">'.$data->slug.'</textarea>
        </div>
        <div class="form-group">
            <textarea  class="form-control" name="cost" id="cost" placeholder="Enter Cost">'.$data->cost.'</textarea>
        </div>';
        return response()->json(['html'=>$html]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'cost' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $package = new Package();
        $package->updateData($id, $request->all());
        return response()->json(['success'=>'Package updated successfully']);
    }

    public function destroy($id)
    {
        (new Package())->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
