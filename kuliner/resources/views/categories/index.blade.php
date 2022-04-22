<x-templates.default>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('category.create')}}" class="btn btn-primary">
                    <h1 class="card-title">Data Kategori</h1>
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
            </script>
    @endpush

    <x-slot name="title"> Data Kategori</x-slot>
</x-templates.default>
