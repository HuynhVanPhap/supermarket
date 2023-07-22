<div class="row">
    <div class="col-12">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h3 class="card-title">
                            {{ __('Order') }}
                        </h3>
                    </div>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1"
                                class="table table-bordered table-striped dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>{{ __('Code') }}</th>
                                        <th>{{ __("Recipient") }}</th>
                                        <th>{{ __('Contact Info') }}</th>
                                        <th>{{ __('More Info') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!blank($orders))
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $order->code }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td class="more-infor">
                                                    <b>{{ __('Email') }} :</b> {{ $order->email }} <br>
                                                    <b>{{ __('Phone') }} :</b> {{ $order->phone }} <br>
                                                    <b>{{ __('Address') }} :</b> {{ $order->address }} <br>
                                                </td>
                                                <td class="more-infor">
                                                    <b>{{ __('Date Order') }} :</b> {{ $order->created_at }} <br>
                                                    <b>{{ __('Date Receive') }} :</b> {{ $order->date_receive }} <br>
                                                    <b>{{ __('Date Payment') }} :</b> {{ $order->date_payment }} <br>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">{{ $order->status }}</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success" data-toggle="dropdown">
                                                            <i class="fas fa-list-alt"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('admin.orders.show', $order->id) }}">
                                                                <p class="text-info">{{ __('Detail', ['name' => __('Order')]) }}</p>
                                                            </a>
                                                            {{-- <a class="dropdown-item" href="#">Dropdown link</a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">{{ __('No data') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $orders->links('admin.components.pagination') !!}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
