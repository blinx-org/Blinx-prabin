<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript">
    function initialize() {
        var address=document.getElementById('my-address').style.height;
        document.getElementById('helpType').style.height=address;
        var address = (document.getElementById('my-address'));
        var autocomplete = new google.maps.places.Autocomplete(address);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
    function doSearch() {
        geocoder = new google.maps.Geocoder();
        var address = document.getElementById("my-address").value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $('[name="lat"]').val(results[0].geometry.location.lat());
                $('[name="long"]').val(results[0].geometry.location.lng());
                $("#frmSearch").submit();
            } else {
                //alert("Geocode was not successful for the following reason: " + status);
                $("#frmSearch").submit();
            }
        });
    };
    function onOptionChange() {
        $('[name="action"]').val("get_app_online");
    };
    google.maps.event.addDomListener(window, 'load', initialize);
</script>