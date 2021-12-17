<?php

namespace App\Http\Controllers;

use App\Models\SolicitudSocio;
use Illuminate\Http\Request;
use App\Exports\SolicitudesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.solicitudsocio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.solicitudsocio.create');
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
        return view('sistema.solicitudsocio.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('sistema.solicitudsocio.edit', compact('id'));
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
        return Excel::download(new SolicitudesExport, 'solicitudes.xlsx');
    }

    public function pdf() {
        $solicitudes = SolicitudSocio::all();
        $pdf = PDF::loadView('sistema.solicitudsocio.exportar.pdf', compact('solicitudes'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('solicitud.pdf');
    }
}
