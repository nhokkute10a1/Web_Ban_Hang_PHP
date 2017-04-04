
@extends('user.master')
@section('content')

<style>
    #map {
        margin-top:30px;
        width:100%;
        height:600px;    
    }

</style>
<h2 style="text-align:center;color:black">Chỉ Đường</h2>
<div style="background-color:black"><SPAN style="background-color:white;color:greenyellow">WEB BÁN THIẾT BỊ ĐIỆN TỬ</SPAN></div>
<div style="width: 50px,height:auto;" id="map"></div>
<script>
    var map;
    function initMap() {
        //Tọa độ địa điểm
        var latlng = new google.maps.LatLng(10.802145, 106.714965);

        map = new google.maps.Map(document.getElementById('map'), {
            center:latlng,zoom: 8
        });
      
        // Thêm địa điểm cố định
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "Ñïñë Ƭäïlëd ƒöxˆˆ Shopper" //Tên hiển thị khi đưa chuột vào địa điểm

        });
        // tiếng hàng kiểm tra và lấy vị trí của bạn
        var infoWindow = new google.maps.InfoWindow({ map: map });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Vị trí của bạn');
                map.setCenter(pos);

                var directionsDisplay = new google.maps.DirectionsRenderer({
                    map: map
                });
                var request = {
                    destination: latlng, // Điểm đến là vị trí cửa hàng
                    origin: pos, // Điểm bắt đầu là vị trí hiện tại của bạn
                    travelMode: google.maps.TravelMode.DRIVING
                };
                var directionsService = new google.maps.DirectionsService();
                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        // Display the route on the map.
                        directionsDisplay.setDirections(response);
                    }
                });
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }


    }

    // Lỗi nếu như GPS không được bật
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoGQcWyi-L8CRjV55CF1AIhl8ALVVTVlM&callback=initMap"
        async defer></script>
<div><a href="{!! url('/') !!}" class="active"><h4 style="color:green">Quay Lại Trang Chủ</h4></a></div>
@endsection