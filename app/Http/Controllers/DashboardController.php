<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });

    }

    public function index()
    {
        //print_r(gettype($this->user));
        if($this->user == null){
            return view("backend.auth.login");
        }
        else{
            $statData = [
                'total_courses' => Courses::count(),
                'total_categories' => Categories::count()
            ];

            //return $courses;
            return view('backend.pages.dashboard.index', compact('statData'));
        }
        //return view('backend.pages.dashboard.index');
    }
}
