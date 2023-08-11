<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(requst('search')){
            $search = request('search');
            $animals = Animal::where(function($query) use ($serch){
                $query->where('name', 'like', "%{$search}%");
            })->where('user_id',Auth::user()->id)->paginate(5);
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
        $animal = Animal::get();
        return view('animals.create', ['animal'=>$animal]);
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

        return view('animals.edit', ['animals'=>$animals]);
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
