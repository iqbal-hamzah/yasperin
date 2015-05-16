// JavaScript Document

function $(id)
{
	return document.getElementById(id);
}

function cekEmail()
{
	var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(regex.test($("txtemail").value) == false || $("txtemail").value.length > 25)
	{
		$("pic_email").innerHTML = "<img src='images/wrong.png' title='Checking Email' alt='Wrong Format' />";
		return true;
	}
	else
	{
		$("pic_email").innerHTML = "<img src='images/correct.png' title='Checking Email' alt='Correct Format' />";
		return false;
	}
}

function cekTanggal(){
	
	var tanggal = $("txtdate").value;
	var bulan = new Array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
	

	if ($("txtmonth").value == bulan[1])
	{
		if ($("txtyear").value % 4 == 0 && $("txtyear").value % 100 != 0 || $("txtyear").value % 400 == 0)
		{
			$("txtdate").innerHTML = "";
			for ($i=1; $i<=29; $i++)
			{
				$("txtdate").innerHTML = $("txtdate").innerHTML + "<option>" + $i + "</option>";
			}
		}
		else
		{
			$("txtdate").innerHTML = "";
			for ($i=1; $i<=28; $i++)
			{
				$("txtdate").innerHTML = $("txtdate").innerHTML + "<option>" + $i + "</option>";
			}
		}
	}
	else 
	{
		if ($("txtmonth").value == bulan[0] || $("txtmonth").value == bulan[2] || $("txtmonth").value == bulan[4] 
		|| $("txtmonth").value == bulan[6] || $("txtmonth").value == bulan[7] || $("txtmonth").value == bulan[9] || $("txtmonth").value == bulan[11])
		{
			$("txtdate").innerHTML = "";
			for ($i=1; $i<=31; $i++)
			{
				$("txtdate").innerHTML = $("txtdate").innerHTML + "<option>" + $i + "</option>";
			}
		}
		else
		{
			$("txtdate").innerHTML = "";
			for ($i=1; $i<=30; $i++)
			{
				$("txtdate").innerHTML = $("txtdate").innerHTML + "<option>" + $i + "</option>";
			}
		}
	}
	$("txtdate").value = tanggal;
}

function cekTanggal2(){
	
	var tanggal = $("txtdate2").value;
	var bulan = new Array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
	

	if ($("txtmonth2").value == bulan[1])
	{
		if ($("txtyear2").value % 4 == 0 && $("txtyear2").value % 100 != 0 || $("txtyear2").value % 400 == 0)
		{
			$("txtdate2").innerHTML = "";
			for ($i=1; $i<=29; $i++)
			{
				$("txtdate2").innerHTML = $("txtdate2").innerHTML + "<option>" + $i + "</option>";
			}
		}
		else
		{
			$("txtdate2").innerHTML = "";
			for ($i=1; $i<=28; $i++)
			{
				$("txtdate2").innerHTML = $("txtdate2").innerHTML + "<option>" + $i + "</option>";
			}
		}
	}
	else 
	{
		if ($("txtmonth2").value == bulan[0] || $("txtmonth2").value == bulan[2] || $("txtmonth2").value == bulan[4] 
		|| $("txtmonth2").value == bulan[6] || $("txtmonth2").value == bulan[7] || $("txtmonth2").value == bulan[9] || $("txtmonth2").value == bulan[11])
		{
			$("txtdate2").innerHTML = "";
			for ($i=1; $i<=31; $i++)
			{
				$("txtdate2").innerHTML = $("txtdate2").innerHTML + "<option>" + $i + "</option>";
			}
		}
		else
		{
			$("txtdate2").innerHTML = "";
			for ($i=1; $i<=30; $i++)
			{
				$("txtdate2").innerHTML = $("txtdate2").innerHTML + "<option>" + $i + "</option>";
			}
		}
	}
	$("txtdate2").value = tanggal;
}

function cekOldPassword()
{
	if($("txtoldpassword").value == "" || $("txtoldpassword").value.length > 12)
	{
		$("pic_oldpassword").innerHTML	= "<img src='images/wrong.png' title='Checking Password' alt='Wrong Format' />";
		return true;
	}
	
		$("pic_oldpassword").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format' />";
		return false;
	
	
}


function cekPassword()
{
	if($("txtpassword").value == "" || $("txtpassword").value.length > 12)
	{
		$("pic_password").innerHTML	= "<img src='images/wrong.png' title='Checking Password' alt='Wrong Format' />";
		return true;
	}
	
		$("pic_password").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format' />";
		return false;
	
	
}

function cekConfirm()
{
	if($("txtconfirm").value == "" )
	{
		$("pic_confirm").innerHTML = "<img src='images/wrong.png' title='Checking Confirm Password' alt='Wrong Confirm Password'/>";
		return true;
	}
	else if($("txtconfirm").value != $("txtpassword").value)
	{
		$("pic_confirm").innerHTML = "<img src='images/wrong.png' title='Checking Confirm Password' alt='Wrong Confirm Password'/>"
		return true;
	}
	
	$("pic_confirm").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format'/>";	
	return false;
	
	
}

function cekNama()
{
	if($("txtnama").value == "" || $("txtnama").value.length > 25)
	{
		$("pic_nama").innerHTML = "<img src='images/wrong.png' title='Checking Confirm Password' alt='Wrong Confirm Password'/>";
		return true;
	}
	else
	{
		$("pic_nama").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format'/>";
		return false;
	}
	
}

function cekUsername()
{
	if($("txtUsername").value == "" || $("txtUsername").value.length > 15)
	{
		$("pic_username").innerHTML = "<img src='images/wrong.png' title='Checking Confirm Password' alt='Wrong Username'/>";
		return true;
	}
	else
	{
		$("pic_username").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Username'/>";
		return false;
	}
	
}


function cekAngka(string)
{
	for (i=0; i<string.length; i++)
	{
		if (string.charAt(i) < '0' || string.charAt(i) > '9') return true;
	}
	return false;
}

function cekCell()
{
	if($("txtcell").value == "" || cekAngka($("txtcell").value) || $("txtcell").value.length > 15 )
	{
		
		$("pic_cell").innerHTML = "<img src='images/wrong.png' title='Checking Cellphone' alt='Wrong Cell Phone'/>";
		return true;
	}
	else
	{
		$("pic_cell").innerHTML = "<img src='images/correct.png' title='Checking Cellphone' alt='Correct Format'/>";
		return false;
	}
	
}

function cekPhone()
{
	if($("txtphone").value == "" || cekAngka($("txtphone").value) || $("txtphone").value.length > 15)
	{
		$("pic_phone").innerHTML = "<img src='images/wrong.png' title='Checking Phone' alt='Wrong Phone'/>";
		return true;
	}
	else
	{
		$("pic_phone").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format'/>";
		return false;
	}
	
}

function cekKodePos()
{
	if($("txtkodepos").value == "" || cekAngka($("txtkodepos").value) || $("txtkodepos").value.length > 10)
	{
		$("pic_kodepos").innerHTML = "<img src='images/wrong.png' title='Checking Kode Pos' alt='Wrong Kode Pos'/>";
		return true;
	}
	else
	{
		$("pic_kodepos").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format'/>";
		return false;
	}
	
}

function cekAddress()
{
	if($("txtaddress").value == "" || $("txtaddress").value.length > 100)
	{
		$("pic_address").innerHTML = "<img src='images/wrong.png' title='Checking Confirm Password' alt='Wrong Confirm Password'/>";
		return true;
	}
	else
	{
		$("pic_address").innerHTML = "<img src='images/correct.png' title='Checking Password' alt='Correct Format'/>";
		return false;
	}
	
}

function cekForm()
{
	if (cekNama()) return false;
	else if (cekPassword()) return false;
	else if (cekConfirm()) return false;
	else if (cekKodePos()) return false;
	else if (cekPhone()) return false;
	else if (cekCell()) return false;
	else if (cekAddress()) return false;
	else if (cekEmail()) return false;
	return true;
}

function cekFormPengurus()
{
	if (cekNama()) return false;
	else if (cekPassword()) return false;
	else if (cekConfirm()) return false;
	else if (cekPhone()) return false;
	else if (cekCell()) return false;
	else if (cekAddress()) return false;
	else if (cekEmail()) return false;
	return true;
}

function cekEditProfile()
{
	if (cekNama()) return false;
	else if (cekKodePos()) return false;
	else if (cekPhone()) return false;
	else if (cekCell()) return false;
	else if (cekAddress()) return false;
	else if (cekEmail()) return false;
	return true;
}

function cekEditPengurus()
{
	if (cekNama()) return false;
	else if (cekPhone()) return false;
	else if (cekCell()) return false;
	else if (cekAddress()) return false;
	else if (cekEmail()) return false;
	return true;
}

function cekFormPengiriman()
{
	if (cekAddress()) return false;
	else if (cekKodePos()) return false;
	
	return true;
}

function cekChangePassword()
{
	if (cekOldPassword()) return false;
	else if (cekPassword()) return false;
	else if (cekConfirm()) return false;
	return true;
}



function cekEditPassword()
{
	if (cekPassword()) return false;
	else if (cekConfirm()) return false;
	return true;
}

function cekLupaPassword()
{
	if (cekEmail()) return false;
	else if (cekCell()) return false;
	return true;
}





