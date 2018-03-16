function validate(){
    var p=document.getElementById("password");
    var p1=document.getElementById("confirm_password");
    if(p.value!=p1.value){
        p1.setCustomValidate("Passwords dont match");
    }
    else{
        p1.setCustomValidate("");
    }
}