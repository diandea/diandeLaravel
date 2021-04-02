<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Produit;
use App\Mail\NouveauProduitAjouter;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Notifications\NouveauProduitNotification;

Route::get('/', [MainController::class, 'afficheAcceuil'])->name('accueil');

Route::get('procedure/{param}', [MainController::class, 'afficheProcedure'])->name('procedure');
Route::get('ajouter-produit', [MainController::class, 'ajoutProduit'])->name('a.produit');

Route::get('ajout2', [MainController::class, 'ajoutProduitEncore'])->name('a.p');

Route::get('list-produits', [MainController::class, 'getList'])->name('list');

Route::get('modification/{id}', [MainController::class, 'modifierProduit']);

Route::get('supprimer/{id}', [MainController::class, 'supprimer'])->name('delete');

Route::get('deletecommande/{id}', [MainController::class, 'deletecommande'])->name('deletecommande');

Route::get('ajoutercommande/{id}', [MainController::class, 'ajoutercommande'])->name('ajoutercommande');

Route::get('produits/liste', [MainController::class, 'getList'])->name('produits.liste')->middleware('auth','isadmin');

Route::get('produits/ajouter', [MainController::class, 'ajouterProduit'])->name('produit.ajout');

Route::post('produits/engregistrer', [MainController::class, 'enregistrerProduit'])->name('produits.enregister');

Route::get('produits/modifier/{produit}', [MainController::class, 'edit'])->name('produits.modifier');

Route::put('produits/update/{id}', [MainController::class, 'updateProduit'])->name('produits.update');

Route::resource('produits', ProduitController::class);

Route::get("export-excel", [MainController::class, "excelExport"])->name("excel.export");

Route::get("send-mail", [MainController::class, "sendmail"]);

Route::get("mailtest", function(){
    $produit=Produit::first();
    return new NouveauProduitAjouter($produit);
});

Route::get("test-notification", function(){
    $user= User::first();
    $produit=Produit::first();
    $user->notify(new NouveauProduitNotification($produit));
    dd("Notification faite avec succès");
});

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

//Route::get();
