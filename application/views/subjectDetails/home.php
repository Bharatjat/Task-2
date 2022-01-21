<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Subject details Home page</title>
</head>

<body>
    <!-- corusel - model for add subject -->
    <div class="modal addstudentModal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="newSubjectDetailsForm">
                        <div class="container p-2">
                            <input class="form-control subjectName" id='subjectName' type="text" placeholder="Subject Name" name="subjectName">
                        </div>
                        <div class="container p-2">
                            <input class="form-control discription" id='discription' type="text" placeholder="Discription" name="discription">
                        </div>
                        <div class="container p-2">
                            <input class="form-control time" id="time" type="text" placeholder="Time allocated in min" name="time">
                        </div>
                        <div class="container p-2">
                            <input class="form-control noOfStudent" id="noOfStudent" type="text" placeholder="Number of students" name="noOfStudent">
                        </div>
                        <div class="container p-2">
                            <input class="form-control roomNo" id="roomNo" type="text" placeholder="Room no" name="roomNo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addSubjectBtn" data-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End corusel - model -->

    <!-- corusel - model for View/Edit subject -->
    <div class="modal viewEditStudentModal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit/View Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="editSubjectDetailsForm">
                        <div class="container p-2">
                            <input class="form-control" id='subjectId' type="text" placeholder="Subject id" name="subjectId">
                        </div>
                        <div class="container p-2">
                            <label for="subjectNameEditView">Subject Name</label>
                            <input class="form-control subjectName" id='subjectNameEditView' type="text" placeholder="Subject Name" name="subjectName">
                        </div>
                        <div class="container p-2">
                            <label for="discriptionEditView">Discription</label>
                            <input class="form-control discription" id='discriptionEditView' type="text" placeholder="Discription" name="discription">
                        </div>
                        <div class="container p-2">
                            <label for="timeEditView">Time allocated in min</label>
                            <input class="form-control time" id="timeEditView" type="text" placeholder="Time allocated in min" name="time">
                        </div>
                        <div class="container p-2">
                            <label for="noOfStudentEditView">Number of students</label>
                            <input class="form-control noOfStudent" id="noOfStudentEditView" type="text" placeholder="Number of students" name="noOfStudent">
                        </div>
                        <div class="container p-2">
                            <label for="roomNoEditView">Room no</label>
                            <input class="form-control roomNo" id="roomNoEditView" type="text" placeholder="Room no" name="roomNo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editBtn">Edit</button>
                    <button type="button" class="btn btn-primary" id="saveEditBtn">Save Edit</button>
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End corusel - model -->

    <!-- corusel - model for Download subjects -->
    <div class="modal downloadOptionModel" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Download options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <button type="button" id="excellDownloadBtn" class="btn btn-outline-primary">Excell</button>
                        <button type="button" id="pdfDownloadBtn" class="btn btn-outline-primary offset-3">Pdf</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End corusel - model -->

    <div class="container" style="background-color: rgb(165, 149, 202)">
        <div class="row">
            <div class="col-md-7">
                <h1>
                    Subject details system using ajax & jquery.
                </h1>
            </div>
            <div class="col-md-5 d-flex justify-content-end align-items-center">
                <div>
                    <form action="" method="post" id="SearchForm">
                        <input class="form-control" type="search" name="searchvalue" id="searchvalue" placeholder="search name">
                    </form>
                </div>
                <div class="offset-md-1">
                    <button class="btn btn-outline-success" type="submit" id="searchbtn">
                        Search
                    </button>
                </div>
                <div class="offset-md-1">

                    <?php echo form_open('logout') ?>
                    <button type="submit" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">logout</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="background-color: rgb(245, 158, 226)">
        <div class="row align-items-center p-2 d-flex">
            <div class="col-md-6">

            </div>
            <div class="col-md-3  d-flex">
                <div class="col-md-4">
                    <!-- this button is to add new subject  -->
                    <button type="submit" class="btn btn-success" id="addSubject">
                        Add subject
                    </button>
                </div>
                <div class="col-md-4 offset-3 d-flex">
                    <button type="submit" class="btn btn-success" id="viewAllBtn">
                        view all
                    </button>
                </div>
                <div class="col-md-4 offset-3 d-flex">
                    <button type="submit" class="btn btn-success" id="downloadBtn">
                        Download
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Time allocated</th>
                    <th scope="col">Room no.</th>
                    <th scope="col">Action</th>
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

            /* download */
            $('#downloadBtn').click(function() {

                console.log(subjectIds);
                if (subjectIds.length === 0) {
                    $("#popUp").show();
                    $("#popUp").attr("class", " container alert alert-danger");
                    $("#popUp").text('!No data is set to download');
                    $("#popUp").hide(10000);
                } else {
                    $('.downloadOptionModel').show();
                    /* converting text into json and storing it in a variable */
                    var data = JSON.stringify(subjectIds);
                    $('#excellDownloadBtn').click(function() {
                        $.ajax({
                            method: "POST",
                            url: "<?php echo base_url() ?>excelDownload",
                            data: {
                                id: data
                            },
                            async: false,
                            dataType: "json",
                            success: function(response) {}
                        });
                        $('.downloadOptionModel').hide();
                    });
                    $('#pdfDownloadBtn').click(function() {
                        $.ajax({
                            method: "POST",
                            url: "<?php echo base_url() ?>pdfDownload",
                            data: {
                                id: data
                            },
                            async: false,
                            dataType: "json",
                            success: function(response) {}
                        });
                        $('.downloadOptionModel').hide();
                    });
                }
            });

            /* for showing all data to user when page load */
            $("#viewAllBtn").trigger("click");

            /* this method is to close any open mode when user click on close button */
            $(".close").click(function() {
                $(".modal").hide();
            });

            /* this array will store all the subject id in it and it will be helping in creating pdf/excel */
            var subjectIds = [];

            /* this method is to search subject name it take input from searchValue and send it to its specified
            controller */
            $("#searchbtn").click(function() {

                /* taking input from search bar */
                var searchvalue = $("#searchvalue").val();

                /* checking if search bar is empty or not if empty then else part will execute */
                if (searchvalue.length > 0) {

                    /* converting text into json and storing it in a variable */
                    var data = JSON.stringify(searchvalue);

                    $.ajax({
                        method: "POST",
                        url: "<?php echo base_url() ?>searchSubject",
                        data: {
                            searchvalue: data
                        },
                        async: false,
                        dataType: "json",
                        success: function(response) {
                            if (response == false) {
                                $("#popUp").show();
                                $("#popUp").attr("class", " container alert alert-danger");
                                $("#popUp").text('!No subject found');
                                $("#popUp").hide(10000);
                            } else {
                                ShowAllData(response);
                            }
                        },
                        error: function(error) {
                            $("#popUp").show();
                            $("#popUp").attr("class", " container alert alert-danger");
                            $("#popUp").text('!Something went wrong');
                            $("#popUp").hide(10000);
                        }
                    });
                } else {
                    alert("search bar is empty!");
                }
            });

            /* this method is to view all data from the database which is active it does not take any input */
            $("#viewAllBtn").click(function() {
                $.ajax({
                    method: "GET",
                    url: "<?php echo base_url() ?>allSubjectDetails",
                    async: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == false) {
                            $("#popUp").show();
                            $("#popUp").attr("class", " container alert alert-danger");
                            $("#popUp").text(response.massage);
                            $("#popUp").hide(10000);
                        }
                        /* calling external function to print all data on view part */
                        ShowAllData(response);
                    },
                });
            });

            /* this method is to add subject details in the database it take input from subjectEntered form */
            $('#addSubject').click(function() {

                $('.addstudentModal').show(); // to visible the input modal form

                /* if user click on add button in modal then this will run */
                $('#addSubjectBtn').click(function() {

                    /* this method is to check if all fied is fill or not if not then it return an alert */
                    if (checkingAllFieldSet() == true) {

                        /* taking all input from the form using jquery searialize method */
                        var data = $('#newSubjectDetailsForm').serialize();

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>addSubj",
                            data: data,
                            async: false,
                            dataType: "json",
                            success: function(response) {
                                if (response != true) {
                                    $("#popUp").show();
                                    $("#popUp").attr("class", " container alert alert-danger");
                                    $("#popUp").text(response);
                                    $("#popUp").hide(10000);
                                    $("#viewAllBtn").click();
                                    $(".modal").hide();
                                } else {
                                    $("#popUp").show();
                                    $("#popUp").attr("class", " container alert alert-success");
                                    $("#popUp").text("Record inserted succesfully");
                                    $("#popUp").hide(10000);
                                    $("#viewAllBtn").click();
                                    $(".modal").hide();
                                }
                            },
                        });
                    } else {
                        alert('all field is required');
                    }
                })
            })

            //delete- 
            $('#showdata').on('click', '.item-delete', function() {

                /* taking selected record id from user data attribute  */
                var id = $(this).attr('data');

                $.ajax({
                    type: 'ajax',
                    method: 'POST',
                    async: false,
                    url: '<?php echo base_url() ?>deleteSubject',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response == true) {
                            $("#popUp").show();
                            $('#popUp').attr('class', ' container alert alert-success');
                            $('#popUp').text('Subject Deleted');
                            $('#popUp').hide(10000);
                            $('#viewAllBtn').click();
                        }
                    },
                    error: function() {
                        $("#popUp").show();
                        $('#popUp').attr('class', ' container alert alert-danger');
                        $('#popUp').text('Sorry something went wrong!');
                        $('#popUp').hide(10000);
                    }
                });
            });

            //view and edit- 
            $('#showdata').on('click', '.item-edit', function() {

                /* taking selected record id from user data attribute  */
                var id = $(this).attr('data');

                /* this ajax call is to retrive all information about the selected row */
                $.ajax({
                    type: 'ajax',
                    method: 'POST',
                    async: false,
                    url: '<?php echo base_url() ?>viewSelectedData',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {

                        /* calling viewEditStudentModal to show selected record */
                        $('.viewEditStudentModal').show();

                        /* this part is to set all data in input field and making it desable for view only */
                        $('#subjectId').val(id).hide(); // getting id hidden so no one can change it and it will help in update part
                        $('#subjectNameEditView').val(response[0].name).attr('disabled', 'disabled');
                        $('#discriptionEditView').val(response[0].description).attr('disabled', 'disabled');
                        $('#timeEditView').val(response[0].time_allocated + ' min').attr('disabled', 'disabled');
                        $('#noOfStudentEditView').val(response[0].number_of_student).attr('disabled', 'disabled');
                        $('#roomNoEditView').val(response[0].room_no).attr('disabled', 'disabled');

                        /* this is to hide save edit button on view time */
                        $('#saveEditBtn').hide();

                        /* this is to show edit button on view time */
                        $('#editBtn').show();

                        /* if user click on edit button in view modal to update data then this function will run */
                        $('#editBtn').click(function() {

                            /* this is to show save edit button on update time */
                            $('#saveEditBtn').show();

                            /* this is to hide edit button on update time */
                            $('#editBtn').hide();

                            /* this part is to set all input attribute to on disable for update purpose */
                            $('#subjectNameEditView').removeAttr('disabled');
                            $('#discriptionEditView').removeAttr('disabled');
                            $('#timeEditView').removeAttr('disabled');
                            $('#noOfStudentEditView').removeAttr('disabled');
                            $('#roomNoEditView').removeAttr('disabled');

                            /* if user click on save edit butten to update record then this function will be executed */
                            $('#saveEditBtn').click(function() {

                                /* checking if all field is filled 
                                if true then if will execute or if not filled then else will execute*/
                                if (true) {
                                    $.ajax({
                                        type: 'ajax',
                                        method: 'POST',
                                        async: false,
                                        url: '<?php echo base_url() ?>updateSelectedData',
                                        data: $('#editSubjectDetailsForm').serialize(),
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response == true) {
                                                $("#popUp").show();
                                                $('#popUp').attr('class', ' container alert alert-success');
                                                $('#popUp').text('Subject Updated');
                                                $('#popUp').hide(10000);
                                                $('#viewAllBtn').click();
                                            } else if (response == false) {
                                                $("#popUp").show();
                                                $('#popUp').attr('class', ' container alert alert-danger');
                                                $('#popUp').text('Sorry something went wrong!');
                                                $('#popUp').hide(10000);
                                            } else {
                                                $("#popUp").show();
                                                $('#popUp').attr('class', ' container alert alert-danger');
                                                $('#popUp').text(response);
                                                $('#popUp').hide(10000);
                                            }
                                            $('.viewEditStudentModal').hide();
                                        },
                                        error: function() {
                                            $("#popUp").show();
                                            $('#popUp').attr('class', ' container alert alert-danger');
                                            $('#popUp').text('Sorry something went wrong!');
                                            $('#popUp').hide(10000);
                                        }
                                    });
                                } else {
                                    alert('all field is required'); //giving alert if field is empty
                                }
                            })

                        })
                    },
                    error: function() {
                        $("#popUp").show();
                        $('#popUp').attr('class', ' container alert alert-danger');
                        $('#popUp').text('Sorry something went wrong!');
                        $('#popUp').hide(3000);
                    }
                });
            });

            /* this function is to check if all input field is set it return false if any field is not set
            and return true if all field is set */
            function checkingAllFieldSet() {

                /* flag 0 = unempty and 1= empty */
                flag = 0;

                /* this jquery each method is to check if any of input field is empty or not  */
                $('.subjectName, .discription, .time, .noOfStudent, .roomNo').each(function() {

                    /* checking if the selected field is incomplete and flag is not set then execute if or complete then else */
                    if ($(this).val() == '' && flag == 0) {

                        flag = 1; // if any field is empty flag will be set
                    }
                });

                /* checking flag value and returning value accordinly */
                if (flag == 0) {
                    return true;
                } else {
                    return false;
                }
            }

            /* function to display data in tabulat formate on front end part */
            function ShowAllData(response) {

                /* this method is to clear all previous value of showdata id  */
                $('#showdata').html('');

                /* it's a variable that  will take the data and html part in side itself */
                var html = '';

                /* this for loop is to mearge all data and html in a particular format in side html variable */

                for (i = 0; i < response.length; i++) {

                    /* storing displayed subject id in subjectIds array */
                    subjectIds.push(response[i].id);

                    /* setting data in html formate in a variable */
                    html += '<tr>' +
                        '<td>' + response[i].id + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td>' + response[i].description + '</td>' +
                        '<td>' + response[i].time_allocated + 'min' + '</td>' +
                        '<td>' + response[i].room_no + '</td>' +
                        '<td>' +
                        '<a href="javascript:;" class="btn btn-info item-edit" data-toggle="modal" data="' + response[i].id + '">View/Edit</a>' +
                        '<a href="javascript:;" class="btn btn-danger item-delete" data="' + response[i].id + '">Delete</a>' +
                        '</td>' +
                        '</tr>';
                }

                /*  printing all html variable value in showdata id  */
                $('#showdata').html(html);
            }
        });
    </script>
</body>

</html>