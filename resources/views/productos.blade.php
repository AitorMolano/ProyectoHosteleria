<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Productos</h2>
    <form action=" {{ route('prueba') }} " method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="foto" id="foto"/>
        <input type="submit" value="Añadir"/>
    </form>
</body>
</html>