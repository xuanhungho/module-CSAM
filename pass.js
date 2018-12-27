 function check(form) {
     var code= "<?php echo $code; ?>";              
     var email= "<?php echo $email; ?>";
       var newpass= "<?php echo $newpass; ?>";

                    var activeCode = form.activeCode.value;

                    if (activeCode != code) {
                        alert("Mã kích hoạt sai!");
                        return false;
                    }
                    $.ajax({
                        url: "updatepass.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            email: email,
                            newpass: newpass
                        },
                    });
                }