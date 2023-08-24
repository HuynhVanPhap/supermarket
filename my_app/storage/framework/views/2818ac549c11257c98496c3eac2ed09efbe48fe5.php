<script>
$('.value-plus').on('click', function () {
    var divUpd = $(this).parent().find('.value'),
        newVal = parseInt(divUpd.text(), 10) + 1;
    divUpd.text(newVal);
});

$('.value-minus').on('click', function () {
    var divUpd = $(this).parent().find('.value'),
        newVal = parseInt(divUpd.text(), 10) - 1;
    if (newVal >= 1) divUpd.text(newVal);
});

$(".add-to-cart").on('submit', function (event) {
    event.preventDefault();

    var form = [];
    for (let index = 0; index < ($(this).context.length - 1); index++) {
        form[$($(this).context[index]).attr('name')] = $($(this).context[index]).val();
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
        },
        type: 'POST',
        data: {
            id: form.id,
            name: form.name,
            slug: form.slug,
            url_image: form.url_image,
            add: form.add,
            price: form.price,
            price_discount: form.price_discount,
        },
        dataType: 'json',
        cache: false,
        url: "<?php echo e(route('shopping.cart')); ?>",
        success: function (res) {
            if (res > 0) {
                alert("<?php echo e(__('Add cart success')); ?>");

                addCart();
            }
        },
        error: function (error) {
            alert("<?php echo e(__('Something went wrong')); ?>");
        }
    });
});

$('#update-cart').on('click', function (e) {
    e.preventDefault();

    const cart = new Array();

    $(".amount-update").each(function () {
        cart[$(this).data('id-linked')] = $(this).text();
    });

    console.log(cart);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
        },
        type: 'POST',
        data: {
            ...cart
        },
        dataType: 'json',
        cache: false,
        url: "<?php echo e(route('shopping.update.cart')); ?>",
        success: function (res) {
            if (res > 0) {
                location.reload();
                alert("<?php echo e(__('Update success', ['name' => __('Cart')])); ?>");
            }
        },

        error: function (error) {
            alert("<?php echo e(__('Something went wrong')); ?>");
        }
    });
});

$('.remove-cart').on('click', function (e) {
    var slug = $(this).data('slug');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
        },
        type: 'POST',
        data: {
            slug: slug
        },
        dataType: 'json',
        cache: false,
        url: "<?php echo e(route('shopping.remove.cart')); ?>",
        success: function (res) {
            if (res > 0) {
                $('#'+slug).fadeOut('slow', function () {
                    $('#'+slug).remove();
                });

                $("#count-products").text($("#count-products").text() - 1);
            }
        },

        error: function (error) {
            alert("<?php echo e(__('Something went wrong')); ?>");
        }
    });
});
</script>
<?php /**PATH /var/www/html/my_app/resources/views/store/scripts/main.blade.php ENDPATH**/ ?>