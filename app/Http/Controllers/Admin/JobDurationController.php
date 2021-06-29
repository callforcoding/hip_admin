<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobDuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JobDurationController extends Controller
{
    public function index()
    {
        //return (new JobDuration)->getData()->pluck('duration','id');
        return view('admin.job_durations.list');
    }

    public function getJobDuration(Request $request, JobDuration $job_duration)
    {
        $data = $job_duration->getData();
        return \Yajra\DataTables\DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditLocationData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })->rawColumns(['Actions'])->make(true);
    }


    public function create()
    {
        //
    }


    public function store(Request $request, JobDuration $job_duration)
    {
        $validator = Validator::make($request->all(), [
            'duration' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $job_duration->storeData($request->all());
        return response()->json(['success'=>'JobDuration added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $job_duration = new JobDuration;
        $data = $job_duration->findData($id);
        $html = '
                <div class="form-group">
                    <label for="Name">Duration</label>
                    <textarea class="form-control" name="duration" id="editDuration">'.$data->duration.'
                    </textarea>
                </div>';
        return response()->json(['html'=>$html]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'duration' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $job_duration = new JobDuration();
        $job_duration->updateData($id, $request->all());
        return response()->json(['success'=>'Duration updated successfully']);
    }


    public function destroy($id)
    {
        (new JobDuration)->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
