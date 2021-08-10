<?php 
	include('dbh.php');
	include('user.php');
	include 'inc/header.php';
	include 'inc/right_navbar.php';
	include 'inc/left_navbar.php';
?>
<style type="text/css">
	.saveBtn{
		visibility: hidden;
	}
</style>
	

	<!-- Dasboard content start here -->

	<div class="main-container">
		<div class="">
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">All Patient</h4>
					</div>
					<div class="pb-20">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Full-Name</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Created Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                        $results = $object->getAllPatient();
                                        if (!empty($results)) {
                                            foreach ($results as $key => $result) {    
                                        ?>
                                            
                                            <tr>
                                               <td><?=++$key?></td>
                                               <td id="name<?php echo $result['id'] ?>"><?=$result['name']?></td>
                                               <td><?=$result['dob']?></td>
                                               <td id="sex<?php echo $result['id'] ?>"><?=$result['sex']?></td>
                                               <td id="phone<?php echo $result['id'] ?>"><?=$result['phoneNo']?></td>
                                               <td><?=$result['created_at']?></td>
                                               <td>
                                               	<div class="dropdown">
													<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
														<i class="dw dw-more"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
														<a class="dropdown-item btn btn-link saveBtn" href="#" onclick="save_sd('<?php echo $result['id'];?>');" id="saveBtn<?php echo $result['id'] ?>"><i class="dw dw-eye" ></i> Save</a>

														<a class="dropdown-item btn btn-link" href="#" onclick="edit_sds('<?php echo $result['id'];?>');" id="editBtn<?php echo $result['id'] ?>"><i class="dw dw-edit2"></i> Edit</a>

														<a class="dropdown-item btn btn-link delete-btn" href="#" id="<?=$result['id']?>"><i class="dw dw-delete-3"></i> Delete</a>
													</div>
												</div>


                                               </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
							</tbody>
						</table>
					</div>
			</div>
					
					
					
		
			<!-- footer start -->
			
<?php 
	
	include 'inc/footer.php';
?>
<script type="text/javascript">
	 $(document).ready(function(){

    $('.delete-btn').on('click',function(){        
        swal({
            title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success margin-5',
                cancelButtonClass: 'btn btn-danger margin-5',
                buttonsStyling: false
        })
        .then((isConfirm) => {
            // if (isConfirm) {
                var id=this.id;
                $.ajax({
                  type:'post',
                  url:'function.php',
                  data:{
                   deleteSd:'deleteSd',
                   id:id,
                  },
                  success: function(inputValue){
                    if (inputValue=="success") 
                    {
                        swal("Deleted!", "Your Record has been deleted.", "success");
                    setTimeout(function(){// wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                  }, 1000); 
                    }
                    else{swal("Error", "Your Record is safe Please try again", "error");}
                    
                    }
                });
                
            // } 
        //     else {
        //         swal("cancel", "Your Record is safe", "error");
        //     }
        });

    });   

});
</script>
<script type="text/javascript">
	function edit_sds(id)
{
    //alert('hey');
 //var title=document.getElementById("title"+id).innerHTML;
 var fullname=document.getElementById("name"+id).innerHTML;
 var sex=document.getElementById("sex"+id).innerHTML;
 var phone=document.getElementById("phone"+id).innerHTML;
 document.getElementById("name"+id).innerHTML="<input type='text' class='form-control' autofocus id='fullname_text"+id+"' value='"+fullname+"'>";
 document.getElementById("sex"+id).innerHTML="<input type='text' class='form-control' id='sex_text"+id+"' value='"+sex+"'>";
 document.getElementById("phone"+id).innerHTML="<input type='text' class='form-control' id='phone_text"+id+"' value='"+phone+"'>";    
 document.getElementById("editBtn"+id).style.visibility="hidden";
 document.getElementById("saveBtn"+id).style.visibility="visible";
}

function save_sd(id)
{
 var fullname=document.getElementById("fullname_text"+id).value;
 var sex=document.getElementById("sex_text"+id).value;
 var phone=document.getElementById("phone_text"+id).value;
    
 $.ajax
 ({
  type:'post',
  url:'function.php',
  data:{
   edit_sd:'edit_sd',
   row_id:id,
   fullname:fullname,
   sex:sex,
   phone:phone,
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("name"+id).innerHTML=fullname;
    document.getElementById("sex"+id).innerHTML=sex;
    document.getElementById("phone"+id).innerHTML=phone;

    document.getElementById("editBtn"+id).style.visibility="visible";
    document.getElementById("saveBtn"+id).style.visibility="hidden";
    alert('Record Updated Successfully');
    // swal("Updated!", "Record Updated Successfully.", "success");
    //             setTimeout(function(){// wait for 5 secs(2)
    //                location.reload(); // then reload the page.(3)
    //           }, 1000);
   }
   else{
    alert('error occured');
   }
  }

 });
}

</script>