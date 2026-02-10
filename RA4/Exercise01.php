<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['num'])) {
        $_SESSION['num'] = [10, 20, 30];
    }

    if (isset($_POST['position']) && isset($_POST['value'])) {
        $position = $_POST['position'];
        $value = $_POST['value'];

        if (isset($_POST['modify'])) {
            $_SESSION['num'][$position] = $value;
        }

        if (isset($_POST['average'])) {
            $sum = array_sum($_SESSION['num']);
            $avg = $sum / 3;

            echo "Average: $avg";
        }
    }


    $num = $_SESSION['num'];
    ?>
    <h1> Modify array saved in session</h1>
    <form method="POST">
        <label> Position to Modify </label>

        <select name="position">
            <option value="0">1</option>
            <option value="1">2</option>
            <option value="2">3</option>
        </select>

        </br>
        </br>

        <label> New value
            <input type="number" name="value">
        </label>

        </br>
        </br>
        <button type="submit" name="modify"> Modify</button>
        <button type="submit" name="average"> Average</button>
        <button type="reset" name="reset"> Reset</button>
    </form>

    <p> Current array:
        <?php
        echo "$num[0], ";
        echo "$num[1], ";
        echo "$num[2]";
        ?>
    </p>

</body>

</html>