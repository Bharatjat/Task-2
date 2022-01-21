<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign in page</title>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Login to account</h2>
                                <?php echo form_open('loginValidation', ['autocomplete' => 'on']) ?>
                                <error class="text-danger">
                                    <?php
                                    if (isset($unverified)) {
                                        echo "$unverified";
                                    } elseif (isset($unmatch)) {
                                        echo "$unmatch";
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </error>
                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'text',
                                        'name' => 'NameOrEmail',
                                        'id' => 'NameOrEmail',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Username or Email',
                                        'onkeyup' => 'NameEmailCheck(this)',
                                        'value' => set_value("NameOrEmail")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="name_email_error" class="text-danger"></error>
                                <?php echo form_error('name'); ?>

                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'password',
                                        'name' => 'pass',
                                        'id' => 'pass',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Password',
                                        'onkeyup' => 'passcheck(this)',
                                        'value' => set_value("pass")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="pass_error" class="text-danger"></error>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">login</button>
                                    <error id="reg_error" class="text-danger offset-1"></error>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Want to create an account? <a href="<?php echo site_url('sign_up') ?>" class="fw-bold text-body"><u>register here</u></a></p>
                                <p class="text-center text-muted mt-5 mb-0">forget password<a href="<?php echo site_url('ForgetPass') ?>" class="fw-bold text-body"><u>Click here</u></a></p>
                                </form>

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

    //Name or Email checking
    function NameEmailCheck(name) {
        if (name.value.length >= 1) {
            document.getElementById('name_email_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('name_email_error').innerText = "!Name should not be empty";
            flag = 0;
        }
    }

    //Password checking
    function passcheck(password) {
        if (password.value.length >= 6) {
            document.getElementById('pass_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('pass_error').innerText = "!Password length should be greatter than 6 digit";
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