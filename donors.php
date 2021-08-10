<?php 
	include('dbh.php');
	include('user.php');
	include 'inc/header.php';
	include 'inc/right_navbar.php';
  include 'inc/left_navbar.php';
	include 'inc/modal.php';
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
					<div class="row">
              <div class="col-md-6 pt-20 pl-20">
                  <h4 class="text-blue h4">List of Donors</h4>
              </div>
              <div class="col-md-6 pt-20 pr-20">
                  <!-- <button class="btn btn-info pull-right"> <i class="fa fa-user"></i> New Donors</button> -->
                  <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target="#bd-example-modal-lg" type="button" alt="modal"> <i class="fa fa-user"></i>
                    New Donors
                  </a>
              </div>
          </div>
          
					
					<div class="pb-20">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">#</th>
									<th>Donor Name</th>
									<th>Blood Group</th>
									<th>Contact No</th>
									<th>Address</th>
									<th>Created Date</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                        $results = $object->getAllDonor();
                                        if (!empty($results)) {
                                            foreach ($results as $key => $result) {    
                                        ?>
                                            
                                            <tr>
                                               <td><?=++$key?></td>
                                               <td id="name<?php echo $result['id'] ?>"><?=$result['name']?></td>
                                               <td id="bloodGroup<?php echo $result['id'] ?>"><?=$result['blood_group']?></td>
                                               <td id="phone<?php echo $result['id'] ?>"><?=$result['contact_no']?></td>
                                               <td id="address<?php echo $result['id'] ?>"><?=$result['address']?></td>
                                               <td><?=$result['created_at']?></td>
                                               <td>
                                               	<div class="dropdown">
                        													<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        														<i class="dw dw-more"></i>
                        													</a>
                        													<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        														<a class="dropdown-item btn btn-link saveBtn" href="#" onclick="save_donor('<?php echo $result['id'];?>');" id="saveBtn<?php echo $result['id'] ?>"><i class="dw dw-eye" ></i> Save</a>

                        														<a class="dropdown-item btn btn-link" href="#" onclick="edit_donor('<?php echo $result['id'];?>');" id="editBtn<?php echo $result['id'] ?>"><i class="dw dw-edit2"></i> Edit</a>

                        														<a class="dropdown-item btn btn-link" href="#" onclick="delete_donor('<?php echo $result['id'];?>');"  id="deleteBtn<?php echo $result['id'] ?>"><i class="dw dw-delete-3"></i> Delete</a>

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
  function delete_donor(id)
  {
    var result = confirm("Want to delete?");
    if (result) {
        $.ajax({
          url:'function.php',
          method:'POST',
          data:{delete_donor:'delete_donor',id:id},
          success:function(resp){
            if(resp=="success"){
              swal("Deleted!", "Record Deleted Successfully.", "success");
              setTimeout(function(){
                location.reload()
              },1000)

            }
          }
        });
      }
  }
    
</script>

<script type="text/javascript">
	function edit_donor(id)
{
    //alert('hey');
 //var title=document.getElementById("title"+id).innerHTML;
 var fullname=document.getElementById("name"+id).innerHTML;
 var bloodGroup=document.getElementById("bloodGroup"+id).innerHTML;
 var phone=document.getElementById("phone"+id).innerHTML;
 var address=document.getElementById("address"+id).innerHTML;

 document.getElementById("name"+id).innerHTML="<input type='text' class='form-control' autofocus id='fullname_text"+id+"' value='"+fullname+"'>";
 document.getElementById("bloodGroup"+id).innerHTML="<input type='text' class='form-control' id='bloodGroup_text"+id+"' value='"+bloodGroup+"'>";
 document.getElementById("phone"+id).innerHTML="<input type='text' class='form-control' id='phone_text"+id+"' value='"+phone+"'>";    
 document.getElementById("address"+id).innerHTML="<input type='text' class='form-control' id='address_text"+id+"' value='"+address+"'>";    

 document.getElementById("editBtn"+id).style.visibility="hidden";
 document.getElementById("saveBtn"+id).style.visibility="visible";
}


function save_donor(id)
{
 var fullname=document.getElementById("fullname_text"+id).value;
 var bloodGroup=document.getElementById("bloodGroup_text"+id).value;
 var phone=document.getElementById("phone_text"+id).value;
 var address=document.getElementById("address_text"+id).value;
    
 $.ajax
 ({
  type:'post',
  url:'function.php',
  data:{
   edit_donor:'edit_donor',
   row_id:id,
   fullname:fullname,
   bloodGroup:bloodGroup,
   phone:phone,
   address:address,

  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("name"+id).innerHTML=fullname;
    document.getElementById("bloodGroup"+id).innerHTML=bloodGroup;
    document.getElementById("phone"+id).innerHTML=phone;
    document.getElementById("address"+id).innerHTML=address;

    document.getElementById("editBtn"+id).style.visibility="visible";
    document.getElementById("saveBtn"+id).style.visibility="hidden";
    // alert('Record Updated Successfully');
    swal("Updated!", "Record Updated Successfully.", "success");
                setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000);
   }
   else{
    alert('Error occured');
   }
  }

 });
}

</script>