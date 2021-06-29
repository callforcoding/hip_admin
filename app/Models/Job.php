<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = "jobs";

    public function getData()
    {
        return static::orderBy('jobs.created_at','desc')
        ->join('job_duration as job_d','job_d.id','jobs.duration')
        ->select("jobs.id","jobs.title","jobs.status","jobs.price","job_d.duration","jobs.project_level","jobs.attachments","jobs.description")
        ->get();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
