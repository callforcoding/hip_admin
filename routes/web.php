<?php
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillsCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\EmployeerController;
use App\Http\Controllers\Admin\FreelancerUserController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobDurationController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProposalController;
use App\Http\Controllers\ProposalController as ControllersProposalController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
})->middleware(["auth"])->name('dashboard');

Route::middleware(['admin'])->group(static function() {
    Route::resources([
        "location"      =>  LocationController::class,
        "freelancer"    =>  FreelancerUserController::class,
        'employeer'     =>  EmployeerController::class,
        'skill'         =>  SkillController::class,
        'sub_categ'     =>  SubCategoryController::class,
        'categories'    =>  CategoryController::class,
        'skills_categ'  =>  SkillsCategoryController::class,
        'packages'      =>  PackageController::class,
        'profile'       =>  ProfileController::class,
        'job'           =>  JobController::class,
        'proposal'      =>  ProposalController::class,
        'contract'      =>  ContractController::class,
        'job_duration'  =>  JobDurationController::class,
    ]);

    Route::get('get-locations', [LocationController::class, 'getLocations'])->name('get-locations');
    Route::get('user', [FreelancerUserController::class, 'getFreelancers'])->name('get-freelancers');
    Route::get('employer', [EmployeerController::class, 'getEmployeers'])->name('get-employeers');
    Route::get('get-skill', [SkillController::class, 'getSkill'])->name('get-skill');
    Route::get('get-subcateg', [SubCategoryController::class, 'getSubCateg'])->name('get-subcateg');
    Route::get('get-category', [CategoryController::class, 'getCategory'])->name('get-category');
    Route::get('get-skills-category', [SkillsCategoryController::class, 'getSkillsCategory'])->name('get-skills-category');
    Route::get('get-packages', [PackageController::class, 'getPackages'])->name('get-packages');
    Route::get('get-profile', [ProfileController::class, 'getProfile'])->name('get-profile');
    Route::get('get-jobs', [JobController::class, 'getJobs'])->name('get-jobs');
    Route::get('get-proposals', [ProposalController::class, 'getProposals'])->name('get-proposals');
    Route::get('get-contract', [ContractController::class, 'getContract'])->name('get-contract');
    Route::get('get-job-duration', [JobDurationController::class, 'getJobDuration'])->name('get-job-duration');
});
//fallback-uri-when-no-route-matches
Route::fallback(function() {
    return redirect()->route("login");
});
