<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    public function getData()
    {
        return static::orderBy('proposals.created_at','desc')
        ->join('jobs as j','j.id','proposals.job_id')
        ->join('users as u','u.id','proposals.freelancer_id')
        ->select('proposals.id','proposals.content','proposals.amount','proposals.completion_time','proposals.attachments','proposals.status','j.title as j_title','u.first_name','u.last_name')
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
