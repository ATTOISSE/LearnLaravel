<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategorieController extends Controller
{
    public function create(){
        $categorie = new Categorie();
        User::create([
            'name' => 'fatano',
            'email' => 'fatano@fat.km',
            'password' => Hash::make('fatano')
        ]);
        return view('categorie.create',['categorie' => $categorie]);
    }
    public function show(){
        $categorie = Categorie::all();
        return view('categorie.show',['categorie'=>$categorie]);
    }
    public function store(CategorieRequest $request){
         Categorie::create($request->validated());
        return redirect()->route('categorie.show')->with('success','la categorie a été ajouté avec succes');
    }
    public function destory($id){
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categorie.show')->with('success','la categorie a été supprimé avec succes');
    }
    public function edit($id){
        $categorie =  Categorie::findOrFail($id);
        return view('categorie.edit',['categorie' => $categorie]);
    }
    public function update(CategorieRequest $request,$id){
        $categorie =  Categorie::findOrFail($id);
        $categorie-> update($request->all());
        return redirect()->route('categorie.show')->with('success','la categorie a été Modifié avec succes'); 
    }
}