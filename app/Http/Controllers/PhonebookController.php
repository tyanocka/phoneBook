<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phonebooks = Phonebook::with('user')->get();
        return view('phonebook.index', compact('phonebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('phonebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhonebookRequest $request)
    {
        Phonebook::create(['name' => $request->name, 'phone' => $request->phone, 'user_id' => Auth::id()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phonebook $phonebook)
    {
        return view('phonebook.edit', compact('phonebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhonebookRequest $request, Phonebook $phonebook)
    {
        $phonebook->update(['name' => $request->name, 'phone' => $request->phone, 'user_id' => Auth::id()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phonebook $phonebook)
    {
        $phonebook->delete();
    }
}
