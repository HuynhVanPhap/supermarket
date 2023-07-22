<script>
    const orderStatus =  @json($orderStatus, JSON_PRETTY_PRINT);

    const pieData  = {
        datasets: [{
            data: Object.values(JSON.parse(orderStatus)),
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            "{{ __('Pending') }}",
            "{{ __('Processing') }}",
            "{{ __('Shipped') }}",
            "{{ __('Received') }}",
            "{{ __('Paymented') }}",
        ]
    }

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')

    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: {
            maintainAspectRatio : false,
            responsive : true,
        }
    })

    const revenue = @json($revenue, JSON_PRETTY_PRINT);

    const chartData = {
        labels  :  [
            "{{ __('January') }}",
            "{{ __('February') }}",
            "{{ __('March') }}",
            "{{ __('April') }}",
            "{{ __('May') }}",
            "{{ __('June') }}",
            "{{ __('July') }}",
            "{{ __('August') }}",
            "{{ __('September') }}",
            "{{ __('October') }}",
            "{{ __('November') }}",
            "{{ __('December') }}",
        ],
        datasets: [
            {
                label               : "{{ __('Revenue') }}",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : Object.values(JSON.parse(revenue))
            },
        ]
    }

    const barChartCanvas = $('#barChart').get(0).getContext('2d');
    const barChartData = $.extend(true, {}, chartData);

    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
        }
    })
</script>
