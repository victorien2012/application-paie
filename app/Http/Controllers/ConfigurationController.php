<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeConfigRequest;
use App\Http\Requests\UpdateConfigurationRequest;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index(){

        $configurations= Configuration::paginate(10);
        return view('configurations.index', compact('configurations') );
    }



    public function create(){
        return view ('configurations.create');
    }


    public function store(storeConfigRequest $request){

        try {
//            dd($request);
            Configuration::create($request->all());


            return redirect()->route('configuration.index')->with('success_message', 'la configuration a été ajouté avec succès');
        } catch (Exception $e){
            return redirect()->back()->withErrors(['error_message' => 'Erreur lors de l\'ajout de la configuration']);
        }
    }

    public function edit($id)
    {
        // Utilisez `find` pour récupérer un seul enregistrement
        $configurations = Configuration::find($id);

        // Vérifiez si l'enregistrement existe
        if (!$configurations) {
            return redirect()->route('configuration.create')->withErrors(['error_message' => 'Configuration introuvable']);
        }

        return view('configurations.edit', compact('configurations'));
    }



    public function update(UpdateConfigurationRequest $request, Configuration $configuration)
    {
        try {

            $configuration->type = $request->type;
            $configuration->value = $request->value;
//            dd($request);

            $configuration->update();

            return redirect()->route('configurations.create', $configuration)->with('success_message', 'L\'employé a été modifié avec succès');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error_message' => 'Erreur lors de la modification de l\'employé.']);
        }

    }


    public function delete(Configuration  $configuration){
        try {
//            $configuration = Configuration::findOrFail($id);
            $configuration->delete();

            return redirect()->route('configurations.index')->with('success_message', 'L\'employé a été supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error_message' => 'Erreur lors de la suppression de l\'employé.']);
        }
    }

}

