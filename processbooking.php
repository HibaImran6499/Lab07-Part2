<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Booking confirmation for the Rohirrim Dude Ranch">
    <meta name="keywords" content="MiddleEarth, Tours, Rohan">
    <meta name="author" content="Hiba Imran">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
<?php
    // If the page is opened directly, nothing has been submitted
    if (!isset($_POST["firstname"])) {
        echo "<p>Please make your booking using the <a href=\"register.html\">booking form</a>.</p>";
    } else {

        // Text fields
        $firstname = htmlspecialchars(trim($_POST["firstname"]));
        $lastname  = htmlspecialchars(trim($_POST["lastname"]));

        if ($firstname == "") {
            echo "<p>First name: not entered</p>";
        } else {
            echo "<p>First name: $firstname</p>";
        }

        if ($lastname == "") {
            echo "<p>Last name: not entered</p>";
        } else {
            echo "<p>Last name: $lastname</p>";
        }

        if (isset($_POST["age"]) && trim($_POST["age"]) != "") {
            $age = htmlspecialchars(trim($_POST["age"]));
            echo "<p>Age: $age</p>";
        } else {
            echo "<p>Age: not entered</p>";
        }

        // Radio buttons: the form sends a letter, so convert it to a word
        $speciesList = array("M" => "Human", "D" => "Dwarf", "E" => "Elf", "H" => "Hobbit");
        if (isset($_POST["species"]) && isset($speciesList[$_POST["species"]])) {
            $species = $speciesList[$_POST["species"]];
            echo "<p>Species: $species</p>";
        } else {
            echo "<p>Species: not selected</p>";
        }

        // Checkboxes: unticked boxes are not sent, so check each with isset()
        $bookings = array();
        if (isset($_POST["accom"])) {
            $bookings[] = "Accommodation";
        }
        if (isset($_POST["4day"])) {
            $bookings[] = "4 Day Tour";
        }
        if (isset($_POST["10day"])) {
            $bookings[] = "10 Day Tour";
        }
        if (count($bookings) > 0) {
            echo "<p>Booking: " . implode(", ", $bookings) . "</p>";
        } else {
            echo "<p>Booking: nothing selected</p>";
        }

        // Drop-down menu
        if (isset($_POST["food"])) {
            $food = htmlspecialchars($_POST["food"]);
            echo "<p>Menu preference: $food</p>";
        }

        // Date and party size
        if (isset($_POST["bookday"]) && trim($_POST["bookday"]) != "") {
            $bookday = htmlspecialchars(trim($_POST["bookday"]));
            echo "<p>Date: $bookday</p>";
        } else {
            echo "<p>Date: not entered</p>";
        }

        if (isset($_POST["partysize"]) && trim($_POST["partysize"]) != "") {
            $partysize = htmlspecialchars(trim($_POST["partysize"]));
            echo "<p>Number of travellers: $partysize</p>";
        } else {
            echo "<p>Number of travellers: not entered</p>";
        }

        echo "<p><a href=\"register.html\">Make another booking</a></p>";
    }
?>
</body>
</html>