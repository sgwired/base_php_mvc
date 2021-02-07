<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <h1>Escape</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo 'Hello, ' .  htmlspecialchars($_POST['name']);
    }


    ?>
    <form action="" method="post">
        <div>
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" autofocus>
        </div>
        <div>
            <button type="submit">Submit
            </button>
        </div>
    </form>
</body>

</html>