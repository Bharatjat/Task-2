<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>products</title>
</head>

<body>
    <div class="p-5 container d-flex justify-content-center">
        <h1>
            Buy any product
        </h1>
    </div>
    <div class="container">
        <div class="p-5">
            <table class="table table-striped" id="outputTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Buy</th>
                    </tr>
                </thead>
                <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
                <tbody id="showData">

                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $.ajax({
                url: '<?php echo base_url('getAllProducts') ?>',
                method: "GET",
                success: function(response) {
                    var r = JSON.parse(response);
                    if (r.status == 200) {
                        $('#showData').html(r.data);
                    } else {
                        $('#showData').html(r.data);
                    }
                }
            })
        })
    </script>
</body>

</html>