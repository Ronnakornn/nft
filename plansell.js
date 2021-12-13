function modLoadAddNew() {
	jQuery("#load_mainwaiting").show();
	jQuery("#load_mainContant").hide();
	var TYPE="POST";
	var URL="plansell_action.php";
$('#myaction').val('addnew');
var dataSet= $("#myForm").serialize();
jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			jQuery("#load_mainContant").show();
			jQuery("#load_mainContant").html(html);
			jQuery("#load_mainwaiting").hide();
		}
	});
}

function ModBuyplan() {
	jQuery("#load_mainwaiting").show();
	jQuery("#load_mainContant").hide();
	var TYPE="POST";
	var URL="plansell_action.php";
	$('#myaction').val('ModBuyplan');
	var dataSet= $("#myForm").serialize();
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			jQuery("#load_mainContant").show();
			jQuery("#load_mainContant").html(html);
			jQuery("#load_mainwaiting").hide();
		}
	});
}

function modDelete(myid) { 
	Swal.fire({
		title: 'แน่ใจหรือไม่ ?',
		text: "ต้องการลบรายการนี้ !!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			var TYPE="POST";
			var URL="plansell_action.php";
			var dataSet= {
				myid : myid,
				myaction : 'delete'
			};
			jQuery.ajax({type:TYPE,url:URL,data:dataSet,
				success:function(response){
					// jQuery("#load_mainContant").show();
					// jQuery("#load_mainContant").html(html);
					// jQuery("#load_mainwaiting").hide();
					// modLoadContent();
					if(response.includes('success')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Success',
							'Delete Successfully',
							'success'
						).then(() => {
							modLoadContent();
						});
					}else if(response.includes('error')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Error',
							'Delete Error!!',
							'error'
						).then(() => {
							modLoadContent();
						});
					}
				}
			});
		}
	})
}

function modDeleteAll() { 
	
	var test = new Array();
	$("input[name='china']:checked").each(function() {
		test.push($(this).val());
	});
 
	// console.log(test);
        
	Swal.fire({
		title: 'แน่ใจหรือไม่ ?',
		text: "ต้องการลบรายการนี้ !!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			var TYPE="POST";
			var URL="plansell_action.php";
			var dataSet= {
				test : test,
				myaction : 'deleteall'
			};
			jQuery.ajax({type:TYPE,url:URL,data:dataSet,
				success:function(response){
					// jQuery("#load_mainContant").show();
					// jQuery("#load_mainContant").html(response);
					// jQuery("#load_mainwaiting").hide();
					// modLoadContent();
					if(response.includes('success')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Success',
							'Delete Successfully',
							'success'
						).then(() => {
							modLoadContent();
						});
					}else if(response.includes('error')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Error',
							'Delete Error!!',
							'error'
						).then(() => {
							modLoadContent();
						});
					}
				}
			});
		}
	})
}

function modInsertContent(addaccount) {
	Swal.fire({
		title: 'แน่ใจหรือไม่ ?',
		text: "ต้องการบันทึกรายการนี้ !!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Save it!'
	}).then((result) => {
		if (result.isConfirmed) {
			jQuery("#addaccount").modal('hide');
			var TYPE="POST";
			var URL="plansell_action.php"; 
			if (document.getElementById('active1').checked) {
				rate_value = document.getElementById('active1').value;
			}else if (document.getElementById('active2').checked) {
				rate_value = document.getElementById('active2').value;
			}

			var dataSet= {
				addaccount : addaccount,
				rate_value : rate_value,
				myaction : 'insert'
			};
			jQuery.ajax({type:TYPE,url:URL,data:dataSet,
				success:function(response){
					//jQuery("#load_mainContant").html(html);
					// jQuery("#load_mainContant").show();
					// jQuery("#load_mainContant").html(html);
					// jQuery("#load_mainwaiting").hide();
					// modLoadContent();
					if(response.includes('success')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Success',
							'Change Leverage Successfully',
							'success'
						).then(() => {
							modLoadContent();
						});
					}else if(response.includes('error')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Error',
							'Change Leverage Error!!',
							'error'
						).then(() => {
							modLoadContent();
						});
					}
				}
			});
		}
	})
}

function modUpdate(addaccount,myid) {
	Swal.fire({
		title: 'แน่ใจหรือไม่ ?',
		text: "ต้องการ update รายการนี้",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, update it!'
	  }).then((result) => {
		if (result.isConfirmed) {
			jQuery("#view"+myid).modal('hide');
			var TYPE="POST";
			var URL="plansell_action.php"; 
			console.log(myid);
			if (document.getElementById('active11'+myid).checked) {
				rate_value = document.getElementById('active11'+myid).value;
				statuss = "Active";
			}else if (document.getElementById('active22'+myid).checked) {
				rate_value = document.getElementById('active22'+myid).value;
				statuss = "Unactive";
			}
		
			var dataSet= {
				addaccount : addaccount,
				rate_value : rate_value,
				myid : myid,
				myaction : 'update'
			};
			jQuery.ajax({type:TYPE,url:URL,data:dataSet,
				success:function(response){
					//jQuery("#load_mainContant").html(html);
					// jQuery("#load_mainContant").show();
					// jQuery("#load_mainContant").html(html);
					// jQuery("#load_mainwaiting").hide();
					// modLoadContent();
					if(response.includes('success')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Success',
							'Update Successfully',
							'success'
						).then(() => {
							// modLoadContent();  
							if(statuss == "Active"){
								document.getElementById("ststus"+myid).innerHTML='<a class="text-success" ><i class="tim-icons icon-key-25"></i>Active</a>';
							}else{
								document.getElementById("ststus"+myid).innerHTML='<a class="text-danger" ><i class="tim-icons icon-lock-circle"></i>Unactive</a>';
							}
						});
					}else if(response.includes('error')){
						// jQuery("#load_mainwaiting").hide();
						Swal.fire(
							'Error',
							'Update Error!!',
							'error'
						).then(() => {
							modLoadContent();
						});
					}
				}
			});
		}
	  })
}

function addContantMenu(parentID) {
	jQuery("#load_mainwaiting").show();
	jQuery("#load_mainContant").hide();
	var TYPE="POST";
	var URL="plansell_action.php";
$('#myaction').val('addnew');
$('#myParentID').val(parentID);
var dataSet= $("#myForm").serialize();
jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			jQuery("#load_mainContant").show();
			jQuery("#load_mainContant").html(html);
			jQuery("#load_mainwaiting").hide();
			
		}
	}); 
}

function modinsert() {
	$('#myaction').val('insert');
	document.getElementById("myForm").submit();
}


function modDeleteContant() {
	var TYPE="POST";
	var URL="plansell_action.php";
$('#myaction').val('delete');
var dataSet= $("#myForm").serialize();
jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			//jQuery("#load_mainContant").html(html);
			modLoadContent();

		}
	});
}


function modLoadView() {
	jQuery("#load_mainwaiting").show();
	jQuery("#load_mainContant").hide();
	var TYPE="POST";
	var URL="plansell_action.php";
$('#myaction').val('view');
var dataSet= $("#myForm").serialize();
jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			jQuery("#load_mainContant").show();
			jQuery("#load_mainContant").html(html);
			jQuery("#load_mainwaiting").hide();
		}
	});
}


function fnsearch() {
	document.myForm.transaction.value =document.getElementById('transaction').value;
	document.myForm.input_startdate.value =document.getElementById('input_startdate').value;
	document.myForm.input_enddate.value =document.getElementById('input_enddate').value;
	if(name=="size"){
		document.myForm.module_pagesize.value=document.getElementById('size').value;
	}
	modLoadContent();
}
function submitpagelist(name,value) {
	console.log(name+"  "+value);
	if(name=="prev"){
		document.myForm.module_pageshow.value--;
	}else if(name=="next"){
		if(document.myForm.module_pageshow.value==""){document.myForm.module_pageshow.value=1;};
		document.myForm.module_pageshow.value++;
		
	}else if(name=="number"){
		document.myForm.module_pageshow.value=value;	  
	}else if(name=="size"){
		document.myForm.module_pagesize.value=value;
	}else if(name=="api"){
		document.myForm.input_api.value=value;
	}else if(name=="branch"){
		document.myForm.input_branch.value=value;	 
	}else if(name=="startdate"){
		document.myForm.input_startdate.value=value;
	}else if(name=="enddate"){
		document.myForm.input_enddate.value=value;  
	}else{
		document.myForm.inputSearch.value=value;
		// document.getElementById('InputSearch').value=value;
	}
	modLoadContent(); 
}

var loadFile1 = function(event) {
	var reader = new FileReader();
	reader.onload = function() {
		var output = document.getElementById('output1');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);

	var nameslip = document.getElementById('customFile').files[0].name;
	var typeslip = (/\.(jpg|jpeg|png)$/i).test(nameslip)
	
	if(typeslip==true){
		var element = document.getElementById("typeslip");
    	element.classList.remove("disabled");
	}else{
		var element = document.getElementById("typeslip");
        element.classList.add("disabled");
	}
};

function modLoadContent() {
	
	jQuery("#load_mainwaiting").show();
	jQuery("#load_mainContant").hide();

	var TYPE="POST";
	var URL="plansell_action.php";
	$('#myaction').val('datalist');
	var dataSet= $("#myForm").serialize();
	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			jQuery("#load_mainContant").show();
			jQuery("#load_mainContant").html(html);
			jQuery("#load_mainwaiting").hide();
		}
	});
}

function modSaveBox(boxid) {
	var TYPE="POST";
	var URL="plansell_action.php";
$('#myaction').val('updatebox');
$('#boxid').val(boxid);
var dataSet= $("#myForm").serialize();
jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			//jQuery("#load_mainContant").html(html);
			modLoadContent();
		}
	}); 
}

	


function isBlank(myObj) {
		if(myObj.value=='') { return true; }
		return false;
}

function changeStatus(loaddder,tablename,statusname,statusid,loadderstatus,myaction) {

	jQuery("#"+loaddder+"").show();

	var TYPE="POST";
	var URL="plansell_action.php";
	var dataSet={
	Valueloaddder: loaddder,
	Valuetablename : tablename ,
	Valuestatusname : statusname ,
	Valuestatusid : statusid ,
	Valueloadderstatus : loadderstatus,
	myaction : myaction
	};

	jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){

			jQuery("#"+loadderstatus+"").show();
			jQuery("#"+loadderstatus+"").html(html)
			jQuery("#"+loaddder+"").hide();
		}
	});
}

$(function(){
  	setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
	// 1 วินาที่ เท่า 1000
	// คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
	var getDataContact=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
		url:"getcontact.php",
		data:"getcontact=1",
		async:false,
		success:function(getDataContact){
			$("li#showDataContact").html(getDataContact); // ส่วนที่ 3 นำข้อมูลมาแสดง
									}
	 	}).responseText;
		
	},60000);	
});

