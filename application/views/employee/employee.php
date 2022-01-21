<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Employee details Home page</title>
</head>

<body>

    <!-- corusel - model for add employee -->
    <div class="modal addEmployeeModal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="newEmployeeAddForm">
                        <div class="container p-2">
                            <input class="form-control subjectName" id='employeeName' type="text" placeholder="Employee Name" name="Name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addEmployeeBtn" data-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End corusel - model -->


    <!-- corusel - model for fill employee detail -->
    <div class="modal fillEmployeeModal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Fill details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="fillEmployeeDetailsForm" enctype="multipart/form-data">
                    <div class="modal-body container">

                        <input type="hidden" name="id" id='id'>
                        <div class="container p-2">
                            <label for="type">Employee type:</label>
                            <select name="type" id="type" class="form-select">
                                <option value=null selected>select employee type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Temporary">Temporary</option>
                                <option value="On Contract">On Contract</option>
                            </select>
                        </div>
                        <div class="container p-2">
                            <label for="role">Employee Role:</label>
                            <select name="role" id="role" class="form-select">
                                <option value=null selected>select employee role</option>
                                <option value="Team Incharge">Team Incharge</option>
                                <option value="project lead">Project Lead</option>
                                <option value="Team Member">Team Member</option>
                            </select>
                        </div>
                        <label for="file">Select file:</label>
                        <div class="container p-2" id="fileContainer">
                            <div id="databaseFilePreviewGroup" class="d-flex justify-content-between" style="max-width: 450px; max-height: 600px;">

                            </div>
                            <div id="fileInputGroup">
                                <div>
                                    <input type="file" class="form-control d-none" accept='.jpg, .png, .pdf' id="file">
                                    <button type="button" class="btn btn-outline-info" id="chooseImgBtn">Choose images </button>
                                </div>
                                <div id="inputFilePreview" class="container p-2 d-flex justify-content-center" style=" max-width: 200px;">

                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="container p-2 col-6">
                                <span>Skills:</span><br>
                                <input class="form-check-input" type="checkbox" value="PHP" name="skill[]" id="1">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    PHP
                                </label><br>
                                <input class="form-check-input" type="checkbox" value="MySQL" name="skill[]" id="2">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    MySQL
                                </label><br>
                                <input class="form-check-input" type="checkbox" value="JavaScript/JQuery" name="skill[]" id="3">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    JavaScript/JQuery
                                </label><br>
                                <input class="form-check-input" type="checkbox" value="PHP Frameworks" name="skill[]" id="4">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    PHP Frameworks
                                </label><br>
                            </div>
                            <div class="container p-2 col-6">
                                <input class="form-check-input" type="checkbox" value="Angular JS" name="skill[]" id="5">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Angular JS
                                </label><br>
                                <input class="form-check-input" type="checkbox" value="HTML" name="skill[]" id="6">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    HTML
                                </label><br>
                                <input class="form-check-input" type="checkbox" value="CSS" name="skill[]" id="7">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    CSS
                                </label><br>
                                <input class="form-check-input" type="checkbox" value="Bootstrap" name="skill[]" id="8">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Bootstrap
                                </label><br>
                            </div>
                        </div>
                        <div class="container p-2">
                            <label for="doj">DAte of joining:</label>
                            <input class="form-control" id="doj" type="date" placeholder="Date of joining" name="dateOfJoining">
                        </div>
                        <div class="container p-2">
                            <label for="location">Job location:</label>
                            <input class="form-control" id="location" type="location" placeholder="Job Location" name="jobLocation">
                        </div>
                        <div class="container p-2">
                            <input class="form-check-input" type="checkbox" value="1" id="active" name="active">
                            <label class="form-check-label" for="active">
                                Active
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="addFillemployeeBtn" data-dismiss="modal">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End corusel - model -->

    <div class="container" style="background-color: rgb(51, 153, 255)">
        <div class="row">
            <div class="col-md-9">
                <h1>
                    Employee details system using ajax & jquery.
                </h1>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <div class="offset-md-1">

                    <?php echo form_open('logout') ?>
                    <button type="submit" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">logout</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="background-color: rgb(51, 255, 153)">
        <div class="row align-items-center p-2 d-flex">
            <div class="col-md-6">

            </div>
            <div class="col-md-3  d-flex justify-content-end">
                <div class="">
                    <!-- this button is to add new employee  -->
                    <button type="submit" class="btn btn-success" id="addEmploye">
                        Add employee
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- this is to show any message like success or fail -->
    <div id="popUp">

    </div>

    <!-- this part is to show static cloumns name  -->
    <div class="container p-2 ">
        <table class="table table-striped" id="outputTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Type</th>
                    <th scope="col">Role</th>
                    <th scope="col">Skill</th>
                    <th scope="col">files</th>
                    <th scope="col">Job location</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
            <tbody id="showdata">

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {

            /* this method is to close any open mode when user click on close button */
            $(".close").click(function() {
                $(".modal").hide();

                /* clearing the value when model is closed */
                var images = [];
                var files = [];

            });

            /* datatable */
            $('#outputTable').DataTable({
                "ajax": "<?php echo base_url() ?>allEmployeeDetails",
                "order": [],
                "type": "POST",
                // "processing": true,
                // "serverSide": true,
                "dataSrc": ""
            });


            /* this images variable is for render puropse and preview */
            var images = [];

            /* this file variable is to store and send actiual file in its original form */
            var files = [];

            /* this method is to add subject details in the database it take input from subjectEntered form */
            $('#addEmploye').click(function() {

                $('.addEmployeeModal').show(); // to visible the input modal form

                /* if user click on add button in modal then this will run */
                $('#addEmployeeBtn').click(function() {

                    /* this method is to check if all fied is fill or not if not then it return an alert */
                    if ($('#employeeName').val() != '') {

                        /* taking all input from the form using jquery searialize method */
                        var data = JSON.stringify($('#employeeName').val());


                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>addEmployee",
                            data: {
                                name: JSON.stringify($('#employeeName').val())
                            },
                            contentType: 'multipart/form-data',
                            processData: false,
                            async: false,
                            dataType: "json",
                            success: function(response) {
                                if (response != true) {
                                    $("#popUp").show();
                                    $("#popUp").attr("class", " container alert alert-danger");
                                    $("#popUp").text('internal server error');
                                    $("#popUp").hide(10000);
                                    $("#viewAllBtn").click();
                                } else {
                                    $("#popUp").show();
                                    $("#popUp").attr("class", " container alert alert-success");
                                    $("#popUp").text("Record inserted succesfully");
                                    $("#popUp").hide(10000);
                                    $("#viewAllBtn").click();
                                }
                                $(".modal").hide();
                                $('#outputTable').DataTable().ajax.reload();
                            }
                        });
                        $(".modal").hide();
                    } else {
                        alert('all field is required');
                    }
                });
            })

            //fill details- 
            $('#showdata').on('click', '.item-fill', function() {

                /* taking selected record id from user data attribute  */
                var id = $(this).attr('data');

                $.ajax({
                    type: 'ajax',
                    method: 'POST',
                    async: false,
                    url: '<?php echo base_url() ?>getSelectedEmployeeDetail',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {

                        /* type value set */
                        if (response.type == 'Permanent' || response.type == 'Temporary' || response.type == 'On Contract') {
                            $('select[name^="type"] option[value="' + response.type + '"]').attr("selected", "selected");
                        } else {
                            $('select[name^="type"] option[selected="selected"]').removeAttr('selected');
                        }

                        /* role value set */
                        if (response.role == 'Team Incharge' || response.role == 'project lead' || response.role == 'Team Member') {
                            $('select[name^="role"] option[value="' + response.role + '"]').attr("selected", "selected");
                        } else {
                            $('select[name^="role"] option[selected="selected"]').removeAttr('selected');
                        }

                        /* clearing all the previous checked value in the skill field */
                        for (let i = 1; i <= 8; i++) {
                            $('#' + i).prop("checked", false);
                        }

                        /* for image render from database */
                        if (response.files) {
                            const databaseFiles = response.files.split(", ");
                            $('#databaseFilePreviewGroup').show();
                            html = '';
                            // html +=`<h6 class='d-flex justify-content-center'>previous selected files</h6>`;
                            databaseFiles.forEach(function(e) {

                                var temp = e;
                                var temp = temp.split('.');
                                if (temp[1] != 'pdf') {

                                    html += `<div>`;

                                    html += `<img src="<?php echo base_url('assets/images/') ?>` + e + `" 
                                                alt="image" style="height: 90px; width: 90px;"></img>`;

                                    html += `<span style="color:red;" for="imgpre` + e.indexOf(e) + `" class='delete' data="` + e.indexOf(e) + `">&times</span>`;

                                    html += `<div for="imgpre` + e.indexOf(e) + `"> ` + temp[0] + `</div>`;

                                    html += `</div>`;
                                } else {

                                    html += `<div>`;
                                    html += `<img src="https://i0.wp.com/www.woschool.com/wp-content/uploads/2020/09/png-transparent-pdf-icon-illustration-adobe-acrobat-portable-document-format-computer-icons-adobe-reader-file-pdf-icon-miscellaneous-text-logo.png"
                                                alt="image" style="height: 100px; width: 100px;"></img>`;

                                    html += `<span style="color:red;" for="imgpre` + e.indexOf(e) + `" class='delete' data="` + e.indexOf(e) + `">&times</span>`;

                                    html += `<div for="imgpre` + e.indexOf(e) + `"> ` + temp[0] + `</div>`;
                                }
                                // $.ajax({
                                //     method: "post",
                                //     url: '<?php echo site_url('') ?>',
                                //     processData: false,
                                //     contentType: false,
                                //     dataType: 'json',

                                // })
                            });
                            $('#databaseFilePreviewGroup').html(html);

                        } else {
                            $('#databaseFilePreviewGroup').hide();
                        }

                        /* skill's value set */
                        if (response.skill) {
                            const Skills = response.skill.split(", ");
                            $.each(Skills, function(key, val) {
                                $("input[type=checkbox][value='" + val + "']").prop("checked", true);
                            });
                        }

                        /* date of joining value set */
                        if (response.date_of_joining) {
                            $('#doj').val(response.date_of_joining);
                        } else {
                            $('#doj').val('0');
                        }

                        /* location value set */
                        $('#location').val(response.job_location);

                        /* active value set */
                        if (response.active == '1') {
                            $('#active').attr('checked', true);
                        } else {
                            $('#active').removeAttr('checked');
                        }
                    },
                    error: function() {
                        $("#popUp").show();
                        $('#popUp').attr('class', ' container alert alert-danger');
                        $('#popUp').text('Sorry something went wrong!');
                        $('#popUp').hide(10000);
                    }
                });

                /* call to this function for clearing all previous preeview */
                $('#inputFilePreview').html('');


                /* this functionis to hendal choose file button and it also has a limit of to store 5 files only */
                $('#chooseImgBtn').click(function() {
                    if (images.length == '5') {
                        alert('you can choose only 5 files');
                    } else {
                        $('#file').click();
                    }
                })

                /* this fun is to get selected file content and store it in variables */
                $('#file').change(function() {
                    var img = this.files;
                    for (let i = 0; i < img.length; i++) {
                        files.push(img[i]);
                        images.push({
                            "name": img[i].name,
                            "type": img[i].type,
                            "url": URL.createObjectURL(img[i]),
                            "file": img[i]
                        })
                    }
                    showPreview();
                })

                /* this function is to show selected file preview */
                function showPreview() {
                    var img = "";
                    var temp = images;
                    temp.forEach((i) => {
                        var ext = i.name.split('.');
                        if (ext[1] != 'pdf') {
                            img += `<div><img src="` + i.url + `" class='offest-1' id='imgpre` + temp.indexOf(i) + `' alt="image" style="height: 100px; width: 100px;">
                    <span for="imgpre` + temp.indexOf(i) + `" class='delete' data="` + temp.indexOf(i) + `">&times</span>
                    <div for="imgpre` + temp.indexOf(i) + `"> ` + i.name + `</div></div>`;
                        } else {
                            img += `<div><img class='offset-1' id='imgpre` + temp.indexOf(i) + `' src="https://i0.wp.com/www.woschool.com/wp-content/uploads/2020/09/png-transparent-pdf-icon-illustration-adobe-acrobat-portable-document-format-computer-icons-adobe-reader-file-pdf-icon-miscellaneous-text-logo.png" alt="image" style="height: 100px; width: 100px;">
                    <span for="imgpre` + temp.indexOf(i) + `" class='delete' data="` + temp.indexOf(i) + `">&times</span>
                    <div for="imgpre` + temp.indexOf(i) + `"> ` + i.name + `</div></div>`;
                        }
                    })
                    $('#inputFilePreview').html(img);
                }

                /* this function is to delete a image */
                $(document).on('click', '.delete', function() {
                    var id = $(this).attr('data');
                    images.splice(id, 1);
                    files.splice(id, 1);
                    showPreview();
                });
                /* filling id of the table in fill detail form */
                $('#id').val(id);

                /* loading model to take input */
                $('.fillEmployeeModal').show();

                /* hiding all the values of the role select box by defalt  */
                $('#incharge').hide();
                $('#lead').hide();
                $('#member').hide();

                /* input of employee type and filling value of emplyee role */
                $('#type').on('change', function() {
                    if (this.value == 'Permanent') {
                        $('#incharge').show();
                        $('#lead').show();
                        $('#member').show();
                    } else if (this.value == 'Temporary' || this.value == 'On Contract') {
                        $('#incharge').hide();
                        $('#lead').hide();
                        $('#member').show();
                    } else {
                        $('#incharge').hide();
                        $('#lead').hide();
                        $('#member').hide();
                    }
                });

                /* submiting the model details */
                $('#fillEmployeeDetailsForm').on('submit', (function(e) {
                    e.preventDefault();
                    var fd = new FormData(this);
                    files.forEach(function(file, i) {
                        fd.append("userfile[]", file);
                    });
                    $.ajax({
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        url: '<?php echo base_url() ?>fillEmployee',
                        data: fd,
                        dataType: 'json',
                        success: function(response) {
                            if (response == true) {
                                $("#popUp").show();
                                $('#popUp').attr('class', ' container alert alert-success');
                                $('#popUp').text('Employee updated');
                                $('#popUp').hide(10000);
                                $('#viewAllBtn').click();
                            } else {
                                $("#popUp").show();
                                $('#popUp').attr('class', ' container alert alert-danger');
                                $('#popUp').text('Internel server error or samedata exist');
                                $('#popUp').hide(10000);
                            }
                            $('#outputTable').DataTable().ajax.reload();
                        },
                        error: function() {
                            $("#popUp").show();
                            $('#popUp').attr('class', ' container alert alert-danger');
                            $('#popUp').text('Sorry something went wrong!');
                            $('#popUp').hide(10000);
                        }
                    });
                    $('.fillEmployeeModal').hide();
                }));


            });

        });
    </script>

</body>

</html>