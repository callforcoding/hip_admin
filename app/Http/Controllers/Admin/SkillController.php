<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public $skills_categ_all;
    public function __construct()
    {
        $this->skills_categ_all = $this->all_skills_category();
    }

    public function index()
    {
        return view('admin.skills.list');
    }

    public function getSkill(Request $request, Skill $skill)
    {
        $data = $skill->getData();
        return \Yajra\DataTables\DataTables::of($data)->editColumn('skill_category', function ($data)
        {
            return $this->skills_categ_all[$data->skill_category]??'';
        })->addColumn('Actions', function ($data)
        {
            return '<button type="button" class="btn btn-success btn-sm" id="getEditLocationData" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
        })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create()
    {
        //

    }

    public function store(Request $request, Skill $skill)
    {

        $validator = Validator::make($request->all() , ['title' => 'required', 'slug' => 'required', 'description' => 'required', 'skill_category' => 'required', ]);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }
        $skill->storeData($request->all());
        return response()
            ->json(['success' => 'Skill added successfully']);
    }

    public function show($id)
    {
        //

    }

    public function all_skills_category()
    {
        return (new SkillsCategory)->getData()
            ->pluck("name", "id");
    }

    public function edit($id)
    {
        $skill = new Skill();
        $data = $skill->findData($id);

        $html = '
            <div class="form-group">
                <select class="form-control" name="skill_category" id="skill_category">
                    <option value="">Select Skills</option>';
        foreach ($this->skills_categ_all as $key => $value)
        {
            $html .= '<option ' . ($key == $data->skill_category ? "selected=true" : "") . ' value="' . $key . '">' . $value . '</option>';
        }
        $html .= '
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value=' . $data->title . '>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug" value=' . $data->slug . '>
            </div>
            <div class="form-group">
                <textarea  class="form-control" name="description" id="description" placeholder="Enter Description">' . $data->description . '</textarea>
            </div>';
        return response()
            ->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all() , ['title' => 'required', 'slug' => 'required', 'description' => 'required', 'skill_category' => 'required', ]);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }
        $skill = new Skill();
        $skill->updateData($id, $request->all());
        return response()
            ->json(['success' => 'User updated successfully']);
    }

    public function destroy($id)
    {
        (new Skill())->deleteData($id);
        return response()->json(['success' => 'Freelancer deleted successfully']);
    }
}
