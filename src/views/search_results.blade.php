<!DOCTYPE html>

<html>
    <head>
        <title>Custom Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    </head>

    <body>
        <form method="post" action="{{route('save')}}">
            {{ csrf_field() }}
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead style="background: lightskyblue">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Comments</th>
                    <th>Should Save?</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($searchData as $key => $data)
                        <tr>
                            <td> {{ (int)$key + 1 }}</td>
                            <input type="text" name="data[{{ $key }}][id]" value="{{ $key }}" hidden>
                            <td> {{ $data['title'] }} </td>
                            <input type="text" name="data[{{ $key }}][title]" value="{{ $data['title'] }}" hidden>
                            <td> {{ $data['description'] }} </td>
                            <input type="text" name="data[{{ $key }}][description]" value="{{ $data['description'] }}" hidden>
                            <td> {{ $data['link'] }} </td>
                            <input type="text" name="data[{{ $key }}][link]" value="{{ $data['link'] }}" hidden>
                            <td><input type="textarea" name="data[{{ $key }}][comment]"></td>
                            <td> <input type="checkbox" name="data[{{ $key }}][should_save]" value="1"> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
    </body>
</html>
