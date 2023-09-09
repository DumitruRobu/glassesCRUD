<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model1;
class Controller1 extends Controller
{
    // public function Index(Request $request)
    // {
    //     $sortOrder = $request->query('sort', 'asc'); // Default to ascending
    //     $selectAll = Model1::orderBy('Pret', $sortOrder)->get();
    //     return view('index', ["selectul" => $selectAll, "sortOrder" => $sortOrder]);
    // }

    public function main(){
        return view("about");
    }
    public function index(Request $request)
    {
        $search = $request->search; //===$request->query("search");
        $brandFilter = $request->brand;
        $sortOrder = $request->query('sort', 'asc'); // Default to ascending if no sort order is specified
    
        $query = Model1::query();
    
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                //$searchTerm = '%' . strtolower($search) . '%';
                $searchTerm = '%' . strtolower(trim($search)) . '%';

                $query->whereRaw('LOWER(Denumire) LIKE ?', [$searchTerm])
                      ->orWhereRaw('LOWER(Categorie) LIKE ?', [$searchTerm])
                      ->orWhereRaw('LOWER(Stil) LIKE ?', [$searchTerm])
                      ->orWhereRaw('LOWER(Brand) LIKE ?', [$searchTerm])
                      ->orWhereRaw('LOWER(Pret) LIKE ?', [$searchTerm])
                      ->orWhereRaw('LOWER(Volum) LIKE ?', [$searchTerm]);
            });
        }
    
        if ($brandFilter) {
            $query->where('Brand', $brandFilter);
        }
    
        $uniqueBrands = Model1::distinct('Brand')->pluck('Brand');
    
        $selectAll = $query->orderBy('Pret', $sortOrder)->get();
    
        return view('index', [
            'selectul' => $selectAll,
            'uniqueBrands' => $uniqueBrands,
            'selectedBrand' => $brandFilter,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function Create(){
        return view("create");
    }

    public function Store(Request $request){
        $request ->validate([
            "Denumire" =>"required|string|min:3|max:255",
            "Categorie" =>"required|in:Soare,Prescriptie,Sport,Fotocromatici",
            "Stil" =>"required|string|min:3|max:255",
            "Brand" =>"required|string|min:3|max:255",
            "Pret" =>"required|numeric|min:1",
            "Volum" =>"required|numeric|min:1",
            "Imagine" =>"required|string|min:3"
        ],
        [
            "Denumire.required" => "*Indicati denumirea produsului!",
            "Denumire.string" => "*Denumirea trebuie sa fie scrisa ca text!",
            "Denumire.min" => "*Denumirea trebuie sa fie constituita din minim 3 caractere!",
            "Denumire.max" => "*Denumirea trebuie sa fie constituita din maxim 255 caractere!",

            "Categorie.required" => "*Indicati categoria produsului!",
            "Categorie.in" => "*Categoria trebuie sa coincida cu una din aceste 4 optiuni: vedere,sport,soare sau fotocromatici!", 

            "Stil.required" => "*Indicati stilul produsului!",
            "Stil.string" => "*Stilul trebuie sa fie scris ca text!",
            "Stil.min" => "*Stilul trebuie sa fie constituit din minim 3 caractere!",
            "Stil.max" => "*Stilul trebuie sa fie constituit din maxim 255 caractere!",

            "Brand.required" => "*Indicati brandul produsului!",
            "Brand.string" => "*Brandul trebuie sa fie scris ca text!",
            "Brand.min" => "*Brandul trebuie sa fie constituit din minim 3 caractere!",
            "Brand.max" => "*Brandul trebuie sa fie constituit din maxim 255 caractere!",

            "Pret.required" => "*Indicati pretul produsului!",
            "Pret.numeric" => "*Pretul trebuie sa fie scris ca numar!",
            "Pret.min" => "*Pretul trebuie sa fie de cel putin $1!",

            "Volum.required" => "*Indicati volumul produsului!",
            "Volum.numeric" => "*Volumul trebuie sa fie scris ca numar!",
            "Volum.min" => "*Volumul trebuie sa fie de cel putin o singura bucata!",

            "Imagine.required" => "*Indicati imaginea produsului!",
            "Imagine.string" => "*Imaginea trebuie sa fie scrisa ca text!",
            "Imagine.min" => "*Imaginea trebuie sa fie constituita din minim 3 caractere!",
        ]);

        Model1::create($request ->all());
        return redirect("/products") ->with("success", "item created successfully!");
    }

    public function Item($idulTransmis){
        $item = Model1::where("id", $idulTransmis)->first();
        
        if($item){
            return view("/item", ["item" => $item]);
        } else{ //daca nu gaseste asa item (adica item=false)
            return response() -> view("errors.404", [], 404);//returnam pagina din folderul errors/404.blade.php
        }
        //return view("/item");
    }

    public function Update(){
        $items = Model1::all();

        return view("update", ["items" => $items]);
    }

    public function UpdateItems(Request $request){
        $item = Model1::where("id", $request->id) ->first();

        if($item){
            return view("item_update", ["item" => $item]);
        } else{
            return response() -> view("errors.404", [], 404);
        }
    }

    public function EditItem(Request $request){
        $item = Model1::findOrFail($request->id); // === "$item = Model1::where("id", $request->id)->first();

        // $request ->validate([
        //     "Denumire" =>"required|string|min:3|max:255",
        //     "Categorie" =>"required|in:Soare,Prescriptie,Sport,Fotocromatici",
        //     "Stil" =>"required|string|min:3|max:255",
        //     "Brand" =>"required|string|min:3|max:255",
        //     "Pret" =>"required|numeric|min:1",
        //     "Volum" =>"required|numeric|min:1",
        //     "Imagine" =>"required|string|min:3"
        // ],
        // [
        //     "Denumire.required" => "*Indicati denumirea produsului!",
        //     "Denumire.string" => "*Denumirea trebuie sa fie scrisa ca text!",
        //     "Denumire.min" => "*Denumirea trebuie sa fie constituita din minim 3 caractere!",
        //     "Denumire.max" => "*Denumirea trebuie sa fie constituita din maxim 255 caractere!",

        //     "Categorie.required" => "*Indicati categoria produsului!",
        //     "Categorie.in" => "*Categoria trebuie sa coincida cu una din aceste 4 optiuni: vedere,sport,soare sau fotocromatici!", 

        //     "Stil.required" => "*Indicati stilul produsului!",
        //     "Stil.string" => "*Stilul trebuie sa fie scris ca text!",
        //     "Stil.min" => "*Stilul trebuie sa fie constituit din minim 3 caractere!",
        //     "Stil.max" => "*Stilul trebuie sa fie constituit din maxim 255 caractere!",

        //     "Brand.required" => "*Indicati brandul produsului!",
        //     "Brand.string" => "*Brandul trebuie sa fie scris ca text!",
        //     "Brand.min" => "*Brandul trebuie sa fie constituit din minim 3 caractere!",
        //     "Brand.max" => "*Brandul trebuie sa fie constituit din maxim 255 caractere!",

        //     "Pret.required" => "*Indicati pretul produsului!",
        //     "Pret.numeric" => "*Pretul trebuie sa fie scris ca numar!",
        //     "Pret.min" => "*Pretul trebuie sa fie de cel putin $1!",

        //     "Volum.required" => "*Indicati volumul produsului!",
        //     "Volum.numeric" => "*Volumul trebuie sa fie scris ca numar!",
        //     "Volum.min" => "*Volumul trebuie sa fie de cel putin o singura bucata!",

        //     "Imagine.required" => "*Indicati imaginea produsului!",
        //     "Imagine.string" => "*Imaginea trebuie sa fie scrisa ca text!",
        //     "Imagine.min" => "*Imaginea trebuie sa fie constituita din minim 3 caractere!",
        // ]);

        $item -> Denumire = $request -> input("name");
        $item -> Categorie = $request -> input("category");
        $item -> Stil = $request -> input("style");
        $item -> Brand = $request -> input("brand");
        $item -> Pret = $request -> input("price");
        $item -> Volum = $request -> input("volume");
        $item -> Imagine = $request -> input("image");
        $item -> save();

        //Merge si aceasta varianta:
        // $item -> Denumire = $request -> name;
        // $item -> Categorie = $request -> category;
        // $item -> Stil = $request -> style;
        // $item -> Brand = $request -> brand;
        // $item -> Pret = $request -> price;
        // $item -> Volum = $request -> volume;
        // $item -> Imagine = $request -> image;
        // $item -> save();

        return redirect("/products") ->with("success", "Item updated successfully!");
    }

    public function Delete($id){
        $itemulDeSters = Model1::where("id", $id)->first(); 
        return view("delete", ["id" => $id, "itemulDeSters" => $itemulDeSters]);
    }
    public function DeleteItem(Request $request){
        $id = $request -> deleteul; 
        Model1::destroy($id);

        return redirect("/products") -> with("success", "Item deleted successfully");
    }

    public function Abt(){
        
        return view("/about");
    }

    public function Home(){
        return view("/home");
    }
}

