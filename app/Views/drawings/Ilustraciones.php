<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ilustraciones</title>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-light mb-4" style="background-color: #d4ac0d;">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">
    <h1> Aqui puedes subir tus Ilustraciones!!! </h1>


<form action="subir.php" method="POST" enctype="multipart/form-data">
        <label for="texto">Texto descriptivo:</label><br>
        <input type="text" id="texto" name="texto" required><br><br>

        <label for="imagen">Seleccionar imagen:</label><br>
        <input type="file" id="imagen" name="imagen" accept="image/*" required><br><br>

        <button type="submit">Subir</button>
    </form>
    
</body>
</html>