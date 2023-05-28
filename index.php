<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Reviews</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Food Review</h1>

    <?php



    mysqli_set_charset($connect, 'UTF8');

    $revQuery = 'SELECT Reviews.*, Restaurants.rest_name
             FROM Reviews
             JOIN Restaurants ON Reviews.rest_Id = Restaurants.rest_Id
             ORDER BY Reviews.date';

    $revResult = mysqli_query($connect, $revQuery);
    if (!$revResult) {
        die("Database error: " . mysqli_error($connect));
    }

    echo '<div class="container">';
    while ($record = mysqli_fetch_assoc($revResult)) {

        echo '<div class="receiptContainer">
    <h2 class="logo">' . $record['rest_name'] . '</h2>
    <p class="orderNum">ORDER #' . rand(1, 999) . '</p>
    <p class="date">Date: ' . $record['date'] . '</p>
    <hr class= "dotted" />
    <p>What we got: ' . $record['dish'] . '</p>
    <p>Notes: ' . $record['notes'] . '</p>
    <p class="rating">Rating: ' . $record['rating'] . '/10&#9733</p>
   
</div>';
    }

    echo '</div>';

    ?>
</body>

</html>