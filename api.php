<?php
if(isset($_POST["ciudad"]) && !empty($_POST["ciudad"]) && !is_null($_POST["ciudad"])){
         $url = "";
         $fecha = date('m-d-Y, h:i:s A');
         switch ($_POST["ciudad"]){
         case 1:
           $city = "Miami";
           $url = "http://api.openweathermap.org/data/2.5/weather?q=Miami&APPID=f6e4ff81248c245437ceb70c553f5173&units=metric";
           break;
         case 2:
          $city = "Orlando";
          $url = "http://api.openweathermap.org/data/2.5/weather?q=Orlando&APPID=f6e4ff81248c245437ceb70c553f5173&units=metric";
          break;
         case 3:
          $city = "New york";
          $url =  "http://api.openweathermap.org/data/2.5/weather?q=new york&APPID=f6e4ff81248c245437ceb70c553f5173&units=metric";
          break;
         default:
            $city = "Opcion no valida";
            echo json_encode(["msj" =>" Opcion no valida" , "status" => "error"]);
            break;
       }
       if(!empty($url)){
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL,  $url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_HTTPGET,true);
          curl_setopt($curl, CURLOPT_HEADER, 0);
          curl_setopt($curl, CURLOPT_POST, false);
          curl_setopt($curl, CURLOPT_COOKIEJAR , 'cookie_historial.txt'); 
          echo  json_encode(["status"=>"success" ,"data" => json_decode(curl_exec($curl))]); 
          curl_close($curl);
       }
       if (file_exists("historial.txt")){
         $file = fopen("historial.txt", "a");
         fwrite($file, "Ciudad consultada : ".$city . PHP_EOL);
         fwrite($file, "Url request : ".$url . PHP_EOL);
         fwrite($file, "Fecha : ".$fecha . PHP_EOL);
         fclose($file);
      } else{
         $file = fopen("historial.txt", "w");
         fwrite($file, "Ciudad consultada : ".$city . PHP_EOL);
         fwrite($file, "Url request : ".$url . PHP_EOL);
         fwrite($file, "Fecha : ".$fecha . PHP_EOL);
         fclose($file);
      }
}else{
  echo json_encode(["response" => "Error de validacion"]); 
}
