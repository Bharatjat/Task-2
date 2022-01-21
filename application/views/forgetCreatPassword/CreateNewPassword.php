<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Reset password page</title>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Reset password</h2>
                                <?php echo form_open('SaveNewPassword', ['onsubmit' => 'return validate()', 'autocomplete' => 'on']) ?>

                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'text',
                                        'name' => 'Email',
                                        'id' => 'email',
                                        'class' => 'form-control form-control-lg',
                                        'value' => $UserEmail,
                                        //'disabled' => 'true'
                                    ];
                                    echo form_input($data); ?>
                                </div>

                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'password',
                                        'name' => 'password',
                                        'id' => 'password',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Password',
                                        'onkeyup' => 'pass(this)',
                                        'value' => set_value("password")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="password_error" class="text-danger"></error>
                                <?php echo form_error('Email'); ?>

                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'password',
                                        'name' => 'Cpassword',
                                        'id' => 'Cpassword',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Confirm Password',
                                        'onkeyup' => 'Cpass(this)',
                                        'value' => set_value("Cpassword")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="Cpassword_error" class="text-danger"></error>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">save</button>
                                    <error id="reg_error" class="text-danger offset-1"></error>
                                </div>
                                <?php echo form_close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    var flag = NaN; //0 ->error | 1 ->no error  submit flag

    //Password checking
    function pass(pass) {
        if (pass.value.length >= 6) {
            document.getElementById('password_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('password_error').innerText = "!Password length should be greatter than 6 digit";
            flag = 0;
        }
    }
    //password $ confirm pass word checking
    var password = document.getElementById('password');

    function Cpass(cpass) {
        if (cpass.value.length > 0) {
            if (cpass.value != password.value) {
                document.getElementById('Cpassword_error').innerText = "!Confirm password does not match";
                flag = 0;
            } else {
                document.getElementById('Cpassword_error').innerText = "";
                flag = 1;
            }
        } else {
            document.getElementById('Cpassword_error').innerText = "!please enter confirm password";
            flag = 0;
        }
    }

    //submit checking
    function validate() {
        if (flag == 1) {
            return true;
        } else {
            document.getElementById('reg_error').innerText = "!Fill all the field";
            return false;
        }
    }
</script>

</html>