let scanner = new Instascan.Scanner({ video: document.getElementById('qrscanner') });
scanner.addListener('scan', function (content) {
    var array = content.split("&");
    array[0] = array[0].replace("npm=", "");
    array[1] = array[1].replace("nama=", "");
    array[2] = array[2].replace("kelas=", "");
    array[3] = array[3].replace("mata_kuliah=", "");
    array[4] = array[4].replace("minggu=","");
    document.getElementById('npm').value = array[0];
    document.getElementById('kelas_id').value = " " + array[2] + " ";
    document.getElementById('mata_kuliah_id').value = " " + array[3] + " ";
    document.getElementById('minggu').value = " " + array[4] + " ";
    document.inputAbsen.submit();
    alert("Data milik" + array[0] + " telah masuk");
});
Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        scanner.start(cameras[0]);
    } else {
        console.error('No cameras found.');
    }
}).catch(function (e) {
    console.error(e);
});