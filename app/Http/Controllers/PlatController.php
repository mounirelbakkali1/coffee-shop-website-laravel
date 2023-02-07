<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plat;
use App\Models\Post;
use Illuminate\Http\Request;
use function compact;
use function dd;
use function public_path;
use function redirect;
use function session;
use function time;
use function view;

class PlatController extends Controller
{
    public function create()
    {
        $categories = CategoryController::findAllCatgories()->all();
        return view('plat-create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required|max:255|min:20',
            'price'=> 'required',
            'image' => 'required|image',
            'categorie'=> 'required',
            'disponible'=> 'required'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $plat = new Plat();
        $plat->nom = $validatedData['nom'];
        $plat->description = $validatedData['description'];
        $plat->price = $validatedData['price'];
        $plat->category_id=$request->input('categorie');
        $plat->disponible=$request->input('disponible')=="ON" ? 1 : 0;
        $plat->image= $imageName;
        $plat->save();
        session()->flash('message', 'Plat created successfully.');
        return redirect()->route("dashboard");
    }

    public function index()
    {
        $plats = Plat::all();
        return view('home', compact('plats'));
    }
    public function dashboard()
    {
        $plats = Plat::all();
        $categories = CategoryController::findAllCatgories();
        $data = [
            'plats'=>$plats,
            'categories'=>$categories
        ];
        return view('dashboard', compact('data'));
    }
    public function edit(Plat $plat)
    {
        $data = [
            'plat'=>$plat,
            'categories'=> Category::all()
        ];
        return view('plat-edit', compact('data'));
    }

    public function update(Request $request, Plat $plat)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required|max:255|min:20',
            'price'=> 'required',
            'image' => 'required|image',
            'categorie'=> 'required',
            'disponible'=> 'required'

        ]);
        $plat->nom = $request->input('nom');
        $plat->description = $request->input('description');
        $plat->price = $request->input('price');
        $plat->category_id=$request->input('categorie');
        $plat->disponible=$request->input('disponible')=="on" ? 1 : 0;
        // image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // set image
        $plat->image = $imageName;
        $plat->save();
        session()->flash('message', 'Plat updated successfully.');
        return redirect()->route('dashboard');
    }
    public function destroy(Plat $plat)
    {
        $plat->delete();
        session()->flash('message', 'Plat deleted successfully.');
        return redirect()->route('dashboard');
    }
}
