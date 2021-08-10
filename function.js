// To add new Donors start here
  $('#submit-form').submit(function(e){
    e.preventDefault() 
    $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
    var address=document.getElementById("address").value;
    var fullname=document.getElementById("fullname").value;
    var bloodGroup=document.getElementById("bloodGroup").value;
    var phone=document.getElementById("contactNo").value;
    console.log(address+fullname+bloodGroup+phone);

    // });

      $.ajax
       ({
        type:'post',
        url:'function.php',
        data:{
         add_donor:'add_donor',
         address:address,
         fullname:fullname,
         bloodGroup:bloodGroup,
         phone:phone,
        },
        // data:$(this).serialize(),
        success:function(response) {
         if(response=="success")
         {
         
          swal("Successfully!", "Record Updated Successfully.", "success");
                      setTimeout(function(){// wait for 5 secs(2)
                         location.reload(); // then reload the page.(3)
                    }, 1000);
         }
         else{
          alert('Error occured');
         }
        }

       });   

});

// To add new Donors end here