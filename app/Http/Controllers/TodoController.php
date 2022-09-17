<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateTodoRequest;
use App\Models\TodoItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = auth()->user()->todos;

        return view('dashboard', compact('todos'));
    }

    public function archive(): View
    {
        $todos = auth()->user()->todos()->onlyTrashed()->get();

        return view('dashboard', compact('todos'));
    }

    public function create(): View
    {
        return view('todos.form');
    }

    public function store(CreateUpdateTodoRequest $request): RedirectResponse
    {
        TodoItem::create([
            'title'   => $request->get('title'),
            'body'    => $request->get('body'),
            'user_id' => auth()->user()->getKey(),
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(TodoItem $todo)
    {
        return view('todos.form', compact('todo'));
    }

    public function update(CreateUpdateTodoRequest $request, TodoItem $todo)
    {
        $todo->update([
            'title' => $request->get('title', $todo->title),
            'body'  => $request->get('body', $todo->body),
        ]);

        return redirect()->route('dashboard');
    }

    public function done(TodoItem $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->route('dashboard');
    }
}
