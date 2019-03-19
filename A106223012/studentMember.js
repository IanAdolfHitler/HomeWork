function CheckForm(form){
	output = "";
	check = true;
	if(form.account.value == ""){
		check = false;
		output += "請輸入帳號欄位\n";
	}
	if(form.password.value == ""){
		check = false;
		output += "請輸入密碼欄位\n";
	}
	if(form.password.value != form.re_password.value){
		check = false;
		output += "二次密碼輸入錯誤\n";
	}
	if(form.sex.value != "man" && form.sex.value != "female"){
		check = false;
		output += "請勾選性別欄位\n";
	}
	if(form.email.value.search("@") < 0){
		check = false;
		output += "請輸入正確的E-mail\n";
	}
	if(check){
		form.submit();
		return(true);
	}
	else{
		alert(output);
		return(false);
	}
}