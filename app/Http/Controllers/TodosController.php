<?php

namespace App\Http\Controllers;

use App\Todo;
Use App\Services\TodosService;
use Illuminate\Http\Request;

class TodosController extends Controller{

    private $todoService;

    public function __construct(TodosService $todoService){
      $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // if ($request->wantsJson()){
        //   // return a JSON response
        //   return $this->todosService->all();
        // }
        // // otherwise we will return the view 
        // return view('todos.index');
        
        // Get todos
        $todos = Todo::orderBy('id','desc')->get();
        
        // Return collection of todos
        return $this->todoService->transformCollection($todos);
        
        // Return index view
        // return view('todos.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo){
        dd($todo);
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
        'title' => 'required|string',
      ]);
      
      $todo->title = $data['title'];
      $todo->save();
      
      return response()->json(['message' => 'Todo Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo){
    //   dd($todo->id);
    //   dd($todo->title);
      $todo->delete();
	  	
      return response()->json(['message' => 'Todo Deleted Successfully']);   
    }
}
