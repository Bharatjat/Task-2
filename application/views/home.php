<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <?php echo form_open('User/logout', ['autocomplete' => 'on']) ?>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">logout</button>
    </div>

    <?php echo form_close() ?>
</body>

</html>