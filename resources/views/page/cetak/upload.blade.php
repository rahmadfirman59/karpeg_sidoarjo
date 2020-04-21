<html lang="en">
<head>
    <title>Upload Foto Pegawai</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
</head>

<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">

            <input id="nip" type="hidden" value="{{$nip}}">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div id="upload-demo" style="width:350px">

                    </div>
                </div>
                <div class="col-md-4" style="padding-top:30px;">
                    <strong>Select Image:</strong>
                    <br/>
                    <input type="file" id="upload">
                    <br/>
                    <button class="btn btn-primary upload-result">Upload Image</button>

                    <a href="{{url()->previous()}}">
                        <button class="btn btn-info" >Kembali</button>
                    </a>

                </div>

            </div>

        </div>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>

<script type="text/javascript">
    function goBack() {

    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 226,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });

    function dataURItoBlob(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], {type:mimeString});
    }

    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {

            var nip = document.getElementById('nip').value;


            $.ajax({
                url: "{{url('/cetak_kartu/save_upload/')}}",
                type: "post",
                data: {"image":resp,"nip":nip },
                success: function (data) {
                    if (data == 'ubah'){
                        alert('Data berhasil di ubah')
                        location.href = "{{url('/cetak_kartu')}}"
                    } else {
                        alert('Foto Berhasil diubah');
                        location.href = "{{url('/cetak_kartu')}}"
                    }
                }
            });
        });
    });

</script>

</body>
</html>