
$(function() {
 $('#btnBuscar').on("click",function (e) {
    e.preventDefault();
    var btnenviar = $("#btnBuscar");
    $("#div_table").removeClass('d-block').addClass('d-none');
    $.ajax({
      type: $("#FrmConsultaHumedad").attr("method"),
      url: $("#FrmConsultaHumedad").attr("action"),
      dataType: "json",
      data: {"ciudad" : $("#ciudad").val()},
      beforeSend: function () {
        btnenviar.text("Buscando datos ...");
        btnenviar.attr("disabled", "disabled");
        btnenviar.append('<span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span>');
      },
      complete: function (data) {
        if(data.responseJSON.status  === "success"){
            btnenviar.text("Buscar");
            btnenviar.removeAttr("disabled");
            Map(data.responseJSON.data)
        } else if (data.responseJSON.status ==="error"){
            $("#info_humedad").removeClass('alert alert-warning d-none').addClass('alert alert-warning d-block')
            .text(data.responseJSON.msj);
            btnenviar.text("Buscar");
            btnenviar.removeAttr("disabled");
          }    
      },
      fail: function (jqXHR, textStatus, errorThrown) {
        alert("\nError: " + jqXHR.status + ' \nMensaje ' + textStatus + ' \nestado ' + errorThrown);
      },
    });
 return false;
 });
});

let  Map = (datos) =>{
  var container = L.DomUtil.get('map');
    if(container != null){
      container._leaflet_id = null;
    }
  $("#info_humedad").removeClass('alert alert-warning d-none').addClass('alert alert-warning d-block').text("La humedad es de : " + datos.main.humidity);
  var  map =  L.map('map').setView([datos.coord.lat, datos.coord.lon], 13);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 12,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  $("#map").append(map);
}

$('#btnHistorial').click(function (e) {
  e.preventDefault();
  $("#div_table").load("historial.php",function(){ 
    $('#div_tabla_historial').html({show:true}); 
      $("#div_table").removeClass('d-none').addClass('d-block');
  }); 

});