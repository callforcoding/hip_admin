<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;


class EmployeerController extends Controller
{
    public function index()
    {
        // return (new User)->getData();
        return view('admin.employers.list');
    }

    public function getEmployeers(Request $request, User $user)
    {
        //$data = $user->getData();
        return \Yajra\DataTables\DataTables::of(User::where('role',3)->get())
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditLocationData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })->rawColumns(['Actions'])->make(true);
    }

    public function create()
    {
        //
    }


    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role'  => 'required',
            'address'  => 'required',
            'about'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $user->storeData($request->all());
        return response()->json(['success'=>'Record added successfully']);
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = new User();
        $data = $user->findData($id);
        //return $data->role;
        $html = '
                <input type="hidden" class="form-control" name="role" id="role"  value="3" />        
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="'.$data->first_name.'">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="'.$data->last_name.'">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email (abc@xyz.com)" value="'.$data->email.'">
                </div>
                <div class="form-group">
                    <textarea  class="form-control" name="address" id="address" placeholder="Enter Address">'.$data->address.'</textarea>
                </div>
                <div class="form-group">
                    <textarea  class="form-control" name="about" id="about" placeholder="Introduce yourself">'.$data->about.'</textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="location_id" id="location_id">
                        <option value="1">Karachi</option>
                        <option value="2">Hyderabad</option>
                    </select>
                </div>
                ';
        return response()->json(['html'=>$html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'address' => 'required',
            'about' => 'required',
            'location_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $user = new User();
        $user->updateData($id, $request->all());
        return response()->json(['success'=>'User updated successfully']);
    }


    public function destroy($id)
    {
        (new User())->deleteData($id);
        return response()->json(['success'=>'Freelancer deleted successfully']);
    }



}
