<x-templates.default>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Data Kecamatan</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    </table>
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
                    ajax: '{!! route('subdistrict.index') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'slug', name: 'slug' },
                    ]
                });
            });
            </script>
    @endpush


    <x-slot name="title"> Data Kecamatan</x-slot>
</x-templates.default>

