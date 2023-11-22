<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FighterController extends Controller
{
    public function index()
    {
        return view('fighters/index', [
            // 'fighters' => Fighter::with('weightclass')->get(),
        ]);
    }

    public function show($id)
    {
        $movie = Fighter::findOrFail($id); // Select * from movie where id = :id OU 404

        return view('fighters/show', ['fighters' => $movie]);
    }

    public function create()
    {
        return view('fighters/create', [
            'weightclass' => Weightclass::all()->sortBy('name'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'resume' => 'required|min:10',
            'record' => 'required|integer|min:1',
           
            
            'weightclass' => 'nullable|exists:categories,id',
        ]);

        $fighter = new Fighter();
        $fighter->name = $request->input('name');
        $fighter->resume = $request->input('resume');
        $fighter->record = $request->input('record');
        
      
        $fighter->released_at = $request->input('released_at');
        $fighter->weightclass_id = $request->input('weightclass');
        

        return redirect('/fighters');
    }

    public function edit($id)
    {
        $fighter = Fighter::findOrFail($id); // On va modifier un film

        Gate::allowIf($fighter->user_id == Auth::user()->id);

          return view('fighters/edit', [
            'weightclass' => Weightclass::all()->sortBy('name'),
            'fighter'=>$fighter,
        ]);
    

      
    
}

public function update(Request $request, $id)



{

    $movie =  Movie::findOrFail($id);
    Gate::allowIf($movie->user_id == Auth::user()->id);
    $request->validate([
        'title' => 'required|min:2',
        'synopsis' => 'required|min:10',
        'duration' => 'required|integer|min:1',
        'youtube' => 'nullable|string',
        'released_at' => 'nullable|date',
        'category' => 'nullable|exists:categories,id',
    ]);

    $movie->title = $request->input('title');
    $movie->synopsis = $request->input('synopsis');
    $movie->duration = $request->input('duration');
    $movie->youtube = $request->input('youtube');
    // $movie->cover = 'https://image.tmdb.org/t/p/original/9uqCaPEIep4iBG3U4AqSP20LGjq.jpg';
    $movie->released_at = $request->input('released_at');
    $movie->category_id = $request->input('category');
    $movie->save();

    return redirect('/films');
}

public function destroy($id)
{
    $movie =  Movie::findOrFail($id);
    Gate::allowIf($movie->user_id == Auth::user()->id);
    
    Movie::destroy($id);//DELETE FROM movies WHERE $id is
    return redirect('/films');
}

}
