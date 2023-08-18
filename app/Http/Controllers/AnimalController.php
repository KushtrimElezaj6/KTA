<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(request('search')){
            $search = request('search');
            $animals = Animal::where(function($query) use ($search){
                $query->where('name', 'like', "%{$search}%");
            });
        } else{
            $animals =Animal::paginate(5);

        }
        

        return view('animals.index', ['animals'=>$animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = AnimalType::get();
        return view('animals.create', ['animal'=>$animals]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'require|max:250',
            'birthday'=> "nullable",
            'description'=> 'nullable'


        ]);
           Animal::create($data);

           return redirect()->route('animals.index')->with("message", "animals created successfully");
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
        $animal= Animal::find($id);

        return view('animals.edit', ['animals'=>$animal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=> 'require|max:250',
            'birthday'=> "nullable|date",
            'description'=> 'nullable'


        ]);
        
        $animals = Animal::find($id);
          $animals->update($data);

             return back()->with("message", "animal has updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal= Animal::find($id);
        $animal->delete();
        
        return back()->with("message", "animal is deleted");
    }
}
