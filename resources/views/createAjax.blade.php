<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ff</title>
</head>
<body>
<form method="post" action=""   enctype="multipart/form-data">
    @CSRF
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label"> name</label>

        <input type="text" class="form-control" name="name" >
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label"> image</label>

        <input type="file" class="form-control" name="image">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">price</label>

        <input type="text" class="form-control" name="price" >
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">details</label>
        <div class="input-group has-validation">

            <input type="text" class="form-control" name="photo" >

    <div class="col-12">
        <button class="btn btn-primary" type="submit">save</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    $.ajax({
        type:'post',
        url:"{{url('ajax-offer/store')}}",
        data:{
            '_token':"{{csrf_token()}}",
    {{-- 'image':$("input[name='image']").val(),--}}
            'name':$("input[name='name']").val(),
            'price':$("input[name='price']").val(),
            'photo':$("input[name='photo']").val()


        },
        success: function (data){},
        error: function (reject){}

    });

</script>

</body>
</html>
