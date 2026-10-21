<?php

include 'process.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate House Electricity Bill</title>
</head>

<body style="background-color: #aadfa8;">

    <h1>Calculate house Electricity Bill</h1>

    <div>
        <table border="1" cellpadding="10">
            <tr>
                <th>Block Tariff (per Month)</th>
                <th>Unit</th>
                <th>Rate</th>
            </tr>
            <tr>
                <td>For the first 200 kWh (1-200 kWh) per month</td>
                <td>sen/kWh</td>
                <td>0.218</td>
            </tr>
            <tr>
                <td>For the next 100 kWh (201 – 300 kWh) per month</td>
                <td>sen/kWh</td>
                <td>0.344</td>
            </tr>
            <tr>
                <td>For the next 300 kWh (301 – 600 kWh) per month</td>
                <td>sen/kWh</td>
                <td>0.516</td>
            </tr>
            <tr>
                <td>For the next 300 kWh (601 – 900 kWh) per month</td>
                <td>sen/kWh</td>
                <td>0.546</td>
            </tr>
            <tr>
                <td>For the next kWh (901 kWh onwards) per month</td>
                <td>sen/kWh</td>
                <td>0.571</td>
            </tr>
            <tr>
                <td colspan="3">The minimum monthly chafe is RM300</td>
            </tr>
        </table>
    </div>

    <div>
        <form action="" method="post">
            <label for="">Enter your first 200 kWh (1-200) per Month : </label>
            <input type="number" name="first" id="">
            <br> <!-- stand for break. will move to next line-->
            <label for="">Enter next 100 kWh (201 - 300) per Month : </label>
            <input type="number" name="second" id="">
            <br>
            <label for="">Enter next 300 kWh (301 - 600) per Month : </label>
            <input type="number" name="third" id="">
            <br>
            <label for="">Enter next 300 kWh (601 - 900) per Month : </label>
            <input type="number" name="fourth" id="">
            <br>
            <label for="">Enter next kWh (901 kWh onwards) per Month : </label>
            <input type="number" name="fifth" id="">
            <br><br>
            <input type="submit" name="calculate" value="Calculate">
            <input type="submit" name="reset" value="Reset">
        </form>

        <?php
        if ($error != "") {
            echo "<h3 style='color:red'>" . $error . "</h3>";
        }
        ?>

    </div>

</body>

</html>

<?php

if ($showBill) {
    echo "<hr>"; //horizontal line
    echo "<h1>My Electricity Bill</h1><br>";

    echo "<br>First Input : " . $firstkwh . "* 0.218 = RM " . $firstcharge .  "<br>";
    echo "Second Input : " . $secondkwh . "* 0.344 = RM " . $secondcharge . "<br>";
    echo "Third Input : " . $thirdkwh . "* 0.516 = RM " . $thirdcharge . "<br>";
    echo "Fourth Input : " . $fourthkwh . "* 0.546 = RM " . $fourthcharge . "<br>";
    echo "Fifth Input : " . $fifthkwh . "* 0.571 = RM " . $fifthcharge . "<br>";

    echo "<br>Total kWh : " . $totalkwh . "<br>";
    echo "Total Charge : RM " . $totalCharge . "<br>";
    echo "Total SST : RM " . $sst . "<br>";
    echo "Total Bill : RM " . $totalBill . "<br>";

}

?>