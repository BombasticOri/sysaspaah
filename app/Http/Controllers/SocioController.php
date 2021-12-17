<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SocioExport;
use App\Http\Controllers\Controller;
use App\Models\Socio;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.socio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.socio.create');
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
        return view('sistema.socio.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('sistema.socio.edit', compact('id'));
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
        return Excel::download(new SocioExport, 'socio.xlsx');
    }

    public function pdf() {
        $personas = Socio::all();
        $pdf = PDF::loadView('sistema.socio.exports.pdf', compact('socios'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('socios.pdf');
    }

    public function pdfCarnet($id) {
        $persona = Socio::find($id);
        $pdf = PDF::loadView('sistema.socio.exports.pdfCarnet', compact('socios'));
        return $pdf->stream('personasCarnet.pdf');
    }
}
