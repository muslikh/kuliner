<x-templates.default>
    <x-slot name='title'>Perbarui Tempat Kuliner</x-slot>

    <form action="{{route('place.store')}}" class="card" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header"> Tambah Data Tempat Kuliner</div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" placeholder="Nama Tempat Kuliner" value="{{ old('name') ?? $place->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Deskripsi</label>
                <textarea name="description" id=""  rows="3" class="form-control  @error('description') is-invalid @enderror"> {{old('description') ?? $place->description }} </textarea>
                @error('description')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Kecamatan</label>
                <select name="sub_district_id" id="" class="form-control   @error('sub_district_id') is-invalid @enderror"">
                    @foreach ($subDistricts as $subDistrict)
                        <option value="{{ $subDistrict->id}}" @if($subDistrict->id == $place->sub_district_id)
                            selected @endif >{{$subDistrict->name}}</option>
                    @endforeach
                </select>
                @error('sub_district_id')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Alamat</label>
                <input type="text" name="address" placeholder="Alamat Tempat Kuliner" value="{{ old('address') ?? $place->address }}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Telepon</label>
                <input type="text" name="phone" placeholder="No Telpone" value="{{ old('phone') ?? $place->phone }}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Foto</label>
                <input type="file" name="image" value="{{ old('image') ?? $place->image}}" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <div class="form-group mt-2">
                            <label for="">Latitude</label>
                            <input type="text" name="latitude" readonly id="latitude" placeholder="latitude" value="{{ old('latitude') ?? $place->latitude}}" class="form-control @error('latitude') is-invalid @enderror">
                            @error('latitude')
                                <span class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">

                        <div class="form-group mt-2">
                            <label for="">Logitude</label>
                            <input type="text" readonly name="longitude" id="longitude" placeholder="longitude" value="{{ old('longitude') ?? $place->longitude}}" class="form-control @error('longitude') is-invalid @enderror">
                            @error('longitude')
                                <span class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Simpan" class="btn btn-primary float-right">
        </div>
    </form>

    @push('extra-styles')

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>

        <style>
            #map { height: 500px; }
        </style>
    @endpush

    @push('extra-scripts')
         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

        <script>
            var map = L.map('map').fitWorld();

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoibXVzbGlraCIsImEiOiJja2s3bHV1NHcwZjEwMnZwMmNxbzRrNHQ5In0.7-C0ZFBUsEmAkyWGfS1cPw'
            }).addTo(map);

            function onLocationFound(e) {
                var radius = e.accuracy;

                $('#latitude').val(e.latlng.lat)
                $('#longitude').val(e.latlng.lng)

               var locationMarker = L.marker(e.latlng,{draggable: 'true'}).addTo(map);
                    // .bindPopup("You are within " + radius + " meters from this point").openPopup();

                // L.circle(e.latlng, radius).addTo(map);
                locationMarker.on('dragend', function( event) {
                    var marker = event.target;
                    var position = marker.getLatLng();

                    marker.setLatLng(position, {draggable: 'true'}).update()

                    $('#latitude').val(position.lat)
                    $('#longitude').val(position.lng)

                });
            }
            function onLocationError(e) {
                alert(e.message);
            }

            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);

            map.locate({setView: true, maxZoom: 16});
            // var marker = L.marker([51.5, -0.09]).addTo(map);
        </script>
    @endpush
</x-templates.default>
