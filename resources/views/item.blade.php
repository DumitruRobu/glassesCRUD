@extends("layouts.layout")

@section("doc_body")
    
    <div id="abtProduct">

        <div>
            <img src="{{$item->Imagine}}" id="imagineProdus">

        </div>

        <div>
            <p id="infoProdus">Denumire produs: {{$item->Denumire}}</p>
            <p id="infoProdus">Categorie: {{$item->Categorie}}</p>
            <p id="infoProdus">Stil: {{$item->Stil}}</p>
            <p id="infoProdus">Brand: {{$item->Brand}}</p>
            <p id="infoProdus">Pret: {{$item->Pret}} MDL</p>
            <p id="infoProdus">In stoc {{$item->Volum}} bucati</p>
            <p id="infoProdus">Cod produs: {{$item->id}}</p>
            <p>&nbsp;</p>
            <strong><a href={{ "/delete/" . $item->id}} id="linkulPtDelete">Delete</a></strong>
    
        </div>
        

    </div>
@endsection