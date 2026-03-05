<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Foundation\Console\ViewCacheCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $contacts = Contact::all();
        return View('cotact.contact');
    }

    /**
     * Show the form for creating a new resource.
     */

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string',
            'school' => 'required|array',
            'gender' => 'required|in:Male,Female',
            'english_level' => 'required|numeric|min:0|max:100',
            'campus' => 'required|in:Casablanca,Bruxel,Amsterdam',
            'terms' => 'required|accepted'
        ]);

        Contact::create([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'phone' => $request->phone,
            'school' => $request->school,
            'gender' => $request->gender,
            'english_level' => $request->english_level,
            'campus' => $request->campus,
            'terms' => $request->terms
        ]);

        return redirect()->route('students.index');
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
