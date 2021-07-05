let url_json = 'http://localhost/pro_siakad/';
function semseterGanjil(){
  $.getJSON(url_json+'jadwal_kuliah/getSemesterGanjil', function (data) {
    let sms = data.sms;            
    let content = '';
    $.each(sms, function (i, data) {
      content += `<option value="`+data.semester+`">`+data.semester+`</option> `;
    });
    $('#semester').html(content);
  });
}

function semesterGenap(){
  $.getJSON(url_json+'jadwal_kuliah/getSemesterGenap', function (data) {
    let sms = data.sms;            
    let content = '';
    $.each(sms, function (i, data) {
      content += `<option value="`+data.semester+`">`+data.semester+`</option> `;
    });
    $('#semester').html(content);
  });
}

function getKonsentrasi(prodi){  
  $.getJSON(url_json+'jadwal_kuliah/konsetrasi_json/'+prodi+'', function (data) {
    let konsentrasi = data.konsentrasi;            
    let content = '';
    $.each(konsentrasi, function (i, data) {
      content += `<option value="`+data.konsentrasi_id+`">`+data.nama_konsentrasi+`</option> `;
    });
    $('#konsentrasi').html(content);
  });
}

$(window).load(function() {
    let getSms = $('#tahun_akademik').val();
    let semester = getSms.substring(4);
    if(semester == 1){
      semseterGanjil();
    }else{
      semesterGenap();
    }

});

$('#tahun_akademik').on('change', function(){
  let getSms = $('#tahun_akademik').val();
  let semester = getSms.substring(4);
  if(semester == 1){
    semseterGanjil();
  }else if(semester == 2){
    semesterGenap();
  }else if(semester == ''){
    let content = '';
    content += `<option value=""></option> `;
    $('#semester').html(content);
  }
});

$('#prodi').on('change', function(){
  let getProdi = $('#prodi').val();
  getKonsentrasi(getProdi);
});

    jQuery(function($) {
        $('#timepicker1').timepicker({
                    minuteStep: 15,
                    showSeconds: false,
                    showMeridian: false,
                    disableFocus: true,
                    icons: {
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down'
                    }
        }).on('focus', function() {
            $('#timepicker1').timepicker('showWidget');
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        $('#timepicker2').timepicker({
                    minuteStep: 15,
                    showSeconds: false,
                    showMeridian: false,
                    disableFocus: true,
                    icons: {
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down'
                    }
        }).on('focus', function() {
            $('#timepicker2').timepicker('showWidget');
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        // $.mask.definitions['~']='[+-]';
        // $('.time').mask('99:99');

    });