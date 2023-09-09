@extends("layouts.layout")

@section("doc_title", "Item Update")

@section("doc_body")
    <div class="main">
        <form action="/update" method="POST">
            @csrf
            @method("PUT")
            <input type="text" name="name" value="{{$item -> Denumire}}" placeholder="Denumirea produsului">

            {{-- <input type="text" name="category" value="{{$item -> Categorie}}" placeholder="Categoria produsului"> --}}
            
            <select name="category" id="category">
                <option value="Prescriptie" {{ $item->Categorie === 'Prescriptie' ? 'selected' : '' }}>Prescriptie/Vedere</option>
                <option value="Soare" {{ $item->Categorie === 'Soare' ? 'selected' : '' }}>Soare</option>
                <option value="Fotocromatici" {{ $item->Categorie === 'Fotocromatici' ? 'selected' : '' }}>Fotocromatici/Chameleon</option>
                <option value="Sport" {{ $item->Categorie === 'Sport' ? 'selected' : '' }}>Sport</option>
            </select>
            
            <input type="text" name="style" value="{{$item -> Stil}}" placeholder="Stilul">
            <input type="text" name="brand" value="{{$item -> Brand}}" placeholder="Brandul produsului">
            <input type="number" name="price" value="{{$item -> Pret}}" placeholder="Pretul">
            <input type="number" name="volume" value="{{$item -> Volum}}" placeholder="Nr. de elemente in stoc">
            <input type="text" name="image" value="{{$item -> Imagine}}" placeholder="Linkul la imaginea produsului">

            <input type="hidden" name="id" value="{{$item ->id}}">
            <button>Update</button>
        </form>
    </div>
@endsection