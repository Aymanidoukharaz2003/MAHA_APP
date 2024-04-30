<?php

namespace App\Http\Controllers;

use App\Models\Consulteur;
use App\Models\Echantillon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Projet;
use App\Models\Produit;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;

class AdminController extends Controller
{
   public function index(){
    return view('admin.dashboard');
   }
   //personnel zone
   public function personnel(){
      return view('admin.addperso');
   }
   public function storeper(Request $request){
      $request->validate([
         'name'=> 'required',
         'adresse'=> 'required',
         'email'=> 'required|email',
         'telephone'=> 'required',
         'password' => 'required',
         'cin'=> 'required',
     ]);

     $personnel =new Personnel();
     $personnel->name = $request->name;
     $personnel->adresse = $request->adresse;
     $personnel->email = $request->email;
     $personnel->telephone = $request->telephone;
     $personnel->password = bcrypt($request->password);
     $personnel->cin = $request->cin;
     $personnel->save();

     $user =new User();
     $user->name = $personnel->name;
     $user->email = $personnel->email;
     $user->password = bcrypt($request->password);
     $user->role = 'personnel';
     $user->save();
     return redirect()->route('personnel.show');
   }

   public function showperso(){
      $personnels = Personnel::all();
      return view('admin.showperso',compact('personnels'));
   }
   public function updateperso($id){
      $personnel = Personnel::find($id);
      return view('admin.updateperso',compact('personnel'));}
   public function modperso(Request $request){
      $request->validate([
           'name'=> 'required',
           'adresse'=> 'required',
           'email'=> 'required',
           'telephone'=> 'required',
           'password' => 'required',
           'cin'=> 'required',

       ]);

       $personnel =Personnel::find($request->id);
       if($personnel){
           $personnel->name = $request->name;
           $personnel->adresse = $request->adresse;
           $personnel->email = $request->email;
           $personnel->telephone = $request->telephone;
           $personnel->password = $request->password;
           $personnel->cin = $request->cin;
           $personnel->update();
           $user = User::where('email', $personnel->email)->first();
       if($user){
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->update();
       }else {
         
           return redirect()->back()->with('error', 'Personnel introuvable.');
       }
       }else {

           return redirect()->back()->with('error', 'Personnel  introuvable.');
       }

       return redirect()->route('personnel.show')->with('status','Personnel  est modifier avec succès.');
}
public function deleteperso($id){
   $personnel = Personnel::find($id);
   
if($personnel){
   $personnel->delete();
   $user = User::where('email', $personnel->email)->first();
   if($user){
       $user->delete();
   } else {
       return redirect()->back()->with('error', 'Utilisateur introuvable.');
   }
} else {
   return redirect()->back()->with('error', 'personnel introuvable.');
}
   return redirect()->route('personnel.show')->with('status1','personnel est supprimer avec succès.');;
}

//consulteur zone
public function consulteur(){
   return view('admin.addcons');
}
public function storecons(Request $request){
   $request->validate([
      'name'=> 'required',
      'adresse'=> 'required',
      'email'=> 'required|email',
      'telephone'=> 'required',
      'password' => 'required',
      'cin'=> 'required',
  ]);

  $consulteur =new Consulteur();
  $consulteur->name = $request->name;
  $consulteur->adresse = $request->adresse;
  $consulteur->email = $request->email;
  $consulteur->telephone = $request->telephone;
  $consulteur->password = bcrypt($request->password);
  $consulteur->cin = $request->cin;
  $consulteur->save();

  $user =new User();
  $user->name = $consulteur->name;
  $user->email = $consulteur->email;
  $user->password = bcrypt($request->password);
  $user->role = 'consulteur';
  $user->save();
  return redirect()->route('consulteur.show');
}

public function showcons(){
   $consulteurs = Consulteur::all();
   return view('admin.showcons',compact('consulteurs'));
}
public function updatecons($id){
   $consulteur = Consulteur::find($id);
   return view('admin.updatecons',compact('consulteur'));}
public function modcons(Request $request){
   $request->validate([
        'name'=> 'required',
        'adresse'=> 'required',
        'email'=> 'required',
        'telephone'=> 'required',
        'password' => 'required',
        'cin'=> 'required',

    ]);

    $consulteur =Consulteur::find($request->id);
    if($consulteur){
        $consulteur->name = $request->name;
        $consulteur->adresse = $request->adresse;
        $consulteur->email = $request->email;
        $consulteur->telephone = $request->telephone;
        $consulteur->password = $request->password;
        $consulteur->cin = $request->cin;
        $consulteur->update();
        $user = User::where('email', $consulteur->email)->first();
    if($user){
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->update();
    }else {
      
        return redirect()->back()->with('error', 'Consulteur introuvable.');
    }
    }else {

        return redirect()->back()->with('error', 'Consulteur  introuvable.');
    }

    return redirect()->route('consulteur.show')->with('status','Consulteur  est modifier avec succès.');
}
public function deletecons($id){
$consulteur = Consulteur::find($id);

if($consulteur){
$consulteur->delete();
$user = User::where('email', $consulteur->email)->first();
if($user){
    $user->delete();
} else {
    return redirect()->back()->with('error', 'Utilisateur introuvable.');
}
} else {
return redirect()->back()->with('error', 'consulteur introuvable.');
}
return redirect()->route('consulteur.show')->with('status1','consulteur est supprimer avec succès.');;
}

//projet zone

public function projet(){
   $personnels = Personnel::all();
   $consulteurs = Consulteur::all();
   return view('admin.addprojet',compact('personnels','consulteurs'));
}
public function storeproj(Request $request){
   $request->validate([
      'name'=> 'required',
      'statu'=> 'required',
      'date'=> 'required',
      
     
  ]);

  $projet = new Projet();
    $projet->name = $request->input('name');
    $projet->statu = $request->input('statu');
    $projet->date = $request->input('date');
    $projet->save();

    $projet->personnels()->attach($request->input('personnel_id'));
    $projet->consulteurs()->attach($request->input('consulteur_id'));

  return redirect()->route('projet.show');
}

public function showproj(){
   $projets = Projet::all();
   $produit = Produit::all();
   $echantillon = Echantillon::all();
   return view('admin.showprojet',compact('projets','produit','echantillon'));
}
public function updateproj($id){
   $projet = Projet::find($id);
   $personnels = Personnel::all();
   $consulteurs =  Consulteur::all();
   return view('admin.updateprojet',compact('projet','personnels','consulteurs'));}
public function modproj(Request $request){
   $request->validate([
      'name' => 'required',
      'statu' => 'required',
      'date' => 'required',
  ]);

  $projet = Projet::findOrFail($request->id);

  $projet->name = $request->input('name');
  $projet->statu = $request->input('statu');
  $projet->date = $request->input('date');
  $projet->save();

  $personnels = $request->input('personnel_id', []);
  $consulteurs = $request->input('consulteur_id', []);

  if (!empty($personnels)) {
      $projet->personnels()->sync($personnels);
  }

  if (!empty($consulteurs)) {
      $projet->consulteurs()->sync($consulteurs);
  }

 return redirect('/admin/listeprojet');

}
public function deleteproj($id){
$projet = Projet::find($id);
$projet->delete();
return redirect()->route('projet.show')->with('status1','Projet est supprimer avec succès.');;
}

//produit zone
public function produit(){
   $projets = Projet::all();
   return view('admin.addprod',compact('projets'));
}
public function storeprod(Request $request){
   $request->validate([
      'name' => 'required|string',
      'quantite' => 'required|integer',
      'marque' => 'required|string',
      'modele' => 'required|string',
      'projet_id' => 'required|exists:projets,id', 
      'user_name' => 'required|string', 
  ]);

  $produit = new Produit();
  $produit->name = $request->input('name');
  $produit->quantite = $request->input('quantite');
  $produit->marque = $request->input('marque');
  $produit->modele = $request->input('modele');
  $produit->user_name = $request->input('user_name');
  $produit->projet_id = $request->input('projet_id'); 

  $produit->save();


  return redirect()->route('produit.show');
}

public function showprod(Request $request){
   $projets = Projet::all();
   $query = Produit::query();

   // Vérifiez si un projet est sélectionné
   if ($request->has('projet')) {
       $projet_id = $request->input('projet');
       if ($projet_id) {
           $query->whereHas('projet', function($q) use ($projet_id) {
               $q->where('id', $projet_id);
           });
       }
   }

   $produits = $query->get();
   return view('admin.showprod', compact('produits', 'projets'));
}
public function updateprod($id){
   $produit = Produit::find($id);
   $projets = Projet::all();
   return view('admin.updateprod',compact('produit','projets'));}
public function modprod(Request $request){
   $request->validate([
      'name' => 'required|string',
      'quantite' => 'required|integer',
      'marque' => 'required|string',
      'modele' => 'required|string',
      'projet_id' => 'required|exists:projets,id', 
      'user_name' => 'required|string', 
  ]);

  $produit = Produit::findOrFail($request->id);

  // Récupération de l'ID du projet actuel associé au produit
  $ancienProjetId = $produit->projet_id;

  // Mise à jour des attributs du produit
  $produit->name = $request->input('name');
  $produit->quantite = $request->input('quantite');
  $produit->marque = $request->input('marque');
  $produit->modele = $request->input('modele');
  $produit->user_name = $request->input('user_name');
  $produit->projet_id = $request->input('projet_id');
  $produit->save();

  if ($produit->projet_id == $ancienProjetId) {
      $produit->projet_id = $ancienProjetId;
      $produit->update();
  }

  return redirect()->route('produit.show');
}
public function deleteprod($id){
$produit = Produit::find($id);
$produit->delete();
return redirect()->route('produit.show')->with('status1','Produit est supprimer avec succès.');;
}
public function filtrerprod(Request $request)
{
   
       $projets = Projet::all();
       $query = Produit::query();
   
       // Vérifiez si un projet est sélectionné dans le formulaire
       if ($request->has('projet')) {
           $projet_id = $request->input('projet');
           if ($projet_id) {
               // Si un projet est sélectionné, filtrez les produits par ce projet
               $query->where('projet_id', $projet_id);
           }
       }
   
       // Récupérez la liste des produits en fonction du projet sélectionné (le cas échéant)
       $produits = $query->get();
   
       return view('admin.showprod', compact('produits', 'projets'));
   }


//zone echantillon
public function echantillon(){
   $produits = Produit::all();
   $projets = Projet::all();
   return view('admin.addech',compact('produits','projets'));
}
public function fetchprodproj(Request $request)
{
    $produits = Produit::where('projet_id', $request->projet_id)->get();
    $options = '<option value="">Sélectionner un produit</option>';
    foreach ($produits as $produit) {
        $options .= '<option value="' . $produit->id . '">' . $produit->name . '</option>';
    }
    return $options;
}

public function storeech(Request $request){
   $validatedData = $request->validate([
      'nserie.*' => 'required',
      'description.*' => 'required',
      'produit_id.*' => 'required|exists:produits,id',
      'user_name' => 'required|string',
      'terminer' =>'required',
      'consulteur' => 'required|string',

  ]);

  foreach ($validatedData['nserie'] as $key => $nserie) {
      $echantillon = new Echantillon();
      $echantillon->nserie = $nserie;
      $echantillon->produit_id = $validatedData['produit_id'][$key];
      $echantillon->user_name = $validatedData['user_name'];
      $echantillon->consulteur = $validatedData['consulteur'];
      $echantillon->description = $validatedData['description'][$key];
      $echantillon->terminer = $request->input('terminer');

      $echantillon->save();
  }
  

  return redirect()->route('admin.echantillon');
}

public function showech(){
   $echantillons = Echantillon::all();
   return view('admin.showech',compact('echantillons'));
}
public function updateech($id){
   $echantillon = Echantillon::find($id);
   $produits = Produit::all();
   return view('admin.updateech',compact('produits','echantillon'));}
   public function modech(Request $request){
      
      $validatedData = $request->validate([
        'nserie.*' => 'required',
        'description.*' => 'required',
        'produit_id' => 'required',
        'user_name' => 'required|string',
        'terminer' =>'required',
     ]);
 
     $echantillon = Echantillon::findOrFail($request->id);
 
     // Sauvegarder l'ancien ID de produit
     $ancienProduitId = $echantillon->produit_id;
 
     // Mettre à jour les attributs de l'échantillon
     $echantillon->nserie = $validatedData['nserie'];
     $echantillon->produit_id = $validatedData['produit_id'];
     $echantillon->user_name = $validatedData['user_name'];
     $echantillon->description = $validatedData['description'];
     $echantillon->terminer = $validatedData['terminer'];
     $echantillon->save();
 
     // Vérifier si l'ID du produit a changé
     if ($echantillon->produit_id != $ancienProduitId) {
         // Si oui, rétablir l'ancien ID de produit et mettre à jour l'échantillon
         $echantillon->produit_id = $ancienProduitId;
         $echantillon->save();
     }
 
     return redirect()->route('produit.show');
}
public function deleteech($id){
$echantillon = Echantillon::find($id);
$echantillon->delete();
return redirect()->route('produit.show')->with('status1','Produit est supprimer avec succès.');;
}
public function show($produit_id)
{
    $echantillons = Echantillon::where('produit_id', $produit_id)->get();

    return view('admin.showech', ['echantillons' => $echantillons]);
}
}
