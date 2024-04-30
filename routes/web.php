<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsulteurController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProfileController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth','role:consulteur'])->group(function () {
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:consulteur'])->name('dashboard');

Route::get('/consulteur/{email}/projets', [ConsulteurController::class, 'showproj'])->name('consulteur.projets');    
    

//produit routes
Route::get('/consulteur/{email}/produit',[ConsulteurController::class,'affprod'])->name('consulteur.produits');


//echantillon routes

Route::get('consulteur/afficher-echantillons/{email}', [ConsulteurController::class, 'affech'])->name('consulteur.echantillons');
 //terminer

 Route::get('/terminer-echantillon/{id}', [ConsulteurController::class,'terminer'])->name('echantillon.terminer');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function () {
Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
//personnel routes
Route::get('/admin/addpersonnel',[AdminController::class,'personnel'])->name('admin.personnel');
Route::post('/admin/strpersonnel',[AdminController::class,'storeper'])->name('Personnel.store');
Route::get('/admin/listepersonnel',[AdminController::class,'showperso'])->name('personnel.show');
Route::get('/admin/updatepersonnel/{id}',[AdminController::class,'updateperso'])->name('personnel.update');
Route::post('/admin/modpersonnel',[AdminController::class,'modperso'])->name('Personnel.modifier');
Route::get('/admin/deletepersonnel/{id}',[AdminController::class,'deleteperso'])->name('personnel.delete');
//consulteur routes
Route::get('/admin/addconsulteur',[AdminController::class,'consulteur'])->name('admin.consulteur');
Route::post('/admin/strconsulteur',[AdminController::class,'storecons'])->name('consulteur.store');
Route::get('/admin/listeconsulteur',[AdminController::class,'showcons'])->name('consulteur.show');
Route::get('/admin/updateconsulteur/{id}',[AdminController::class,'updatecons'])->name('consulteur.update');
Route::post('/admin/modconsulteur',[AdminController::class,'modcons'])->name('consulteur.modifier');
Route::get('/admin/deleteconsulteur/{id}',[AdminController::class,'deletecons'])->name('consulteur.delete');

//projet routes

Route::get('/admin/addprojet',[AdminController::class,'projet'])->name('admin.projet');
Route::post('/admin/strprojet',[AdminController::class,'storeproj'])->name('projet.store');
Route::get('/admin/listeprojet',[AdminController::class,'showproj'])->name('projet.show');
Route::get('/admin/updateprojet/{id}',[AdminController::class,'updateproj'])->name('projet.update');
Route::post('/admin/modprojet',[AdminController::class,'modproj'])->name('projet.modifier');
Route::get('/admin/deleteprojet/{id}',[AdminController::class,'deleteproj'])->name('projet.delete');

//produit routes

Route::get('/admin/addproduit',[AdminController::class,'produit'])->name('admin.produit');
Route::post('/admin/strproduit',[AdminController::class,'storeprod'])->name('produit.store');
Route::get('/admin/listeproduit',[AdminController::class,'showprod'])->name('produit.show');
Route::get('/admin/updateproduit/{id}',[AdminController::class,'updateprod'])->name('produit.update');
Route::post('/admin/modproduit',[AdminController::class,'modprod'])->name('produit.modifier');
Route::get('/admin/deleteproduit/{id}',[AdminController::class,'deleteprod'])->name('produit.delete');
Route::get('/admin/prod',[AdminController::class,'filtrerprod'])->name('produit.filtrer');
//echantillon routes

Route::get('/admin/addechantillon',[AdminController::class,'echantillon'])->name('admin.echantillon');
Route::post('/admin/strechantillon',[AdminController::class,'storeech'])->name('echantillon.store');
Route::get('/admin/listeechantillon',[AdminController::class,'showech'])->name('echantillon.show');
Route::get('/admin/updateechantillon/{id}',[AdminController::class,'updateech'])->name('echantillon.update');
Route::post('/admin/modechantillon',[AdminController::class,'modech'])->name('echantillon.modifier');
Route::get('/admin/deleteechantillon/{id}',[AdminController::class,'deleteech'])->name('echantillon.delete');
Route::get('/admin/listesechantillon/{produit_id}',[AdminController::class,'show'])->name('echantillon.afficher');
Route::post('admin/fetch-products-by-project', [AdminController::class, 'fetchprodproj'])->name('admin.fetch.products.by.project');
 
//pdf
Route::get('/generer-pdf/{projetId}/{produitId}', [PdfController::class, 'generatePdf'])->name('generer.pdf');



Route::middleware(['auth','role:personnel'])->group(function () {
    Route::get('personnel/dashboard',[PersonnelController::class,'index'])->name('personnel.dashboard');
    //projet routes
    Route::get('/personnel/{email}/projets', [PersonnelController::class, 'showproj'])->name('personnel.projets');    
    

    //produit routes
    Route::get('/personnel/{email}/produit',[PersonnelController::class,'affprod'])->name('personnel.produits');
    

    //echantillon routes

    Route::get('/afficher-echantillons/{email}', [PersonnelController::class, 'affech'])->name('personnel.echantillons');
    // Affichage du formulaire pour ajouter un échantillon
Route::get('/personnel/{email}/echantillon', [PersonnelController::class, 'addech'])->name('personnel.echantillon.create');

// Récupération des produits par projet via une requête AJAX
Route::post('/fetch/products/by/project', [PersonnelController::class, 'fetchProductsByProject'])->name('fetch.products.by.project');
// Enregistrement des échantillons
Route::post('/personnel/{email}/strechantillon', [PersonnelController::class, 'enrech'])->name('personnel.echantillon.store');

// Routes pour la méthode updateech
Route::get('/personnel/{email}/upechantillons/{id}/edit', [PersonnelController::class, 'updech'])->name('personnel.echantillon.edit');
Route::put('/personnel/{email}/echantillons/{id}', [PersonnelController::class, 'modiech'])->name('personnel.echantillon.update');

// Route pour la méthode deleteech
Route::get('/personnel/{email}/deletechantillon/{id}', [PersonnelController::class, 'deltech'])->name('personnel.echantillon.delete');
});
});