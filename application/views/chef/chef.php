<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>chef</title>
</head>

<body>
    <!-- add chef -->
    <div class="modal chefModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Chef</h5>
                    <button type="button" class="btn-close Close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="chefAddForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" require>
                            </div>
                            <div>
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="E-mail" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="Country">Country</label>
                                <select name="country" class="form-select Country" required></select>
                            </div>
                            <div>
                                <label for="State">State</label>
                                <select name="State" class="form-select State" required></select>
                            </div>
                            <div>
                                <label for="city">city</label>
                                <select name="city" class="form-select city" required></select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control" name="address" placeholder="Address" require></textarea>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <label for="Editqualifications">Qualifications</label>
                            <select id="qualifications" class="qualifications" name="qualifications" class="form-select" required></select>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="mobile">mobile</label>
                                <input type="text" class="form-control" name="mobile" placeholder="mobile" require>
                            </div>
                            <div class="p-2">
                                <label for="dob">Birth Date</label>
                                <input type="date" name="dob">
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <h5>Gender</h5>
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
                            <div>
                                <h5>vaccinated</h5>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="vaccinated" value="YES" checked>Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="vaccinated" value="NO">No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="totalExperience">Total experence</label>
                                <input type="Number" class="form-control" name="totalExperience" placeholder="Total experence (yers)" require>
                            </div>
                            <div>
                                <label for="ratePerHour">Rate per hour</label>
                                <input type="Number" class="form-control" name="ratePerHour" placeholder="Rate per hour" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="level">your level</label>
                                <select id="level" name="level" class="form-select level" required></select>
                            </div>
                            <div>
                                <label for="maxNoPeopleServe">max people to serve</label>
                                <input type="number" class="form-control maxNoPeopleServe" name="maxNoPeopleServe">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <label for="Cuisines">
                                    <h4>Cuisines</h4>
                                </label>
                                <div class="Cuisines">

                                </div>
                            </div>
                            <div>
                                <label for="language">
                                    <h4>language</h4>
                                </label>
                                <div id="language">
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="hindi">
                                    <label class="form-check-label" for="hindi">
                                        Hindi
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="english">
                                    <label class="form-check-label" for="english">
                                        English
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="gujarati">
                                    <label class="form-check-label" for="gujarati">
                                        Gujarati
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="marathi">
                                    <label class="form-check-label" for="marathi">
                                        Marathi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="facebookLink">facebook link</label>
                                <input type="text" class="form-control" name="facebookLink" placeholder="facebook link" require>
                            </div>
                            <div>
                                <label for="twitterLink">twitter link</label>
                                <input type="text" class="form-control" name="twitterLink" placeholder="twitter link" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="linkedinLink">linkedin link</label>
                                <input type="text" class="form-control" name="linkedinLink" placeholder="linkedin link" require>
                            </div>
                            <div>
                                <label for="youtubeLink">youtube link</label>
                                <input type="text" class="form-control" name="youtubeLink" placeholder="youtube link" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <input type="file" class="form-control d-none" name="profilePic" id="addProfilePic" accept='.jpg, .png, .pdf' id="file">
                                <button type="button" class="btn btn-outline-info" onclick="document.getElementById('addProfilePic').click()">Choose profile pic </button>
                            </div>
                            <div>
                                <input type="file" class="form-control d-none" name="portfolio" id="addPortfolio" accept='.pdf' id="file">
                                <button type="button" class="btn btn-outline-info" onclick="document.getElementById('addPortfolio').click()">Choose Portfolio </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <label for="discription">Discription</label>
                            <textarea type="text" class="form-control" name="discription" placeholder="Discription" require></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary Close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveChefBtn">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- view or update -->
    <div class="modal viewUpdateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View/Edit Chef</h5>
                    <button type="button" class="btn-close Close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="chefEditForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="name" require>
                            </div>
                            <div>
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="Country">Country</label>
                                <select id="Country" name="country" class="form-select Country" required></select>
                            </div>
                            <div>
                                <label for="State">State</label>
                                <select id="State" name="State" class="form-select State" required></select>
                            </div>
                            <div>
                                <label for="city">city</label>
                                <select id="city" name="city" class="form-select city" required></select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Address" require></textarea>
                        </div>
                        <div class="p-2">
                            <label for="qualifications">Qualifications</label>
                            <select id="qualifications" name="qualifications" class="form-select qualifications" required></select>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="mobile">mobile</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile" require>
                            </div>
                            <div class="p-2">
                                <label for="dob">Birth Date</label>
                                <input type="date" name="dob" id="dob">
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <h5>Gender</h5>
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
                            <div>
                                <h5>vaccinated</h5>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="vaccinated" value="YES" checked>Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="vaccinated" value="NO">No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="totalExperience">Total experence</label>
                                <input type="Number" class="form-control" name="totalExperience" id="totalExperience" placeholder="Total experence (yers)" require>
                            </div>
                            <div>
                                <label for="ratePerHour">Rate per hour</label>
                                <input type="Number" class="form-control" name="ratePerHour" id="ratePerHour" placeholder="Rate per hour" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="level">your level</label>
                                <select id="level" name="level" class="form-select level" id='level' required></select>
                            </div>
                            <div>
                                <label for="maxNoPeopleServe">max people to serve</label>
                                <input type="number" class="form-control maxNoPeopleServe" name="maxNoPeopleServe" id="maxNoPeopleServe">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <div>
                                <label for="Cuisines">
                                    <h4>Cuisines</h4>
                                </label>
                                <div class="Cuisines">

                                </div>
                            </div>
                            <div>
                                <label for="language">
                                    <h4>language</h4>
                                </label>
                                <div id="language">
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="hindi" id="hindi">
                                    <label class="form-check-label" for="hindi">
                                        Hindi
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="english" id="english">
                                    <label class="form-check-label" for="english">
                                        English
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="gujarati" id="gujarati">
                                    <label class="form-check-label" for="gujarati">
                                        Gujarati
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="languages[]" value="marathi" id="marathi">
                                    <label class="form-check-label" for="marathi">
                                        Marathi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="facebookLink">facebook link</label>
                                <input type="text" class="form-control" name="facebookLink" id="facebookLink" placeholder="facebook link" require>
                            </div>
                            <div>
                                <label for="twitterLink">twitter link</label>
                                <input type="text" class="form-control" name="twitterLink" id="twitterLink" placeholder="twitter link" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="linkedinLink">linkedin link</label>
                                <input type="text" class="form-control" name="linkedinLink" id="linkedinLink" placeholder="linkedin link" require>
                            </div>
                            <div>
                                <label for="youtubeLink">youtube link</label>
                                <input type="text" class="form-control" name="youtubeLink" id="youtubeLink" placeholder="youtube link" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <input type="file" class="form-control d-none" name="profilePic" id="editProfilePic" accept='.jpg, .png, .pdf' id="file">
                                <button type="button" class="btn btn-outline-info" onclick="document.getElementById('editProfilePic').click()">Choose profile pic </button>
                            </div>
                            <div>
                                <input type="file" class="form-control d-none" name="portfolio" id="editPortfolio" accept='.pdf' id="file">
                                <button type="button" class="btn btn-outline-info" onclick="document.getElementById('editPortfolio').click()">Choose Portfolio </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <label for="discription">Discription</label>
                            <textarea type="text" class="form-control" name="discription" id="discription" placeholder="Discription" require></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary Close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="editBtn">EDIT</button>
                        <button type="submit" class="btn btn-primary" id="update">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container p-5">
            <button type="button" class="btn btn-primary" id="addBtn">
                Create chef
            </button>
        </div>
    </div>
    <div class="container">
        <div class="p-5">
            <table class="table table-striped" id="outputTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">exprience</th>
                        <th scope="col">cuisines</th>
                        <th scope="col">portfolio</th>
                    </tr>
                </thead>
                <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
                <tbody id="showdata">

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(function() {

            /* for closing open model */
            $('.Close').click(function() {
                $('.modal').hide();
            })

            /* calling showAllData function to load data in html */
            showAllSavedData();

            /* showing database chef */
            function showAllSavedData() {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo base_url('getAllChefData') ?>",
                    dataType: 'json',
                    success: function(r) {
                        if (r.status == 200) {
                            $('#showdata').html(r.data);
                        }
                    }
                });
            }

            /* add chef */
            $('#addBtn').click(function() {

                // reseting form 
                $('#chefAddForm')[0].reset();

                /* loading modal to input data  */
                $('.chefModal').show();

                $('input').attr("disabled", false);
                $('textarea').attr("disabled", false);
                $('select').attr("disabled", false);

                /* disable max no of people to serve as this is fixed in database */
                $("#maxNoPeopleServe").prop('disabled', true);

                $('#actionInForm').html('');
                $('#actionInForm').html("<button type='submit' class='btn btn-primary' value='new' id='saveChefBtn'>Add</button>");

                getDynamicData();

                /* submiting new chef form */
                $('document').on('submit', '#chefEditForm', (function(e) {

                    /* stoping form to sumit in manual way */
                    e.preventDefault();

                    /* removing disable so its value van go via ajax */
                    $(".maxNoPeopleServe").prop('disabled', false);
                    console.log("add");

                    /* passing form data via ajax */
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('saveChef') ?>',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(response) {

                            if (response.status == 200) {
                                $('.modal').hide();
                            } else {
                                alert(response.data);
                            }
                        }
                    })
                    return false;
                }));

            })

            // view
            $('#showdata').on('click', '.view', function() {
                var id = $(this).attr('data');

                // reseting form 
                $('#chefEditForm')[0].reset();

                getDynamicData();

                $('.viewUpdateModal').show();
                $('#update').hide();
                $('#editBtn').show();

                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('viewData?id=') ?>" + id,
                    success: function(response) {
                        var response = JSON.parse(response);
                        if (response.status == 200) {
                            var r = response.data;

                            $('input').attr("disabled", true);
                            $('textarea').attr("disabled", true);
                            $('select').attr("disabled", true);

                            // name
                            $('#name').val(r.name);


                            // email
                            $('#email').val(r.email);


                            // totalExperience
                            $('#totalExperience').val(r.total_experience);

                            // ratePerHour
                            $('#ratePerHour').val(r.rate_per_hour);

                            // address
                            $('#address').val(r.address);

                            // mobile
                            $('#mobile').val(r.mobile);

                            // maxNoPeopleServe
                            $('#maxNoPeopleServe').val(r.max_no_people_serve);

                            // description
                            $('#discription').val(r.description);

                            // Birth Date
                            var dob = r.dob.split(" ");
                            $('#dob').val(dob[0]);
                            // console.log(dob.format("DD-MM-YYYY"));

                            // languages
                            if (r.language_spoken) {
                                const lang = r.language_spoken.split(", ");
                                $.each(lang, function(key, val) {
                                    $("input[type=checkbox][value='" + val + "']").prop("checked", true);
                                });
                            }

                            // qualifications
                            $("#qualifications").val(r.qualifications).attr("selected", "selected");

                            // level
                            $("#level").val(r.level_id).attr("selected", "selected");

                            // Cuisines
                            if (r.cuisine_id) {
                                $.each(r.cuisine_id, function(key, val) {
                                    $('input:checkbox[name="cuisines[]"][value="' + val + '"]')
                                        .attr('checked', 'checked');
                                });
                            }

                            // Gender
                            $("input[name=Gender][value='" + r.gender + "']");

                            // Vaccinated
                            $("input[name=vaccinated][value='" + r.is_vaccinated + "']");

                            // country
                            $('#Country').val(r.country);

                            // state
                            $('#State').val(r.state);

                            // city
                            $('#city').val(r.city);

                            // facebookLink
                            $('#facebookLink').val(r.facebook_link);

                            // twitterLink
                            $('#twitterLink').val(r.twitter_link);

                            // linkedinLink
                            $('#linkedinLink').val(r.linkedin_link);

                            // youtubeLink
                            $('#youtubeLink').val(r.youtube_link);

                            $('#editBtn').click(function() {
                                $('input').attr("disabled", false);
                                $('textarea').attr("disabled", false);
                                $('select').attr("disabled", false);

                                $('#update').show();
                                $('#editBtn').hide();

                                /* disable max no of people to serve as this is fixed in database */
                                $("#maxNoPeopleServe").prop('disabled', true);

                                /* submiting new chef form */
                                $('document').on('submit', '#chefEditForm', (function(e) {

                                    /* stoping form to sumit in manual way */
                                    e.preventDefault();

                                    /* removing disable so its value van go via ajax */
                                    $("#maxNoPeopleServe").prop('disabled', false);

                                    console.log("update");

                                    /* passing form data via ajax */
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo site_url('editChef') ?>',
                                        data: new FormData(this),
                                        processData: false,
                                        contentType: false,
                                        dataType: 'json',
                                        success: function(response) {

                                            if (response.status == 200) {
                                                $('.modal').hide();
                                                $('#Cuisines').html(response.data);
                                            } else {
                                                alert(response.data);
                                            }
                                        }
                                    })
                                    return false;
                                }));
                            });

                        } else {
                            alert(response.data);
                        }
                    },
                    error: function(e) {
                        alert(e.text);
                    }
                });
            })

            function getDynamicData() {
                /* qualifications */
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url('getqualifications') ?>',
                    dataType: 'json',
                    success: function(response) {

                        if (response.status == 200) {
                            $('.qualifications').html(response.data);
                            maxNoPeopleServe();
                        } else {
                            alert(response.data);
                        }
                    }
                })

                /* all levels */
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url('getLevel') ?>',
                    dataType: 'json',
                    success: function(response) {

                        if (response.status == 200) {
                            $('.level').html(response.data);
                        } else {
                            alert(response.data);
                        }
                    }
                })

                /* all Cuisines */
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url('getCuisines') ?>',
                    dataType: 'json',
                    success: function(response) {

                        if (response.status == 200) {
                            $('.Cuisines').html(response.data);
                        } else {
                            alert(response.data);
                        }
                    }
                })

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
                                $(".Country").append("<option>" + key.country_name + "</option>");
                            });
                            $(".Country").change(function() {
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
                                $(".State").append("<option>" + key.state_name + "</option>");
                            });
                            $(".State").change(function() {
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
                                $(".city").append("<option>" + key.city_name + "</option>");
                            });
                        },
                        headers: {
                            Authorization: "Bearer " + token,
                            Accept: "application/json",
                        },
                    });
                }

                /* on change event for chef level */
                $('.level').on('change', function() {
                    maxNoPeopleServe();
                    // setInterval(function(){ maxNoPeopleServe(); }, 3000);
                })

                /* disable max no of people to serve as this is fixed in database */
                $(".maxNoPeopleServe").prop('disabled', true);

                /* function to get max people to serve details */
                function maxNoPeopleServe() {
                    var data = $('.level').val();
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('maxNoPeopleServe') ?>',
                        data: {
                            id: data
                        },
                        dataType: 'json',
                        success: function(response) {

                            if (response.status == 200) {
                                $('.maxNoPeopleServe').val(response.data);
                            } else {
                                alert(response.data);
                            }
                        }
                    })
                }
            }
        })
    </script>
</body>

</html>