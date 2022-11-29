<html>

    <header class="header">
        <title class="title">> ESKOLAPP </title>
        <meta charset="utf-8">
        <link rel="css" href="./css/style.css">
    </header>

    <body>
        <b> Insertar Curso </b>
        <form action=courses_insert.php" method="post">
            <label>ID:</label><input type="text" name="id_course"><br>
            <label>Name:</label><input type="text" name="name"><br>
            <label>Description:</label><input type="text" name="description"><br>
            <label>Start:</label><input type="text" name="date_start"><br>
            <label>End:</label><input type="text" name="date_end"><br>
            <label>Active:</label><input type="text" name="active"><br>
            <input type="submit" value="Insertar Datos">
        </form>
    </body>

    <footer class="footer">
        <b> Ⓒ 2022 Pinpilinpauxa </b>
    </footer>

</html>