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
    <form method="post" action="{{route('book.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" />
        </div>
        <div>
            <label>Edition</label>
            <input value="1" min="1" type="number" name="edition" placeholder="1" />
        </div>
        <div>
            <label>Author</label>
            <input type="text" name="author" placeholder="Author" />
        </div>
        <div>
            <label>Year</label>
            <input min="0" type="number" name="year" placeholder="Year" />
        </div>
        <div>
            <label>Publisher</label>
            <input type="text" name="publisher" placeholder="Publisher" />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" />
        </div>
        <div>
            <input type="submit" value="Add" />
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