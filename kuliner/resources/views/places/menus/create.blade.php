<x-templates.default>
    <x-slot name='title'>Tambah Tempat Kuliner</x-slot>

    <form action="{{route('place.store')}}" class="card" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header"> Tambah Data Tempat Kuliner</div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" placeholder="Nama Tempat Kuliner" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Deskripsi</label>
                <textarea name="description" id=""  rows="3" class="form-control  @error('description') is-invalid @enderror"> {{old('description') }} </textarea>
                @error('description')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Kecamatan</label>
                <select name="sub_district_id" id="" class="form-control   @error('sub_district_id') is-invalid @enderror"">
                 
                </select>
                @error('sub_district_id')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Alamat</label>
                <input type="text" name="address" placeholder="Alamat Tempat Kuliner" value="{{ old('address')}}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Telepon</label>
                <input type="text" name="phone" placeholder="No Terlp" value="{{ old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Foto</label>
                <input type="file" name="image" placeholder="No Terlp" value="{{ old('image')}}" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <span class="invalid-feedback">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" value="Simpan" class="btn btn-primary float-right">
        </div>
    </form>

    @push('extra-styles')

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    @endpush

    @push('extra-scripts')
         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

        </script>
    @endpush
</x-templates.default>
