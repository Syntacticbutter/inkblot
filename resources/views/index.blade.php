<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<body>
    <h1>Books</h1>
    <div>
        <table border="1">
            <tr>
                <!-- <th>ID</th> -->
                <th>Title</th>
                <th>Edition</th>
                <th>Author</th>
                <th>Year</th>
                <th>Publisher</th>
                <th>Description</th>
                <th colspan="2">Actions</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <!-- <td>{{$book->id}}</td> -->
                <td>{{$book->title}}</td>
                <td>{{$book->edition}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->year}}</td>
                <td>{{$book->publisher}}</td>
                <td>{{$book->description}}</td>
                <td>
                    <a href="{{route('book.edit', ['book' => $book])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('book.destroy', ['book' => $book])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <form method="post" action="{{route('book.store')}}">
                    @csrf
                    @method('post')
                    <td><input type="text" name="title" placeholder="Title" /></td>
                    <td><input value="1" min="1" type="number" name="edition" placeholder="1" /></td>
                    <td><input type="text" name="author" placeholder="Author" /></td>
                    <td><input min="0" type="number" name="year" placeholder="Year" /></td>
                    <td><input type="text" name="publisher" placeholder="Publisher" /></td>
                    <td><input type="text" name="description" placeholder="Description" /></td>
                    <td colspan="2"><input type="submit" value="Add" /></td>
                </form>
            </tr>
        </table>
    </div>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <br>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
</body>
</html>