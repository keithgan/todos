<?php

namespace App\Http\Controllers;

use App\Todo;
Use App\Services\TodosService;
use Illuminate\Http\Request;

class TodosController extends Controller{

    private $todoService;

    public function __construct(TodosService $todoService){
      $this->todosService = $todoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->wantsJson()){
          // return a JSON response
          return $this->todosService->all();
        }
        // otherwise we will return the view 
        return view('todos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:15',
            ]);
            
        Todo::create($validatedData);

        return redirect()->route('todos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo){
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo){
      $data = $request->validate([
        'title' => 'required|string|max:15',
      ]);
      
      $todo->title = $data['title'];
      $todo->save();
      
      return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo){
      $todo->delete();
		
      return redirect()->route('todos.index');    
    }
}
