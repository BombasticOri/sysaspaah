<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AsistenciaExport;
use App\Http\Controllers\Controller;
use App\Models\Asistencia;
use App\Models\Evento;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.asistencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.asistencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sistema.asistencia.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('sistema.asistencia.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function excel() {
        return Excel::download(new AsistenciaExport, 'asistencia.xlsx');
    }

    public function pdf() {
        $eventos = Evento::all();
        $asistencias = Asistencia::all();
        $pdf = PDF::loadView('sistema.asistencia.exportar.pdf', compact('asistencias'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('asistencia.pdf');
    }
}
