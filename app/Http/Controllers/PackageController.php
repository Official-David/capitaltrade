<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        return view('users.package.index', compact('packages'));
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
    public function edit(string $name, $id)
    {
        $package = Package::find($id);
        return view('users.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      $package = Package::findOrFail($id);
      $package->name = $request->input('name');
      $package->duration = $request->input('duration');
      $package->maximum_deposit = $request->input('maximum_deposit');
      $package->minimum_deposit = $request->input('minimum_deposit');
      $package->roi = $request->input('roi');
      $package->update();

      return redirect()->route('packages');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
