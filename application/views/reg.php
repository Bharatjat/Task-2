<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
</head>

<body>
    <?php echo form_open('Home/send_mail') ?>
    <?php $data = [
        'type' => 'text',
        'name' => 'email',
        'id' => 'email',
        'class' => 'form-control form-control-lg',
        'placeholder' => 'Email',
        'onkeyup' => 'emailcheck(this)',
        'value' => set_value("email")
    ];
    echo form_input($data); ?>
    <?php echo form_error('email')?>
    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
    <?php echo form_close() ?><br>
    <?php echo CI_VERSION; ?>
</body>

</html>