<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    <link href = {{ asset("css/main.css") }} rel="stylesheet" />
</head>
<body>
<div class="s005">
    <form action="javascript:void(0);" method="post" id="form" data-toggle="validator">
        <fieldset>
            <legend>WHAT ARE YOU LOOKING FOR?</legend>
            <div class="inner-form">
                <div class="input-field">
                    <input class="form-control" id="link" type="text" placeholder="fabelio.com" aria-label="fabelio.com" />
                    <button class="btn-search" type="button" onclick="addLink()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="suggestion-wrap">
<!--                <span>Ruang Tamu</span>-->
<!--                <span>Kamar Tidur</span>-->
<!--                <span>Ruang Makan</span>-->
<!--                <span>Ruang Kerja</span>-->
<!--                <span>Dekorasi</span>-->
<!--                <span>See All Product</span>-->
                <span><a href="list-product" style="float: right">
                    See Product List
                </a></span>

            </div>
        </fieldset>
    </form>
</div>
<script src="{{asset('js/extention/choices.js')}}"></script>
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/lib/bootstrap.js')}}"></script>
<script src="{{asset('js/lib/validator.js')}}"></script>
<script>
    var textPresetVal = new Choices('#link',
        {
            removeItemButton: true,
        });

    $(document).ready(function() {
        $('#form').validator()
    });

    function addLink() {
        console.log($('#link').val());
        if ($('#form').validator('validate').has('.has-error').length === 0){
            $.ajax({
                type: "POST",
                url: '{{ env('BASE_URL') }}/api',
                dataType: "json",
                contentType: 'application/json',
                data: JSON.stringify({
                    "_token": "{{ csrf_token() }}",
                    link : $('#link').val()
                }),
                success: function(result) {
                    console.log(result);
                    if(result != null){
                        $('#link').val('')
                        //alert('Success Add Link')
                    }
                },
                error: function(err) {
                    console.log(err);
                    //alert(err.responseJSON.message);
                }
            });
        }
    }

</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
