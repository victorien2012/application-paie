<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
class AppController extends Controller
{


    public function index(){

        $totalEmployers = Employer::all()->count();
        $totalDepartements = Departement::all()->count();
        $totalAdministrateurs = User::all()->count();

//        dd($totalAdministrateurs,$totalEmployers,$totalDepartements);

        return view('dashboard', compact('totalAdministrateurs','totalDepartements', 'totalEmployers', ));
    }
}
