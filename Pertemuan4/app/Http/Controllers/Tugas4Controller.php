<?php

namespace App\Http\Controllers;

use App\Models\Tugas4;
use App\Http\Requests\StoreTugas4Request;
use App\Http\Requests\UpdateTugas4Request;

class Tugas4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas4 = Tugas4::all();
        return view('tugas4.index', compact('tugas4'));
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
    public function store(StoreTugas4Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas4 $tugas4)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas4 $tugas4)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTugas4Request $request, Tugas4 $tugas4)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tugas4 $tugas4)
    {
        //
    }
}
