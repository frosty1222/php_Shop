$(document).ready(function() {
    $("#textname").blur(function() {
        var u = $(this).val();
        $.get("index.php?controller=Branch&run=checkuser", {
            uname: u,
            
        }, function(data) {
            if (data == 0) {
                $("#showerrorname").html("correct!");
                $("#showerrorname").css("color", "white");
                $("#showerrorname").css("background", "green");
            } else {
                $("#showerrorname").html("incorrect!");
                $("#showerrorname").css("color", "black");
                $("#showerrorname").css("background", "red");
            }
        })
    })
})
$(document).ready(function() {
$("#textname").blur(function() {
    var u1 = $(this).val();
    $.get("index.php?controller=Branch&run=checkemail", {
        uemail: u1,
        
    }, function(data) {
        if (data == 0) {
            $("#showerroremail").html("correct!");
            $("#showerroremail").css("color", "white");
            $("#showerroremail").css("background", "green");
        } else {
            $("#showerroremail").html("incorrect!");
            $("#showerroremail").css("color", "black");
            $("#showerroremail").css("background", "red");
        }
    })
})
})
$(document).ready(function() {
$("#textphone").blur(function() {
    var u2 = $(this).val();
    $.get("index.php?controller=Branch&run=checkphone", {
        uphone: u2,
    }, function(data) {
        if (data == 0) {
            $("#showerrorphone").html("correct!");
            $("#showerrorphone").css("color", "white");
            $("#showerrorphone").css("background", "green");
        } else {
            $("#showerrorphone").html("incorrect!");
            $("#showerrorphone").css("color", "black");
            $("#showerrorphone").css("background", "red");
        }
    })
})
})