<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center">
        <h1>Welcome to aelum consulting</h1>
    </div>
    <div class="container d-flex justify-content-center p-5">
        <div class="col-6 d-flex justify-content-center">
            <a href="<?php echo site_url('login')?>">
                <button type="button" class="btn btn-primary">Login</button>
            </a>
        </div>
        <div class="col-6 "> 
            <a href="<?php echo site_url('sign_up')?>">
                <button type="button" class="btn btn-info">Sign up</button>
            </a>
        </div>
    </div>
  </body>
</html>