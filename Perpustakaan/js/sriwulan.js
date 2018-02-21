function generateqr(ts){
  $('.modal-body').html('<div id="qrcodeTable"></div><br/>\n<button type="button" name="button" onclick="saveQR()" class="btn btn-sm btn-primary">Simpan Gambar</button>\n<button type="button" name="button" onclick="printQR()" class="btn btn-sm btn-primary">Cetak Gambar</button>')
  $('#qrcodeTable').qrcode({
    render	: "canvas",
    text	: ts
  })

}
function saveQR() {
    canvas = document.getElementsByTagName("canvas");
    gambar = canvas[0].toDataURL();
    var download = document.createElement('a');
    download.href = gambar;
    download.download = 'gambar.png';
    download.click();
}

function printQR(){
  canvas = document.getElementsByTagName("canvas");
  gambar = canvas[0].toDataURL();
  newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()"><style>@page{size:auto;margin:4mm;}</style><img width="auto" height="150" src="'+gambar+'" /></body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
}

function printcard(id_anggota, nama, nipnis, jurusan){
  generateqr('id_anggota='+id_anggota);
  nm=nama.split(/\s+/).slice(0,2).join(" ");
  canvas = document.getElementsByTagName("canvas");
  gambar = canvas[0].toDataURL();
  newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('\
  <html>\
  <head>\
  <style>\
  body{-webkit-print-color-adjust:exact;}\
  .header, .footer {background-color: grey;color: white;width: 325;padding: 5px;}\
  .column {float: left;padding: 10px;}\
  .clearfix::after {content: "";clear: both;display: table;}\
  </style>\
  </head>\
  <body>\
  <div class="header">\
    <h3 style="text-align:center">Kartu Perpus - SMKN 7 Semarang</h3>\
  </div>\
  <div class="clearfix">\
  	<div class="column">\
      <img src="'+gambar+'" width="100px" height="100px">\
    </div>\
    <div class="column" width="200px">\
      <font size="5px">'+nm+'</font><br/><br/>\
      '+nipnis+'<br/>\
      '+jurusan+'<br/>\
    </div>\
  </div>\
  <div class="footer">\
  </div>\
  </body>\
  </html>');
  newWin.document.close();
}
