<!DOCTYPE html>
<html>
<head>
    <title>Submit URL for Indexing</title>
</head>
<body>
    <h1>Submit URL for Indexing</h1>
    <form action="{{route('submitGoogle')}}" method="post">
        @csrf
        <label for="url">Enter the URL to submit for indexing:</label>
        <input type="text" name="url" id="url">
        <button type="submit">Submit for Indexing</button>
    </form>
</body>
</html>
