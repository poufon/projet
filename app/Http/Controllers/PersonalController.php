<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paie;
use App\Models\User;
use App\Models\Conge;
use App\Models\Poste;
use App\Models\Retard;
use App\Mail\UserEmail;
use App\Models\Absence;
use App\Models\Contrat;
use App\Models\Employe;
use App\Models\Horaire;
use App\Models\Service;
use App\Models\Sanction;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonalController extends Controller
{

    // partie backend de creation contrat
    public function showAbsence()
    {
        $donnee = Employe::all();
        $absence = Absence::all();

        return view('absence', [

             'absence' => $absence,
             'donnee' => $donnee
        ]);
    }

    public function createAbsence()
    {
        $donnee = Employe::all();
        $absence = Absence::all();

        return view('enregistrerAbsence', [

             'absence' => $absence,
             'donnee' => $donnee
        ]);
    }
    public function storeAbsence(Request $request)
    {

        $absence = new Absence();
        $absence ->MOTIF = $request->motif;
        $absence ->OBSERVATION = $request->observation;
        $absence->JUST = $request->justification;
        $absence->employe_id = $request->identifiant;
        $absence->Mois_En_Cours = $request->Mois_En_Cours;
        $absence->heure_debut = $request->heure_debut;
        $absence->heure_fin = $request->heure_fin;
        $absence->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('/');
    }

    public function showSanction()
    {
        $donnee = Employe::all();
        $sanction = Sanction::all();

        return view('sanctio', [

            'sanction' => $sanction,
             'donnee' => $donnee
        ]);
    }

    public function createSanction()
    {
        $donnee = Employe::all();
        $sanction = Sanction::all();

        return view('createSanction', [

             'sanction' => $sanction,
             'donnee' => $donnee
        ]);
    }
    public function storeSanction(Request $request)
    {
        $sanction = new Sanction();
        $sanction ->motifS = $request->motif;
        $sanction ->DECISION = $request->observation;
        $sanction->employe_id = $request->identifiant;

        // $sanction->JUST = $request->justification;
        $sanction->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('/');
    }
    public function showRetard()
    {
        $donnee = Employe::all();
        $retard = Retard::all();

        return view('retard', [

            'retard' => $retard,
             'donnee' => $donnee
        ]);
    }
    public function createRetard()
    {
        $donnee = Employe::all();
        $retard = Retard::all();

        return view('enregistrerRetard', [

             'retard' => $retard,
             'donnee' => $donnee
        ]);
    }
    public function storeRetard(Request $request)
    {
        $retard = new Retard();
        $retard ->motif = $request->motif;
        $retard ->observation = $request->observation;
        $retard->justification = $request->justification;
        $retard->employe_id = $request->identifiant;
        $retard->Mois_En_Cours = $request->Mois_En_Cours;
        $retard->heure_arrivee = $request->heure_arrivee;
        $retard->heure_retard = $request->heure_retard;
        $retard->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('/');
    }


    public function createPermission()
    {
        $employe = Employe::all();
        return view('permission_form',[
            'employe' => $employe
        ]);
    }

    public function storePermission(Request $request)
    {
        $permission = new Permission();
        $permission ->motif = $request->motif;
        $permission->employe_id = $request->identifiant;
        $permission ->email = $request->email;
        $permission->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('/');
    }

    public function showPermissionEmploye()
    {
        $modele = Permission::all();
        $employe = Employe::all();
        return view('permissioEmploye',[
            'employe' => $employe,
            'modele' => $modele
        ]);
    }
    public function sendEmailEmploye(Request $request)
    {
        $modele = Permission::find($request->input('user_id'));

        $message = $request->input('message');
        // Envoyer l'e-mail à l'utilisateur
        Mail::to($modele->email)->send(new UserEmail($message));

        return redirect()->back()->with('success', 'E-mail envoyé avec succès');
    }

    public function destroyPermissionEmploye($id)
    {
        $modele = Permission::findOrFail($id);
        $modele->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
    }

    public function showPermissionStagiaire()
    {
        $retard = Retard::all();
        $absence = Absence::all();
        $sanction = Sanction::all();
        $employe = Employe::all();
        return view('permissionStagiaire',[
            'employe' => $employe,
            'sanction' => $sanction,
            'retard' => $retard,
            'absence' => $absence
        ]);
    }
    public function deleteRetard($id)
    {
        $retards = Retard::findOrFail($id);
        $retards->delete();

        return redirect()->route('permissionStagiaire.index');
    }
    public function deleteAbsence($id)
    {
        $absences = Absence::findOrFail($id);
        $absences->delete();

        return redirect()->route('permissionStagiaire.index');
    }
    public function deleteSanction($id)
    {
        $sanctions = Sanction::findOrFail($id);
        $sanctions->delete();

        return redirect()->route('permissionStagiaire.index');
    }
    public function showPermission()
    {
        // $employe = Employe::all();
        return view('permission');
    }




//  fiche de paie

public function showFichePaie()
{
    // $fiche = Employe::findOrFail($id);
    $post= Poste::all();
    $employes = Employe::all();
    // $contrat= Contrat::all();

    return view('FichePaie',compact(
        'employes'
        // 'fiche'
    ));
}

    public function showPaie($id){
        $fiche = Employe::findOrFail($id);

        $totalRetard = Retard::selectRaw('SUM(heure_retard - heure_arrivee) as totals')
        ->whereHas('employe', function($query) use($fiche) {
            $query->where('employe_id',$fiche->id);
        })->first();
        // // Calculer le total du nombre d'heures d'absence de l'employé
        // $totalRetard = Retard::whereHas('employe', function($query) use($fiche) {
        //     $query->where('employe_id',$fiche->id);
        // })->sum('heure_retard');

        $totalAbsence = Absence::selectRaw('SUM((heure_fin - heure_debut))  as total')
        ->whereHas('employe', function($query) use($fiche) {
            $query->where('employe_id',$fiche->id);
        })->first();

         $totalHeuresTravaillees = Horaire::selectRaw('SUM((heure_fin - heure_debut)) as total')
         ->whereHas('employe', function($query) use($fiche) {
            $query->where('employe_id',$fiche->id);
        })->first();
        $totalHeuresSupplementaires = Horaire::selectRaw('SUM(heure_sup) as total')
        ->whereHas('employe', function($query) use($fiche) {
            $query->where('employe_id',$fiche->id);
        })->first();


        $totalRetardJutifié = Paie::selectRaw('SUM(retard_just)')
        ->whereHas('employe', function($query) use($fiche) {
            $query->where('employe_id',$fiche->id);
        });


        $totalAbsenceJutifié = Paie::selectRaw('SUM((absence_just))')
        ->whereHas('employe', function($query) use($fiche) {
            $query->where('employe_id',$fiche->id);
        });


        $employes = Employe::all();
        $contrat = Contrat::all();

        return view('paie',compact(
            'fiche',
            'totalHeuresTravaillees',
            'totalHeuresSupplementaires',
            'totalRetard',
            'totalAbsence',
            'totalAbsenceJutifié',
            'totalRetardJutifié'
        ));

    }

    public function createService()
    {
        return view('create_service');
    }
    public function storeService(Request $request)
    {
        $service = new Service();
        $service->id = $request->matricule;
        $service->reference = $request->reference;
        $service->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('/');

    }
    public function showSearchForm()
    {
        return view('search');
    }

     public function search(Request $request)
    {

        $term = request()->term;
        if ($term) {
            $utilisateur = User::where('name', 'like', '%' . $term . '%')->get();
            $employes = Employe::where('nom', 'like', '%' . $term . '%')->get();
            $contrat = Contrat::where('type_cont', 'like', '%' . $term . '%')->get();
            $post = Poste::where('designation', 'like', '%' . $term . '%')->get();
        }
        $contrat = Contrat::where('type_cont', 'like', '%' . $term . '%')->get();
        $post = Poste::where('designation', 'like', '%' . $term . '%')->get();
        $utilisateur = User::where('name', 'like', '%' . $term . '%')->get();
        $employes = Employe::where('nom', 'like', '%' . $term . '%')->get();
        return view('search', compact('utilisateur', 'employes','contrat','post'));
    }

    public function showHome()
    {
        return view('home');
    }

}

