<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Pagination\Paginator;
use DB;
use GuzzleHttp\Client;

      
class WeatherController extends Controller
{
 
 public function inputPage(Request $request){
    return view('havaDurumu');
 }

 public function getData(Request $request){

       // Sınıfımızı başlattık
       $client = new Client();

       // adresimizi tanımladık
       // $adres = "https://jsonplaceholder.typicode.com/users";


       $sehir = @$_GET['sehir'];
         $adres = "https://api.openweathermap.org/data/2.5/weather?q=$sehir&appid=a2fbae7ba75f1c213f8ac1045bc6d6cd&units=metric";
        // saatlik url  $adres = "https://api.openweathermap.org/data/2.5/forecast?lat=44.34&lon=10.99&appid=a2fbae7ba75f1c213f8ac1045bc6d6cd&units=metric";
        // adresimize get isteğimizi atıp gelen sonucu cevap değişkenine atadık
        $cevap = $client->get($adres);

        // ve cevabımızı ekrana yazdırdık
        $response =  $cevap->getBody()->getContents();
        //   dd($response);
        $result = json_decode($response, true);
        //         dd($result);
        // foreach ($result as $key => $user) {
        //     print_r($user['main']);
        // }

        //       dd($result[3]['temp']);

    $weather_data = [
        'cityName' => $sehir,
        'weather' => $result['weather'][0]['main'],
        'temp' => $result['main']['temp'],
        'windspeed' => $result['wind']['speed'],
        'time' => null
    ];

    // if($weather_data['weather']=='Clouds')
    //     $png = "http://openweathermap.org/img/wn/02d@2x.png";
    // else if($weather_data['weather']=='Clear')
    //     $png = "http://openweathermap.org/img/wn/01d@2x.png";
    // else if($weather_data['weather']=='Snow')
    //     $png = "http://openweathermap.org/img/wn/13d@2x.png";
    // else if($weather_data['weather']=='Rain' || $weather_data['weather']=='Drizzle' )
    //     $png = "http://openweathermap.org/img/wn/09d@2x.png";
    // else if($weather_data['weather']=='Thunderstorm')
    //     $png = "http://openweathermap.org/img/wn/11d@2x.png";
    // else
    //     $png = "http://openweathermap.org/img/wn/50d@2x.png";
    

    $imgs = [
        'Clouds' => "http://openweathermap.org/img/wn/02d@2x.png",
        'Clear' => "http://openweathermap.org/img/wn/01d@2x.png",
        'Snow' => "http://openweathermap.org/img/wn/13d@2x.png",
        'Rain' => "http://openweathermap.org/img/wn/09d@2x.png",
        'Drizzle' => "http://openweathermap.org/img/wn/09d@2x.png",
        'Thunderstorm' => "http://openweathermap.org/img/wn/11d@2x.png",
        'Mist' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Smoke' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Haze' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Dust' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Fog' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Sand' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Ash' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Squall' => "http://openweathermap.org/img/wn/50d@2x.png",
        'Tornado' => "http://openweathermap.org/img/wn/50d@2x.png"
    ];

 // $img = $imgs[$weather_data['weather']];
    $img = isset($imgs[$weather_data['weather']]) ? $imgs[$weather_data['weather']] : "http://openweathermap.org/img/wn/50d@2x.png";

    // Curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/forecast?q=$sehir&cnt=8&appid=34c4cda7d39675633788410a53fda3c2&units=metric");
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response2 = curl_exec($curl);
    curl_close($curl);
    $response2 = json_decode($response2,true);
    //dd($response2);

    $weather_data2 = [
        'weather' => [],
        'temp' => [],
        'windspeed' => [],
        'time' => []
    ];


//dd($response2['list']);
    foreach ($response2['list'] as $key => $weather) {
        //dd($weather);

       if($key == 0) continue;

       array_push($weather_data2['weather'],$weather['weather'][0]['main']); 
       array_push($weather_data2['temp'],$weather['main']['temp']); 
       array_push($weather_data2['windspeed'],$weather['wind']['speed']); 
       array_push($weather_data2['time'],$weather['dt_txt']); 
    }
    
    
    /*for($i=0; $i<4; $i++){
    
       array_push($weather_data2['weather'],$response2['list'][$i]['weather'][0]['main']); 
       array_push($weather_data2['temp'],$response2['list'][$i]['main']['temp']); 
       array_push($weather_data2['windspeed'],$response2['list'][$i]['wind']['speed']); 
       array_push($weather_data2['time'],$response2['list'][$i]['dt_txt']); 

    }*/

   // dd($weather_data2['weather']);
    $img1 = $imgs[$weather_data2['weather'][1]];
    $img2 = $imgs[$weather_data2['weather'][2]];
    $img3 = $imgs[$weather_data2['weather'][3]];


    // if($weather_data2['weather'][1]=='Clouds')
    // $png1 = "http://openweathermap.org/img/wn/02d@2x.png";
    // else if($weather_data2['weather'][1]=='Clear')
    //     $png1 = "http://openweathermap.org/img/wn/01d@2x.png";
    // else if($weather_data2['weather'][1]=='Snow')
    //     $png1 = "http://openweathermap.org/img/wn/13d@2x.png";
    // else if($weather_data2['weather'][1]=='Rain' || $weather_data2['weather']=='Drizzle' )
    //     $png1 = "http://openweathermap.org/img/wn/09d@2x.png";
    // else if($weather_data2['weather'][1]=='Thunderstorm')
    //     $png1 = "http://openweathermap.org/img/wn/11d@2x.png";
    // else
    //     $png1 = "http://openweathermap.org/img/wn/50d@2x.png";

    // if($weather_data2['weather'][2]=='Clouds')
    // $png2 = "http://openweathermap.org/img/wn/02d@2x.png";
    // else if($weather_data2['weather'][2]=='Clear')
    //     $png2 = "http://openweathermap.org/img/wn/01d@2x.png";
    // else if($weather_data2['weather'][2]=='Snow')
    //     $png2 = "http://openweathermap.org/img/wn/13d@2x.png";
    // else if($weather_data2['weather'][2]=='Rain' || $weather_data2['weather']=='Drizzle' )
    //     $png2 = "http://openweathermap.org/img/wn/09d@2x.png";
    // else if($weather_data2['weather'][2]=='Thunderstorm')
    //     $png2 = "http://openweathermap.org/img/wn/11d@2x.png";
    // else
    //     $png2 = "http://openweathermap.org/img/wn/50d@2x.png";

    // if($weather_data2['weather'][3]=='Clouds')
    // $png3 = "http://openweathermap.org/img/wn/02d@2x.png";
    // else if($weather_data2['weather'][3]=='Clear')
    //     $png3 = "http://openweathermap.org/img/wn/01d@2x.png";
    // else if($weather_data2['weather'][3]=='Snow')
    //     $png3 = "http://openweathermap.org/img/wn/13d@2x.png";
    // else if($weather_data2['weather'][3]=='Rain' || $weather_data2['weather']=='Drizzle' )
    //     $png3 = "http://openweathermap.org/img/wn/09d@2x.png";
    // else if($weather_data2['weather'][3]=='Thunderstorm')
    //     $png3 = "http://openweathermap.org/img/wn/11d@2x.png";
    // else
    //     $png3 = "http://openweathermap.org/img/wn/50d@2x.png";

    

  //  dd($weather_data2['windspeed'][0],$weather_data['windspeed']);

        // foreach ($weather_data as $key => $user) {
        //     print_r($user);
        // }

        return view('havaDurumuSonuc',compact('weather_data','weather_data2','img','img1','img2','img3'));


    }  

    // function GetMetodu() { 

    //     $url = "https://api.openweathermap.org/data/2.5/forecast?lat=44.34&lon=10.99&appid=a2fbae7ba75f1c213f8ac1045bc6d6cd&units=metric";
    //     $ch = curl_init(); 
    //     curl_setopt($ch,CURLOPT_URL,$url); 
    //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    //  // curl_setopt($ch,CURLOPT_HEADER, false); 
        
    //     $output=curl_exec($ch); 
    //     curl_close($ch); 
    //     return $output; 

    // } 
}
