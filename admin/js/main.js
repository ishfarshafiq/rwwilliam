function viewAlbum(gallery_mainID)
{
	
	
	$.ajax({
				url: "ProcessController.php",
				type: "POST",
				data: {
					gallery_mainID: gallery_mainID
				},
				dataType: "json",
				success: function(response){

					if(response.res_status === "success"){
						
						document.getElementById('gallery_mainID').value = gallery_mainID;
						document.getElementById('edit_title').value = response.title;
						document.getElementById('edit_category').value = response.category;
						document.getElementById('edit_date').value = response.date;
						document.getElementById('edit_description').value = response.description;
						document.getElementById('edit_status').value = response.status;

					}
				},
				error: function(){
					alert("Server error");
				}
			});
	
}

function viewAnnouncement(newsID)
{
	
	
	$.ajax({
				url: "ProcessController.php",
				type: "POST",
				data: {
					newsID: newsID
				},
				dataType: "json",
				success: function(response){

					if(response.res_status === "success"){
						
						document.getElementById('newsID').value = newsID;
						document.getElementById('edit_title').value = response.title;
						document.getElementById('edit_category').value = response.category;
						document.getElementById('edit_publish_date').value = response.publish_date;
						document.getElementById('edit_author').value = response.author;
						document.getElementById('edit_description').value = response.description;
						document.getElementById('edit_icon').value = response.icon;
						document.getElementById('edit_status').value = response.status;
						 if(response.image){
								document.getElementById('edit_imgPreviewSrc').src = response.image;
								document.getElementById('edit_imgPreview').style.display = "block";
							}

					}
				},
				error: function(){
					alert("Server error");
				}
			});
	
}

function viewBanner(bannerID)
{
	$.ajax({
				url: "ProcessController.php",
				type: "POST",
				data: {
					bannerID: bannerID
				},
				dataType: "json",
				success: function(response){

					if(response.res_status === "success"){
						
						document.getElementById('bannerID').value = bannerID;
						document.getElementById('edit_label_badge').value = response.label_badge;
						document.getElementById('edit_title').value = response.title;
						document.getElementById('edit_title_highlight').value = response.title_highlight;
						document.getElementById('edit_description').value = response.description;
						document.getElementById('edit_button_text_one').value = response.button_text_one;
						document.getElementById('edit_button_link_one').value = response.button_link_one;
						document.getElementById('edit_button_text_two').value = response.button_text_two;
						document.getElementById('edit_button_link_two').value = response.button_link_two;
						document.getElementById('edit_sort').value = response.sort;
						document.getElementById('edit_status').value = response.status;
						 if(response.image){
								document.getElementById('edit_imgPreviewSrc').src = response.image;
								document.getElementById('edit_imgPreview').style.display = "block";
							}

					}
				},
				error: function(){
					alert("Server error");
				}
			});
}

