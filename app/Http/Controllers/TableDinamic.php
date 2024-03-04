<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;

class TableDinamic extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los datos de la tabla dinámica
        $usuarios = User::all();

        // Agrupar los usuarios por rol
        $usuariosPorRol = $usuarios->groupBy('rol');

        // Calcular los valores de la tabla dinámica
        $tablaDinamica = [];
        foreach ($usuariosPorRol as $rol => $usuarios) {
            $tablaDinamica[$rol]['rol'] = $rol;
            $tablaDinamica[$rol]['total_usuarios'] = $usuarios->count();
            $tablaDinamica[$rol]['fecha_creacion_promedio'] = $usuarios->avg('created_at');
        }

        // Mostrar la vista con la tabla dinámica
        return view('tabla-dinamica', compact('tablaDinamica'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
