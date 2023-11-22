<?php

namespace App\Http\Controllers;

use App\Models\Weightclass;
use Illuminate\Http\Request;

class WeightclassController extends Controller
{
    public function index()
    {
        // return Category::all(); // SELECT * FROM categories

        return view('weightclass/index', [
            'weightclasses' => Weightclass::all(),
        ]);
    }

    public function create()
    {
        return view('weightclass/create');
    }

    // Code qui se fait quand on envoie le formulaire
    public function store(Request $request)
    {
        // Validation du champ name. Si aucune erreur, on va dans le save
        // S'il y a une erreur, Laravel renvoie vers le form avec les
        // erreurs
        $request->validate([
            'name' => 'required|min:3|unique:weightclasses|max:20|between:3,20',
        ]);

        // Insertion en base de données
        $weightclasses = new Weightclass();
        // $request->name est le contenu du input name
        $weightclasses->name = $request->name; // $_POST['name']
        $weightclasses->save(); // INSERT INTO categories en Laravel

        return redirect('/weightclass');
    }
}
