<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobDuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public $get_job_duration = null;
    public function __construct()
    {
        $this->get_job_duration = self::getJobDuration();
    }
    public function index()
    {
        //return (new Job())->getData();
        return view('admin.jobs.list');
    }

    public function getJobs(Request $request, Job $jobs)
    {

        $data = $jobs->getData();
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

    public static function getJobDuration() {
        return (new JobDuration())->getData()->pluck("duration","id");
    }

    public function store(Request $request, Job $jobs)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $jobs->storeData($request->all());
        return response()->json(['success'=>'Location added successfully']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $jobs = new Job;
        $data = $jobs->findData($id);
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
        $jobs = new Job();
        $jobs->updateData($id, $request->all());
        return response()->json(['success'=>'Job updated successfully']);
    }


    public function destroy($id)
    {
        (new Job)->deleteData($id);
        return response()->json(['success'=>'Record deleted successfully']);
    }
}
