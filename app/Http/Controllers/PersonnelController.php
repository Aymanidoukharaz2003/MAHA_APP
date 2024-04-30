<?php

namespace App\Http\Controllers;

use App\Models\Echantillon;
use App\Models\Personnel;
use App\Models\Produit;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{
    public function index()
    {  $personnel = auth()->user()->id;

        return view('personnel.dashboard',compact('personnel'));
    }

    //zone projet
    public function showproj($email)
    {
        // Récupérer le personnel par son email
        $personnel = Personnel::where('email', $email)->firstOrFail();
        
        // Récupérer les projets associés à ce personnel
        $projets = $personnel->projets;
    
        // Passer les projets à la vue
        return view('personnel.showprojet', compact('projets'));
    }

    //zone produit
    public function affprod(Request $request, $email)
{
    $personnel = Personnel::where('email', $email)->firstOrFail();   
    $projets = $personnel->projets;
    $projetsIds = $projets->pluck('id');

    
    $produits = Produit::join('projets', 'produits.projet_id', '=', 'projets.id')
                        ->whereIn('projets.id', $projetsIds)
                        ->select('produits.*')
                        ->distinct()
                        ->get();

    return view('personnel.affprod', compact('produits', 'projets'));
}


//zone echantillon

public function affech(Request $request, $email)
{
    $personnel = Personnel::where('email', $email)->firstOrFail();

    $projets = $personnel->projets;

    $projetsIds = $projets->pluck('id');

    $produits = Produit::join('projets', 'produits.projet_id', '=', 'projets.id')
                        ->whereIn('projets.id', $projetsIds)
                        ->select('produits.*')
                        ->distinct()
                        ->get();

    $echantillons = [];

    if ($request->has('produit_id')) {
        $produit_id = $request->input('produit_id');
        $echantillons = Echantillon::where('produit_id', $produit_id)->get();
    }

    return view('personnel.affech',compact('produits', 'projets', 'echantillons'));
}

public function addech($email)
{
    $personnel = Personnel::where('email', $email)->firstOrFail();

    $projets = $personnel->projets;

    $projetsIds = $projets->pluck('id');

    $produits = Produit::join('projets', 'produits.projet_id', '=', 'projets.id')
                        ->whereIn('projets.id', $projetsIds)
                        ->select('produits.*')
                        ->distinct()
                        ->get();// Récupérer les produits associés aux projets du personnel
    return view('personnel.ajtech', compact('produits', 'projets'));
}



public function fetchProductsByProject(Request $request)
{
    // Vérifier si le projet spécifié existe
    $projet = Projet::find($request->projet_id);
    if (!$projet) {
        return '<option value="">Aucun projet trouvé</option>';
    }

    // Récupérer les produits associés au projet spécifié
    $produits = Produit::where('projet_id', $projet->id)->get();

    // Générer les options HTML
    $options = '<option value="">Sélectionner un produit</option>';
    foreach ($produits as $produit) {
        $options .= '<option value="' . $produit->id . '">' . $produit->name . '</option>';
    }

    return $options;
}

public function enrech(Request $request, $email)
{
    // Validation des données envoyées dans la requête
    $validatedData = $request->validate([
        'nserie.*' => 'required',
        'description.*' => 'required',
        'produit_id.*' => 'required|exists:produits,id',
        'user_name' => 'required|string',
        'terminer' =>'required',

    ]);
    
    // Récupérer le personnel associé à l'email
    $personnel = Personnel::where('email', $email)->firstOrFail();
    
    foreach ($validatedData['nserie'] as $key => $nserie) {
        $echantillon = new Echantillon();
        $echantillon->nserie = $nserie;
        $echantillon->produit_id = $validatedData['produit_id'][$key];
        $echantillon->user_name = $personnel->name;
        $echantillon->description = $validatedData['description'][$key];
        $echantillon->terminer = $validatedData['terminer'];
        $echantillon->save();
    }

    return redirect()->route('personnel.produits',['email' => Auth::user()->email])->with('success', 'Les échantillons ont été ajoutés avec succès.');
}

public function updech($email, $id)
{
    // Récupérer le personnel associé à l'email
    $personnel = Personnel::where('email', $email)->firstOrFail();
    
    // Récupérer l'échantillon à modifier
    $echantillon = Echantillon::findOrFail($id);
    
    // Récupérer les projets associés au personnel
    $projets = $personnel->projets;

    // Récupérer les produits associés aux projets du personnel
    $projetsIds = $projets->pluck('id');
    $produits = Produit::whereIn('projet_id', $projetsIds)->get();
    
    return view('personnel.modiech', compact('echantillon', 'produits', 'projets'));
}

 public function modiech(Request $request, $email){
    $validatedData = $request->validate([
        'nserie.*' => 'required',
        'description.*' => 'required',
        'produit_id.*' => 'required|exists:produits,id',
        'user_name' => 'required|string',
        'terminer' =>'required',

    ]);
    $personnel = Personnel::where('email', $email)->firstOrFail();
  
    $echantillon = Echantillon::findOrFail($request->id);
  
    $ancienProduitId = $echantillon->produit_id;
  
    $echantillon->nserie = $validatedData['nserie'];
    $echantillon->produit_id = $validatedData['produit_id'];
    $echantillon->user_name = $personnel->name;
    $echantillon->description = $validatedData['description'];
    $echantillon->terminer = $validatedData['terminer'];

    $echantillon->save();
  
    if ($echantillon->produit_id != $ancienProduitId) {
        $echantillon->produit_id = $ancienProduitId;
        $echantillon->save();
    }
  
    return redirect()->route('personnel.produits',['email' => Auth::user()->email]);
 }
 public function deltech($email, $id){
    $personnel = Personnel::where('email', $email)->firstOrFail();
    
    $echantillon = Echantillon::findOrFail($id);
    
    $echantillon->delete();

    return redirect()->route('personnel.produits',['email' => Auth::user()->email]);

 }
  
    
}
