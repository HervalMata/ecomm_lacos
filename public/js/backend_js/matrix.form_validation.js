
$(document).ready(function(){

    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'get',
            url: '/admin/check-pwd',
            data:{current_pwd:current_pwd},
            success:function (resp) {
                if (resp == "false") {
                    $("#chkPwd").html("<font color='red'>Senha atual está incorreta</font>");
                } else if (resp == "true") {
                    $("#chkPwd").html("<font color='green'>Senha atual está correta</font>");
                }
            },error:function() {
                    alert("erro");
            }
        })
    });

    $("#add_category").validate({
        rules:{
            category_name:{
                required:true
            },
            description:{
                required:true
            },
            url:{
                required:true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight:function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    $("#edit_category").validate({
            rules:{
                category_name:{
                    required:true
                },
                description:{
                    required:true
                },
                url:{
                    required:true
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight:function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight:function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

    $("#delCat").click(function () {
        if (confirm('Você tem certeza que quer excluir esta categoria?')) {
            return true;
        }
        return false;
    });

    $("#add_product").validate({
        rules:{
            category_id:{
                required:true
            },
            product_name:{
                required:true
            },
            product_code:{
                required:true
            },
            product_color:{
                required:true
            },
            description:{
                required:true
            },
            price:{
                required:true,
                number:true
            },
            image:{
                required:true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight:function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    $("#edit_product").validate({
        rules:{
            category_id:{
                required:true
            },
            product_name:{
                required:true
            },
            product_code:{
                required:true
            },
            product_color:{
                required:true
            },
            description:{
                required:true
            },
            price:{
                required:true,
                number:true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight:function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();

	$('select').select2();

	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#password_validate").validate({
		rules:{
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
    });

    $(".deleteRecord").click(function() {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        Swal({
             title: 'Você tem certeza?',
             text: 'Você não terá possibilidade de reverter essa ação!',
             type: 'Cuidado',
             showCancelButton: true,
             confirmButtonColor: '#308546',
             cancelButtonColor: '#d33',
             confirButtonText: 'Sim, Remova!'
        },
        function() {
            window.location.href = "/admin/" + deleteFunction + "/" + id;
        });
    });
});
