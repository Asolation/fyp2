@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Simulations') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.simulations.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">{{ __('New simulation') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-simulation" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>No</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Objective') }}</th>
                            <th>{{ __('Duration') }}</th>
                            <th>{{ __('Complexity Level') }}</th>
                            <th>{{ __('Points') }}</th>
                            <th>{{ __('Available') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($simulations as $simulation)
                        <tr data-entry-id="{{ $simulation->simulationID }}">
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $simulation->title }}</td>
                            <td>{{ $simulation->description }}</td>
                            <td>{{ $simulation->objective }}</td>
                            <td>{{ $simulation->duration }}</td>
                            <td>{{ $simulation->complexityLevel }}</td>
                            <td>{{ $simulation->points }}</td>
                            <td>{{ $simulation->available == 1 ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.simulations.edit', $simulation->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.simulations.destroy', $simulation->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">{{ __('Data Empty') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->

</div>
@endsection


@push('script-alt')
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        let deleteButtonTrans = 'delete selected'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.simulation.mass_destroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });
                if (ids.length === 0) {
                    alert('zero selected')
                    return
                }
                if (confirm('are you sure ?')) {
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }})
                        .done(function () { location.reload() })
                }
            }
        }
        dtButtons.push(deleteButton)
        $.extend(true, $.fn.dataTable.defaults, {
            order: [[1, 'asc']],
            pageLength: 50,
        });
        $('.datatable-simulation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endpush
