$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var dom = document.getElementById('liveToast')
if(dom) {
    var toast = new bootstrap.Toast(dom);
    toast.show();
}

Fancybox.bind("[data-fancybox]", {
    Image: {
        zoom: true,
    },
});