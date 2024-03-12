<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarification;
use App\Models\Location;
use Dompdf\Dompdf;

class TarificationController extends Controller
{
    public function index()
    {
        $tarifications = Tarification::all();
        return view('tarifications.index', compact('tarifications'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('tarifications.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|unique:tarifications',
            'prix' => 'required|numeric',
            'date_paiement' => 'required|date',
            'moyen_paiement' => 'required',
            'location_id' => 'required|exists:locations,id',
        ]);

        // Vérifier si une tarification existe déjà pour cette location
        if (Tarification::where('location_id', $request->location_id)->exists()) {
            return redirect()->back()->with('error', 'Une tarification existe déjà pour cette location.');
        }

        // Créer la tarification
        Tarification::create([
            'numero' => $request->numero,
            'prix' => $request->prix,
            'date_paiement' => $request->date_paiement,
            'moyen_paiement' => $request->moyen_paiement,
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('tarifications.index')->with('success', 'Tarification créée avec succès.');
    }

    public function show(Tarification $tarification)
    {
        return view('tarifications.show', compact('tarification'));
    }

    public function edit(Tarification $tarification)
    {
        $locations = Location::all();
        return view('tarifications.edit', compact('tarification', 'locations'));
    }

    public function update(Request $request, Tarification $tarification)
    {
        $request->validate([
            'numero' => 'required|unique:tarifications,numero,' . $tarification->id,
            'prix' => 'required|numeric',
            'date_paiement' => 'required|date',
            'moyen_paiement' => 'required',
            'location_id' => 'required|exists:locations,id',
        ]);

        $tarification->update($request->all());

        return redirect()->route('tarifications.index')->with('success', 'Tarification mise à jour avec succès.');
    }

    public function destroy(Tarification $tarification)
    {
        $tarification->delete();
        return redirect()->route('tarifications.index')->with('success', 'Tarification supprimée avec succès.');
    }


    
    public function printInvoicePDF(Tarification $tarification)
    {
        $html = view('facture', compact('tarification'))->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('facture.pdf');
    }

}
