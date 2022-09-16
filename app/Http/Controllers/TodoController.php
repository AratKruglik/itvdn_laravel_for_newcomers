<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        dd($request);
    }

    public function edit(TodoItem $todo)
    {
        return view('todos.form', compact('todo'));
    }

    public function update(Request $request, TodoItem $todo)
    {
        //
    }

    public function done(TodoItem $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->route('dashboard');
    }
}
