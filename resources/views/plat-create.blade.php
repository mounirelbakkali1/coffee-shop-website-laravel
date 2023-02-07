@extends("layout")

@section('title','ajouter un plat')

@section('content')
<h1>Ajouter un plat</h1>
<form method="POST" action="{{ route('plats.store') }}" enctype="multipart/form-data">
    @csrf


    <div>
        <label for="">Title</label>
        <input type="text" name="nom">
        @error('nom')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="">Prix</label>
        <input type="number" step="0.1" name="price">
        @error('price')
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
    <select class="form-select mb-3 mt-3" aria-label="Default select example" name="categorie">
        <option selected>selectioner la catégorie</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach

    </select>
    <div>
        <label for="">description</label>
        <textarea rows="15"  name="description"></textarea>
        @error('description')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-check form-switch mb-3 mt-3">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="disponible" checked>
        <label class="form-check-label" for="flexSwitchCheckChecked">disponible</label>
        @error('disponible')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Ajouter au menu </button>
</form>
@endsection
