<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAdminRequest;
use App\Http\Requests\updateAdminRequest;
use App\Models\ResetCodePassword;
use App\Models\User;
use App\Notifications\SendEmailToAdminAfterRegistrationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    //methode pour retoiurner la vue admin
    public function index() {
        $admins = User::paginate(10);
        return view('admins.index', compact('admins'));
    }

    public function create() {
        return view('admins.create'); // Assure-toi d'avoir cette vue
    }

    //methode pour enregistrer un admin et envoyer un mail
    public function edit(User $user){
//        dd($request);

        try {

        }catch (\Exception $e){
//            dd($e->getMessage());
            throw new \Exception('une erreur est survenue de la création de cet administrateur');
        }
        return view('admin.store');
    }



    //methode pour editer un admin
    public function store(storeAdminRequest $request){
        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make('default');

            $user->save();

            //Envoi de mail à l'utilisateur afin de le notifier de la création de son compte qu'il puisse confirmer son compte


            // Envoyer un code par Email pour verifier le compte
            try {

            }catch (\Exception $e){
                if($user){
                    ResetCodePassword::where('email', $user->email)->delete();
                }

//            Notification::route('mail', $user->email)->notify(new SendEmailToAdminAfterRegistrationNotification());
                $code = rand(1000, 4000);

                $data = [
                    'code' => $code,
                    'email' => $user->email,
                ];

                ResetCodePassword::create($data);

                Notification::route('mail', $user->email)->notify(new SendEmailToAdminAfterRegistrationNotification($code, $user->email));
                throw new \Exception('une erreur est souvenue lors de l\'envoi du code de confirmation');
            }


            //Rediriger l'utilisateur vers une autre page


        }catch (\Exception $e){
            throw new \Exception('une erreur est survenue lors de la modification de cet administrateur');

        }
        return redirect()->route('admins.index')->with('success', 'Administrateur ajouté avec succès.');

    }


    public function update(updateAdminRequest $request, User $user){
        try {

        }catch (\Exception $e){
            //dd($e->getMessage());
            throw new \Exception('une erreur est survenue de la mise à jour de cet administrateur');
        }
        return view('admins.update', compact('user'));
    }

    public function delete(User $user) {
        try {
            $user->delete();
            return redirect()->route('admins.index')->with('success', 'Administrateur supprimé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }

}
