<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Forget password page</title>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Forget password</h2>
                                <?php echo form_open('ForgetPassword', ['autocomplete' => 'on']) ?>
                                
                                <div class="form-outline mb-3">
                                    <?php $data = [
                                        'type' => 'text',
                                        'name' => 'Email',
                                        'id' => 'Email',
                                        'class' => 'form-control form-control-lg',
                                        'placeholder' => 'Email',
                                        'onkeyup' => 'NameEmailCheck(this)',
                                        'value' => set_value("NameOrEmail")
                                    ];
                                    echo form_input($data); ?>
                                </div>
                                <error id="email_error" class="text-danger"></error>
                                <?php echo form_error('Email'); ?>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">send mail</button>
                                    <error id="reg_error" class="text-danger offset-1"></error>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Want to create an account? <a href="<?php echo site_url('Home/sign_up') ?>" class="fw-bold text-body"><u>register here</u></a></p>
                                <p class="text-center text-muted mt-5 mb-0">Already have an account<a href="<?php echo site_url('Home/login') ?>" class="fw-bold text-body"><u>Login here</u></a></p>
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

    //Email checking
    function EmailCheck(email) {
        if (email.value.length >= 1) {
            document.getElementById('email_error').innerText = "";
            flag = 1;
        } else {
            document.getElementById('email_error').innerText = "!Email should not be empty";
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