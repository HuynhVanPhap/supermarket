<script>
    $(".btn-remove").on('click', function (e) {
        e.preventDefault();

        const deleteForm = $(this).parent();

        $(".btn-agree").on('click', function (e) {
            deleteForm.submit();
        });
    });

    $(".btn-destroy").on('click', function (e) {
        e.preventDefault();

        const destroyForm = $(this).parent();

        $(".btn-agree").on('click', function (e) {
            destroyForm.submit();
        });
    });

    $(".btn-restore").on('click', function (e) {
        e.preventDefault();

        $(".btn-agree").on('click', function (e) {
            // Trigger href without click event
            window.location = $('.btn-restore').attr('href');

            // # Or but this will create new tab
            // window.open($('.btn-restore').attr('href'));
        });
    });

    $(".display-status").on("click", function(e) {
        const display = (this.checked) ? 1 : 0;
        const id = parseInt(this.dataset.idValue);
        changeDisplayStatus(
            display,
            id,
            "{{ route('admin.category.change.display.status') }}"
        );
    });

    $(".display-status-root-category").on("click", function(e) {
        const display = (this.checked) ? 1 : 0;
        const id = parseInt(this.dataset.idValue);

        changeDisplayStatus(
            display,
            id,
            "{{ route('admin.root-category.change.display.status') }}"
        );
    });

    $(".display-status-product").on("click", function(e) {
        const display = (this.checked) ? 1 : 0;
        const id = parseInt(this.dataset.idValue);
        changeDisplayStatus(
            display,
            id,
            "{{ route('admin.product.change.display.status') }}"
        );
    });

    function changeDisplayStatus(display, id, route)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                "_method": "PUT"
            },
            type: 'POST',
            dataType: 'json',
            cache: false,
            url: route,
            data: {
                id: id,
                displayStatus: display
            },
            success: function (res) {
                switch (res) {
                    case parseInt("{{ config('constraint.status.success') }}"):
                        toastr.success("{{ __('Change display status success') }}");
                        break;
                    case parseInt("{{ config('constraint.status.fail') }}"):
                        toastr.error("{{ __('Change display status fail') }}");
                        break;
                    default:
                        toastr.warning("{{ __('Something went wrong') }}");
                        break;
                }
            },
            error: function (error) {
                console.log(error);
                toastr.error("{{ __('Change display status fail') }}");
            }
        });
    }
</script>
