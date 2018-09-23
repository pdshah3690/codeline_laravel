<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Film;
use App\Model\FilmGenre;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::select(DB::raw('group_concat(id) as ids'))->where('user_id', auth()->user()->id)->get();
        return $films;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'rating' => 'required|numeric',
            'ticket_price' => 'required|numeric',
            'country_id' => 'required|integer',
            'genre_id' => 'required|string',
            'photo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = auth()->user();
        $data = $request->all();
        $genres = explode(',', $data['genre_id']);
        $data['user_id'] = $user->id;
        $film = new Film();
        $film->fill($request->all());
        $user->films()->save($film);

        $data['slug'] = strtolower($data['name'].'-'.$film->id);
        $film->update(['slug' => $data['slug']]);
        foreach ($genres as $g) {
            $genre = new FilmGenre();
            $genre->fill(['genre_id' => $g]);
            $film->filmGenre()->save($genre);
        }
        return $film->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }
}
