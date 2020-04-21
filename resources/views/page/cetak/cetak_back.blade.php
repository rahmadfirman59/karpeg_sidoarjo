<html>

<title>
</title>
<body style="margin: 0px;">
<script type="text/javascript" src="{{url('public/assets_new/js/JsBarcode.all.js') }}"></script>
<script type="text/javascript" src="{{url('public/assets_new/js/html2canvas.min.js') }}"></script>

<div id="kartubelakang" style="width: max-content;" >
    <input id="nip" type="hidden" value="{{$data}}">
    <input id="token" type="hidden" value="{{csrf_token()}}">
    <img src="{{asset('public/background/belakang.jpg')}}"
    style="width: 8.1cm;height: 12.7cm ;" alt="Cropped Image">
    <style>
    </style>
    <img id="qrCodeImage"  style="height: 5.5cm;width: 5.5cm;position: absolute;top: 35;left: 50;"/>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{url('public/assets_new/js/JsBarcode.all.js') }}"></script>
<script type="text/javascript" src="{{ url('public/assets_new/js/jquery.qrcode.js') }}"></script>
<script type="text/javascript" src="{{ url('public/assets_new/js/qrcode.js') }}"></script>
<script>
    $(document).ready(function(){
        var nip  = document.getElementById('nip').value;
        jQuery('#qrCodeImage').qrcode({ text:nip });
        var imgBar = document.createElement("img")
        imgBar.src = $('#qrCodeImage').attr('src');

        screenshot();
    });

    function screenshot(){
        html2canvas(document.getElementById('kartubelakang')).then(function(canvas) {
            var image = canvas.toDataURL('image/png')
            var nip  = document.getElementById('nip').value;
            var token  = document.getElementById('token').value;

            $.ajax({
                url: "{{url('/cetak_kartu/save_gambar_belakang/')}}",
                type: "post",
                data: { "_token":token,
                        "image":image,
                        "nip":nip },
                success: function (data) {
                    // console.log(data);
                    // if (data == 'sukses'){
                    //     alert('Berhasil')
                    // } else {
                    //     alert('Gagal');
                    // }
                }
            });
        });
    }

    // window.print();
</script>


</body>
</html>

