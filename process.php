<?php

$error = "";
$showBill = false;

//to check if the form is submitted and have value or not
if (isset($_POST['calculate'])) {
    /*echo "The input for the first kWh : " . $_POST['first'];
    echo "<br>The input for the second kWh : " . $_POST['second'];
    echo "<br>The input for the third kWh : " . $_POST['third'];
    echo "<br>The input for the fourth kWh : " . $_POST['fourth'];
    echo "<br>The input for the fifth kWh : " . $_POST['fifth'];*/

    //get the data from the form and store it in variable
    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];

    //validation 1 - check if the variable is empty or not. If empty, assign 0 to the variable
    if ($firstkwh == "")
        $firstkwh = 0;
    if ($secondkwh == "")
        $secondkwh = 0;
    if ($thirdkwh == "")
        $thirdkwh = 0;
    if ($fourthkwh == "")
        $fourthkwh = 0;
    if ($fifthkwh == "")
        $fifthkwh = 0;

    //validation 2 - check if the input is negative or not. If negative, display error message
    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "<br>Invalid input. Please enter a positive number.";
    }

    //validation 3 - check if the input is more than the limit or not. If more, display error message
    else if ($firstkwh > 200) {
        $error = "<br>Invalid input. The first kWh cannot exceed 200.";
    } else if ($secondkwh > 100) {
        $error = "<br>Invalid input. The second kWh cannot exceed 100.";
    } else if ($thirdkwh > 300) {
        $error = "<br>Invalid input. The third kWh cannot exceed 300.";
    } else if ($fourthkwh > 300) {
        $error = "<br>Invalid input. The fourth kWh cannot exceed 300.";
    }

    //validation 4 - add all of the kWh and check if it is zero or not. If more, display error message
    else if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) 
        $error = "<br>Please enter at least one value. The total kWh cannot be zero.";
    else { 


        $firstcharge = $firstkwh * 0.218;
        $secondcharge = $secondkwh * 0.344;
        $thirdcharge = $thirdkwh * 0.516;
        $fourthcharge = $fourthkwh * 0.546;
        $fifthcharge = $fifthkwh * 0.571;

        //totalkwh
        $totalkwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
        //totalcharge
        $totalcharge = $firstcharge + $secondcharge + $thirdcharge + $fourthcharge + $fifthcharge;
        //total sst; add 6% if above 600kwh
        if($totalkwh > 600) {
            $sst = $totalcharge * 0.06;
            //$totalcharge += $sst; //$totalcharge = $totalcharge + $sst - tk boleh guna sebab mahu tunjuk total bila darab sahaja
        } else {
            $sst = 0;
        }
        
        //total semua tambah dengan sst sekali (jika ada)
        $totalBill = $totalcharge + $sst;

        $showBill = true;


        echo "<br>The total charge for the first kWh is : RM " . $firstcharge;
        echo "<br>The total charge for the second kWh is : RM " . $secondcharge;
        echo "<br>The total charge for the third kWh is : RM " . $thirdcharge;
        echo "<br>The total charge for the fourth kWh is : RM " . $fourthcharge;
        echo "<br>The total charge for the fifth kWh is : RM " . $fifthcharge;
    }
}


?>