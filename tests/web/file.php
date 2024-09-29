<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/api/assets/index.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select File:</label>
        <input type="file" name="asset" id="asset">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>