<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class testContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          dd(Response()->json(['name','Hassan','age',25]));
    //    dd(response()->json(['name' => 'Hassan', 'age' => 25]));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return ("this is create method");
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
