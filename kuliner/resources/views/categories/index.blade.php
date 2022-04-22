<x-templates.default>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('category.create')}}" class="btn btn-primary">
                    <h1 class="card-title">Tambah Kategori</h1>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    </table>
                </div>
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
                    ajax: '{!! route('category.index') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'slug', name: 'slug' },
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
                url: 'category/' + id,
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

    <x-slot name="title"> Data Kategori</x-slot>
</x-templates.default>
