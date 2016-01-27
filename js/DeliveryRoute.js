function initialize() {
    var currentLocationMarker;
    var currentLocationCoords;
    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(26.7100, -80.0500),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
    var geocoder = new google.maps.Geocoder();
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('googleMapDirections'));
    
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            currentLocationCoords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            //console.log("position curCoords:" + currentLocationCoords.lat() + currentLocationCoords.lng());
            //console.log("position curCoords:" + currentLocationCoords.lat() + currentLocationCoords.lng());
            currentLocationMarker = new google.maps.Marker({
                position: currentLocationCoords,
                map: map,
                title:'You are here!'
            });
        });      
    }
    
    document.getElementById('clientSubmit').addEventListener('click',function() {
        addClientsToMap(geocoder,map, directionsDisplay, directionsService, currentLocationMarker);
    });
    //google.maps.event.addDomListener(window, 'load', initialize); 
}
 
function addClientsToMap(geocoder, directionsMap, directionsDisplay,directionsService, currentLocationMarker) {
    var selectedClientAddresses = $('input:checkbox[name=client]:checked').map(function () {
        return this.value;
    }).get();
    
    $('div#communitySubmitButtonRow').html("<input type='submit' id='communitySubmit' value='Submit' class='btn btn-success btn-lg row-centered btn-block disabled'>");
    $('div#clientSubmitButtonRow').html("<input type='submit' id='clientSubmit' value='Submit' class='btn btn-success btn-lg row-centered btn-block disabled'>");
    //console.log(selectedClientAddresses);
    //console.log(selectedClientAddresses.length);

    
    var waypts = [];
    var userID = $('input#userID').val();
    //console.log(userID);
    var userName = $('input#userName').val();
    //console.log(userName);
    for(var i = 0; i < selectedClientAddresses.length; i++){
        $.post('../ajax/createDelivery.php',{ clientAddress:selectedClientAddresses[i], userID:userID, userName:userName },function(data){
            //$('div#clientChecklist').html(data);
            //alert(data);
            console.log(data);
        });
        //console.log(selectedClientAddresses[i]);
        waypts.push({
            location: selectedClientAddresses[i],
            stopover: true
        });
    
       // geocoder.geocode({'address': selectedClientAddresses[i]}, function(results, status){
            
            
            //if(status===google.maps.GeocoderStatus.OK){
            //    var nuMarker = new google.maps.Marker({
            //        map: directionsMap,
            //        position: results[0].geometry.location
            //    });
            //}
            //else{
            //    console.log("Could not geocode address:" + selectedClientAddresses[i]);
            //}
            
        //});
    }
    
    directionsService.route({
        origin: currentLocationMarker.getPosition(),
        destination: currentLocationMarker.getPosition(),
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status){
            if(status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);   
            }
            
            else{
                console.log('Directions request failed due to ' + status);
            }
    });
    
}    





$('input#communitySubmit').on('click',function(){
    var community = $('select#communitySelect option:selected').val();
    if(community !=''){
        $.post('../ajax/deliveriesToCommunity.php',{communityName:community},function(data){
            $('div#clientChecklist').html(data);
            //alert(data);
        });
        //$('div#clientSubmitButtonRow').html("<input type='submit' id='clientSubmit' value='Submit' class='btn btn-primary btn-lg row-centered btn-block enabled'>");
    }
    
});

//$('input#clientSubmit').on('click',function(){
//    var selectedClientAddresses = $('input:checkbox[name=client]:checked').map(function () {
//    return this.value;
//    }).get();
//    
//    for(var client in selectedClientAddresses){
//        var currentClientAddressMarker = new 
//    }
//    
//    //console.log(selectedClientAddresses);
//});