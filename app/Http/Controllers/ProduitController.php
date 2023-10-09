<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Categorie;
use App\Models\Produit;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ProduitController extends Controller
{
    public function create(){
        $categories = Categorie::all();
        return view('produit.create',['categories' => $categories]);
    }
    
    public function show(){
        $produits = Produit::all();
        return view('produit.show',['produits' => $produits]);
    }

    public function store(ProduitRequest $request){
        Produit::create($request->validated()); 
        return redirect()->route('produit.show')->with('success','le produit a été ajouté avec succés'); 
    }

    public function destory($id){
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produit.show')->with('success','le produit a été supprimé avec succés !!!');
    }
    
    public function edit($id){
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();
        return view('produit.edit',
            [
                'produit' => $produit,
                'categories' => $categories
            ]);
    }

    public function update(ProduitRequest $request, $id){
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());
        return redirect()->route('produit.show')->with('success','le produit a été modifié avec succés !!!');
    }
}