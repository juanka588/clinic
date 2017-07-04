function cleanDiagnosticData(data) {
//    console.log(data);
    options = [];
    var ret = {};
    var key, value;
    for (var i = 0; i < data.length; i++) {
        key = data[i].code + " " + data[i].description;
        value = data[i].code;
        options[key] = value;
        ret[key] = null;
    }
//    console.log(ret);
    return ret;
}

function refreshDiagnosticList(consultId, editable) {
    if (consultId === null) {
        return;
    }
    $.get('/diagnostics/' + consultId, null, function (data) {
        $("#diagnostics-container").html(inflateDiagnosticsList(data, editable));
    });
}

function associateDiagnostic() {
    if (!optionsPacient[$("#id_pacient").val()]) {
        alert("seleccione un paciente");
        return;
    }
    var diagnosticId = options[$("#diagnostic_select").val()];
    if (!(consultId === null
            || typeof (diagnosticId) == "undefined"
            || typeof (consultId) == "undefined")) {
        $.post("/diagnostic/" + consultId + "/" + diagnosticId, null, function (data) {
            console.log("diagnostic associated?");
            console.log(data);
            $("#diagnostic_select").val("");
            refreshDiagnosticList(consultId, true);
        });
    } else if (consultId === null) {
        //add the consult
        createConsult(true);
    }

    console.log(diagnosticId);
    console.log(consultId);

}

function deleteDiagnostic(consultId, diagnosticId) {
    if (consultId === null) {
        return;
    }
    $.ajax({
        url: "/diagnostic/" + consultId + "/" + diagnosticId,
        type: 'DELETE',
        success: function (result) {
            refreshDiagnosticList(consultId, true);
        }
    });
}

function Diagnostic(json) {
    if (json && json !== null) {
        this.code = json.code;
        this.description = json.description;
    }
}
