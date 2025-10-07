<style>
    #map { 
        height: 250px; 
        }

</style>

<div id="map"></div>
<script>
    var lokasi = "<?php echo e($presensi->lokasi_in); ?>";
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];
    var map = L.map('map').setView([latitude, longitude], 18);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker([latitude, longitude]).addTo(map);
    var circle = L.circle([-1.655859685261026, 103.61294300313445], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 60
        }).addTo(map);

var popup = L.popup()
    .setLatLng([latitude, longitude])
    .setContent("<?php echo e($presensi->nama_lengkap); ?>")
    .openOn(map);

</script><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/showmap.blade.php ENDPATH**/ ?>