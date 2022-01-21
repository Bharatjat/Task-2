<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>option page after login</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <h1>Welcome to aelum consulting</h1>
    </div>
    <div class="container d-flex justify-content-center p-5">
        <div class="col-3 d-flex justify-content-center">
            <a href="<?php echo site_url('subjectHomePage') ?>">
                <button type="button" class="btn btn-primary">Subject details</button>
            </a>
        </div>
        <div class="col-3 ">
            <a href="<?php echo site_url('employeeHomePage') ?>">
                <button type="button" class="btn btn-info">Employee details</button>
            </a>
        </div>
        <!-- <div class="col-3 ">
            <a href="<?php echo site_url('UserDetailPage') ?>">
                <button type="button" class="btn btn-info">User details</button>
            </a>
        </div> -->
        <div class="container">
            <button type="button" class="btn btn-outline-primary"><a href="<?php echo site_url('Chef') ?>">Chef</a></button>
        </div>
        <div class="container">
            <button type="button" class="btn btn-outline-primary"><a href="<?php echo site_url('UserChef/userChef') ?>">User chef book page</a></button>
        </div>
        <div class="container">
            <button type="button" class="btn btn-outline-primary"><a href="<?php echo site_url('paymentGateway/products') ?>">paypal</a></button>
        </div>
    </div>
</body>

</html>