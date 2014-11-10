function cargarODT(id, id_UQ){
    $("span#TitleEvidencias").html(id);
    $("input#id_ODT").attr("value", id);
    $("input#id_UQ").attr("value", id_UQ);
    $("input#editor").attr("value", $('span#username').text());
}
