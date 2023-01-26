<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\NewsAppController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\PersonnelController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\ComplainController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\AlumniController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ResidaualController;
use App\Http\Controllers\Api\BookClassroomController;
use App\Http\Controllers\Api\BorrowReturnController;
use App\Http\Controllers\Api\CvController;
use App\Http\Controllers\Api\ActivityjoinController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CheckLoginController;
use App\Http\Controllers\Api\AlbumActivityController;



Route::group(['middleware' => 'auth:sanctum'], function () {
        // Auth Controller
        Route::post("logout", [AuthController::class, 'logout']);

        // Route Personnel
        Route::get("personnel", [PersonnelController::class, 'index']);
        Route::get("personnel/{type}", [PersonnelController::class, 'search']);
        Route::get("personnel/id/{id}", [PersonnelController::class, 'show']);
        Route::get("personnel/cardid/{citizenId}", [PersonnelController::class, 'search1']);
        Route::post("personnel/create", [PersonnelController::class, 'store']);
        Route::put("personnel/update/{id}", [PersonnelController::class, 'update']);
        Route::delete("personnel/delete/{id}", [PersonnelController::class, 'destroy']);

        // Route  News
        Route::get("news", [NewsController::class, 'index']);
        Route::get("news/{News_Type}", [NewsController::class, 'search']);
        Route::get("news/id/{id}", [NewsController::class, 'show']);
        Route::post("news/create", [NewsController::class, 'store']);
        Route::put("news/update/{id}", [NewsController::class, 'update']);
        Route::delete("news/delete/{id}", [NewsController::class, 'destroy']);

        // Route  Newsapp
        Route::get("newsapp", [NewsAppController::class, 'index']);
        Route::get("newsapp/{News_Type}", [NewsAppController::class, 'search']);
        Route::get("newsapp/id/{id}", [NewsAppController::class, 'show']);
        Route::put("newsapp/update/{id}", [NewsAppController::class, 'update']);
        Route::post("newsapp/create", [NewsAppController::class, 'store']);
        Route::delete("newsapp/delete/{id}", [NewsAppController::class, 'destroy']);

        // Route  Complain
        Route::get("complain", [ComplainController::class, 'index']);
        Route::get("complain/id/{id}", [ComplainController::class, 'show']);
        Route::post("complain/create", [ComplainController::class, 'store']);
        Route::delete("complain/delete/{id}", [ComplainController::class, 'destroy']);

        // Route  Classroom
        Route::get("classroom", [ClassroomController::class, 'index']);
        Route::get("classroom/{Classroom_Type}", [ClassroomController::class, 'search']);
        Route::get("classroom/id/{id}", [ClassroomController::class, 'show']);
        Route::put("classroom/update/{id}", [ClassroomController::class, 'update']);
        Route::post("classroom/create", [ClassroomController::class, 'store']);
        Route::delete("classroom/delete/{id}", [ClassroomController::class, 'destroy']);

        // Route  Activity
        Route::get("activity", [ActivityController::class, 'index']);
        Route::get("activity/id/{id}", [ActivityController::class, 'show']);
        Route::post("activity/create", [ActivityController::class, 'store']);
        Route::put("activity/update/{id}", [ActivityController::class, 'update']);
        Route::delete("activity/delete/{id}", [ActivityController::class, 'destroy']);

        // Route  Equipment
        Route::get("equipment", [EquipmentController::class, 'index']);
        Route::get("equipment/id/{id}", [EquipmentController::class, 'show']);
        Route::get("equipment/{Equipment_Name}", [EquipmentController::class, 'search']);
        Route::get("equipments/code/{Equipment_Code}", [EquipmentController::class, 'search1']);
        Route::put("equipment/update/{id}", [EquipmentController::class, 'update']);
        Route::post("equipment/create", [EquipmentController::class, 'store']);
        Route::delete("equipment/delete/{id}", [EquipmentController::class, 'destroy']);
        Route::get("equipmentapp", [EquipmentappController::class, 'index']);


        // Route  Subject
        Route::get("subject", [SubjectController::class, 'index']);
        Route::get("subject/id/{id}", [SubjectController::class, 'show']);
        Route::put("subject/update/{id}", [SubjectController::class, 'update']);
        Route::post("subject/create", [SubjectController::class, 'store']);
        Route::delete("subject/delete/{id}", [SubjectController::class, 'destroy']);
        Route::get("subject/{Subject_Detail}", [SubjectController::class, 'search']);
        Route::get("subject/code/{Subject_Code}", [SubjectController::class, 'search1']);
        Route::get("subject/term/{Subject_Term}", [SubjectController::class, 'search2']);

        // Route Material
        Route::get("material", [MaterialController::class, 'index']);
        Route::get("material/id/{id}", [MaterialController::class, 'show']);
        Route::get("materials/{Material_Name}", [MaterialController::class, 'search']);
        Route::put("material/upadate/{id}", [MaterialController::class, 'update']);
        Route::post("material/create", [MaterialController::class, 'store']);
        Route::delete("material/delete/{id}", [MaterialController::class, 'destroy']);

        // Route  Alumni
        Route::get("alumni", [AlumniController::class, 'index']);
        Route::get("alumni/id/{id}", [AlumniController::class, 'show']);
        Route::get("alumni/name/{Firstname_Alumni}", [AlumniController::class, 'search']);
        Route::get("alumni/workplace/{Workplace}", [AlumniController::class, 'search2']);
        Route::put("alumni/update/{id}", [AlumniController::class, 'update']);
        Route::post("alumni/create", [AlumniController::class, 'store']);
        Route::delete("alumni/delete/{id}", [AlumniController::class, 'destroy']);

        // Route Banner
        Route::get("banner", [BannerController::class, 'index']);
        Route::get("banner/id/{id}", [BannerController::class, 'show']);
        Route::post("banner/create", [BannerController::class, 'store']);
        Route::delete("banner/delete/{id}", [BannerController::class, 'destroy']);

        // Route  Student
        Route::get("student", [StudentController::class, 'index']);
        Route::get("student/id/{id}", [StudentController::class, 'show']);
        Route::put("student/update/{id}", [StudentController::class, 'update']);
        Route::post("student/create", [StudentController::class, 'store']);
        Route::delete("student/delete/{id}", [StudentController::class, 'destroy']);
        Route::get("student/{studentCode}", [StudentController::class, 'search']);
        
        // Route  residaual
        Route::get("residaual", [ResidaualController::class, 'index']);
        Route::get("residaual/id/{id}", [ResidaualController::class, 'show']);
        Route::post("residaual/create", [ResidaualController::class, 'store']);
        Route::delete("residaual/delete/{id}", [ResidaualController::class, 'destroy']);

        // Route  Bookclassroom
        Route::get("bookclassroom", [BookClassroomController::class, 'index']);
        Route::get("bookclassroom/id/{id}", [BookClassroomController::class, 'show']);
        Route::post("bookclassroom/create", [BookClassroomController::class, 'store']);
        Route::delete("bookclassroom/delete/{id}", [BookClassroomController::class, 'destroy']);
        Route::get("bookclassroom/{Email}", [BookClassroomController::class, 'search']);
        Route::put("bookclassroom/update/{id}", [BookClassroomController::class, 'update']);

        // Route  borrow_return
        Route::get("borrow_return", [BorrowReturnController::class, 'index']);
        Route::get("borrow_return/id/{id}", [BorrowReturnController::class, 'show']);
        Route::post("borrow_return/create", [BorrowReturnController::class, 'store']);
        Route::put("borrow_return/update/{id}", [BorrowReturnController::class, 'update']);
        Route::delete("borrow_return/delete/{id}", [BorrowReturnController::class, 'destroy']);
        Route::get("borrow_return/{Email}", [BorrowReturnController::class, 'search']);

        // Route  CV
        Route::get("cv", [CvController::class, 'index']);
        Route::get("cv/{citizenId}", [CvController::class, 'search']);
        Route::post("cv/create", [CvController::class, 'store']);
        Route::get("cv/id/{id}", [CvController::class, 'show']);
        Route::put("cv/update/{id}", [CvController::class, 'update']);
        Route::delete("cv/delete/{id}", [CvController::class, 'destroy']);

        // Activity join
        Route::get("activityjoin", [ActivityjoinController::class, 'index']);
        Route::get("activityjoin/id/{id}", [ActivityjoinController::class, 'show']);
        Route::post("activityjoin/create", [ActivityjoinController::class, 'store']);
        Route::put("activityjoin/update", [ActivityjoinController::class, 'update']);
        Route::delete("activityjoin/delete/{id}", [ActivityjoinController::class, 'destroy']);
        Route::get("activityjoin/email/{Email}", [ActivityjoinController::class, 'search']);
        Route::get("activityjoin/titile/{Activity_Title}", [ActivityjoinController::class, 'search1']);

        // Route About
        Route::get("about", [AboutController::class, 'index']);
        Route::get("about/id/{id}", [AboutController::class, 'show']);
        Route::get("about/{Topic}", [AboutController::class, 'search']);
        Route::post("about/create", [AboutController::class, 'store']);
        Route::put("about/update/{id}", [AboutController::class, 'update']);
        Route::delete("about/delete/{id}", [AboutController::class, 'destroy']);

        // Route CheckLogin
        Route::get("checklogin", [CheckLoginController::class, 'index']);
        Route::get("checklogin/code/{studentCode}", [CheckLoginController::class, 'search']);
        Route::delete("checklogin/delete/{id}", [CheckLoginController::class, 'destroy']);
        Route::get("checklogin/id/{id}", [CheckLoginController::class, 'show']);
        Route::post("checklogin/create", [CheckLoginController::class, 'store']);

        // Route Album      
        Route::get("album/activity", [AlbumActivityController::class, 'index']);
        Route::post("album/activity/create", [AlbumActivityController::class, 'store']);
        Route::get("album/activity/id/{id}", [AlbumActivityController::class, 'show']);
        Route::delete("album/activity/delete/{id}", [AlbumActivityController::class, 'destroy']);
});

// public route

// Auth Controllers
Route::post("register", [AuthController::class, 'register']); // Not use
Route::post("login", [AuthController::class, 'login']);