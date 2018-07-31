$(document).ready(function(){
    
	//*******************************
	//
	//	  USED FOR AJAX REQUEST
	//
	//*******************************
	
	// Validate comments and see it in user page
	$(".see-comment").click(function(){

		var id = $(this).attr('id');
        
		$.post('./ajax/see_comment.php',{id:id},function(){
            $("#commentaire_"+id).hide();
			window.location.reload();
        });

	});

	// Delete comment
    $(".delete-comment").click(function(){
		
		var id = $(this).attr('id');
        
		// Ajax request
		$.post('ajax/delete_comment.php',{id:id},function(){
			$("#commentaire_"+id).hide();
			window.location.reload();
        });
		
    });
	
	// Delete post
    $(".delete-post").click(function(){
		
		var id = $(this).attr('id');
        
		// Ajax request
		$.post('ajax/delete_post.php',{id:id},function(){});
		
    });
	
	// Delete admin
    $(".delete-admin").click(function(){
		
		var id = $(this).attr('id');
        
		// Ajax request
		$.post('ajax/delete_admin.php',{id:id},function(){
			$("#admin_"+id).hide();
			window.location.reload();
		});
		
    });

	
	//*******************************
	//
	//	  USED FOR MATERIAL SELECT
	//
	//*******************************
	$('.mdb-select').material_select();
	
});