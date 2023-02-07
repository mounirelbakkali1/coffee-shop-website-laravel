@extends("layout")

@section('title','ajouter une categorie')

@section('content')
    <h1>Ajouter une categorie</h1>
    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Title</label>
            <input type="text" name="title">
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image">
            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">enregistrer </button>
    </form>
@endsection
