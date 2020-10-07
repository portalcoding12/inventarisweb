// JavaScript Validasi form and button
function userFormDisabled() {
	document.getElementById("edit").style.display = 'block';
	document.getElementById("nama").readOnly=true;
	document.getElementById("username").readOnly=true;
	document.getElementById("inputLevel").readOnly=true;
	document.getElementById("level").style.display = 'block';
	document.getElementById("passwordbaru").style.display = 'none';
	document.getElementById("repassword").style.display = 'none';
	document.getElementById("sipan").dataset.target = "";
}

function valid() {
document.getElementById("nama").removeAttribute("readOnly");
document.getElementById("username").removeAttribute("readOnly");
document.getElementById("level").style.display = 'none';
document.getElementById("edit").style.display = 'none';
document.getElementById("passwordbaru").style.display = 'block';
document.getElementById("repassword").style.display = 'block';
	document.getElementById("sipan").dataset.target = "";
}

function validUpdateProfile() {
	var nama = document.getElementById("nama").value;
	var username = document.getElementById("username").value;
	var passwordbaru = document.getElementById("txtpasswordbaru").value;
	var repassword = document.getElementById("txtrepassword").value;

	if (nama=="" || username=="" || passwordbaru=="" || repassword=="" ) {
		alert("Data harus diisi lengkap!!!");
		document.getElementById("sipan").dataset.target = "";
	} else if (passwordbaru != repassword) {
		alert('Password tidak sama!!!');
		document.getElementById("sipan").dataset.target = "";
	} else {
		document.getElementById("sipan").dataset.target = "#konfirmprofile";
	}
}
function validRegister() {
	var nama = document.getElementById("name").value;
	var username = document.getElementById("user").value;
	var passwordbaru = document.getElementById("pass").value;
	var repassword = document.getElementById("repass").value;

	if (nama=="" || username=="" || passwordbaru=="" || repassword=="") {
		alert("Data harus diisi lengkap!!!");
		document.getElementById("sipan").dataset.target = "";
	} else if (passwordbaru != repassword) {
		alert('Password tidak sama!!!');
		document.getElementById("sipan").dataset.target = "";
	} else {
		document.getElementById("sipan").dataset.target = "#konfirm";
	}
}


// function views
function viewInventaris() {
	document.getElementById("btnupdate").style.display = 'none';
	document.getElementById("btnedit").style.display = 'relative';
	document.getElementById("nama_inventaris").readOnly=true;
	document.getElementById("kondisi").readOnly=true;
	document.getElementById("keterangan").readOnly=true;
	document.getElementById("jumlah").readOnly=true;
	document.getElementById("jenis").readOnly=true;
	document.getElementById("tanggal_register").readOnly=true;
	document.getElementById("ruangan").readOnly=true;
	document.getElementById("kode_inventaris").readOnly=true;
	document.getElementById("petugas").readOnly=true;
}

function viewRuangan() {
	document.getElementById("btnupdate").style.display = 'none';
	document.getElementById("btnedit").style.display = 'relative';
	document.getElementById("nama_ruang").readOnly=true;
	document.getElementById("kode_ruang").readOnly=true;
	document.getElementById("keterangan_ruang").readOnly=true;
}
function viewJenis() {
	document.getElementById("btnupdate").style.display = 'none';
	document.getElementById("btnedit").style.display = 'relative';
	document.getElementById("nama_jenis").readOnly=true;
	document.getElementById("kode_jenis").readOnly=true;
	document.getElementById("keterangan_jenis").readOnly=true;
}
function viewPetugas() {
	document.getElementById("btnupdate").style.display = 'none';
	document.getElementById("btnedit").style.display = 'relative';
	document.getElementById("nama_petugas").readOnly=true;
	document.getElementById("username_petugas").readOnly=true;
	document.getElementById("passwordlama_petugas").readOnly=true;
	document.getElementById("passwordbaru_petugas").readOnly=true;
	document.getElementById("repassword_petugas").readOnly=true;
	document.getElementById("level_petugas").readOnly=true;
	document.getElementById("btnupdate").dataset.target = "";
}
function viewPegawai() {
	document.getElementById("btnupdate").style.display = 'none';
	document.getElementById("btnedit").style.display = 'relative';
	document.getElementById("nama_pegawai").readOnly=true;
	document.getElementById("nip_pegawai").readOnly=true;
	document.getElementById("alamat_pegawai").readOnly=true;
	document.getElementById("btnupdate").dataset.target = "";
}





// function edit
function editInventaris() {
	document.getElementById("btnupdate").style.display = 'block';
	document.getElementById("btnedit").style.display = 'none';
	document.getElementById("nama_inventaris").readOnly=false;
	document.getElementById("kondisi").readOnly=false;
	document.getElementById("keterangan").readOnly=false;
	document.getElementById("jumlah").readOnly=false;
	document.getElementById("jenis").readOnly=false;
	document.getElementById("tanggal_register").readOnly=false;
	document.getElementById("ruangan").readOnly=false;
	document.getElementById("kode_inventaris").readOnly=false;
	document.getElementById("petugas").readOnly=true;
}

function editRuangan() {
	document.getElementById("btnupdate").style.display = 'block';
	document.getElementById("btnedit").style.display = 'none';
	document.getElementById("nama_ruang").readOnly=false;
	document.getElementById("kode_ruang").readOnly=false;
	document.getElementById("keterangan_ruang").readOnly=false;
}
function editJenis() {
	document.getElementById("btnupdate").style.display = 'block';
	document.getElementById("btnedit").style.display = 'none';
	document.getElementById("nama_jenis").readOnly=false;
	document.getElementById("kode_jenis").readOnly=false;
	document.getElementById("keterangan_jenis").readOnly=false;
}
function editPetugas() {
	document.getElementById("btnupdate").style.display = 'block';
	document.getElementById("btnedit").style.display = 'none';
	document.getElementById("nama_petugas").readOnly=false;
	document.getElementById("username_petugas").readOnly=false;
	document.getElementById("passwordlama_petugas").readOnly=true;
	document.getElementById("passwordbaru_petugas").readOnly=false;
	document.getElementById("repassword_petugas").readOnly=false;
	document.getElementById("level_petugas").readOnly=false;
	document.getElementById("btnupdate").dataset.target = "";
}
function editPegawai() {
	document.getElementById("btnupdate").style.display = 'block';
	document.getElementById("btnedit").style.display = 'none';
	document.getElementById("nama_pegawai").readOnly=false;
	document.getElementById("nip_pegawai").readOnly=false;
	document.getElementById("alamat_pegawai").readOnly=false;
	document.getElementById("btnupdate").dataset.target = "";
}










// function valid update
function updatePetugas() {
	var passwordbaru_petugas = document.getElementById("passwordbaru_petugas").value;
	var repassword_petugas = document.getElementById("repassword_petugas").value;

	if (passwordbaru_petugas&&repassword_petugas=="") {
		alert("Harap isi kolom ulangi password !!!");
		document.getElementById("btnupdate").dataset.target = "";
	}
	else if (passwordbaru_petugas != repassword_petugas) {
		alert("Password tidak sama !!!");
		document.getElementById("btnupdate").dataset.target = "";
	} else {
		document.getElementById("btnupdate").dataset.target = "#konfirmupdate";
	}
}
function updatePegawai() {
	var nama_pegawai = document.getElementById("nama_pegawai").value;
	var nip_pegawai = document.getElementById("nip_pegawai").value;
	var alamat_pegawai = document.getElementById("alamat_pegawai").value;

	if (nama_pegawai=="" || nip_pegawai=="" || alamat_pegawai=="") {
		alert("Isi kolom dengan lengkap !!!");
		document.getElementById("btnupdate").dataset.target = "";
	} else {
		document.getElementById("btnupdate").dataset.target = "#konfirmupdate";
	}
}




// function logout
function logout() {
if (confirm("Apakah anda yakin ingin keluar ?")){
				window.location.href = 'logout.php';
			}
}
