function checkform(theform){
	var why = "";
	 
	if(theform.author_name.value == ""){
		why += "- لا يمكنك ترك  الاسم فارغ.\n";
	}

	if(theform.comment.value == ""){
		why += "- لا يمكنك ارسال تعليق فارغ.\n";
	}
	
	if(theform.txtInput.value == ""){
		why += "- لم تقم بإدخال رقم التحقق.\n";
	}
	if(theform.txtInput.value != ""){
		if(ValidCaptcha(theform.txtInput.value) == false){
			why += "- الأرقام التي ادخلتها خاطئة.\n";
		}
	}
	if(why != ""){
		alert(why);
		return false;
	}
}


//Generates the captcha function    
	var code = '';
	for(i=0; i<=4; i++){
		code += Math.ceil(Math.random() * 9) + '';
	}
	document.getElementById("txtCaptcha").value = code;
	document.getElementById("txtCaptchaDiv").innerHTML = code;	
	

// Validate the Entered input aganist the generated security code function   
function ValidCaptcha(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
	var str2 = removeSpaces(document.getElementById('txtInput').value);
	if (str1 == str2){
		return true;	
	}else{
		return false;
	}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
	return string.split(' ').join('');
}
