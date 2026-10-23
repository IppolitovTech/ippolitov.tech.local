<!DOCTYPE html>
<html>
<head>
    <title>Link Scanning</title>
</head>
<body>
    <h1>Link Scanning</h1>
    <form action="{{route('scanGoogle')}}" method="post">
        @csrf
        <label for="url">Enter the link for scanning:</label>
        <input type="text" name="url" id="url">
        <button type="submit">Scan</button>
    </form>

    @if(isset($result))
        <p>{{$result}}</p>
    @endif
</body>
</html>
