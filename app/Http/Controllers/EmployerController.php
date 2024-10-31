<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){

        $employers = Employer::with('departement')->paginate(10);
        return view('employers.index', compact('employers') );
    }



       public function create(){
        $departements = Departement::all();
        return view('employers.create', compact('departements'));
    }

    public function edit(Employer $employer){

        $departements = Departement::all();
        return view ('employers.edit',compact('employer', 'departements'));
    }

// Créer un nouvel employé
    public function store(storeEmployerRequest $request){
        try {
            $employer = new Employer();
            $employer->departement_id = $request->departement_id;
            $employer->nom = $request->first_name;
            $employer->prenom = $request->last_name;
            $employer->email = $request->email;
            $employer->sexe = $request->sexe;
            $employer->contact = $request->contact;
            $employer->montant_journalier = $request->montant_journalier;
            $employer->save();

            return redirect()->route('employers.store')->with('success_message', 'L\'employé a été ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error_message' => 'Erreur lors de l\'ajout de l\'employé.']);
        }
    }



    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        try {
            $employer->departement_id = $request->departement_id;
            $employer->nom = $request->first_name;
            $employer->prenom = $request->last_name;
            $employer->email = $request->email;
            $employer->sexe = $request->sexe;
            $employer->contact = $request->contact;
            $employer->montant_journalier = $request->montant_journalier;


//            dd($request);

            $employer->update();

            return redirect()->route('employer.create', $employer)->with('success_message', 'L\'employé a été modifié avec succès');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error_message' => 'Erreur lors de la modification de l\'employé.']);
        }
    }
//


    public function delete(employer  $employer){
        try {
//            $employer = Employer::findOrFail($id);
            $employer->delete();

            return redirect()->route('employer.index')->with('success_message', 'L\'employé a été supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error_message' => 'Erreur lors de la suppression de l\'employé.']);
        }
    }


}
