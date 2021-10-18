<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>


        body {
            /* The image used */
            /*background-image: url("img_girl.jpg");*/
            background-image: url("{{ asset('Assets/imgs/background.png') }}");
            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */

            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('Assets/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <form id="generatepemenang">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputToko">Nama Toko</label>
                        <select id="inputToko" class="form-control" name="inputToko">
                            <option selected value="1">Yogya</option>
                            <option value="2">Borma</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputHadiah">Hadiah</label>
                        <select id="inputHadiah" class="form-control" name="inputHadiah">
                            <option selected value="1">Motor Honda Beat</option>
                            <option value="2">Air Cooler Sharp</option>
                            <option value="3">TV Samsung 43"</option>
                            <option value="4">Kompor Rinnai</option>
                            <option value="5">Blender Philips</option>
                            <option value="6">Travel Bag Confidence</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="inputQuantity">Pemenang</label>
                        <select id="inputQuantity" class="form-control" name="inputQuantity">
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <button style="margin-top: 13%;" type="submit" class="btn btn-primary" id="Mulai" value="Start">Start</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="card" style="margin-top:10px;" id="tableContent">
    </div>



</div>
<script type="text/javascript">
    let jsonPeserta;
    let header = {};
    let namafile = "";
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#Mulai').click(function (e) {
            // Adding loading GIF
            e.preventDefault();
            var buttonValue = document.getElementById("Mulai").value;
            console.log(buttonValue);
            if (buttonValue == "Start") {
                $(this).html('Stop');
                document.getElementById("Mulai").value = "Stop";
            }
            else if(buttonValue == "Stop"){
                $(this).html('Start');
                document.getElementById("Mulai").value = "Start";
                $.ajax({
                    type: "POST",
                    url: "generatePemenang",
                    data: $('#generatepemenang').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        jsonPeserta = data.toko;
                        namafile = data.hadiah;
                        header = {No_Undian : 'Nomor Undian', nama : 'Nama Peserta', hp: 'Nomor HP', toko: 'Nama Toko'}

                        let text = "<div class=\"card\" style=\"margin-top:10px;\" id=\"tableContent\"><div class=\"card-body\"><table class='table table-bordered'><thead><tr><th>No Undian</th><th>Nama Peserta</th><th>No Hp</th><th>Nama Toko</th></tr></thead><tbody>";
                        for (let i = 0; i < data.toko.length; i++) {
                            text += "<tr><td>"+ data.toko[i]['No_Undian']+ "</td><td>"+ data.toko[i]['Nama_Peserta'] + "</td><td>"+ data.toko[i]['No_Hp'] + "</td><td>"+ data.toko[i]['nama_toko'] + "</td></tr>";

                        }
                        text += "</tbody></table><a href=\"{{ route('resetAll') }}\" style=\"margin-top: 13%;\" type=\"submit\" class=\"btn btn-danger\">Reset All</a><Button class=\"btn btn-primary\" style=\"margin-top: 13%;\" onclick=\"test()\">Export CSV</button></div></div>";

                        $('#tableContent').html(text);

                    },
                    error: function (data) {
                        console.log('error: ', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            }
        });

    });
    function convertToCSV(objArray) {
        var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
        var str = '';

        for (var i = 0; i < array.length; i++) {
            var line = '';
            for (var index in array[i]) {
                if (line != '') line += ','

                line += array[i][index];
            }

            str += line + '\r\n';
        }

        return str;
    }

    function exportCSVFile(headers, items, fileTitle) {
        if (headers) {
            items.unshift(headers);
        }

        // Convert Object to JSON
        var jsonObject = JSON.stringify(items);

        var csv = this.convertToCSV(jsonObject);

        var exportedFilenmae = fileTitle + '.csv' || 'export.csv';

        var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        if (navigator.msSaveBlob) { // IE 10+
            navigator.msSaveBlob(blob, exportedFilenmae);
        } else {
            var link = document.createElement("a");
            if (link.download !== undefined) { // feature detection
                // Browsers that support HTML5 download attribute
                var url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", exportedFilenmae);
                link.style.visibility = 'hidden';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
    }

    function test(){
        exportCSVFile(header,jsonPeserta,namafile);
    }
</script>
</body>
</html>

