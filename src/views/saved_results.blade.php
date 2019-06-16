<!DOCTYPE html>

<html>
    <head>
        <title>Custom Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </head>

    <body>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead style="background: lightskyblue">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Comments</th>
                    <th>Delete Record</th>
                    <th>Update Record</th>
                </tr>
            </thead>
            <tbody>
                @foreach($savedResults as $key => $savedResult)
                    <form method="post" action="{{route('update')}}">
                        {{ csrf_token() }}
                        <tr>
                            <td> {{ $savedResult['id'] }}</td>
                            <input type="text" name="id" value="{{ $savedResult['id'] }}" hidden>
                            <td> {{ $savedResult['title'] }} </td>
                            <td> {{ $savedResult['description'] }} </td>
                            <td> {{ $savedResult['link'] }} </td>
                            <td><input type="textarea" name="comment" value="{{ $savedResult['comment'] }}"></td>
                            <td><a href="/delete/{{ $savedResult['id'] }}" class="button">Delete</a></td>
                            <td><button id= "update" type="submit">Update</button></td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
