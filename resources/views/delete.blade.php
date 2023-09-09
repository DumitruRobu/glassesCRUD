@extends("layouts.layout")

@section("doc_title", "Delete")

@section("doc_body")
    <div class="main">
        <h3>Sunteti sigur ca doriti stergerea acestui produs?</h3>
        <form action="/delete" method="POST">
            @csrf
            @method("DELETE")
            <input type="hidden" name="deleteul" value="{{$id}}">
            <p>Numele produsului: {{$itemulDeSters->Denumire}}</p>
            <p>Categoria produsului: {{$itemulDeSters->Categorie}}</p>
            <p>Stilul produsului: {{$itemulDeSters->Stil}}</p>
            <p>Brandul produsului: {{$itemulDeSters->Brand}}</p>
            <p>Pretul produsului: {{$itemulDeSters->Pret}}</p>
            <p>Volum produsului: {{$itemulDeSters->Volum}}</p>
            <p>Imaginea produsului: <img src="{{$itemulDeSters->Imagine}}"></p>
            <button>Delete</button>
        </form>
    </div>
@endsection