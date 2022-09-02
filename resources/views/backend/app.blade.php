<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('settings.site_name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/'.config('settings.site_favicon')) }}">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/date-time/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/froala-editor.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/froala_style.min.css') }}"/>
    <style>
        #dropzone {
            position: relative;
            border: 10px dotted #f96f6f;
            border-radius: 20px;
            color: white;
            font: bold 24px/200px arial;
            height: 200px;
            margin: 30px auto;
            text-align: center;
            width: 200px;
            background: #2a2a2a;
        }

        #dropzone.hover {
            border: 10px solid #FE5;
            color: #FE5;
        }

        #dropzone.dropped {
            background: #222;
            border: 10px solid #444;
        }

        #dropzone div {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        #dropzone img {
            border-radius: 10px;
            vertical-align: middle;
            max-width: 95%;
            max-height: 95%;
        }

        #dropzone [type="file"] {
            cursor: pointer;
            position: absolute;
            opacity: 0;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">--}}
</head>
<body class="app sidebar-mini rtl">
@include('backend.partials.header')
@include('backend.partials.sidebar')
<main class="app-content">
    @yield('content')
</main>
<script src="{{ asset('backend/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/date-time/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/froala-editor.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/data-tables/dataTables.bootstrap4.min.js') }}"></script>
{{--<script src="{{ asset('backend/date-time/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
<script src="{{ asset('backend/js/plugins/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('/')}}backend/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}backend/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('/')}}backend/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sampleTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "searching": true,
            "ordering": true,
            "order": [[ 0, "desc" ]],
            "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]]
        });
    } );
</script>
<script>
    $(function() {
        $('textarea#content').froalaEditor()
    });
    $(function() {
        $('textarea#short_desc').froalaEditor()
    });
    $(function() {
        $('textarea#details').froalaEditor()
    });
    $(document).ready(function() {
        $('#list').select2();
        $('#menu').select2();
        $('#page_id').select2();
    });

    $(function() {

        $('#dropzone').on('dragover', function() {
            $(this).addClass('hover');
        });

        $('#dropzone').on('dragleave', function() {
            $(this).removeClass('hover');
        });

        $('#dropzone input').on('change', function(e) {
            var file = this.files[0];

            $('#dropzone').removeClass('hover');

            if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
                return alert('File type not allowed.');
            }

            $('#dropzone').addClass('dropped');
            $('#dropzone img').remove();

            if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
                var reader = new FileReader(file);

                reader.readAsDataURL(file);

                reader.onload = function(e) {
                    var data = e.target.result,
                        $img = $('<img />').attr('src', data).fadeIn();

                    $('#dropzone div').html($img);
                };
            } else {
                var ext = file.name.split('.').pop();

                $('#dropzone div').html(ext);
            }
        });
    });
</script>
@yield('onPageJS')

</body>
</html>






