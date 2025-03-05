<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
class AppController extends Controller
{


    public function index(){

        $totalEmployers = Employer::all()->count();
        $totalDepartements = Departement::all()->count();
        $totalAdministrateurs = User::all()->count();


//        $appName=Configuration::where('type', 'APP_NAME')->first();

    $defaultPaiementDate = null;
    $paiementNotification = "";
    $currentDate = Carbon::now()->day;
//    dd($currentDate);

//        dd(intval($defaultPaiementDate));


        $defaultPaiementDateQuery = Configuration::where('type', 'PAIEMENT_DATE')->first();

        if ($defaultPaiementDateQuery) {
            $defaultPaiementDate = $defaultPaiementDateQuery->value; // This should be a day number or full date

            // Convert correctly
            $convertedPaiementDate = Carbon::now()->setDay(intval($defaultPaiementDate));

            $currentDate = Carbon::now();

            if ($currentDate->lessThan($convertedPaiementDate)) {
                $paiementNotification = "Le paiement doit avoir lieu le " . $defaultPaiementDate . " de ce mois.";
            } else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->translatedFormat('F'); // Get month name in current locale

                $paiementNotification = "Le paiement doit avoir lieu le " . $defaultPaiementDate . " du mois de " . $nextMonthName . ".";
            }
        }

        return view('dashboard', compact('totalAdministrateurs', 'totalDepartements', 'totalEmployers', 'paiementNotification'));

    }
}
