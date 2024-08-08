<x-layout>
    <style>
        #map { height: 350px; }
    </style>
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([8.0676, 123.7252], 15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
</x-layout>