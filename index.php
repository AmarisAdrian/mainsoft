<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    <title>Api</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  </head>
  <body background="https://free4kwallpapers.com/uploads/originals/2015/09/16/weather-live-wallpaper-icon.jpg">
    <div class="container">
      <style>
        #map { height: 500px; }
      </style>
      <br><br>
      <form name="FmrConsultaHumedad" id="FrmConsultaHumedad" method="POST" action="api.php">
        <div class="input-group mb-3">
            <select class="form-select"  id="ciudad" name="ciudad" required>
              <option selected>--Seleccione una ciudad --</option>
              <option id="ciudad" name="ciudad"  value="1">Miami</option>
              <option id="ciudad" name="ciudad"  value="2">Orlando</option>
              <option id="ciudad" name="ciudad"  value="3">New york</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-light btn-lg border border-light" id="btnBuscar">Buscar</button>         
          </div>
      </form>
      <button class="btn btn-warning btn-lg border border-warning" id="btnHistorial">Historial</button>
    </div>
      <br><br>
       <div id="map"></div>
       <div class="alert alert-warning d-none" id="info_humedad"> </div>
       <br><br>
       <div class="d-none" id="div_table"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="api.js"></script>
  </body>
</html>