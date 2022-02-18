<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
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
            'name' => 'required|max:255',
            'description' => 'required|max:1020',
            'grade' => 'required',
            'localization' => 'required|max:510',
            'phone_number' => 'required|max:255',
            'website' => 'required|max:255',
            'hours' => 'required|max:255'
        ]);

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'description' => $request->description,
            'grade' => $request->grade,
            'localization' => $request->localization,
            'hours' => $request->hours,
            'website' => $request->website,
            'hours' => $request->hours,
        ]);

        return response()->json($restaurant, 201);
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
        $this->validate($request,[
            'name' => 'required|max:255',
            'description' => 'required|max:1020',
            'grade' => 'required',
            'localization' => 'required|max:510',
            'phone_number' => 'required|max:255',
            'website' => 'required|max:255',
            'hours' => 'required|max:255'
        ]);

        $restaurant->update([
            'name' => $request->name,
            'description' => $request->description,
            'grade' => $request->grade,
            'localization' => $request->localization,
            'hours' => $request->hours,
            'website' => $request->website,
            'hours' => $request->hours,
        ]);

        // On retourne la réponse JSON
        return response()->json($restaurant, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant->delete();

        // On retourne la réponse JSON
        return response()->json($restaurant, 200);
    }
}
