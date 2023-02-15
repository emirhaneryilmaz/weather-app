<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hava Durumu </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid px-1 px-sm-3 py-5 mx-auto" style="height:1000px">
    <div class="row d-flex justify-content-center">
        <div class="row card0">
            <div class="card1 col-lg-8 col-md-7">
                <div class="text-center">
                 
               
                
                <img class="image mt-5" src="{{$img}}" style="width: 250px; height: 250px;">
                    
              
                <h1 class="mt-3 mb-0 text-uppercase large-font mr-3">{{$weather_data['cityName']}}</h1>
                    </div>
                    
                    <h2 class="large-font mr-3">{{$weather_data['temp']}} &#176;C</h2>
                    <div class="row px-3">
                        <p class="text">Weather: {{$weather_data['weather']}}</p>
                        

                    </div>
                    <div class="row px-3">
                        <p class="text">Wind: {{$weather_data['windspeed']}}km/h</p>
                    </div>
                    <div class="row px-3">
                        <p class="text">Time: {{$weather_data2['time'][0]}}</p>
                    </div>
                </div>
                <div class="card1 col-lg-3 col-md-7">
                 <div class="container">
                     <div class="row">
                         <div class="col">
                        

                         <div class="row">
                             <img class="image mt-5" src="{{$img1}}" style="width: 65px; height: 65px;">

                         </div>
                         <div class="row">
                            Temperature : {{$weather_data2['temp'][1]}} &#176;C 
                         </div>
                            <div class="row">
                            Weather: {{$weather_data2['weather'][1]}}
                            </div>
                            <div class="row">
                            Wind: {{$weather_data2['windspeed'][1]}}km/h
                            </div>
                            <div class="row">
                            Time: {{$weather_data2['time'][1]}}
                            </div>

                         </div>
                     </div>
                     <br>
                     <div class="row">
                         <div class="col">

                         <div class="row">
                             <img class="image mt-5" src="{{$img2}}" style="width: 65px; height: 65px;">

                         </div>
                         <div class="row">
                            Temperature : {{$weather_data2['temp'][2]}} &#176;C 
                         </div>
                            <div class="row">
                            Weather: {{$weather_data2['weather'][2]}}
                            </div>
                            <div class="row">
                            Wind: {{$weather_data2['windspeed'][2]}}km/h
                            </div>
                            <div class="row">
                            Time: {{$weather_data2['time'][2]}}
                            </div>
                         </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col">

                         <div class="row">
                             <img class="image mt-5" src="{{$img3}}" style="width: 65px; height: 65px;">

                         </div>
                       <div class="row">
                            Temperature : {{$weather_data2['temp'][3]}} &#176;C 
                         </div>
                            <div class="row">
                            Weather: {{$weather_data2['weather'][3]}}
                            </div>
                            <div class="row">
                            Wind: {{$weather_data2['windspeed'][3]}}km/h
                            </div>
                            <div class="row">
                            Time: {{$weather_data2['time'][3]}}
                            </div>
                      </div>
                    </div>
                </div>
            <div>
            
              </div>
             </div>
            </div>
         
        </div>
        
    </div>
</div>


<style>
  body {
    color: #fff;
    overflow-x: hidden;
    height: 100%;
    background-image: linear-gradient(#81D4FA, #2196F3);
    background-repeat: no-repeat;
}

.card0 {
    width: 94%;
}

.card1 {
    background-image: linear-gradient(#2196F3, #81D4FA);
    padding: 30px 20px 30px 50px;
}

.image {
    width: 300px;
    height: 300px;
}

.large-font {
    font-size: 70px;
    font-family: Arial;
}

.fa-sun-o {
    font-size: 22px;
}

.card2 {
    background-color: #607D8B;
    padding: 0px 0px 40px 40px;
}

input {
    background-color: #607D8B;
    padding: 24px 0px 12px 0px !important;
    width: 80%;
    box-sizing: border-box;
    border: none !important;
    border-bottom: 1px solid #CFD8DC !important;
    font-size: 16px !important;
    color: #fff !important;
}

input:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border-bottom: 1px solid #fff !important;
    outline-width: 0;
    font-weight: 400;
}

::placeholder {
    color: #B0BEC5 !important;
    opacity: 1;
}

:-ms-input-placeholder {
    color: #B0BEC5 !important;
}

::-ms-input-placeholder {
    color: #B0BEC5 !important;
}

.fa-search {
    color: #607D8B;
    background-color: #E1F5FE;
    font-size: 20px;
    padding: 20px;
    width: 20%;
    cursor: pointer;
}

.light-text {
    color: #B0BEC5;
}

.suggestion:hover {
    color: #fff;
    cursor: pointer;
}

.line {
    height: 1px;
    background-color: #B0BEC5;
}

@media screen and (max-width: 500px) {
    .card1 {
        padding-left: 26px;
    }
}
</style>

<script>
  
</script>
</body>
</html>