<script>
    $("input[name='price']").on('keyup', function (e) {
        // Make sure input value is number
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
        // numeric.set($(this).val());
        const money = parseInt($(this).val());
        $(this).val(formatMoney(money, 0, ',', '.'));
    });

    $("input[name='stock']").on('keyup', function (e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });

    $("input[name='discount_percent']").on('keyup', function (e) {
        const discount = $(this).val().replace(/[^0-9]/g, '');
        $(this).val((discount > 100) ? 100 : discount);
    });

    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign +
            (j ? i.substr(0, j) + thousands : '') +
            i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) +
            (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    };
</script>
