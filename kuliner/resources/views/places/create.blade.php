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
                <textarea name="description" id=""  rows="3" value="{{old('description')}} " class="form-control  @error('description') is-invalid @enderror"></textarea>
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
                        <option value="{{ $subDistrict->id}}">{{$subDistrict->name}}</option>
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

            <div class="form-group mt-2">
                <div class="row">
                    <div class="col-md-6 col-sm-12">

                        <div class="form-group mt-2">
                            <label for="">Latitude</label>
                            <input type="text" name="latitude" placeholder="latitude" value="{{ old('latitude')}}" class="form-control @error('latitude') is-invalid @enderror">
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
                            <input type="text" name="longitude" placeholder="longitude" value="{{ old('longitude')}}" class="form-control @error('longitude') is-invalid @enderror">
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
</x-templates.default>
