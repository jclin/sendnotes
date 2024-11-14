<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes.index');

Route::view('notes/create', 'notes.create')
    ->middleware(['auth'])
    ->name('notes.create');

Route::get('notes/{noteId}/edit', function ($noteId) {
    return view("notes.edit", ["noteId" => $noteId]);
})
    ->middleware(['auth'])
    ->name('notes.edit');

Route::get('notes/{noteId}', function ($noteId) {
    $note = Note::findOrFail($noteId);
    if (!$note->is_published) {
        abort(404, "Note not found.");
    }

    return view('notes.view', ["note" => $note]);
})->name("notes.view");

require __DIR__ . '/auth.php';
