<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    //Get (Read)
    public function index()
    {   
        try {
            $toDolists = Todolist::all();
            return response()->json($toDolists, 200);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }

        
    }

    //Create (post)
    public function store(Request $request)
    {
        try {
            Todolist::create($request->all());
            return response()->json('To Do List criada com sucesso', 201);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }

    }

    //Uptade (put)
    public function update(Request $request, int $id)
    {
        try {
            $toDolist = Todolist::find($id);
            $toDolist->update($request->all());
            return response()->json('To Do List atualizada com sucesso', 201);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }

    }

    //Delete (delete)
    public function destroy($id)
    {
        try {
            $toDolist = Todolist::find($id);
            $toDolist->delete();
            return response()->json('To Do List deletada com sucesso', 201);
        } catch (\Exception $error) {
            return response()->json($error->getMessage(), 500);
        }

    }
}
