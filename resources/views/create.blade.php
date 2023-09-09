@extends('layouts.layout')

@section("doc_title", "Create product")

@section("doc_body")
    
    <form action="/create" method="POST">
        @csrf
        
        <input type="text" name="Denumire" placeholder="Denumire">
        @error("Denumire")
            <p class="error">{{$message}}</p>
        @enderror

        <label for="category">Categorie</label>
        <select name="Categorie" id="category">
            <option value="Prescriptie">Prescriptie/Vedere</option>
            <option value="Soare">Soare</option>
            <option value="Fotocromatici">Fotocromatici/Chameleon</option>
            <option value="Fotocromatici">Sport</option>
        </select>
        @error("Categorie")
            <p class="error">{{$message}}</p>
        @enderror
        
        <input type="text" name="Stil" placeholder="Stil">
        @error("Stil")
            <p class="error">{{$message}}</p>
        @enderror
        
        <input type="text" name="Brand" placeholder="Brand">
        @error("Brand")
            <p class="error">{{$message}}</p>
        @enderror
        
        <input type="number" name="Pret" placeholder="Pret">
        @error("Pret")
            <p class="error">{{$message}}</p>
        @enderror
        
        <input type="number" name="Volum" placeholder="Volum" step="0.01">
        @error("Volum")
            <p class="error">{{$message}}</p>
        @enderror
        
        <input type="text" name="Imagine" placeholder="Imagine">
        @error("Imagine")
            <p class="error">{{$message}}</p>
        @enderror
        
        <button>Create</button>
    </form>
@endsection