<?php

namespace App\Http\Controllers;

use App\Models\Consulteur;
use App\Models\Echantillon;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsulteurController extends Controller
{
    public function showproj($email){
        $consulteur = Consulteur::where('email', $email)->firstOrFail();
        
        // Récupérer les projets associés à ce personnel
        $projets = $consulteur->projets;
    
        // Passer les projets à la vue
        return view('consulteur.showprojet', compact('projets'));

    }

    public function affprod(Request $request, $email)
{
    $consulteur = Consulteur::where('email', $email)->firstOrFail();   
    $projets = $consulteur->projets;
    $projetsIds = $projets->pluck('id');

    
    $produits = Produit::join('projets', 'produits.projet_id', '=', 'projets.id')
                        ->whereIn('projets.id', $projetsIds)
                        ->select('produits.*')
                        ->distinct()
                        ->get();

    return view('consulteur.affprod', compact('produits', 'projets'));
}


public function affech(Request $request, $email)
{
    $consulteur = Consulteur::where('email', $email)->firstOrFail();

    $projets = $consulteur->projets;

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

    return view('consulteur.affech',compact('produits', 'projets', 'echantillons'));
}


public function terminer($id)
{
    $echantillon = Echantillon::find($id);
    if ($echantillon) {
        $echantillon->terminer = 'oui';
        $echantillon->consulteur = Auth::user()->name; 
        $echantillon->save();
        return redirect()->back()->with('success', 'Échantillon terminé avec succès.');
    } else {
        return redirect()->back()->with('error', 'Échantillon non trouvé.');
    }
}

}
