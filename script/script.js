$(function () {
	$("#searchbtn").click(function () {
		var searchvalue = $("#searchvalue").val();
		if (searchvalue.length > 0) {
			var data = { fname: searchvalue };
			var jsondata = JSON.stringify(data);
			$.ajax({
				method: "POST",
				url: "http://localhost/ci/ci1/User/Search_Value.php",
				data: jsondata,
				async: false,
				dataType: "json",
				success: function (response) {
					if (response.status == false) {
						$("#popup").attr("class", " container alert alert-danger");
						$("#popup").text(response.massage);
						$("#popup").hide(5000);
					}
					showall(response);
				},
			});
		} else {
			alert("search bar is empty!");
		}
	});

	$("#AddSubjectBtn").click(function () {
		$.ajax({
			method: "GET",
			url: "http://localhost/ci/ci1/User/Search_Value.php",
			async: false,
			dataType: "json",
			success: function (response) {
				if (response.status == false) {
					$("#popup").attr("class", " container alert alert-danger");
					$("#popup").text(response.massage);
					$("#popup").hide(5000);
				}
				showall(response);
			},
		});
	});
});
