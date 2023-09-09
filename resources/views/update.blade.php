@extends("layouts.layout")

@section("doc_title", "Update Page")

@section("doc_body")
    <div class="main">
        <form action="/update" method="POST">
            @csrf
            <label for="select_id">Select one element: </label>
            <select name="id" id="select_id">
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->Denumire}}, {{$item->Brand}}</option>
                @endforeach
            </select>
            <button>Select</button>
        </form>
    </div>
@endsection