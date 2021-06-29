<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        return "ok done";
    }

    //freelancers
    public function freelancers() {
        if(request()->ajax()) {
           return datatables()->of(User::where("role",2))
           ->make(true);
        }
        return view("admin.freelancers.list");
    }

    //employers
    public function employers(){
        if(request()->ajax()) {
            return datatables()->of(User::where("role",3))->make(true);
        }
        return view("admin.employers.list");
    }

}
