<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Hello World</h1>
            </div>
            <div class="col-8">
                @if(Session('success'))
                <div class="alert alert-success">
                    {{ Session('success')}}
                </div>
                @endif
                <div class="wrapper">
                    <form action="upload_file" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="upload_file" class="custom-file-upload">
                           <i class="fas fa-cloud-upload-alt"></i> Custom Upload
                       </label>
                       <input type="file" id="upload_file" name="upload_file[]" multiple/>
                       <button class="btn btn-primary" type="submit">Upload</button>
                   </form>
                   <div id="image_preview">
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#upload_file').on('change',function(){
            console.log('ready img')
            var total_file= this.files.length;
            for(var i=0;i<total_file;i++){
                /*var img = document.createElement("IMG");
                $(img).attr('src',URL.createObjectURL(event.target.files[i]));
                $(img).attr('width','100%');*/
                $('#image_preview>.row').append(
                    $('<div></div>')
                    .addClass('col-4')
                    .append(
                        $('<img>')
                        .attr('src',URL.createObjectURL(event.target.files[i]))
                        .attr('width','100%')
                        )
                    );
            }   

        })
    })
</script>
</body>
</html>
