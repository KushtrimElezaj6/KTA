<?php

namespace App\Http\Controllers;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animaltypes = AnimalType::paginate(5);

        return view('animalstype.index', ['animaltypes'=>$animaltypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animaltype = AnimalType::get();
        return view('animalstype.create', ['animaltype'=>$animaltype]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'
        ]);
        AnimalType::create($data);
        return redirect()->route('animaltype.index')->with("message", "animalstype created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animaltype= AnimalType::find($id);

        return view('animaltype.edit', ['animalstype'=>$animaltype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'
        ]);
        $animaltype= AnimalType::find($id);
         $animaltype->update($data);

         return back()->with("message", "animalstype has updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animaltype= AnimalType::find($id);
        $animaltype->delete();

        return back()->with("message", "animalstyp is deleted");
    }
}
