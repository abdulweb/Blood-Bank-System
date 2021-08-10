<?php 
	include('dbh.php');
	include('user.php');
	if(isset($_POST['edit_sd']))
{
	 $id=$_POST['row_id'];
	 $fullname=$_POST['fullname'];
	 $sex=$_POST['sex'];
	 $phone=$_POST['phone'];

	 $object = $object->update_patient($fullname,$sex,$phone,$id);
}

if (isset($_POST['deleteSd'])) {
	$id = $_POST['id'];
	$object = $object->delete_patient($id);
}
if (isset($_POST['add_donor'])) {
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$bloodGroup = $_POST['bloodGroup'];
	$object = $object->add_donor($fullname,$phone,$address,$bloodGroup);
}

if(isset($_POST['edit_donor']))
{
	 $id=$_POST['row_id'];
	 $fullname=$_POST['fullname'];
	 $bloodGroup=$_POST['bloodGroup'];
	 $phone=$_POST['phone'];
	 $address=$_POST['address'];

	 $object = $object->update_donor($fullname,$bloodGroup,$phone,$address,$id);
}

if (isset($_POST['delete_donor'])) {
	$id = $_POST['id'];
	$object = $object->delete_donor($id);
}
?>