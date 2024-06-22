<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpage = $request->perpage ?? 5;
        return view('tasks', [
            'tasks' => Task::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_create', [
            'statuses' => Task::STATUSES,
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required',
            'name' => 'required|max:255',
            'note' => 'nullable',
            'status' => 'required|max:10'
        ]);
        $task = new Task($validated);
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect('/task')->withErrors([
            'success' => 'Задача добавлена.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('task', [
            'task' => Task::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Gate::allows('edit-destroy-task', Task::all()->where('id', $id)->first())) {
            return redirect('/task')->withErrors([
                'error' => 'У вас нет разрешения на редактирование чужих задач.'
            ]);
        }
        return view('task_edit', [
            'task' => Task::all()->where('id', $id)->first(),
            'statuses' => Task::STATUSES,
            'projects' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Gate::allows('edit-destroy-task', Task::all()->where('id', $id)->first())) {
            return redirect('/task')->withErrors([
                'error' => 'У вас нет разрешения на редактирование чужих задач.'
            ]);
        }
        $validated = $request->validate([
            'project_id' => 'required',
            'name' => 'required|max:255',
            'note' => 'nullable',
            'status' => 'required|max:10'
        ]);
        $task = Task::all()->where('id', $id)->first();
        $task->project_id = $validated['project_id'];
        $task->name = $validated['name'];
        $task->note = $validated['note'];
        $task->status = $validated['status'];
        $task->save();
        return redirect('/task')->withErrors([
            'success' => 'Задача обновлена.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Gate::allows('edit-destroy-task', Task::all()->where('id', $id)->first())) {
            return redirect('/task')->withErrors([
                'error' => 'У вас нет разрешения на удаление чужих задач.'
            ]);
        }
        Task::destroy($id);
        return redirect('/task')->withErrors([
            'success' => 'Задача удалена.'
        ]);
    }
}
