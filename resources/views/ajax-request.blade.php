<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <button id="ajax-request">CLICK</button>

    <div id="list">

    </div>
    @include('partials.jq-ajax')
    <script>
        $('#ajax-request').click(function(e) {
            var url = "{{ route('renderBlade') }}";
            var headerData = {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            };
            var formData = {
                'count': 1
            };
            // var response = ajaxCall('POST',url,formData,headerData);
            var response = ajaxCall('GET', url, formData);
            var result = response.responseJSON;
            if (response.status == 200) {
                $('#list').html(result.data);
            } else {
                alert(result.message);
            }
        });
    </script>
</body>

</html>
