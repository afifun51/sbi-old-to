

var mp_type = "<?php echo $_SESSION['jenjang'];?>";

if(mp_type.includes('IPA')){
    mp_type = 'IPA';
}
else if(mp_type.includes('IPS')){
    mp_type = 'IPS';
}
else{
    mp_type = '';
}

$(document).ready(function()  
{
    console.log(mp_type);
    initProdiByPtnSelectField('1', mp_type, null, '');
    initProdiByPtnSelectField('2', mp_type, null, '');
    initProdiByPtnSelectField('3', mp_type, null, '');
    initPTNSelectionField('Pilih ');
});


window.SelectProdi = function(ptn_type){
    console.log(mp_type);
    removeAllOptions(document.getElementById("prodi" + ptn_type));
    var selected_ptn = document.getElementById("select2-ptn" + ptn_type + "-container").innerHTML;
    initProdiByPtnSelectField(ptn_type, mp_type, selected_ptn, '');
}


function removeAllOptions(selectbox) {
    var i;
    
    for (i = selectbox.options.length - 1; i >= 0; i--) {
        selectbox.remove(i);
    }
    // $(selectbox).select2("value", "", false);
}

function initPTNSelectionField(suffix){
    $.getJSON("api/json/get_ptn_list.php",
        function(ptn_list){
            console.log(ptn_list);
            $("#ptn1").select2({
                placeholder: suffix + 'PTN 1',
                data: ptn_list,
                width: '100%',
            });

            $("#ptn2").select2({
                placeholder: suffix + 'PTN 2',
                data: ptn_list,
                width: '100%',
            });

            $("#ptn3").select2({
                placeholder: suffix + 'PTN 3',
                data: ptn_list,
                width: '100%',
            });
    });
    
}

function initProdiByPtnSelectField(ptn_type, mp_type, ptn_name, suffix){
    $.getJSON("api/json/get_prodi_list_by_ptn.php?ptn=" + ptn_name + "&mp=" + mp_type,
        function(prodi_list){
            console.log(prodi_list);
            prodi_list = [''].concat(prodi_list);
            if (ptn_type == '1'){
                $("#prodi1").select2({
                    placeholder: suffix + 'Pilihan Prodi Ke-1',
                    data: prodi_list,
                    width: '100%',
                });
            }
            else if (ptn_type == '2'){
                $("#prodi2").select2({
                    placeholder: suffix + 'Pilihan Prodi Ke-2',
                    data: prodi_list,
                    width: '100%',
                });
                
            }
            else if (ptn_type == '3'){
                $("#prodi3").select2({
                placeholder: suffix +  'Pilihan Prodi Ke-3',
                data: prodi_list,
                width: '100%',
                });
            }
            else{

            }
    });
    
}