@extends("layout")

@section('title',"modifier un plat")

@section('content')
    <h3>Edit plat numéro : {{ $data['plat']->id }}</h3>
    <form action="{{route('plats.update', $data['plat']->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        @method('put')
        <div class="mb-3 mt-5">
            <input type="text" name="nom" value="{{ $data['plat']->nom }}" required>
        </div>
        <div class="mb-3">
            <input type="number" step="0.1" name="price" value="{{ $data['plat']->price }}" required>
        </div>
        <div class="mb-3">
            <input type="file" name="image" value="{{asset('images/'.$data['plat']->image)}}" required>
        </div>
        <select class="form-select mb-3 mt-3" aria-label="Default select example" name="categorie">
            <option selected>selectioner la catégorie</option>
            @foreach($data['categories'] as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <input type="text" name="description" value="{{ $data['plat']->description }}" required>
        </div>
        <div class="form-check form-switch mb-3 mt-3">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="disponible"  {{ $data['plat']->disponible==1 ? "checked" :"" }}>
            <label class="form-check-label" for="flexSwitchCheckChecked">disponible</label>
            @error('disponible')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="button"><a href="{{url()->previous()}}">cancle</a></button>
        <button type="submit">save changes</button>
    </form>
@endsection
