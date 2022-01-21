<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User home page</title>
</head>

<body>

    <!-- corusel - model for add subject -->
    <div class="modal addUserModal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="newUserDetailsForm">
                    <div class="modal-body">
                        <div class="container p-2">
                            <input class="form-control" id='Name' type="text" placeholder="Name" name="name" required>
                        </div>
                        <div class="container p-2">
                            <label for="country" class="form-label">Country</label>
                            <select id="Country" name="country" class="form-select" required></select>
                        </div>
                        <div class="container p-2">
                            <label for="inputState" class="form-label">State</label>
                            <select id="State" name="state" class="form-select" required></select>
                        </div>
                        <div class="container p-2">
                            <label for="inputcity" class="form-label">city</label>
                            <select id="city" name="city" class="form-select" required></select>
                        </div>
                        <div class="container p-2">
                            <h4>Gender</h4>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="Gender" value="Male" checked>Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="Gender" value="Female">Female
                                </label>
                            </div>
                        </div>
                        <div class="container p-2">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" min="1" max="100">
                            <!-- <label for="age" class="form-label">Age</label>
                            <input type="range" class="form-range" min="0" max="100" step="1" id="age" onchange="rangePrimary.value=value">
                            <input type="text" id="rangePrimary" /> -->
                        </div>
                        <div class="container p-2">
                            <input class="form-control" id="postalCode" type="text" placeholder="Postal code" name="postalCode" required>
                        </div>
                        <div class="container p-2 d-flex justify-content-between">
                            <label>Captcha</label>
                            <?php echo $captchaImage; ?>
                            <input type="text" name="captcha" id="captcha" placeholder="Captcha text" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="addUserBtn" data-dismiss="modal">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End corusel - model -->

    <!-- add and search bar -->
    <div class="p-3 container d-flex justify-content-between">
        <div class="p-3 ">
            <button type="button" class="btn btn-info" id="addBtn">Add User</button>
        </div>
        <div class="p-3">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search">
        </div>
    </div>

    <!-- table -->
    <div class="container p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">country</th>
                    <th scope="col">State</th>
                    <th scope="col">city</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Postal code</th>

                </tr>
            </thead>
            <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
            <tbody id="showdata">

            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {

            /* calling showalldata function to load all data on the view */
            showalldata();

            /* this method is to close any open mode when user click on close button */
            $(".close").click(function() {
                $(".modal").hide();
            });

            /* function is to add user  */
            $('#addBtn').click(function() {

                /* making model visible */
                $('.addUserModal').show();
                $('#newUserDetailsForm').on('submit', (function(e) {
                    e.preventDefault();
                    
                    /* taking both seaaion and user enter captcha value  and storing it in a variable */
                    var captcha = $('#captcha').val();
                    var sessionCaptcha = "<?php print_r($this->session->userdata('captchaWord')); ?>";

                    /* checking if captcha is match */
                    if (captcha === sessionCaptcha) {

                        /* passing data to controller via ajax */
                        $.ajax({
                            type: 'ajax',
                            method: 'POST',
                            async: false,
                            url: '<?php echo base_url() ?>addNewUserDetail',
                            data: $('#newUserDetailsForm').serialize(),
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 200) {
                                    showalldata();
                                } else {
                                    alert(response.data);
                                }
                            },
                            error: function() {}
                        });
                        $('.addUserModal').hide();
                    }else{
                        alert('captcha is not match');
                    }

                }))
            })

            /* search */
            $('#search').keyup(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'POST',
                    async: false,
                    url: '<?php echo base_url() ?>searchUserDetail',
                    data: $('#search').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            if (response.data == 'empty') {
                                showalldata();
                            } else {
                                $('#showdata').html(response.data);
                            }
                        }
                    },
                    error: function() {}
                });
            })


            /* this function is to load all the data that is available in the database */
            function showalldata() {
                $.ajax({
                    type: 'post',
                    url: '<?php echo site_url('allUserDetails') ?>',
                    success: function(response) {
                        var response = JSON.parse(response);

                        if (response.status == 200) {
                            $('#showdata').html(response.data);
                        } else {
                            alert(response.data);
                        }
                    }
                })
            }

            // address
            var token = "";
            $.ajax({
                type: "GET",
                url: "https://www.universal-tutorial.com/api/getaccesstoken",
                success: function(data) {
                    token = data.auth_token;
                    getcountry();
                },
                error: function() {},
                headers: {
                    Accept: "application/json",
                    "api-token": "jn6diEPIY7xbi2hOWTBXeBcJtp9Omk2HelINwFdo76DsuBMQDQvJmIMiwx4ubEzY5Gs",
                    "user-email": "bjat123bk@gmail.com",
                },
            });

            function getcountry() {
                $.ajax({
                    type: "GET",
                    url: "https://www.universal-tutorial.com/api/countries/",
                    success: function(data) {
                        data.forEach((key) => {
                            $("#Country").append("<option>" + key.country_name + "</option>");
                        });
                        $("#Country").change(function() {
                            getstate();
                        });
                        // getstate();
                    },
                    headers: {
                        Authorization: "Bearer " + token,
                        Accept: "application/json",
                    },
                });
            }

            function getstate() {
                var country = $("#Country").val();
                $.ajax({
                    type: "GET",
                    url: "https://www.universal-tutorial.com/api/states/" + country,
                    success: function(data) {
                        data.forEach((key) => {
                            $("#State").append("<option>" + key.state_name + "</option>");
                        });
                        $("#State").change(function() {
                            getcity();
                        });
                    },
                    headers: {
                        Authorization: "Bearer " + token,
                        Accept: "application/json",
                    },
                });
            }

            function getcity() {
                var state = $("#State").val();
                $.ajax({
                    type: "GET",
                    url: "https://www.universal-tutorial.com/api/cities/" + state,
                    success: function(data) {
                        data.forEach((key) => {
                            $("#city").append("<option>" + key.city_name + "</option>");
                        });
                    },
                    headers: {
                        Authorization: "Bearer " + token,
                        Accept: "application/json",
                    },
                });
            }
        })
    </script>
</body>

</html>