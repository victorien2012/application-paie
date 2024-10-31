<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;
use Mockery\Exception;


class DepartementController extends Controller
{

    public function index(){

        $departements = Departement::paginate(10);
        return view('departements.index', compact('departements') );
    }


    public function create(){
        return view ('departements.create');
    }

    public function edit(Departement $departement){
        return view ('departements.edit',compact('departement'));
    }



    //action d'interration avec la base de donnée

    public function store(Departement $departement, saveDepartementRequest $request){

        try {
//            dd($request);
            $departement->name = $request->name;
            $departement->save();

            return redirect()->route('departement.index')->with('success_message', 'le department a été ajouté avec succès');
        } catch (Exception $e){
            dd($e);
        }


}


    public function update(Departement $departement, saveDepartementRequest $request){

        try {
//            dd($request);
            $departement->name = $request->name;

//            dd($request->name);
            $departement->update();

            return redirect()->route('departement.index')->with('success_message', 'le department a été modifié avec succès');
        } catch (Exception $e){
            dd($e);
        }


    }


    public function delete(Departement $departement){

        try {
//            dd($request);
//            $departement->name = $request->name;

//            dd($request->name);
            $departement->delete();

            return redirect()->route('departement.index')->with('success_message', 'le department a été supprimé avec succès');
        } catch (Exception $e){
            dd($e);
        }


    }

}
