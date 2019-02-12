<?php

//use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        //if (Auth::user()->role_id == 1 || Auth::user()->role_id == 6){
            
            $data['totalRegisterVistor'] = \App\UserRegistration::all()->count();

            $data['todayRegistration'] = \App\UserRegistration::whereDate('created_at', date('Y-m-d'))->count();

            $data['thisMonthRegistration'] = \App\UserRegistration::whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')])->count();

            $data['previousMonthRegistration'] = \App\UserRegistration::whereBetween('created_at', [date('Y-m-01', strtotime('last month')), date('Y-m-t', strtotime('last month'))])->count();

            $data['events'] = \App\EventManagement::all()->count();
            $data['seminars'] = \App\SeminarManagement::all()->count();
            $data['exhibitors'] = \App\ExhibitorManagement::all()->count();
            
            //dd($data['thisMonthRegistration']);

        //}
        return view('dashboard.index',$data);
    }
}
