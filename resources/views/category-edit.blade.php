@extends("layout")

@section('title',"modifier une categorie")

@section('content')
    <h3>Edit la catégorie numéro : {{ $category->id }}</h3>
    <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        @method('put')
        <div class="mb-3 mt-5">
            <input type="text" name="title" value="{{ $category->title }}" required>
        </div>
        <div class="mb-3">
            <input type="file" name="image" value="{{asset('images/'.$category->image)}}" required>
        </div>
        <button type="button"><a href="{{url()->previous()}}">cancle</a></button>
        <button type="submit">save changes</button>
    </form>
@endsection
