<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
class TodoController extends Controller
{

    public function __construct(){
 
        $this->middleware('auth');
        $this->middleware('timeout', ['except' => ['index','create', 'store'] ]);
  
      }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todo::where('add_by', Auth::user()->id)->get();
        return view('todo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            "title" => "required|min:6|string",
            "description" => "required|min:20|max:255|string",
            "date" => "required|date|after:now",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i|after:start_time",
            "add_by" => "required"

        ]);
        if(Todo::create($data)){
            $message  = 'Your Todo plan Inserted';
        } else{
            $message = 'faild to insert todo';
        }
        session()->flash('Message', $message);
        return redirect('/todo');

        
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Todo::findorfail($id);
        //dd($data);   
        return view('todo.edit',['data' => $data]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            "title" => "required|min:6|string",
            "description" => "required|min:20|max:255|string",
            "date" => "required|date|after:now",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i|after:start_time",
            "add_by" => "required"
        ]);
        if(Todo::where('id', $id)->update($data)){
            $message = "Data Updated Successful";
        } else{
            $message = "error in update data";
        }
        session()->flash('Message', $message);
        return redirect('/todo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Todo::where('id', $id)->delete()){
            $message = "todo deleted";
        } else{
            $message = "error in deleting";
        }
        return redirect('/todo');
    }
}
