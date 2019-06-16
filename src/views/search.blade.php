<!DOCTYPE html>

<html>
    <head>
        <title>Custom Search</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>

    <style>
        body
        {
            margin: 0;
            padding: 0;
            background-color: #e84118;
        }
        .search-box
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #2f3640;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
        }
        .search-box:hover > .search-txt
        {
            width: 240px;
            padding: 0 6px;
        }
        .search-box:hover > .search-btn
        {
            background: white;
        }
        .search-btn
        {
            color: #e84118;
            float: right;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #2f3640;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-txt
        {
            border: none;
            background: none;
            outline: none;
            float: left;
            padding: 0;
            color: white;
            font-size: 16px;
            transition: 0.4s;
            line-height: 40px;
            width: 0px;

        }
    </style>

    <body>
        <form action="{{route('search')}}" method="post">
            {{ csrf_field() }}
            <div class="search-box">
                <input type="text" placeholder="Type to search" class="search-txt" name="topic">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </body>

</html>
