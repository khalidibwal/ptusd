<?php

namespace App\Http\Controllers;
use App\chating;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chating = chating::all();
        return view('chats.index')->with('chating',$chating);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'message' => 'required'
         ]);
 
         chating::create($request->all());
         return response()->json([
            'success'    => true,
            'message'    => 'Chat Created'
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chating = chating::find($id);
        return response()->json($chating);
        // return view('chat.index')->with('chating', $chating);
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
        $this->validate($request, [
            'nama'      => 'required|string|min:2',
            'email'     => 'required',
            'message'   => 'required',
        ]);

        $chating = chating::findOrFail($id);

        $chating->update($request->all());

        return response()->json([
            'success'    => true,
            'message'    => 'Chat Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chating::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Chat Delete'
        ]);
    }
    public function apiChat(){
        $chating = chating::all();

        return Datatables::of($chating)
            ->addColumn('action', function($chating){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
                    '<a onclick="editForm('. $chating->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $chating->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
}
