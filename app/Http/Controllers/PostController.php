<?php

namespace App\Http\Controllers;

// use auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Conge;
use App\Models\Poste;
use App\Models\Retard;
use App\Models\Absence;
use App\Models\Contrat;
use App\Models\Employe;
use App\Models\Horaire;
use App\Models\Occuper;
use App\Models\Service;
use App\Models\Sanction;
use App\Mail\ContactMail;
use App\Models\TypeConge;
use App\Models\Permission;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function accueil()
    {
        return view('accueil');
    }
    // public function index()
    // {
    //     return view('home');
    // }
       public function index()
    {
        return view('accueil');
    }
    // public function index()
    // {
    //     return view('welcome');
    // }
    public function showTableau()
    {
        $conge = Conge::all();
        $employes = Employe::all();
        $contrat = Contrat::all();
        $modele = Permission::all();;

        $Nbre_Empl_Homme= Employe::where('sexe', 'homme')->count();
        $Nbre_Empl_Femme= Employe::where('sexe', 'femme')->count();

        $Nbre_Cont_CDD= Contrat::where('type_cont', 'CDD')->count();
        $Nbre_Cont_CDI= Contrat::where('type_cont', 'CDI')->count();
        $Nbre_Cont_CDI1= Contrat::where('type_cont', 'intérim')->count();
        $Nbre_Cont_CDD2= Contrat::where('type_cont', 'Contrat à temps partiel')->count();
        $Nbre_Cont_CDI3= Contrat::where('type_cont', 'Contrat de professionnalisation')->count();
        $Nbre_Cont_CDD4= Contrat::where('type_cont', 'Contrat d\'apprentissage')->count();
        $Nbre_Cont_CDI5= Contrat::where('type_cont', 'Contrat de travail saisonnier')->count();
        $Nbre_Cont_CDD6= Contrat::where('type_cont', 'Contrat de prestation de services')->count();
        $Nbre_Cont_CDI7= Contrat::where('type_cont', 'SOUS-TRAITENCE')->count();


        $congeMaladie= Conge::where('type_conge', 'Congés maladie')->count();
        $Congé_sans_solde= Conge::where('type_conge', 'Congé sans solde')->count();
        $Congé_exceptionnel= Conge::where('type_conge', 'Congé exceptionnel')->count();
        $Congé_annuel = Conge::where('type_conge', 'Congé annuel ')->count();


        $startDate = Carbon::parse('2023-09-01'); // Date de début de la période
        $endDate = Carbon::parse('2023-12-30'); // Date de fin de la période

        $leaves = Conge::whereBetween('date_debut', [$startDate, $endDate])
                       ->orWhereBetween('date_fin', [$startDate, $endDate])
                       ->get();

        $hoursData = [];

        foreach ($employes as $employe) {
            $hoursWorked = Horaire::selectRaw('SUM(heure_fin - heure_debut)')
            ->where('employe_id', $employe->id);

            $hoursData[] = [
                'employe' => $employe->nom,
                'hours_worked' => $hoursWorked,
            ];
        }
        $chartData = [
            'labels' => [],
            'data' => [],
        ];

        foreach ($hoursData as $data) {
            $chartData['labels'][] = $data['employe'];
            $chartData['data'][] = $data['hours_worked'];
        }

        return view('dashboard',compact('employes','contrat',
        'contrat',
        'conge',
        'leaves',
        'modele',
        'Nbre_Empl_Homme',
        'Nbre_Empl_Femme',
        'Nbre_Cont_CDD',
        'Nbre_Cont_CDI',
        'Nbre_Cont_CDI1',
        'Nbre_Cont_CDD2',
        'Nbre_Cont_CDI3',
        'Nbre_Cont_CDD4',
        'Nbre_Cont_CDI5',
        'Nbre_Cont_CDD6',
        'Nbre_Cont_CDI7',
        'congeMaladie',
        'Congé_sans_solde',
        'Congé_exceptionnel',
        'Congé_annuel'

        ));
    }
    // gestion des employes
    public function showEmployee()
    {

        $employes = Employe::all();
        $typeContrat= TypeContrat::all();
        return view('employer', [
            'employes' => $employes,
            'typeContrat' => $typeContrat
        ]);
    }

    // creation des employes
    public function createEmployee()
    {
        $typeContrat= TypeContrat::all();
        $contrat = Contrat::all();
        return view('createEmp', [
            'contrat' => $contrat,
            'typeContrat' => $typeContrat
        ]);
    }
    // partie backend de creation employe
    public function storeEmployee(Request $request)
    {
        $employe = new Employe();
        $employe ->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->date_nais = $request->date_nais;
        $employe->lieu_nais = $request->lieu_nais;
        $employe->lieu_risid = $request->lieu_resid;
        $employe->profession = $request->profession;
        $employe->diplome = $request->diplome;
        $employe->telephone = $request->telephone;
        // $employe->contrat = $request->contrat;
        $employe ->sexe = $request->sexe;
        $employe->email = $request->email;
        $employe->contrat_id = $request->identifiant;
        $employe->save();
        dd('le nouveau employé est enregistré');
        return redirect()->route('employee.index');
    }

    public function editEmployee($id)
    {
        $typeContrat= TypeContrat::all();
        $contrat= Contrat::all();
        $sanction= Sanction::all();
        $permission= Permission::all();
        $retard= Retard::all();
        $absence= Absence::all();
        $modele = Employe::findOrFail($id);
        return view('updateEmp', compact('modele','contrat',
        'permission','retard','absence','sanction','typeContrat'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $modele = Employe::findOrFail($id);
        $modele->nom = $request->input('nom');
        $modele->prenom = $request->input('prenom');
        $modele->date_nais = $request->input('date_nais');
        $modele->lieu_nais = $request->input('lieu_nais');
        $modele->lieu_risid = $request->input('lieu_resid');
        $modele->diplome = $request->input('diplome');
        $modele->profession = $request->input('profession');
        $modele->email = $request->input('email');
        $modele->telephone = $request->input('telephone');
        // $modele->contrat = $request->input('contrat');

        $modele->save();
        dd('MISE A JOUR AVEC SUCCES');
        return redirect()->route('employee.index');
    }

    public function deleteEmployee($id)
    {
        $modele = Employe::findOrFail($id);
        $modele->delete();

        return redirect()->route('employee.index');
    }
    public function showContrat()
    {
        $post= Poste::all();
        $typeContrat= TypeContrat::all();
        $employe = Employe::all();
        $contrat = Contrat::all();
        return view('contrats',[
            'typeContrat' => $typeContrat,
            'post' => $post,
            'contrat' => $contrat,
            'employe' => $employe
        ]);

    }
    // creation des contrat
    public function createContrat()
    {
        $retard = Retard::all();
        $absence = Absence::all();
        $post= Poste::all();
        $typeContrat= TypeContrat::all();
        $employe = Employe::all();
        $contrat = contrat::all();
        return view('create_contrat', [
            'typeContrat' => $typeContrat,
            'post' => $post,
            'contrat' => $contrat,
            // 'employes' => $employe,
            'retard' => $retard,
            'absence' => $absence,
            'employe' => $employe
        ]);

    }
    // partie backend de creation contrat

    public function storeContrat(Request $request)
    {

        $contrat = new contrat();
        $contrat->id = $request->identifiant1;
        $contrat->nature = $request->nature;
        $contrat->type_cont = $request->type_cont;
        // $contrat->fonction = $request->fonction;
        $contrat->salaire = $request->salaire;
        $contrat->duree = $request->duree;
        $contrat->date_debut = $request->date_debut;
        $contrat->date_fin = $request->date_fin;
        // $contrat->poste_id = $request->identifiant;
        $contrat->save();
        dd('SUCCES D\'ENREGISTREMENT');
    }

    public function editContrat($id)
    {
        $employes = Employe::all();
        $typeContrat= TypeContrat::all();
        $modele = Contrat::findOrFail($id);
        return view('updatecontrat', compact('modele','employes','typeContrat'));
    }

    public function updateContrat(Request $request, $id)
    {
        $modele = Contrat::findOrFail($id);
        $modele->nature = $request->input('nature');
        $modele->type_cont = $request->input('type_cont');

        $modele->salaire = $request->input('salaire');
        $modele->duree = $request->input('duree');
        $modele->date_debut = $request->input('date_debut');
        $modele->date_fin = $request->input('date_fin');
        // $modele->poste_id = $request->input('identifiant6');

        $modele->save();
        dd('MISE A JOUR AVEC SUCCES');

    }
    public function deleteContrat($id)
    {
        $modele = Contrat::findOrFail($id);
        $modele->delete();

        return redirect()->route('contrat.index');
    }
// POSTE
    public function showPoste()
    {
        $employe = Employe::all();
        $contrat = Contrat::all();
        $post= Poste::all();
        return view('showPoste', [
            // 'typeContrat' => $typeContrat,
            'post' => $post,
            'contrat' => $contrat,
            'employe' => $employe
        ]);
    }
// partie backend de creation contrat
    public function createPoste()
    {
        $service = Service::all();
        return view('createPoste',[
            'service' => $service
        ]);
    }

    public function storePoste(Request $request)
    {
        $post = new Poste();
        $post->id = $request->identifiant;
        $post->designation = $request->designation;
        $post->fonction = $request->fonction;
        $post->service_id = $request->identifiant1;

        $post->save();
        dd('SUCCES D\'ENREGISTREMENT');
    }
    public function showService()
    {
        $employe = Employe::all();
        $contrat = Contrat::all();
        $service= Service::all();
        return view('updateformation', [
            // 'typeContrat' => $typeContrat,
            'service' => $service,
            'contrat' => $contrat,
            'employe' => $employe
        ]);
    }
// horraire
    public function showHorraire()
    {

        $employe = Employe::all();
        $horaire = Horaire::all();
        return view('horaire', [
            'employe' => $employe,
            'horaire' => $horaire
        ]);
    }
    public function createHorraire()
    {
        $employe = Employe::all();
        $horaire = Horaire::all();
        return view('createhoraire', [
            'employe' => $employe,
            'horaire' => $horaire
        ]);
    }
    public function editHorraire($id)
    {
        $modele = Horaire::findOrFail($id);
        return view('updatehoraire', compact('modele'));
    }
    public function storeHorraire(Request $request)
    {
        $horaire = new Horaire();
        $horaire->date_debut = $request->date_debut;
        $horaire->date_fin = $request->date_fin;
        $horaire ->jour_semaine = $request->jour;
        $horaire->periode = $request->periode;
        $horaire->heure_debut = $request->heure_debut;
        $horaire->heure_fin = $request->heure_fin;
        $horaire->heure_sup = $request->heure_sup;
        $horaire->employe_id = $request->identifiant;
        $horaire->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('horraire.index');
    }

    public function updateHorraire(Request $request, $id)
    {
        $modele = Horaire::findOrFail($id);
        $modele->date_debut = $request->input('date_debut');
        $modele->date_fin = $request->input('date_fin');
        $modele->jour_semaine = $request->input('jour');
        $modele->periode = $request->input('periode');
        $modele->heure_sup = $request->input('heure_sup');
        $modele->heure_debut = $request->input('heure_debut');
        $modele->heure_fin = $request->input('heure_fin');
        $modele->employe_id = $request->input('identifiant');
        $modele->save();
        dd('MISE A JOUR AVEC SUCCES');

    }
    public function deleteHorraire($id)
    {
        $modele = Horaire::findOrFail($id);
        $modele->delete();

        return redirect()->route('horraire.index');
    }



// user
    public function showUsers()
    {
        $utilisateur = User::all();
        return view('user', [
            'utilisateur'=> $utilisateur
        ]);
    }

    public function createUsers()
    {
        $user = User::all();
        return view('manipulation', [
             'user'=> $user
        ]);
    }
    public function storeUsers(Request $request)
    {

        $user = new User();
        $user ->name = $request->nom;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        // $utilisateur->employe_id = $request->identifiant;
        $user->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('users.index');
    }
    public function editUsers($id)
    {

        $user = User::findOrFail($id);
        return view('updateuser', compact('user'));
    }
    public function updateUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('nom');
        $user->email = $request->input('email');
        $user->email_verified_at = $request->input('email_verified_at');
        $user->password = $request->input('password');
        $user->remember_token = $request->input('remember_token');
        $user->role = $request->input('role');
        // $modele->employe_id = $request->input('identifiant');
        $user->save();
        dd('MISE A JOUR AVEC SUCCES');
    }
    public function deleteUsers($id)
    {
        $modele = User::findOrFail($id);
        $modele->delete();

        return redirect()->route('users.index');
    }

    public function countUsers()
    {
        // $userCount = Utilisateur::count();
        $employeCount = Employe::count();
        $contratCount = Contrat::count();
        // $stagiaireCount = Stagiaire::count();

        return view('user.count', compact('userCount'));

    }

    public function showConge()
    {
        $leaves = Conge::all();

        return view('permissionStagiaire', [

             'leaves' => $leaves
        ]);
    }
    public function createConge()
    {
        $employe = Employe::all();
        $typeconge = TypeConge::all();

        return view('conge', [

             'typeconge' => $typeconge,
             'employe' => $employe
        ]);
    }
    public function storeConge(Request $request)
    {
        $conge = new Conge();
        $conge ->nature = $request->annee;
        $conge->date_conge = $request->date_etab;
        $conge ->type_cong = $request->identifiant6;
        $conge->date_debut = $request->date_debut;
        $conge->date_fin = $request->date_fin;
        // $conge->date_reprise = $request->date_repris;
        $conge ->employe_id= $request->identifiant;
        $conge->save();
        dd('SUCCES D\'ENREGISTREMENT');
        return redirect()->route('/');
    }


    public function sendEmail(Request $request)
    {
        $userId = $request->input('user_id');
        $user = Employe::findOrFail($userId);
        $message = $request->input('message');

        // Envoyer l'e-mail
        Mail::to($user->email)->send(new ContactMail($message));

        // Redirection avec un message de succès
        dd('SUCCES D\'ENREGISTREMENT');
    }


    public function createDecision()
    {
        $employe = Employe::all();
        $post = Poste::all();
        // $formation= Formation::all();
        return view('empl_post', [
            'post' => $post,
            // 'stagiaire' => $stagiaire,
            'employe' => $employe
        ]);
    }
    // employe_poste

    public function storeDecision(Request $request)
    {
        $employe_poste = new Occuper();
        $employe_poste ->poste_id= $request->identifiant1;
        $employe_poste ->employe_id= $request->identifiant2;
        $employe_poste->save();
        // Redirection ou autre traitement
        return redirect()->back()->with('success', 'enregistré avec succès !');
    }


    public function calculSalaire()
    {
        return view('analyse');
    }

}

