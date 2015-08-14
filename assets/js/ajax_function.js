function showStaff(str){
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var agency_id = parseInt(str);
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4) {
			
			document.getElementById('staff_select').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("POST","http://localhost/publicservice/ajax/process/getStaffByAgency",true); 
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	xmlhttp.send('agency_id=' + agency_id); 
}

function showField(str) {
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var agency_id = parseInt(str);
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4) {
			document.getElementById('field_select').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("POST","http://localhost/publicservice/ajax/process/getFieldByAgency",true); 
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	xmlhttp.send('agency_id=' + agency_id); 
}

function showService(str) {
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var agency_id = parseInt(str);
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4) {
			document.getElementById('service_select').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","http://localhost/publicservice/ajax/process/getServiceByAgency",true); 
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	xmlhttp.send('agency_id=' + agency_id); 
}

