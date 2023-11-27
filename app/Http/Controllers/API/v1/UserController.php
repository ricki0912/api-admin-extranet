<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BUser;

class UserController extends Controller
{

    public function index()
    {
        $u = BUser::select()->first();
        $u->person;

        return response()->json([
            'res' => true,
            'msg' => 'Leido correctamente',
            'data' => $u
        ], 200);

        //return  BUser::get()->person;
        //return BPerson::with('person')->get();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
