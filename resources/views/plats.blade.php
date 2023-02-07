<table>
    <thead>
    <tr>
        <th>image</th>
        <th>nom</th>
        <th>Description</th>
        <th>price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['plats'] as $plat)
        <tr>
            <td style="background-image: url('{{asset('images/'.$plat->image)}}');background-size: cover;background-repeat: no-repeat;height: 100px">

            </td>
            <td>{{ $plat->nom }}</td>
            <td>{{ $plat->description }}</td>
            <td>{{ $plat->price." DH" }}</td>
            <td>
                <div style="display: flex">
                    <button style="margin-right: 5px"><a href="{{ route('plats.edit', $plat->id) }}" class="text-light text-decoration-none">Edit</a></button>
                    <form action="{{ route('plats.destroy', $plat->id) }}" method="post" >
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
