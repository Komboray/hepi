<?php
//we are going to create the room data
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hostel</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method = "POST">

    <h1>Registration From</h1>
        
        <div>
            <label for="hostel_name">Hostel name</label>
            <input type="text" name = "hostel_name" placeholder = "The name of your hostel">
        </div>

        <div>
            <label for="rooms">Rooms</label>
            <input type="number" name = "rooms" placeholder = "The number of rooms">
        </div>
        
        <div>
            <label for="rooms_avail">Rooms available</label>
            <input type="number" name = "rooms_avail" placeholder = "The rooms available">
        </div>

        <div>
            <label for="price">Price per room</label>
            <input type="number" name = "price" placeholder = "How much is one room">
        </div>

        <div>
            <label for="Description">Description</label>
            <input type="text" name = "Description" placeholder = "Describe the room, details etc...">
        </div>

        <div>
            <label for="payment">payment</label>
            <select name="payment" id="payment">
                <option value="visa">Visa</option>
                <option value="mpesa">Mpesa</option>
            </select>
        </div>

        <div>
            <label for="paybill">Paybill No.</label>
            <input type="number" name = "paybill" placeholder = "Enter the paybill No">
        </div>

        <div>
            <button type = "submit" id = "submit" >Register</button>
        </div>
        

    </form>
</body>
</html>


<?php
//this is the transfer of data to the database

if($_SERVER["REQUEST_METHOD"] == 'POST'){
 $hostel_name = filter_input(INPUT_POST, "hostel_name", FILTER_SANITIZE_SPECIAL_CHARS);
 $rooms = filter_input(INPUT_POST, "rooms", FILTER_SANITIZE_SPECIAL_CHARS);
 $rooms_avail = filter_input(INPUT_POST, "rooms_avail", FILTER_SANITIZE_SPECIAL_CHARS);
 $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);
 $description = filter_input(INPUT_POST, "Description", FILTER_SANITIZE_SPECIAL_CHARS);
 $paybill = filter_input(INPUT_POST, "paybill", FILTER_SANITIZE_SPECIAL_CHARS);
    
 $sql = " INSERT INTO hostels (name, rooms,  rooms_avail, price, description, paybill)
          VALUES('$hostel_name', '$rooms', '$rooms_avail', '$price', '$description', '$paybill')";


mysqli_query($conn, $sql);
}


?>