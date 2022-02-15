<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'firstname' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users',
            'age' => 'required|integer|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
    
        // On crée un nouvel utilisateur
        $user = User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'username' => $request->username,
            'age' => $request->age,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreRequest $request, User $user)
    {
         // La validation de données
        $this->validate($request, [
            'name' => 'required|max:100',
            'firstname' => 'required|max:100',
            'username' => 'required|max:100',
            'age' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // On modifie les informations de l'utilisateur
        $user->update([
            "name" => $request->name,
            "firstname" => $request->firstname,
            "username" => $request->username,
            "age" => $request->age,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        // On retourne la réponse JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}
