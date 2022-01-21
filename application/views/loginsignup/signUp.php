<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign up page</title>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                <?php if (isset($sign_up_error)) {
                                    echo "$sign_up_error";
                                }else {
                                    echo "";
                                }?>
                                <?php echo form_open('signUpValidation', ['onsubmit' => 'return validate()', 'autocomplete' => 'on']) ?>
                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'text',
                                        'name' => 'name',
                                        'id' => 'name',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'username',
                                        'onkeyup' => 'namecheck(this)',
                                        'value' => set_value("name")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="name_error" class="text-danger"><?php echo form_error('name'); ?></error>

                                <div class="form-outline mb-3">
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
                                </div>
                                <error id="email_error" class="text-danger"><?php echo form_error('email'); ?></error>

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

                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'password',
                                        'name' => 'cpass',
                                        'id' => 'cpass',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Conform Password',
                                        'onkeyup' => 'cpasscheck(this)',
                                        'value' => set_value("cpass")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="cpass_error" class="text-danger"></error>

                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'text',
                                        'name' => 'address',
                                        'id' => 'address',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Address',
                                        'onkeyup' => 'addresscheck(this)',
                                        'value' => set_value("address")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="address_error" class="text-danger"></error>

                                <div class="form-outline mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" id="male" type="radio" name="gender" checked value="M">
                                        <label class="form-check-label" for="male">
                                            MALE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="female" type="radio" name="gender" value="F">
                                        <label class="form-check-label" for="female">
                                            FEMALE
                                        </label>
                                    </div>
                                </div>

                                <!-- <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div> -->

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    <error id="reg_error" class="text-danger offset-1"></error>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="<?php echo site_url('login') ?>" class="fw-bold text-body"><u>Login here</u></a></p>

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

    //Name checking
    function namecheck(name) {
        if (name.value.length >= 1) {
            document.getElementById('name_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('name_error').innerText = "!Name should not be empty";
            flag = 0;
        }
    }

    //Email checking
    var emailformate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    function emailcheck(email) {
        if (email.value.match(emailformate)) {
            document.getElementById('email_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('email_error').innerText = "!email is invalid";
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
    //password $ confirm pass word checking
    var password = document.getElementById('pass');

    function cpasscheck(cpass) {
        if (cpass.value.length > 0) {
            if (cpass.value != password.value) {
                document.getElementById('cpass_error').innerText = "!Confirm password does not match";
                flag = 0;
            } else {
                document.getElementById('cpass_error').innerText = "";
                flag = 1;
            }
        } else {
            document.getElementById('cpass_error').innerText = "!please enter confirm password";
            flag = 0;
        }
    }

    //Address checking
    function addresscheck(address) {
        if (address.value.length >= 1) {
            document.getElementById('address_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('address_error').innerText = "!Address should not be empty";
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