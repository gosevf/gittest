<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\Todo;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Validator;



class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $todos=auth()->user()->todos()->orderBy('completed')->get();
       // $todos = Todo::orderBy('completed')->get();
        return view('todos.index', compact('todos'));

    }

    public function create(){
        return view('todos.create');
    }

    public function edit(Todo $todo){

        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo){
        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message', 'Updated.');
    }

    public function store(TodoCreateRequest $request){
        
        $userId=auth()->id();
        $request['user_id']=$userId;
        //auth()->user()->todos()->create($request->all());
         Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'Todo created successfully');
    }

    public function show(Todo  $todo){
        return view('todos.show', compact('todo'));
    }


        public function complete(Todo $todo){
            $todo->update(['completed' => true]);
            return redirect()->back()->with('message', "Todo marked as completed");
            
        }

        public function incomplete(Todo $todo){
            $todo->update(['completed' => false]);
            return redirect()->back()->with('message', "Todo marked as incompleted");
        
        }

        public function destroy(Todo $todo){
            $todo->delete();
            return redirect()->back()->with('message', "Task deleted.");
        
        }


}

