<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        fieldset {
            width: 400px;
        }

        label {
            width: 10em;
            padding-right: 1em;
            float: left;
        }
    </style>
</head>
<body>
<form method="post" action="">
    <h1>Simple Calculator</h1>
    <fieldset>
        <legend>Calculator</legend>
        <label>First operand:</label>
        <input type="text" name="firstOperand"><br>
        <label>Operator:</label>
        <select name="cal">
            <option value="+">Addition</option>
            <option value="-">Subtraction</option>
            <option value="*">Multiplication</option>
            <option value=":">Division</option>
        </select>
        <br><label>Second operand:</label>
        <input type="text" name="secondOperand"><br><br>
        <input type="submit" value="Calculate">
    </fieldset>

</form>
<p>Result:</p>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstNumber = $_POST["firstOperand"];
    $secondNumber = $_POST["secondOperand"];
    $cal = $_POST["cal"];
    function cal($firstNumber, $secondNumber)
    {
        if ($_POST["cal"] == "+") {
            echo $firstNumber + $secondNumber;
        }
        if ($_POST["cal"] == "-") {
            echo $firstNumber - $secondNumber;
        }
        if ($_POST["cal"] == "*") {
            echo $firstNumber * $secondNumber;
        }
        if ($_POST["cal"] == ":") {
            if ($secondNumber == 0) {
                throw new Exception('Division by zero.');
            }
            echo $firstNumber / $secondNumber;
        }
    }

    try {
        echo '=' .$firstNumber . $cal . $firstNumber . cal($firstNumber, $secondNumber);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage();
    }
}
?>