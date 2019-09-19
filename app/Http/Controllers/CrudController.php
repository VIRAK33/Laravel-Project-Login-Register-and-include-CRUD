<?php
 
namespace App\Http\Controllers;
 
 
use Illuminate\Http\Request;
use App\Crud;
use App\Http\Requests;
use App\Http\Requests\Crud\StoreRequest;
use App\Http\Requests\Crud\UpdateRequest;
 
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Crud::all();
        return view('crud.index',compact('cruds'));
        //
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
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
        $cruds = new Crud();
        $cruds->nama = $request->nama;
        $cruds->username = $request->username;
        $cruds->xxx = $request->xxx;
        $cruds->password = $request->password;
        $cruds->attribute = "Cleartext-Password";
        $cruds->op = ":=";
        $cruds->save();
        return redirect()->route('crud.index')->with('alert-success','Data Berhasil Disimpan.');
        //
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
        $cruds = Crud::findOrFail($id);
        return view('crud.edit',compact('cruds'));
        //
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
        $cruds = Crud::findOrFail($id);
        $cruds->nama = $request->nama;
        $cruds->username = $request->username;
        $cruds->xxx = $request->xxx;
        $cruds->password = $request->password;
        $cruds->attribute = "Cleartext-Password";
        $cruds->op = ":=";
        $cruds->save();
        return redirect()->route('crud.index')->with('alert-success','Data Berhasil Diubah.');
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = Crud::findOrFail($id);
        $cruds->delete();
          return redirect()->route('crud.index')->with('alert-success', 'Data Successfully Deleted.');
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $cruds = Crud::where('nama','LIKE','%'.$cari.'%')->paginate(10);
        return view('crud.index', compact('cruds'));
    }
}

