<x-templates.default>
    <x-slot name="title">Data Tempat Kuliner</x-slot>
    <div class="card">
        <div class="card-header">
            <a href="{{route('place.create')}}" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="card body">

            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kecamatan</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                </table>
        </div>


        <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="modal-title">Hapus Data</div>
                  <div>Are you sure to delete it. ??</div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" data-id="0" id="confirmDelete" data-bs-dismiss="modal">Delete</button>
                </div>
              </div>
            </div>
        </div>


    </div>

    @push('extra-styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>
    @endpush

    @push('extra-scripts')
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>

        <script>
            $(function() {
                $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('place.index') !!}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable:false },
                        { data: 'place-menu', name: 'place-menu' },
                        { data: 'subDistrictName', name: 'subDistrictName' },
                        { data: 'description', name: 'description' },
                        { data: 'address', name: 'address' },
                        { data: 'phone', name: 'phone' },
                        { data: 'action', name: 'action' },
                    ]
                });
            });


            $('#dataTable').on('click','a#delete', function(e) {
                // console.log('tes')

                e.preventDefault()
                var id = $(this).data('id');
                $('#confirmDelete').attr('data-id',id);
                $('#modal-delete').modal('show');
            })

            $('#confirmDelete').click(function(e) {

                e.preventDefault()
                var id = $(this).data('id');
                $.ajax({
                type: 'DELETE',
                url: 'place/' + id,
                data: {
                    '_token': "{{csrf_token()}}"
                },
                success: function(response) {
                    console.log(response)
                    if(response.success){
                        window.location.href = ''
                    }
                },
            })
            })
            </script>
    @endpush

</x-templates.default>
