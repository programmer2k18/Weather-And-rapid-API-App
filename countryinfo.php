<?php
if(isset($_POST['mysearch'])&&(!empty($_POST['mysearch']))){

    $value=$_POST['mysearch'];
    $mykey="5bb27a7647msh149c3516f7c2a53p1fbdc9jsn56ced4c83d0c";
    $header=array();
    $header[]='X-RapidAPI-Key: '.$mykey;

    if(strlen($value)<=3){
        //first sevice of this api by language
        $url2="https://restcountries-v1.p.rapidapi.com/lang/$value";
        $ch=curl_init($url2);
        curl_setopt($ch, CURLOPT_URL, $url2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $response_body = curl_exec($ch);
        $data=json_decode($response_body,true);

    }
    else{
        //second service of this api by county name
        $url1="https://restcountries-v1.p.rapidapi.com/name/$value";
        $ch=curl_init($url1);
        curl_setopt($ch, CURLOPT_URL, $url1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $response_body = curl_exec($ch);
        $data=json_decode($response_body,true);
    }
}
else{
    echo "alert('You must enter a valid city or a zip code')";
    header("location: ShowResult.php");
}
function hasValue($borders,$lat,$lag,$subregion,$demoname){
    if(empty($demoname)||empty($lat)||empty($lag)||
    empty($subregion)||empty($borders[0])||empty($borders[1]))
        return false;
    return true;
}
?>

<html>
<head>
    <meta charset="x-UTF-16LE-BOM">
    <title>Weather App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/countrystyle.css">

</head>
<body>

    <section class="country">
        <div class="container">

            <div class="data">
                <?php
                if(strlen($value)>3){
                    $capital=$data[0]['capital'];
                    $population=$data[0]['population'];
                    $region=$data[0]['region'];
                    $subregion=$data[0]['subregion'];
                    $area =$data[0]['area'];
                    $timezone=$data[0]['timezones'][0];
                    $lat=$data[0]['latlng'][0];
                    $lng=$data[0]['latlng'][1];
                    $demoname=$data[0]['demonym'];
                    $nativename=$data[0]['nativeName'];
                    $currency= $data[0]['currencies'][0];
                    $lang=$data[0]['languages'][0];
                    $borders=$data[0]['borders'];

                    echo "<h3 class=\"heading\">Data about $value country</h3>";
                    echo"
                        <div class=\"card text-center data\">
                              <div class=\"card-header\">
                                $value
                              </div>
                              <div class=\"card-body\">
                                <h5 class=\"card-title last\" style='color=#08526D'>Capital : $capital</h5>
                                <div class='row'>
                                    <div class='col-lg-4'>
                                        <h5>Population : $population M</h5>
                                        <h5>Area : $area KM</h5>
                                        <h5>Region : $region</h5>     
                                        <h5>SubRegion : $subregion</h5>                              
                                    </div>
                                    <div class='col-lg-4'>
                                         <h5>Demo Name : $demoname</h5>
                                         <h5>Language : $lang</h5>
                                         <h5>Currency : $currency</h5>                                  
                                    </div>
                                    <div class='col-lg-4'>
                                        <h5>Time Zone : $timezone</h5>
                                         <h5>Latitude : $lat</h5>
                                         <h5>Langtitude : $lng</h5>                                  
                                    </div>
                                </div>
                        
                                <h5 class=\"card-text last\">Borders : $borders[0], $borders[1],$borders[2]</h5>
                                <a href=\"index.php\" class=\"btn btn-primary\">Go Back</a>
                              </div>
                              <div class=\"card-footer text-muted\">
                                $nativename
                              </div>
                            </div>
                    ";
                }
                ?>
            </div>
        </div>
    </section>

    <section class="country">
        <div class="container">
            <div class="data">
                <?php
                if(strlen($value)<=3){
                    echo "<h3 class=\"heading\">Data about some countries that speak $value language</h3>";
                    for($i=0;$i<count($data);$i++){
                        $name=$data[$i]['name'];
                        $capital=$data[$i]['capital'];
                        $population=$data[$i]['population'];
                        $region=$data[$i]['region'];
                        $subregion=$data[$i]['subregion'];
                        $area =$data[$i]['area'];
                        $timezone=$data[$i]['timezones'][0];
                        $lat=$data[$i]['latlng'][0];
                        $lng=$data[$i]['latlng'][1];
                        $demoname=$data[$i]['demonym'];
                        $nativename=$data[$i]['nativeName'];
                        $currency= $data[$i]['currencies'][0];
                        $lang=$data[$i]['languages'][0];
                        $borders=$data[$i]['borders'];
                        if(!hasValue($borders,$lat,$lng,$subregion,$demoname))
                            continue;
                        echo"
                        <div class=\"card text-center data\">
                              <div class=\"card-header\">
                                $name
                              </div>
                              <div class=\"card-body\">
                                <h5 class=\"card-title last\" style='color=#08526D'>Capital : $capital</h5>
                                <div class='row'>
                                    <div class='col-lg-4'>
                                        <h5>Population : $population M</h5>
                                        <h5>Area : $area KM</h5>
                                        <h5>Region : $region</h5>     
                                        <h5>SubRegion : $subregion</h5>                              
                                    </div>
                                    <div class='col-lg-4'>
                                         <h5>Demo Name : $demoname</h5>
                                         <h5>Language : $lang</h5>
                                         <h5>Currency : $currency</h5>                                  
                                    </div>
                                    <div class='col-lg-4'>
                                        <h5>Time Zone : $timezone</h5>
                                         <h5>Latitude : $lat</h5>
                                         <h5>Langtitude : $lng</h5>                                  
                                    </div>
                                </div>
                        
                                <h5 class=\"card-text last\">Borders : $borders[0], $borders[1]</h5>
                                <a href=\"index.php\" class=\"btn btn-primary\">Go Back</a>
                              </div>
                              <div class=\"card-footer text-muted\">
                                $nativename
                              </div>
                            </div>
                    ";
                    }
                }
                ?>
            </div>
        </div>
    </section>


    <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>


