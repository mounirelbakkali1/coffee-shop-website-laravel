<table>
    <thead>
    <tr>
        <th>image</th>
        <th>title</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['categories'] as $category)
        <tr>
            <td style="background-image: url('{{asset('images/'.$category->image)}}');background-size: cover;background-repeat: no-repeat;height: 100px"></td>
            <td>{{ $category->title }}</td>
            <td>
                <div style="display: flex">
                    <button style="margin-right: 5px"><a href="{{ route('category.edit', $category->id) }}" class="text-light text-decoration-none">Edit</a></button>
                    <form action="{{ route('category.destroy', $category->id) }}" method="post" >
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
