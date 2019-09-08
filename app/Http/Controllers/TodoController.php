<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // init Todo
        $todo = new Todo();
        // get all Todo records
        $result = $todo->get();
            // ->where('status', '=', 'ACTIVE')
            // ->orderBy('created_at', 'DESC')
            // ->forPage(1, 10)
            
        //return $result;
        return view('tasks/index', ['todos' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Contact Form view
        return view('tasks/create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // $validator = Validator::make($request->all, [
        //     'todo-title' => 'required | max:100',
        //     'todo-description' => 'required | max:1000',
        // ]);
        // init new Todo
        $todo = new Todo();
        // get inputs
        //$input = $request->only(['todo-title','todo-description']);
        if(isset($request['todo-title'])) {
            $todo->title = $request['todo-title'];
        }
        if(isset($request['todo-description'])) {
            $todo->description = $request['todo-description'];
        }
        $todo->save();
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $todo = new Todo();

        $result = $todo->find($id);

        // return $result;
        return view('tasks/edit', ['todo' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //$request['id'] = $id;
        //return $request;

        // find 
        $todo = Todo::find($id);

        // set data
        if (isset($request['todo-title'])) {
            $todo->title = $request['todo-title'];
        }
        if (isset($request['todo-description'])) {
            $todo->description = $request['todo-description'];
        }
        if (isset($request['todo-status'])) {
            $todo->status = $request['todo-status'];
        }

        $todo->update();
        
        return redirect('/task/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $todo = Todo::find($id);

        $todo->delete();
    }


}
