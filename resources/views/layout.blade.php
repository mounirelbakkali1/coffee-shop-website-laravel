<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title","menu")</title>
    {{-- asset point to files with in public directory --}}
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
        <div>
            <div class="sidebar" id="mySidebar" style="min-height: 100vh;background-color: #e3b04b">
                <ul class="nav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <li class="{{request()->routeIs('dashboard') ? "active" : ""}}">
                        <a class="nav-link text-light p-1" href='{{route('dashboard')}}' >dashboard</a>
                    </li>
                    {{-- request is part of helper functions in Laravel --}}
                    <li class="{{request()->routeIs('about') ? "active" :  ""}}"><a class="nav-link text-light p-1" href='{{route('about')}}'>about</a></li>
                    <li class="{{request()->routeIs('plats.create') ? "active" :  ""}}"><a class="nav-link text-light p-1" href='{{route('plats.create')}}'>Ajouter Plat</a></li>
                    <li class="{{request()->routeIs('category.create') ? "active" :  ""}}"><a class="nav-link text-light p-1" href='{{route('category.create')}}'>Ajouter une catégorie</a></li>
                    <li><a class="nav-link text-light p-1" href="{{route("logout")}}">log out</a></li>
                </ul>
            </div>
            <div class="main">
                <div id="main" class="">
                    <button class="openbtn" onclick="openNav()">&#9776;</button>
                    @yield('content')
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
    window.addEventListener('resize', resize);

    function resize() {
        if (window.innerWidth <= 700) {
            closeNav();
            return;
        }else if(window.innerWidth>=700){
            openNav();
            return;
        }
    }
</script>
