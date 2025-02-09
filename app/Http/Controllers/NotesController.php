<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $isEdit = false;
        return view('notes.create-edit', compact(['isEdit']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'title'=> 'required', 'description'=> 'required']);
        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();
        return redirect(route('notes.show', $note->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact(['note']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $isEdit = true;
        return view('notes.create-edit', compact(['isEdit', 'note']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
         $request->validate([ 'title'=> 'required', 'description'=> 'required']);
        $note->title = $request->title;
        $note->description = $request->description;
        $note->update();
        return redirect(route('notes.show', $note->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // dd($note);
        $note->delete();
        return redirect(route('home'));
    }
}
