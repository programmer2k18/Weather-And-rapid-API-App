
<html>
<head>
    <meta charset="x-UTF-16LE-BOM">
    <title>Weather App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/CodeEliteStyle.css">

</head>
<body>
    <section class="data">
        <div class="container">

            <div class="desc">
                <h3>Please Enter a city name eg.London, <br> Or Entering Zip code of the city<br> eg.94040,us</h3>
            </div>

            <div class="myform">
                <form method="get" action="ShowResult.php">
                    <div class="input-group mb-3">
                        <input type="text" name="city" id="cityid" class="form-control" placeholder="Type a city or Zip Code." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"> Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="image">
        <img src="css/weather-hero.jpg" class="img-fluid">
    </section>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>




