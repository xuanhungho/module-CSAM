function check(form) {
                    var code= "<?php echo $code; ?>";

                    var name= "<?php echo $name; ?>";
                    var email= "<?php echo $email; ?>";
                    var password= "<?php echo $password; ?>";
                    var MSSV= "<?php echo $MSSV; ?>";
                    var date= "<?php echo $date; ?>";

                    var activeCode = form.activeCode.value;

                    if (activeCode != code) {
                        alert("Mã kích hoạt sai!");
                        return false;
                    }
                    $.ajax({
                        url: "addacount.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            MSSV: MSSV,
                            name: name,
                            email: email,
                            password: password,
                            date: date
                        },
                    });
                }