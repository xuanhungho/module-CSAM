function load_ajax(form) {
					var password = form.password.value;
                    var password2 = form.password2.value;
                    var name = form.name.value;
                    var code = form.code.value;
                  
                    if (name.length>50 || name.length<5) {
    					alert("Họ và tên phải có độ dài 5-50 ký tự!");
    					return false;
						}
					if (code.length>100 || code.length<3) {
    					alert("Mã số sinh viên phải có độ dài 3-10 ký tự!");
    					return false;
						}
                    if (password.length>50 || password.length<5) {
    					alert("Mật khẩu phải có độ dài 5-50 ký tự!");
    					return false;
						}
                    if (password != password2) {
    					alert("Mật khẩu nhập lại không trùng!");
    					return false;
						}

                    }