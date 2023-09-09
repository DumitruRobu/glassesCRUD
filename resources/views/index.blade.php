@extends('layouts.layout')

@section("doc_title", "Main page")

@section("doc_body")

    <script defer src={{ asset("/js/index.js")}}></script>
   
    {{-- afisam mesajul ca obiectul a fost creat cu succes! --}}
    @if(session("success"))
        <p id="success">{{ session("success")}}</p>
    @endif
    {{-- end of afisam mesajul ca obiectul a fost creat cu succes! --}}


    {{-- afisam linkurile de sortare dupa pret! --}}
    <div>
        {{-- <a href="{{ route('products.index', ['sort' => 'asc']) }}">Sort by Price (Ascending)</a>
        <a href="{{ route('products.index', ['sort' => 'desc']) }}">Sort by Price (Descending)</a> --}}

        <a href="{{ route('products.index', ['sort' => 'asc', 'brand' => $selectedBrand]) }}">Sort by Price (Ascending)</a>
        <a href="{{ route('products.index', ['sort' => 'desc', 'brand' => $selectedBrand]) }}">Sort by Price (Descending)</a>


    </div>
    {{--end of afisam linkurile de sortare dupa pret! --}}


    <div id="parinte">
        {{-- afisam filtrul de sortare dupa brand! --}}
        <div id="filtrulDeBrand">
            <form id="filterByBrand" action="{{ route('products.index')}}" method="GET">
                <label for="brand">Select Brand:</label>
                <select name="brand" id="brand">
                    <option value="">All Brands</option>     
                    @foreach($uniqueBrands as $brand)
                        <option value="{{$brand}}" {{ $selectedBrand === $brand ? 'selected' : '' }}> {{$brand}} </option>
    
                    @endforeach
                </select>
                <button type="submit">Filter</button>
            </form>

            <form id="filterByBrand" action="/products" method="GET">
                @csrf
                <p>&nbsp</p>
                <label>Search by keyword:</label>
                <input type="text" name="search" placeholder="Search...">
                <button>Search</button>
            </form>
        </div>
        {{-- end of afisam filtrul de sortare dupa brand! --}}

        {{-- afisam toti ochelarii aici --}}
        <div class="mainDiv">      
            <div id="chiarOchelarii">
                @foreach($selectul as $s)
                    <a href="{{ "item/" . $s->id }}" class="prdcts">
                        <img src="{{$s->Imagine }}">
                        <p id="den">{{$s->Brand}}, {{$s->Denumire}}</p>           
                        <p id="pret">{{$s->Pret}} MDL</p> 
                        {{-- <p id="cart"> &#128722;</p>                --}}
                        <p id="cart"> <i class="fa-solid fa-cart-shopping"></i> </p>               
                    </a>        
                 @endforeach
                    </div>           
        </div>
        {{--end of afisam toti ochelarii aici --}}

    </div>

    

   
@endsection