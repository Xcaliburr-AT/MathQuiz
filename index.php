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