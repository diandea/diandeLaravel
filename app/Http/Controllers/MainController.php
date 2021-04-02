<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use App\Exports\ProduitsExport;
use App\Mail\NouveauProduitAjouter;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProduitFormRequest;
use App\Notifications\NouveauProduitNotification;
use Illuminate\Contracts\Cache\Store;

class MainController extends Controller
{
    public function afficheAcceuil()
    {
        // Fonction retournant une page avec des params
        return view('welcome',
        [
           'nomSite' => 'Service en ligne de mon Ministère',
           'nomMinistere' => 'Ministere de Laravel au Burkina Faso',
        ]
        );
    }

    public function afficheProcedure($param)
    {
        // Fonction retournant une page avec des params recemment entrées
        return view('pages.front-office.procedure',
        [
            'parametre' => $param,
            'question' => 'baba',
        ]);
    }

    // fonction pour creer un nouveau produit - PREMIERE APPROCHE
    public function ajoutProduit()
    {
        $produit = new Produit();

        $produit->uuid = Str::uuid();
        $produit->designation = 'Tomate';
        $produit->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque deleniti quisquam beatae deserunt dicta ipsam tenetur at necessitatibus in, eligendi voluptatibus doloribus earum sed error maiores nam possimus sunt assumenda?';
        $produit->prix = '1000';
        $produit->like = '21';
        $produit->pays_source = 'Burkina Faso';
        $produit->poids = '45.10';

        $produit->save();
    }

    // fonction pour creer un nouveau produit - DEUXIEME APPROCHE
    public function ajoutProduitEncore()
    {
        Produit::create(
            [
                'uuid' => Str::uuid(),
                'designation' => 'Mangue',
                'description' => 'Mangue bien grosse et sucrée! Yaa Proprè !',
                'prix' => 1500,
                'like' => 63,
                'pays_source' => 'Togo',
                'poids' => 89.5,
            ]
        );
    }

    public function getList()
    {
        $produit = Produit::first();
        $user = User::first();
        $produit->users()->attach($user);
        $users = $produit->users;
        $produits = $user->produits;
        // dd($produits);

        return view('pages.front-office.list-produits', [
            'lesproduits' => Produit::paginate(6),
            'lescommande' => Commande::paginate(6),
        ]);
    }

    public function modifierProduit($id)
    {
        $produitModifie = Produit::where('id', $id)->update([
            'designation' => 'Orange',
            'description' => 'La description de Orange',
        ]);
    }

    public function supprimer($id)
    {
        Produit::destroy($id);

        return redirect()->back()->with('statut', 'Supprimer avec succes');
    }

    public function deletecommande($id)
    {
        Commande::destroy($id);

        return redirect()->back()->with('statut', 'Commande a été supprimé avec succes');
    }

    public function ajoutercommande($id)
    {
        $commande = new Commande();
        $commande->id_produit = $id;
        $commande->uuid = Str::uuid();
        $commande->save();
        // dd($commande);
        return redirect()->back()->with('statut', 'Commande ajouté avec succes !');
    }

    public function ajouterProduit()
     {
         $produit = new Produit();
        return view('pages.front-office.ajouter-produit',["produit"=>$produit]);
    }

    public function enregistrerProduit(ProduitFormRequest $request)
    {
        
        $imageName= time()."_".$request->file("image")->getClientOriginalName();
        //dd($imageName);
        $request->file("image")->storeAs("public/produits-images",$imageName);
        $produit = Produit::create([
            'uuid' => Str::uuid(),
            'designation' => $request->designation,
            'prix' => $request->prix,
            'description' => $request->description,
            'pays_source' => $request->pays_source,
            'like' => $request->like,
            'poids' => $request->poids,
            'image_produit' => $imageName,
        ]);
        $user=User::first();
        //Mail::to($user)->send(new NouveauProduitAjouter($user));
        $user->notify(new NouveauProduitNotification($produit));
        //dd($produit);
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        // dd($produit);
        $produit = Produit::findOrfail($produit->id);
        // dd($produit);
        return view('pages.front-office.edit-produit', [
            'produit' => $produit,
        ]);
    }

    public function updateProduit(ProduitFormRequest $request, $id)
    {
        Produit::where('id', $id)->update([
        'designation' => $request->designation,
        'prix' => $request->prix,
        'description' => $request->description,
        'like' => $request->like,
        'pays_source' => $request->pays_source,
        'poids' => $request->poids,
       ]);

        return redirect()->route('produits.liste')->with('statut', 'Le produit a bien été modifié !');
    }

    public function excelExport()
    {
        return Excel::download(new ProduitsExport, "Produits.xls");
    }

    public function sendmail(){
        $user=User::first();
        
        Mail::to($user)->send(new NouveauProduitAjouter($user));
        dd("Le mail a bien été envoyé");
    }
}
