<script>

function myAjax() {
    $.ajax({
        url: '/comments',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (comm) {
            var response = JSON.parse(comm)
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myAjax,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
}

</script>