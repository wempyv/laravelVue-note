<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // Untuk mengambil data notes
    public function all()
    {
        return Note::all();
    }

    // untuk mengambil data by id
    public function show($id)
    {
        return Note::find($id);
    }

    // untuk menambah data notes
    public function store(Request $request)
    {
        return Note::create($request->all());
    }

    // untuk mengubah data notes
    public function update($id, Request $request)
    {
        $note = Note::find($id);
        $note->update($request->all());
        return $note;
    }

    // untuk mengapus data notes
    public function delete($id)
    {
        $note = Note::find($id);
        $note->delete();
        return 204;
    }
}
