<html>

<title>
</title>
<body style="margin: 0px;">

<script type="text/javascript" src="{{url('public/assets_new/js/JsBarcode.all.js') }}"></script>
<style>
</style>
<div id="kartubelakang" >
    <input id="nip" type="hidden" value="{{$data->Nip}}">
    <img src="{{asset('public/background/depan.jpg')}}"
         style="width: 8.1cm;height: 12.7cm ;" alt="Cropped Image">

    <img src="data:image/png;base64,{{ chunk_split(base64_encode($data->photo)) }}"
         style="display:inherit;position: absolute;width: 4.5cm;height: 4.5cm;top: 179;left:67;" >

    <table  style="white-space: normal;
            width: 5cm;

            position: absolute;top: 353;left:60;">
        <tr >
            <td width="100%" style="font-weight: bold;font-size: 12;text-align: center">{{$data->Nama}}</td>
        </tr>
        <tr>
            <td width="100%" style="font-weight: bold;font-size: 12;text-align: center"> {{$data->Nip}}</td>
        </tr>
    </table>

    <img id="barCode" style="width: 6cm;height: 1cm;position: absolute;top: 412;left:43;"  />



</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){

        var nip  = document.getElementById('nip').value;
        var imgBar = document.createElement("img")
        JsBarcode("#barCode", nip,{displayValue: false});
        imgBar.src = $('#barCode').attr('src')

    });
    window.print();
</script>


</body>
</html>

