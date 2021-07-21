<?php

namespace App\Http\Controllers;
use App\Models\occupants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OccupantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $occupants = occupants::all();
      return view('caretaker.dashboard',compact('occupants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id = Auth::id();
        // //create a new occupant
        // $occpant = new Occupants();
        // $occupant->caretakerId = $id;
        // $occpant->name = request('name');
        // $occupant->email = request('email');
        // $occupant->phone = request('phone');
        // $occupant->estate = request('estate');
        // $occupant->blockNumber = request('blockNumber');
        // $occupant->flatNumber = request('flatNumber');
        // $occupant->save();
        // return redirect('/Dashboard');
        return view('Dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $id = Auth::id();
        // $occpant = new Occupants();
        // $occupant->caretakerId = $id;
        // $occpant->name = $request->name;
        // $occupant->email = $request->email;
        // $occupant->phone = $request->phone;
        // $occupant->estate = $request->estate;
        // $occupant->blockNumber = $request->blockNumber;
        // $occupant->flatNumber = $request->flatNUmber;
        // $occpant->save();
        // return redirect('/Dashboard');
        $occupant = occupants::create($request->except('_token'));
        return redirect(route('Dashboard.allOccupants'));
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $person = occupants::find($id);
       return view('partials.update',compact('person'));
    }

    public function deleteShow($id){
        $delete = occupants::find($id);
        return view('partials.delete',compact('delete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $occupants = occupants::all();
        $occupant = $occupants->find($id);
        //dd($occupant);
        return view('caretaker.dashboard',compact('occupant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $person = occupants::find($request->id);
        $person->name = $request->name;
        $person->email = $request->email;
        $person->phone = $request->phone;
        $person->estate = $request->estate;
        $person->blockNumber = $request->blockNumber;
        $person->flatNumber = $request->flatNumber;
        $person->save();
        return redirect(route('Dashboard.allOccupants'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting an occupant 
        occupants::destroy($id);
        return redirect(route('Dashboard.allOccupants'));
        // dd($id);
    }

    public function occupants(){
        $occupants = occupants::all();
        return view('caretaker.dashboard')->with('occupants',$occupants);
    }
}
