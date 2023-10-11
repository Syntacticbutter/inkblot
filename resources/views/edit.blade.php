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
    <form method="post" action="{{route('book.update', ['book' => $book])}}">
        @csrf
        @method('put')
        <div>
            <label>Title</label>
            <input value="{{$book->title}}" type="text" name="title" placeholder="Title" />
        </div>
        <div>
            <label>Edition</label>
            <input value="{{$book->edition}}" min="1" type="number" name="edition" placeholder="1" />
        </div>
        <div>
            <label>Author</label>
            <input value="{{$book->author}}" type="text" name="author" placeholder="Author" />
        </div>
        <div>
            <label>Year</label>
            <input value="{{$book->year}}" min="0" type="number" name="year" placeholder="Year" />
        </div>
        <div>
            <label>Publisher</label>
            <input value="{{$book->publisher}}" type="text" name="publisher" placeholder="Publisher" />
        </div>
        <div>
            <label>Description</label>
            <input value="{{$book->description}}" type="text" name="description" placeholder="Description" />
        </div>
        <div>
            <input type="submit" value="Save Changes" />
        </div>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </form>
</body>
</html>