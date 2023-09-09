<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("doc_title")</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <header>
        <h2 id="logo">Dumi's Store</h2>
        <div id="theHeader">
            <a href="/home">Home</a>
            <a href="/products">Products</a>
            <a href="/create">Add</a>
            <a href="/update">Update</a>
            <a href="/about">About</a>
        </div>      
    <header>


    {{-- <a href="/create">Add</a> --}}
    <div id="dcbd">

        @yield("doc_body")
    </div>
</body>
</html>