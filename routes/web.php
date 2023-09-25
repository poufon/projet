<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PersonalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [PostController::class,'index']);

Route::post('login-me', [AuthController::class,'login'])->name('login-me');

Route::get('/accueil',function(){
    return view('accueil');
})->middleware('auth');
Route::get('/',function(){
    return view('welcome');
})->middleware('auth');


// EMPLOYEE
Route::middleware(['auth:web'])->group(function () {
    Route::get('/employee', [PostController::class,'showEmployee'])->name('employee.index');
    Route::get('/employee/create', [PostController::class, 'createEmployee'])->name('employee.create');
    Route::post('/employee', [PostController::class,'storeEmployee'])->name('employee.store');
    Route::get('/employee/{id}/edit', [PostController::class,'editEmployee'])->name('employee.edit');
    Route::put('/employee/{id}', [PostController::class,'updateEmployee'])->name('employee.update');
    Route::delete('/employee/{id}', [PostController::class,'deleteEmployee'])->name('employee.delete');

    Route::get('/services/create',[PersonalController::class,'createService'])->name('Service.create');
    Route::post('/services',[PersonalController::class,'storeService'])->name('Service.store');

    Route::get('/contrat', [PostController::class,'showContrat'])->name('contrat.index');
    Route::get('/contrat/create', [PostController::class,'createContrat'])->name('contrat.create');
    Route::post('/contrat', [PostController::class,'storeContrat'])->name('contrat.store');
    Route::get('/contrat/{id}/edit', [PostController::class,'editContrat'])->name('contrat.edit');
    Route::put('/contrat/{id}', [PostController::class,'updateContrat'])->name('contrat.update');
    Route::delete('/contrat/{id}', [PostController::class,'deleteContrat'])->name('contrat.delete');

    // HORRAIRE

    Route::get('/horraire', [PostController::class,'showHorraire'])->name('horraire.index');
    Route::get('/horraire/create', [PostController::class,'createHorraire'])->name('horraire.create');
    Route::post('/horraire', [PostController::class,'storeHorraire'])->name('horraire.store');
    Route::get('/horraire/{id}/edit', [PostController::class,'editHorraire'])->name('horraire.edit');
    Route::put('/horraire/{id}', [PostController::class,'updateHorraire'])->name('horraire.update');
    Route::delete('/horraire/{id}', [PostController::class,'deleteHorraire'])->name('horraire.delete');

    // UTILISATEUR


    Route::get('/users', [PostController::class, 'showUsers'])->name('users.index');
    Route::get('/users/create', [PostController::class, 'createUsers'])->name('users.create');
    Route::post('/users', [PostController::class, 'storeUsers'])->name('users.store');
    Route::get('/users/{id}/edit', [PostController::class, 'editUsers'])->name('users.edit');
    Route::put('/users/{id}', [PostController::class, 'updateUsers'])->name('users.update');
    Route::delete('/users/{id}', [PostController::class, 'deleteUsers'])->name('users.delete');

    Route::get('/modal', [ModalController::class, 'showModal'])->name('modal');
    Route::post('/send-email', [ModalController::class, 'sendEmail'])->name('send-email');

    Route::get('/permission', [PersonalController::class, 'showPermission'])->name('permission.index');
    Route::get('/PermissionCreate', [PersonalController::class, 'createPermission'])->name('permission.create');
    Route::post('/permission', [PersonalController::class, 'storePermission'])->name('permission.store');

    Route::get('/permissionStagiaire', [PersonalController::class, 'showPermissionStagiaire'])->name('permissionStagiaire.index');
    Route::get('/permissionEmploye', [PersonalController::class, 'showPermissionEmploye'])->name('permissionEmploye.index');
    Route::post('/permissionEmploye/send-email', [PersonalController::class, 'sendEmailEmploye'])->name('permissionEmploye.sendEmail');
    Route::delete('/permissionEmploye/{id}', [PersonalController::class, 'destroyPermissionEmploye'])->name('permissionEmploye.destroy');
    Route::post('/permissionStagiaire/send-email', [PersonalController::class, 'sendEmailStagiaire'])->name('permissionStagiaire.sendEmail');
    Route::delete('/permissionStagiaire/{id}', [PersonalController::class, 'destroyPermissionStagiaire'])->name('PermissionStagiaire.destroy');


    Route::get('/conge', [PostController::class,'showConge'])->name('conge.index');
    Route::get('/Conge/create', [PostController::class, 'createConge'])->name('CongeAnnuel.create');
    Route::post('/Conge', [PostController::class,'storeConge'])->name('CongeAnnuel.store');

    Route::get('/decising', [PostController::class, 'showDecision'])->name('Decision.show');
    Route::get('/Decision/create', [PostController::class, 'createDecision'])->name('decision.create');
    Route::post('/Decision.', [PostController::class,'storeDecision'])->name('Decision.store');

    Route::get('/search', [PersonalController::class,'showSearchForm'])->name('search.show');
    // Route::get('/searchs', [PersonalController::class, 'showSearchForm']);
    Route::post('/resulltat_search', [PersonalController::class,'search'])->name('search.char');


    Route::post('/send-email{id}', [PostController::class, 'sendEmail'])->name('sendEmail');
    Route::post('/send-email', ['sendEmail'])->name('send.email');

    Route::get('/posteShow.', [PostController::class,'showPoste'])->name('poste.show');
    Route::get('/seviceShow.', [PostController::class,'showService'])->name('sevice.show');
    Route::get('/post/create', [PostController::class, 'createPoste'])->name('poste.create');
    Route::post('/poste.', [PostController::class,'storePoste'])->name('poste.store');


    Route::get('/fichePaie', [PersonalController::class, 'showFichePaie'])->name('fichePaie.show');
    Route::get('/paie/{id}.', [PersonalController::class,'showPaie'])->name('Paie.show');

    Route::get('/sanctionss', [PersonalController::class,'showSanction'])->name('sanction.index');
    Route::get('/sanctionCreate', [PersonalController::class,'createSanction'])->name('sanction.create');
    Route::post('/sanction', [PersonalController::class,'storeSanction'])->name('sanction.store');
    Route::delete('/sanction/{id}', [PersonalController::class,'deleteSanction'])->name('sanction.delete');

    Route::get('/absence', [PersonalController::class,'showAbsence'])->name('absence.index');
    Route::get('/absenceCreate', [PersonalController::class,'createAbsence'])->name('absence.create');
    Route::post('/absence', [PersonalController::class,'storeAbsence'])->name('absence.store');
    Route::delete('/absence/{id}', [PersonalController::class,'deleteAbsence'])->name('absence.delete');

    Route::get('/retard', [PersonalController::class,'showRetard'])->name('retard.index');
    Route::get('/retardCreate', [PersonalController::class, 'createRetard'])->name('retard.create');
    Route::post('/retard', [PersonalController::class, 'storeRetard'])->name('retard.store');
    Route::delete('/retard/{id}', [PersonalController::class,'deleteRetard'])->name('retard.delete');
    //
    Route::get('/tableau', [PostController::class, 'showTableau']);


});
