<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Produit;
use App\Models\Echantillon;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generatePdf($projetId, $produitId)
    {
        // Récupérer le projet spécifié par son identifiant
        $projet = Projet::findOrFail($projetId);

        // Récupérer le produit spécifié par son identifiant
        $produit = Produit::findOrFail($produitId);

        // Récupérer les échantillons associés à ce produit
        $echantillons = Echantillon::where('produit_id', $produitId)->get();

        // Génération du contenu HTML du PDF en utilisant la vue
        $html = view('admin.pdf', compact('projet', 'produit', 'echantillons'))->render();

        // Création d'un objet Dompdf
        $pdf = new Dompdf();

        // Chargement du contenu HTML dans Dompdf
        $pdf->loadHtml($html);

        // Définition du format et de l'orientation du papier
        $pdf->setPaper('A4', 'portrait');

        // Rendu du PDF
        $pdf->render();

        // Nom du fichier PDF à télécharger
        $fileName = 'rapport_projet_' . $projet->name . '_produit_' . $produit->name . '.pdf';

        // Téléchargement du PDF avec le nom spécifié
        return $pdf->stream($fileName);
    }
}