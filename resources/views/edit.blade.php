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
    <h1>Add book</h1>

    <table>
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
    </table>
</body>
</html>