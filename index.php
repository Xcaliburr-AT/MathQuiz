<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
    $difficulty = $_POST['level'];
    $operator = $_POST['operator'];
    $items = (int)$_POST['items'];
    $maxDiff = (int)$_POST['max_diff'];

    $min = 1;
    $max = 10;

    if ($difficulty === "11-100") {
        $min = 11;
        $max = 100;
    } elseif ($difficulty === "custom" && isset($_POST['min']) && isset($_POST['max'])) {
        $min = (int)$_POST['min'];
        $max = (int)$_POST['max'];
    }

    $expressions = [];
    for ($i = 0; $i < $items; $i++) {
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);
        switch ($operator) {
            case "addition":
                $question = "$num1 + $num2";
                $answer = $num1 + $num2;
                break;
            case "subtraction":
                $question = "$num1 - $num2";
                $answer = $num1 - $num2;
                break;
            case "multiplication":
                $question = "$num1 * $num2";
                $answer = $num1 * $num2;
                break;
        }

        $choices = [$answer];
        while (count($choices) < 4) {
            $choice = rand($answer - $maxDiff, $answer + $maxDiff);
            if (!in_array($choice, $choices)) {
                $choices[] = $choice;
            }
        }
        shuffle($choices);

        $expressions[] = [
            "question" => $question,
            "answer" => $answer,
            "choices" => $choices,
        ];
    }

    $_SESSION['quiz'] = $expressions;
    $_SESSION['score'] = 0;
    $_SESSION['current'] = 0;

    header("Location: quiz.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz</title>
</head>
<body>
    <div class="container">
        <h2>SETTINGS</h2>
        <form action="" method="POST">
            <div class="settings">
                <label>Level:</label><br>
                <input type="radio" name="level" value="1-10" checked> Level 1 (1-10) <br>
                <input type="radio" name="level" value="11-100"> Level 2 (11-100) <br>
                <input type="radio" name="level" value="custom"> Custom Level <br>
                <input type="number" name="min" placeholder="Min"> - 
                <input type="number" name="max" placeholder="Max"><br><br>

                <label>Operator:</label><br>
                <input type="radio" name="operator" value="multiplication"> Multiplication <br><br>
                <input type="radio" name="operator" value="addition" checked> Addition <br>
                <input type="radio" name="operator" value="subtraction"> Subtraction <br>

                <label>Number of Items:</label><br>
                <input type="number" name="items" value="10" min="1"><br><br>

                <label>Max Difference from Answer:</label><br>
                <input type="number" name="max_diff" value="10" min="1"><br><br>

                <button class="btn" type="submit" name="start">Start Quiz</button>
            </div>
        </form>
    </div>
</body>
</html>