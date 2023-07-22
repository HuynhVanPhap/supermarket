@extends('admin.master')

@section('title')
    {{ __('Detail', ['name' => __('Order')]) }}
@endsection

@section('content')
{{ Breadcrumbs::render('orders.show', $order) }}

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6" id="info-user">
                <h1>{{ __('Recipient') }} : {{ $order->name }}</h1>
                <h5>{{ __('Phone') }} : {{ $order->phone }}</h5>
                <h5>{{ __('Email') }} : {{ $order->email }}</h5>
                <h5>{{ __('Address') }} : {{ $order->address }}</h5>
                <h5>{{ __('Status') }} :
                    <span class="text-success">{{ $order->status }}</span>
                    @can('manager')
                        @if ((int) $order->getRawOriginal('status') != config('constraint.status.order.paymented'))
                            <span><a href="#" id="order-status" class="btn btn-warning btn-sm">{{ __('Confirm') }}</a></span>
                        @endif
                    @endcan
                </h5>
                <h5>{{ __('Date Order'). ' : ' .$order->created_at }}</h5>
                <h5>{{ __('Date Receive'). ' : ' .$order->date_receive }}</h5>
                <h5>{{ __('Date Payment'). ' : ' .$order->date_payment }}</h5>

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <h3 class="card-title">{{ __('Products') }}</h3>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1"
                                        class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __("Product") }}</th>
                                                <th>{{ __('Quantity') }}</th>
                                                <th>{{ __('Payment') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!blank($order))
                                                @foreach ($order->detailOrders as $key => $item)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td><img src="{{ ($item->product->image) ? asset(config('constraint.link.image.products.avatar').$item->product->image) : '' }}"
                                                            alt="image">
                                                        </td>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td style="text-align: center;"><span class="text-danger">{{ $item->quantity }}</span></td>
                                                        <td style="text-align: center;"><span class="text-primary">{{ $item->payment }} vnđ</span></td>
                                                    </tr>
                                                @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td style="text-align: center;"><h3 class="text-danger"> {{ $total }} vnđ</h3></td>
                                                    </tr>
                                            @else
                                                <tr>
                                                    <td colspan="7">{{ __('table.no_data') }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-default">{{ __('Back') }}</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

@section('script')
<script>
$('#order-status').on('click', function (e) {
    if (!confirm("{{ __('Confirm Order Status') }}")) {
        return false;
    }

    e.preventDefault();

    $.ajax({
        type: 'GET',
        dataType: 'json',
        cache: false,
        url: "{{ route('admin.orders.confirm', ['code' => $order->code]) }}",

        success: function (res) {
            // $("#info-user").empty();
            // $("#info-user").append(res.html);

            location.reload();
            toastr.success("{{ __('Change display status success') }}");
        },

        error: function (error) {
            toastr.error("{{ __('Change display status fail') }}");
        }
    });
});
</script>
@endsection
