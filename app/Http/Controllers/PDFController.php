<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function pdf($id)
    {   
        $venta_pdf = Venta::find($id);
        if (!$id) {
            return response()->json(['error' => 'Cliente not found'], 404);
        }
        $pdf = Pdf::loadView('generar-pdf', compact('venta_pdf'));
        return $pdf->download('reporte_venta.pdf');
    }
}
