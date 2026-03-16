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