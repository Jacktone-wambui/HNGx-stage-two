<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function getPerson($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        return response()->json($person);
    }

    public function createPerson(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'email' => 'required|email|unique:people,email',
        ]);

        $person = Person::create($data);

        return response()->json($person, 201);
    }

    public function updatePerson(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'email' => 'required|email|unique:people,email,' . $id,
        ]);

        $person = Person::find($id);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        $person->update($data);

        return response()->json($person);
    }

    public function deletePerson($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        $person->delete();

        return response()->json(null, 204);
    }
}
