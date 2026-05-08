<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Afficher les tâches
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Enregistrer une tâche
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tache creee !');
    }

    /**
     * Afficher une tâche
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Formulaire modification
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Modifier tâche
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tache modifiee !');
    }

    /**
     * Supprimer tâche
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tache supprimee !');
    }
}
