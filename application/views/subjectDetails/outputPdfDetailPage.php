<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>subject details</title>
</head>

<body>
    <div class="d-flex justify-content-center p-5" style="font-size: 50px;">
        <h2>
            Stubject details
        </h2>
    </div>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Discription</th>
                <th scope="col">Time allocated</th>
                <th scope="col">Number of student</th>
                <th scope="col">Room no.</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($result); $i++) {
            ?>

                <tr>
                    <td><?php print_r($result[$i]["id"]); ?></td>
                    <td><?php print_r($result[$i]["name"]); ?></td>
                    <td><?php print_r($result[$i]["description"]); ?></td>
                    <td><?php print_r($result[$i]["time_allocated"]); ?></td>
                    <td><?php print_r($result[$i]["number_of_student"]); ?></td>
                    <td><?php print_r($result[$i]["room_no"]); ?></td>
                </tr>);
            <?php };
            ?>
        </tbody>
    </table>
</body>

</html>