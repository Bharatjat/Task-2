<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>chef</title>
</head>

<body>
    <!-- modal for create event -->
    <div class="modal createEvent" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">create event</h5>
                    <button type="reset" class="btn-close Close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createEventForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="p-2">
                            <div>
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="name" require>
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
                            <div class="col-md-8">
                                <label for="address">address</label>
                                <textarea type="text" class="form-control" name="address" id="address" placeholder="address" require></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="pincode">Pincode</label>
                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" require>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="noOfPeople">No Of People</label>
                                <input type="number" class="form-control noOfPeople" name="noOfPeople" id="noOfPeople" placeholder="No Of People to be expet" require>
                            </div>
                            <div>
                                <label for="noOfHours">No of Hours</label>
                                <input type="number" class="form-control noOfHours" name="noOfHours" id="noOfHours" placeholder="No of Hours" require>
                            </div>
                        </div>
                        <div class="p-2">
                            <div>
                                <label for="datetime">Event Date time</label>
                                <input type="datetime-local" class="form-control datetime" name="datetime" id="datetime" require>
                            </div>
                        </div>
                        <div class="p-2">
                            <div>
                                <label for="Cuisines">
                                    <h4>Cuisines</h4>
                                </label>
                                <div id="Cuisines" class="checkbox-group required">

                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <label for="chefList">
                                <h4>Chef's List</h4>
                            </label>
                            <div id="chefList">
                                <div class="text-danger" id="fillChefTextNotice"> Fill all above field to get available chef.</div>
                                <button type="button" id="searchChefBtn" class="btn btn-primary" disabled="disabled">Search</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly p-2">
                            <div>
                                <label for="subTotal">Sub total</label>
                                <input type="text" class="form-control" name="subTotal" id="subTotal" placeholder="Without TAX" require disabled>
                            </div>
                            <div>
                                <label for="grandTotal">Total payable Amount</label>
                                <input type="text" class="form-control" name="grandTotal" id="grandTotal" placeholder="With 18% TAX" require disabled>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary Close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="eventSaveBtn">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- buttom to create modal for create event modal -->
    <div class="container p-5 d-flex justify-content-center">
        <div class="container">
            <button type="button" class="btn btn-outline-success" id="createEventModalTriggerBtn">create event</button>
        </div>
    </div>

    <!-- All create event of the user -->
    <div class="container">
        <div class="p-5">
            <table class="table table-striped" id="outputTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Chef</th>
                        <th scope="col">Duration</th>
                        <th scope="col">No. of people</th>
                    </tr>
                </thead>
                <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
                <tbody id="showdata">

                </tbody>
            </table>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        <h1>Parsing using jquery and javascript</h1>
    </div>
    <!-- food test -->
    <div class="container">
        <div class="p-5">
            <table class="table table-striped" id="outputTable">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">description</th>
                        <th scope="col">calories</th>
                    </tr>
                </thead>
                <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
                <tbody id="showDataFood">

                </tbody>
            </table>
        </div>
    </div>

    <div class="container " id="outputXmlTest2"></div>

    <div class="d-flex justify-content-center">
        <h1>Parsing using PHP</h1>
    </div>

    <!-- food test -->
    <div class="container">
        <div class="p-5">
            <table class="table table-striped" id="outputTable">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">description</th>
                        <th scope="col">calories</th>
                    </tr>
                </thead>
                <!-- this part of the table is to show all dynamic part of the page like search result,etc -->
                <tbody>
                    <?php
                    $myXMLData = file_get_contents("http://[::1]/ci/ci1/assets/xmltest.xml");
                    $xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
                    $xmlArray = json_decode(json_encode((array)simplexml_load_string($myXMLData)), 1);
                    $html = '';
                    foreach ($xmlArray['food'] as $value) {
                        $html .= "<tr><td> " . $value['name'] . " </td><td> " . $value['price'] . "</td><td> " . $value['description'] . " </td><td> " . $value['calories'] . "</td></tr>";
                    }
                    echo $html;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <?php
        $myXMLData = file_get_contents("http://[::1]/ci/ci1/assets/xmltest2.xml");
        print_r($myXMLData);
        ?>
    </div>

    <!-- <img src="<?php echo base_url("assets/images/jquery-access-methods.PNG") ?>" alt="" srcset=""> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(function() {

            // console.log('<?php echo $html ?>');
            /* for closing open model */
            $('.Close').click(function() {
                $('.modal').hide();
            })

            /* to load all previous or ongoing event of this user */
            $.ajax({
                url: '<?php echo site_url('getAllUserChefEvent') ?>',
                method: 'GET',
                success: function(r) {
                    let response = JSON.parse(r);
                    if (response.status == 200) {
                        $('#showdata').html(response.data);
                    } else {
                        $('#showdata').html(response.data);
                    }
                }
            });

            /* food test api */
            $.ajax({
                // console.log("<?php echo base_url('/assets/xmltest.xml') ?>");
                url: "http://[::1]/ci/ci1/assets/xmltest.xml",
                datatype: 'xml',
                // headers: {  'Access-Control-Allow-Origin': '*' },
                success: function(r) {
                    html = '';
                    $(r).find('breakfast_menu food').each(function() {
                        let name = $(this).find('name').text();
                        let price = $(this).find('price').text();
                        let description = $(this).find('description').text();
                        let calories = $(this).find('calories').text();
                        html += `<tr><td> ${name} </td><td> ${price} </td><td> ${description} </td><td> ${calories} </td></tr>`;
                    })
                    $('#showDataFood').html(html);
                },
                error: function(e) {
                    console.log(e.text);
                }
            })

            /* xml test 2 */
            $.ajax({
                url: "http://[::1]/ci/ci1/assets/xmltest2.xml",
                method: "GET",
                success: function(r) {
                    $(r).find('article').each(function() {
                        // $("#outputXmlTest2").append($(this).text($(this).find(attr("articleinfo") + "<br />")));
                        // $(this).attr("title") + "<br />";
                        // $(this).find('title').append('<b><br>');
                        // $(this).find('</title>').append('</b><br>');
                        // $("#outputXmlTest2").append($(this).attr("sect1") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("para") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("emphasis") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("note") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("indexterm") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("primary") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("secondary") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("footnote") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("command") + "<br />");
                        // $("#outputXmlTest2").append($(this).attr("link") + "<br />");
                        $("#outputXmlTest2").append($(this).text());
                    });
                }
            })

            /* opening create event modal on button click */
            $('#createEventModalTriggerBtn').click(function() {

                /* loding modal */
                $('.createEvent').show();

                /* adding disable so its value can't be change by user */
                $("#subTotal, #grandTotal").prop('disabled', true);

                // reseting form 
                $('#createEventForm')[0].reset();

                /* getting country state city by an external function */
                getCountryStateCity();

                /* getting all cuisine from database by anexternal function */
                getCuisine();

                flag = false;
                $('.city, .noOfPeople, .noOfHours, .datetime, .checkbox').bind('load, change, click', function() {
                    if ($('.city').val() != '') {
                        flag = true;
                    } else {
                        flag = false;
                    }
                    if ($('.noOfPeople').val() > 1) {
                        flag = true;
                    } else {
                        flag = false;
                    }
                    if ($('.noOfHours').val() > 1) {
                        flag = true;
                    } else {
                        flag = false;
                    }
                    if ($('.datetime').val() != '') {
                        let date = $('.datetime').val().split('T');
                        let temp = date[0].split('-');
                        let inputYear = temp[0];
                        let inputMonth = temp[1];
                        let inputDay = temp[2];
                        let currentYear = new Date().getFullYear();
                        let currentMonth = new Date().getMonth();
                        let currentDay = new Date().getDate();
                        if (inputYear >= currentYear) {
                            if (inputMonth >= currentMonth) {
                                if (inputDay > currentDay) {
                                    flag = true;
                                } else {
                                    flag = false;
                                }
                            } else {
                                flag = false;
                            }
                        } else {
                            flag = false;
                        }


                    } else {
                        flag = false;
                    }
                    console.log(flag);
                    if (flag == true) {
                        $('#searchChefBtn').attr('disabled', false);
                        $('#fillChefTextNotice').hide();
                        $('#searchChefBtn').click(function() {
                            $.ajax({
                                url: "<?php echo site_url('loadChefForEvent') ?>",
                                method: "POST",
                                data: $("#createEventForm").serialize(),
                                success: function(r) {
                                    let response = JSON.parse(r);
                                    if (response.status == 200) {
                                        $('#chefList').html(response.data);
                                    } else {
                                        $('#chefList').html('No Data Found!');
                                    }
                                },
                                error: function(e) {
                                    $('#chefList').html('Connection Error!');
                                }
                            })
                        })
                    } else {
                        $('#searchChefBtn').attr('disabled', true);
                        $('#fillChefTextNotice').show();
                    }
                });

                /* submiting new event form */
                $('#eventSaveBtn').click(function() {

                    /* removing disable so its value van go via ajax */
                    $("#subTotal, #grandTotal").prop('disabled', false);

                    /* passing form data via ajax */
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url('saveChefEvent') ?>',
                        data: $('#createEventForm').serialize(),
                        dataType: 'json',
                        success: function(response) {

                            if (response.status == 200) {
                                $('.modal').hide();
                            } else {
                                alert(response.data);
                            }
                        }
                    })
                });
            })

            /* loading total and grand total on chef select */
            $(document).on("click", ".eventChefList", function() {
                let ratePerHourOfChef = $(this).data("rate");
                let subTotal = ratePerHourOfChef * $('#noOfHours').val();
                $('#subTotal').val(subTotal);
                let tax = 18;
                let grandTotal = subTotal * tax;
                $('#grandTotal').val(grandTotal);
            });

            /* get all country state and city by external api */
            function getCountryStateCity() {
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
            }

            /* getting all cuisines list from database */
            function getCuisine() {
                /* all Cuisines */
                $.ajax({
                    type: 'GET',
                    url: '<?php echo site_url('getCuisines') ?>',
                    dataType: 'json',
                    success: function(response) {

                        if (response.status == 200) {
                            $('#Cuisines').html(response.data);
                        } else {
                            alert(response.data);
                        }
                    }
                })
            }
        })
    </script>
</body>

</html>