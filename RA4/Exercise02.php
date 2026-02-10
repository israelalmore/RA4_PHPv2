<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
</head>

<body>
    <?php
    session_start();

    // Inicializar sesiones
    if (!isset($_SESSION['milk'])) {
        $_SESSION['milk'] = 0;
    }
    if (!isset($_SESSION['soft drink'])) {
        $_SESSION['soft drink'] = 0;
    }
    if (!isset($_SESSION['worker'])) {
        $_SESSION['worker'] = "";
    }

    if (!empty($_POST['worker'])) {
        $_SESSION['worker'] = $_POST['worker'];
    }

    if (isset($_POST['product']) && isset($_POST['value'])) {
        $product = $_POST['product'];
        $value = $_POST['value'];

        if (isset($_POST['add'])) {
            $_SESSION[$product] += $value;
        }

        if (isset($_POST['remove'])) {
            $_SESSION[$product] -= $value;
        }
    }
    ?>
    <h1> Supermarket management </h1>

    <form method="POST">
        <label> Worker name</label>
        <input type="text" name="worker" value="<?php echo $_SESSION['worker']; ?>">

        <h2>Choose product</h2>
        <select name="product">
            <option value="milk">Milk</option>
            <option value="soft drink">Soft Drink</option>
        </select>

        <h2>Product quantity</h2>
        <input type="number" name="value">

        <br>
        <br>

        <button type="submit" name="add">add</button>
        <button type="submit" name="remove">remove</button>
        <button type="reset" name="reset">reset</button>

        <h2>Inventory</h2>

        <?php
        echo "worker: " . $_SESSION['worker'] . "<br>";
        echo "units milk: " . $_SESSION['milk'] .  "<br>";
        echo "unit soft drink: " . $_SESSION['soft drink'] . "<br>";
        ?>
    </form>
</body>

</html>