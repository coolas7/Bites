function myMap() {
   var LatLng = {lat: 56.024242, lng: 21.634659};
   var map=new google.maps.Map(document.getElementById("googleMap"), {
   	zoom: 15,
   	center: LatLng
   });
   
var marker = new google.maps.Marker({
                position: LatLng,
                map: map,                          
  
             });
}