<script>
    $(".create-form").on('click', function (e) {
        e.preventDefault();

        toastr.info("{{ __('Form ready to download') }}");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'GET',
            cache: false,
            data: {},
            url: "{{ route('admin.products.export') }}",
            success: function (res) {
                // const url = window.URL.createObjectURL(new Blob([res]));
                // const link = document.createElement('a');
                // link.href = url;
                // link.setAttribute('download', 'bieu-mau-them-moi-san-pham.xlsx');
                // document.body.appendChild(link);
                // link.click();
                // document.body.removeChild(link);

                toastr.success(__('Create form success'));
            },
            error: function (error) {
                toastr.error("{{ __('Something went wrong') }}");
            }
        });
    });

    $(".download-form").on('click', function (e) {
        e.preventDefault();

        toastr.info("{{ __('Form ready to download') }}");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'GET',
            // responseType: 'blob', // important
            cache: false,
            data: {},
            url: "{{ route('admin.download.form.product') }}",
            success: function (res) {
                window.open(res, '_blank');
                // const url = window.URL.createObjectURL(new Blob([res], 'application/vnd.ms-excel'));
                // const link = document.createElement('a');
                // link.href = url;
                // link.setAttribute('download', 'bieu-mau-them-moi-san-pham.xlsx');
                // document.body.appendChild(link);
                // link.click();
                // document.body.removeChild(link);

                toastr.success("{{ __('Download success') }}");
            },
            error: function (error) {
                toastr.error("{{ __('Something went wrong') }}");
            }
        });
    });

    $("#import-form").on('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(); // Tạo một object Form để tao data Form
        const file = $("input[name='upload']").prop('files'); // Get data of input file type with JQuery
        formData.append("upload", file[0]); // Thêm input import vào formData

        toastr.info("{{ __('Uploading') }}");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            url: "{{ route('admin.products.import') }}",
            data: formData, // Chỉ được gửi File thông qua new FormData
            success: function (res) {
                e.target.reset(); // Reset lại Form
                toastr.success(res);
            },
            error: function (error) {
                console.log(error);
                e.target.reset(); // Reset lại Form
                toastr.error(error.responseJSON.message);
            }
        });
    });
</script>
