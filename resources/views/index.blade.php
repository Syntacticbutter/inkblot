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
            <!-- @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
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
            @endforeach -->

            @foreach($books as $book)
            <tr>
                <form method="post" action="{{route('book.update', ['book' => $book])}}">
                    @csrf
                    @method('put')
                    <td>
                        <input value="{{$book->title}}" type="text" name="title" placeholder="{{$book->title}}" />
                    </td>
                    <td>
                        <input value="{{$book->edition}}" min="1" type="number" name="edition" placeholder="{{$book->edition}}" />
                    </td>
                    <td>
                        <input value="{{$book->author}}" type="text" name="author" placeholder="{{$book->author}}" />
                    </td>
                    <td>
                        <input value="{{$book->year}}" min="0" type="number" name="year" placeholder="{{$book->year}}" />
                    </td>
                    <td>
                        <input value="{{$book->publisher}}" type="text" name="publisher" placeholder="{{$book->publisher}}" />
                    </td>
                    <td>
                        <input value="{{$book->description}}" type="text" name="description" placeholder="{{$book->description}}" />
                    </td>
                    <td>
                        <input type="submit" value="Save Changes" />
                    </td>   
                </form>
                <form method="post" action="{{route('book.destroy', ['book' => $book])}}">
                    <td>
                    @csrf
                    @method('delete')
                        <input type="submit" value="Remove">
                    </td>
                </form>
            </tr>
            @endforeach
            
            <!-- all books are added by admin
            all accounts are managed by admin
            if signed in as admin show add, edit, remove book
            elseif signed in as member show add trade request (has and want) 
        
            download composer installer then run it
            git clone
            git config --global user.email "you@example.com"
            git config --global user.name "Your Name"
            open terminal -> type php composer install
            rename .env.example to .env
            open .env and set database name from laravel to inkblot
            open terminal -> type php artisan key:generate
            run xampp as administrator
            start apache and mysql
            create new database inkblot in phpmyadmin
            open terminal -> type php artisan migrate
            open terminal -> type php artisan serve
            -->

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