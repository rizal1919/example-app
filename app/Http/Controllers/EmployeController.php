<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $search = $request->search;
        $employes = Employe::when($search, function($query, $search){
            return $query->where('fullname','like',"%$search%");
        })->paginate(10);

        return view('employe.index', [
            'title' => 'DASHBOARD',
            'employes'=>$employes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employe.create',[
            'title' => 'ADD-PAGE'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'=>'required|between:3,100',
            'phone_number'=>'nullable|between:10,20',
            'jobtitle'=> 'nullable|between:3,30'
        ],[],[
            'fullname'=>'full name',
            'jobtitle'=>'job title'
        ]);

        // $validatedData = $request->validate([
        //     'fullname'=>'required|between:3,100',
        //     'phone_number'=>'nullable|between:10,20',
        //     'jobtitle'=> 'nullable|between:3,30'
        // ]);



        Employe::create([
            'fullname'=> ucwords( $request->fullname ),
            'phone_number'=> $request->phone_number,
            'jobtitle'=> ucwords( $request->jobtitle )
        ]);

        // return to_route('employes.index')->with('store','success');
        return redirect('/employes')->with('store','success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        return view('employe.show', [
            'employe'=>$employe,
            'title'=>$employe->fullname,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        return view('employe.update', [
            'employe'=>$employe,
            'title'=>$employe->fullname,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'fullname'=>'required|between:3,100',
            'phone_number'=>'nullable|between:10,20',
            'jobtitle'=> 'nullable|between:3,30'
        ],[],[
            'fullname'=>'full name',
            'jobtitle'=>'job title'
        ]);

        $employe->update([
            'fullname'=> ucwords( $request->fullname ),
            'phone_number'=> $request->phone_number,
            'jobtitle'=> ucwords( $request->jobtitle )
        ]);

        return to_route('employes.index')->with('update','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return back()->with('destroy','success');
    }
}
