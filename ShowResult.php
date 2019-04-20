<?php

session_start();
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['city'])&&(!empty($_GET['city'])))
    {

        $city = $_GET['city'];
        $url = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=d487c5c6e9df7f45a27c55ec7321ac4f";
        $result = json_decode(file_get_contents($url),true);

        //weather data about the required city
        $name=$result['name'];
        $temperatureOfTheDay = $result['main']['temp']." C";//for degree transformation
        $country = $result['sys']['country'];
        $weatherIcon = $result['weather'][0]['icon'];
        $weatherClouds = $result['weather'][0]['main'];
        $weatherDescription = $result['weather'][0]['description'];
        $pressure = $result['main']['pressure'];
        $minTemp = $result['main']['temp_min']." C";
        $maxTemp = $result['main']['temp_max']." C";
        $windSpeed = $result['wind']['speed'];
        $windDegree = $result['wind']['deg'];
        //$rain = $result['rain']['3h'];
        $_SESSION['temp']=floor($temperatureOfTheDay);
        $_SESSION['name']=$name;
        $_SESSION['desc']=$weatherDescription;
        $_SESSION['windspeed']=$windSpeed;
    }
    else
    {
        echo "alert('You must enter a valid city or a zip code')";
        header("location: index.php");
    }
}
//get information about countries using rapid api
else {
    echo "alert('You must enter a valid city or a zip code')";
    header("location: index.php");
}
?>

<html>
    <head>
        <meta charset="x-UTF-16LE-BOM">
        <title>Weather App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/CodeEliteStyle.css">

    </head>

    <body>

        <section class="result">
            <div class="container">
                <h2 class="head2">Tempreture in <?php echo $name . " for today.";?></h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-3 fath">

                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://api.openweathermap.org/img/w/<?php echo $weatherIcon.'.png';?>" class="card-img im img-thumbnail">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Tempreture : </b><?php echo floor($temperatureOfTheDay);?></h5>
                                            <p class="card-text">Min Temp : <?php echo $minTemp;?></p>
                                            <p class="card-text">Max Temp : <?php echo $maxTemp;?></p>
                                            <p class="card-text">Description : <?php echo $weatherDescription." in $name today.";?></p>
                                            <p class="card-text">Clouds : <?php echo $weatherClouds;?></p>
                                            <p class="card-text">Wind Speed : <?php echo $windSpeed;?></p>
                                            <p class="card-text">Wind Degree : <?php echo $windDegree;?></p>
                                            <p class="card-text">Pressure : <?php echo $pressure;?></p>
                                            <p class="card-text">Country : <?php echo $country;?></p>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="desc">
                            <h3>Get information about countries<br>by
                                Entering a Country name eg.Egypt,<br>
                                Or Entering a language <br> eg. ar,en,es.</h3>
                        </div>
                        <div class="myform">
                            <form method="post" action="countryinfo.php">
                                <div class="input-group mb-3">
                                    <input type="text" name="mysearch" id="search" class="form-control" placeholder="Type a Country name or a language." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="postandupdate">
            <h3 style="padding: 20px;text-align: center">Post a list or Update current board at trello.</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 post">
                        <h3>Post To a Board</h3>
                        <div>
                            <a href="Board.php">Post</a>
                        </div>
                    </div>
                    <div class="col-lg-6 update">

                        <form method="post" action="update.php">
                                New name  <input type="text"  style="display: block" name="name" class="form-control name" placeholder="New name." aria-label="Recipient's username" aria-describedby="button-addon2">
                                Description  <input type="text"  style="display: block" name="desc" class="form-control desc" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update</button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


    </body>
</html>