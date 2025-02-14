<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Upload</title>
</head>
<body>
    <form action="{{ route('importcsv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="csv_file">Upload CSV File:</label>
        <input type="file" name="csv_file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
