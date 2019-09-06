<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="/bootstrap/dist/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">

        <form action="{{ route("file") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="inputGroupFileAddon01">Avatar</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" value="{{old("avatar")}}" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
                        <label class="custom-file-label" for="inputGroupFile01">Choose avatar</label>
                    </div>
                </div>
            </div>
            <div class="form-group pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>
</body>

</html>
