/*============================= SCRIPT FOR IGK/IBET868 =============================*/
var oMax = 0;

var typeList = [{ "name": "", "max": 0 },
{ "name": "X12", "max": 0 },
{ "name": "Par", "max": 0 },
{ "name": "Pas", "max": 0 },
{ "name": "EG", "max": 0 },
{ "name": "1D", "max": 0 },
{ "name": "2D", "max": 0 },
{ "name": "3D", "max": 0 },
{ "name": "LDC", "max": 0 },
{ "name": "Run", "max": 0 },
{ "name": "RunX12", "max": 0 },
{ "name": "RAM", "max": 0 },
{ "name": "RAR", "max": 0 },
{ "name": "RAS", "max": 0 },
{ "name": "RAT", "max": 0 },
{ "name": "RAU", "max": 0 },
{ "name": "RBF", "max": 0 },
{ "name": "RBH", "max": 0 },
{ "name": "RBI", "max": 0 },
{ "name": "RBL", "max": 0 },
{ "name": "RBG", "max": 0 },
{ "name": "RBM", "max": 0 },
{ "name": "RBN", "max": 0 },
{ "name": "RBO", "max": 0 },
{ "name": "RCV", "max": 0 },
{ "name": "RCW", "max": 0 },
{ "name": "RCX", "max": 0 },
{ "name": "RCZ", "max": 0 },
{ "name": "RDB", "max": 0 }]

function roundNumber(num, dec) {
    var result = Math.round(num * Math.pow(10, dec)) / Math.pow(10, dec);
    return result;
}

function clearList(id) {
    document.getElementById(id).options.length = 0;
}

function addItem(id, text, value) {
    // Create an Option object
    var opt = document.createElement("option");

    // Add an Option object to Drop Down/List Box
    document.getElementById(id).options.add(opt);
    // Assign text and value to Option object
    opt.text = text;
    opt.value = value;

}

function fillList(id, min, max, step) {
    clearList(id);
    var maxPercent = max * 1000;
    for (var i = min; i <= maxPercent; i += step)
        addItem(id, (roundNumber(i / 10, 1) + '%'), roundNumber(i / 1000, 3));
}

function selectList(id, value) {
    var obj = document.getElementById(id);
    for (var i = 0; i < obj.options.length; i++) {
        if (obj.options[i].value == value) {
            obj.selectedIndex = i;
            break;
        }
    }
}

function getMaxValue(id) {
    return document.getElementById(id).options[document.getElementById(id).length - 1].value;
}

function getSelectedValue(id) {
    return document.getElementById(id).options[document.getElementById(id).selectedIndex].value;
}

function updMS(type) {
    for (var i = 0; i < typeList.length; i++) {
        if (typeList[i].name == type) {
            oMax = typeList[i].max;
        }
    }
    var max = getSelectedValue('lstShares' + type);
    var dMax = getSelectedValue('lstMaxShares' + type);
    var dRem = getSelectedValue('lstMaxRemShares' + type);
    var dMin = getSelectedValue('lstMinShares' + type);
    var newMax = roundNumber(oMax - max, 3);

    fillList('lstMaxShares' + type, 0, newMax, 5);
    fillList('lstMaxRemShares' + type, 0, newMax, 5);
    fillList('lstMinShares' + type, 0, newMax, 5);

    if (dMax > newMax)
        dMax = newMax;
    if (dRem > newMax)
        dRem = newMax;
    if (dMin > newMax)
        dMin = newMax;

    selectList('lstMaxShares' + type, newMax);
    selectList('lstMaxRemShares' + type, dRem);
    selectList('lstMinShares' + type, dMin);

}

function updMRMS(type) {
    var dMax = getSelectedValue('lstMaxShares' + type);
    var dRem = getSelectedValue('lstMaxRemShares' + type);
    var dMin = getSelectedValue('lstMinShares' + type);
    var newMax = roundNumber(dMax, 3);

    fillList('lstMaxRemShares' + type, 0, newMax, 5);
    fillList('lstMinShares' + type, 0, newMax, 5);

    if (dRem > newMax)
        dRem = newMax;
    if (dMin > newMax)
        dMin = newMax;

    selectList('lstMaxRemShares' + type, dRem);
    selectList('lstMinShares' + type, dMin);
}

function init() {
    var max;
    var newMax;
    var dMax;
    var dMin;
    var dRem;

    for (var i = 0; i < typeList.length; i++) {
        if (document.getElementById('lstShares' + typeList[i].name) !== null) {
            typeList[i].max = getMaxValue('lstMaxShares' + typeList[i].name);

            max = getSelectedValue('lstShares' + typeList[i].name);
            dMax = getSelectedValue('lstMaxShares' + typeList[i].name);
            dRem = getSelectedValue('lstMaxRemShares' + typeList[i].name);
            dMin = getSelectedValue('lstMinShares' + typeList[i].name);
            newMax = roundNumber(typeList[i].max - max, 3);

            fillList('lstMaxShares' + typeList[i].name, 0, newMax, 5);
            newMax = roundNumber(dMax, 3);

            fillList('lstMaxRemShares' + typeList[i].name, 0, newMax, 5);
            fillList('lstMinShares' + typeList[i].name, 0, newMax, 5);
            selectList('lstMaxShares' + typeList[i].name, dMax);
            selectList('lstMaxRemShares' + typeList[i].name, dRem);
            selectList('lstMinShares' + typeList[i].name, dMin);
        }
    }
}

function toggleSetting(setting, ctrl) {
    var stt = document.getElementById(setting);
    if (stt.style.display == 'none') {
        stt.style.display = '';
        ctrl.className = "accordion2";
    }
    else {
        stt.style.display = 'none';
        ctrl.className = "accordion";
    }
}

function toggleSetting2(setting, ctrl, btnUpd) {
    var stt = document.getElementById(setting);
    var btn = document.getElementById(btnUpd);
    if (stt.style.display == 'none') {
        stt.style.display = '';
        if (btn != null) btn.style.display = '';
        ctrl.className = "accordion2";
    }
    else {
        stt.style.display = 'none';
        if (btn != null) btn.style.display = 'none';
        ctrl.className = "accordion";
    }
}

function drawTable(tick, untick) {
    var _$tbL = $("#tdALL");
    //Hide Tables
    for (var i = 0; i < untick.length; i++) {
        var _$tr = _$tbL.find("tr[id='tr_" + untick[i] + "']");

        if (_$tr != null || _$tr.length > 0) {
            _$tr.css("display", "none");
        }
    }

    //Display SportsBook tables
    if ((jQuery.inArray("0", tick) > -1) || (jQuery.inArray("1", tick) > -1) || (jQuery.inArray("2", tick) > -1))
        $("#trSB").css("display", "");
    else
        $("#trSB").css("display", "none");

    //Display LDC tables
    if ((jQuery.inArray("3", tick) > -1) || (jQuery.inArray("4", tick) > -1) || (jQuery.inArray("5", tick) > -1))
        $("#trLDC").css("display", "");
    else
        $("#trLDC").css("display", "none");

    //Display EG tables
    if ((jQuery.inArray("6", tick) > -1) || (jQuery.inArray("7", tick) > -1) || (jQuery.inArray("8", tick) > -1))
        $("#trEG").css("display", "");
    else
        $("#trEG").css("display", "none");

    //Display GD tables
    if ((jQuery.inArray("9", tick) > -1) || (jQuery.inArray("10", tick) > -1) || (jQuery.inArray("11", tick) > -1))
        $("#trRAM").css("display", "");
    else
        $("#trRAM").css("display", "none");

    //Display SA GAMING tables
    if ((jQuery.inArray("12", tick) > -1) || (jQuery.inArray("13", tick) > -1) || (jQuery.inArray("14", tick) > -1))
        $("#trRAR").css("display", "");
    else
        $("#trRAR").css("display", "none");

    //Display ITP tables
    if ((jQuery.inArray("15", tick) > -1) || (jQuery.inArray("16", tick) > -1))
        $("#trRAS").css("display", "");
    else
        $("#trRAS").css("display", "none");

    //Display ITP(UPG/MG) tables
    if ((jQuery.inArray("17", tick) > -1))
        $("#trRCV").css("display", "");
    else
        $("#trRCV").css("display", "none");

    //Display COCKFT tables
    if ((jQuery.inArray("18", tick) > -1) || (jQuery.inArray("19", tick) > -1) || (jQuery.inArray("20", tick) > -1))
        $("#trRAT").css("display", "");
    else
        $("#trRAT").css("display", "none");

    //Display HUAYTHAI tables
    if ((jQuery.inArray("21", tick) > -1) || (jQuery.inArray("22", tick) > -1) || (jQuery.inArray("23", tick) > -1))
        $("#tr4D").css("display", "");
    else
        $("#tr4D").css("display", "none");

    //Display JOKER tables
    if ((jQuery.inArray("24", tick) > -1) || (jQuery.inArray("25", tick) > -1))
        $("#trRAU").css("display", "");
    else
        $("#trRAU").css("display", "none");

    //Display GAME HALL CASINO tables
    if ((jQuery.inArray("26", tick) > -1) || (jQuery.inArray("27", tick) > -1) || (jQuery.inArray("28", tick) > -1))
        $("#trRBF").css("display", "");
    else
        $("#trRBF").css("display", "none");

    //Display PEGASUS tables
    if ((jQuery.inArray("29", tick) > -1) || (jQuery.inArray("30", tick) > -1))
        $("#trRDB").css("display", "");
    else
        $("#trRDB").css("display", "none");

    //Display AE7 tables
    if ((jQuery.inArray("31", tick) > -1) || (jQuery.inArray("32", tick) > -1))
        $("#trRCZ").css("display", "");
    else
        $("#trRCZ").css("display", "none");

    //Display GAME HALL COCKFT tables
    if ((jQuery.inArray("33", tick) > -1) || (jQuery.inArray("34", tick) > -1) || (jQuery.inArray("35", tick) > -1))
        $("#trRBG").css("display", "");
    else
        $("#trRBG").css("display", "none");

    //Display GAME HALL SLOT tables
    if ((jQuery.inArray("36", tick) > -1) || (jQuery.inArray("37", tick) > -1))
        $("#trRBH").css("display", "");
    else
        $("#trRBH").css("display", "none");

    //Display SIAM LOTTO tables
    if ((jQuery.inArray("38", tick) > -1) || (jQuery.inArray("39", tick) > -1))
        $("#trRBI").css("display", "");
    else
        $("#trRBI").css("display", "none");

    //Display UFA SLOT tables
    if ((jQuery.inArray("40", tick) > -1) || (jQuery.inArray("41", tick) > -1))
        $("#trRBL").css("display", "");
    else
        $("#trRBL").css("display", "none");

    //Display UFA MT tables
    if ((jQuery.inArray("42", tick) > -1) || (jQuery.inArray("43", tick) > -1) || (jQuery.inArray("44", tick) > -1))
        $("#trRBM").css("display", "");
    else
        $("#trRBM").css("display", "none");

    //Display WANG GAMING tables
    if ((jQuery.inArray("45", tick) > -1) || (jQuery.inArray("46", tick) > -1) || (jQuery.inArray("47", tick) > -1))
        $("#trRBN").css("display", "");
    else
        $("#trRBN").css("display", "none");

    //Display VIRTUAL SPORTS tables
    if ((jQuery.inArray("48", tick) > -1) || (jQuery.inArray("49", tick) > -1) || (jQuery.inArray("50", tick) > -1))
        $("#trRBO").css("display", "");
    else
        $("#trRBO").css("display", "none");

    //Display UFA LOTTO - YEEKEE tables
    if ((jQuery.inArray("51", tick) > -1) || (jQuery.inArray("52", tick) > -1) || (jQuery.inArray("53", tick) > -1))
        $("#trRCW").css("display", "");
    else
        $("#trRCW").css("display", "none");

    //Display UFA THAI LOTTO
    if ((jQuery.inArray("54", tick) > -1) || (jQuery.inArray("55", tick) > -1) || (jQuery.inArray("56", tick) > -1))
        $("#trRCX").css("display", "");
    else
        $("#trRCX").css("display", "none");


    //Display Tables
    for (var i = 0; i < tick.length; i++) {
        var _$tr = _$tbL.find("tr[id='tr_" + tick[i] + "']");

        if (_$tr != null || _$tr.length > 0) {
            _$tr.css("display", "");
        }
    }
}

function keyP(event) {
    var x = event.which || event.keyCode;
    if (x < 48 || x > 57) {
        /* Unicode Value:
        8 - BackSpace
        9 - Tab
        13 - Enter
        35 - End
        36 - Home
        37 - Left
        38 - Up
        39 - Right
        40 - Down
        97 - a or Ctrl + a
        99 - c or Ctrl + c
        118 - v or Ctrl + v */
        if (x == 8 || x == 9 || x == 13 || x == 35 || x == 36 || x == 37 || x == 38 || x == 39 || x == 40 || (event.ctrlKey && x == 97) || (event.ctrlKey && x == 99) || (event.ctrlKey && x == 118) || event.key === 'Delete')
            event.returnValue = true;
        else
            event.returnValue = false;
    }
}

function SelectOptProfile(type, profile) {
    var profileCount = GetProfileCount(type);
    for (var i = 1; i < profileCount; i++) {
        var ctr = document.getElementById("opt" + type + "Profile" + i);
        var ctrImg = document.getElementById("img" + type + "Profile" + i);

        if (ctr != null) {
            if (parseInt(ctr.value) == profile)
                ctr.checked = true;
            else
                ctr.checked = false;
        }

        if (parseInt(ctr.value) > profile) {
            ctrImg.src = icon_close;
        }
        else {
            ctrImg.src = icon_tick;
        }
    }
}

function GetProfileCount(type) {
    var profileCount = 7;

    if (type == "RBF" || type == "RBG" || type == "RBM" || type == "RBN" || type == "RBO" || type == "RDB")
        profileCount = 6;
    else if (type == "RBI")
        profileCount = 5;

    return profileCount;
}

function PopupCenter(pageURL, title, w, h) {
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}

/**
* Used to trim certain string.
*/
function fTrim(s) {
    s = s + ""; //this is used to convert to string, where numeic not support length function for funrther processing
    while ((s.substring(0, 1) == ' ') || (s.substring(0, 1) == '\n') || (s.substring(0, 1) == '\r')) {
        s = s.substring(1, s.length);
    } //end while

    // Remove trailing spaces and carriage returns
    while ((s.substring(s.length - 1, s.length) == ' ') || (s.substring(s.length - 1, s.length) == '\n') || (s.substring(s.length - 1, s.length) == '\r')) {
        s = s.substring(0, s.length - 1);
    } //end while
    return s;
} //end fTrim
/**
* Used to convert from text to other text
*/
function fConvertTo(input, fromText, toText) {
    for (var i = input.indexOf(fromText); i != -1; i = input.indexOf(fromText, i + toText.length + 1)) {
        input = input.substring(0, i) + toText + input.substring(i + fromText.length);
    } //end for
    return input;
} //end fConvertTo
/**B
*  Convert the text into number, return 0 if empty
*/
function fParseFloat(value) {
    if (value == "") return 0;
    value = fConvertTo(value, ",", "");
    return parseFloat(value);
}
/**
* Used to format decimal value such as #,##0.00.
*/
function fFormatDecimal(total, DecimalPlaces) {
    if (fTrim(total) == "")
        return "";
    total = total.toString().replace(/\$|\,/g, '');
    var isNegative = false;
    // First verify incoming value is a number
    if (isNaN(total)) {
        var returnValue = "0";
        if (DecimalPlaces > 0)
            returnValue += ".";
        for (var i = 0; i < DecimalPlaces; i++)
            returnValue += "0";
        return returnValue;
    }
    if (total < 0) {
        isNegative = true;
        total = total * -1;
    }
    // Second round incoming value to correct number of decimal places
    var RoundedTotal = total * Math.pow(10, DecimalPlaces);
    RoundedTotal = Math.round(RoundedTotal);
    RoundedTotal = RoundedTotal / Math.pow(10, DecimalPlaces);

    // Third pad with 0's if necessary the number to a string
    var Totalstring = RoundedTotal.toString(); // Convert to a string
    var DecimalPoint = Totalstring.indexOf("."); // Look for decimal point
    if (DecimalPoint == -1) {
        // No decimal so we need to pad all decimal places with 0's - if any
        currentDecimals = 0;
        // Add a decimal point if DecimalPlaces is GT 0
        Totalstring += DecimalPlaces > 0 ? "." : "";
    }
    else {
        // There is already a decimal so we only need to pad remaining decimal places with 0's
        currentDecimals = Totalstring.length - DecimalPoint - 1;
    }
    // Determine how many decimal places need to be padded with 0's
    var Pad = DecimalPlaces - currentDecimals;
    if (Pad > 0) {
        for (var count = 1; count <= Pad; count++)
            Totalstring += "0";
    }

    var num = null;
    if (Totalstring.indexOf(".") != -1) {
        num = Totalstring.substring(0, Totalstring.indexOf("."));
    } else {
        num = Totalstring;
    }

    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    if (Totalstring.indexOf(".") != -1) {
        Totalstring = num + Totalstring.substring(Totalstring.indexOf("."));
    } else {
        Totalstring = num;
    }

    if (isNegative)
        Totalstring = "-" + Totalstring;
    return Totalstring;
}

function popUpMsg(msg) {
    alert(msg);
}

function isWeekly(rId, chkId, isPDcheck) {
    var rdList = document.getElementById(rId);
    var rdListCount = rdList.getElementsByTagName("input");
    var chkList = document.getElementById(chkId);
    var chkListCount = chkList.getElementsByTagName("input");
    var cnt = 0;
    for (var i = 0; i < rdListCount.length; i++) {
        if (i == 2 && rdListCount[i].checked == true) {
            for (var j = 0; j < chkListCount.length; j++) {
                if (chkListCount[j].checked == true) {
                    cnt = cnt + 1;
                }
            }
        }

        if (i == 2 && rdListCount[i].checked == true) {
            if (cnt == 0) {
                alert(RS_SinceYouHaveBeenSelectedWeekly_PleaseSelectOneOfTheDays);
                return false;
            }
        }

        if (cnt > 6) {
            alert(RS_TheMaximum6DaysAllowedToSelect);
            return false;
        }
    }

    var pd = $("#lstIsNormalPayment_0").prop('checked') ? "1" : "0";

    if (pd == "1" && pd != $("#hidPD").val() && (isPDcheck == 1 || isPDcheck == 2)) {
        openPD();

        $("#okBtn").click(function () {
            DisableClick();
            $("#okBtn").attr("onclick", 'return false;');
            $("#okBtn2").attr("onclick", 'return false;');
        });

        $("#okBtn2").click(function () {
            DisableClick();
            $("#okBtn").attr("onclick", 'return false;');
            $("#okBtn2").attr("onclick", 'return false;');
        });
        return false;
    }

    DisableClick();

    return true;
}

function DisableClick() {
    if (Page_ClientValidate()) {
        //$("body").css("pointer-events", 'none');
        //$("body").css("overflow", 'hidden');
        //$('body').append('<div id="loadingDiv"><div class="lds"><div></div><div></div><div></div></div></div>');
        //$("#btnSave").attr("onclick", 'return false;');
        //$("#btnSave2").attr("onclick", 'return false;');
        //$("#btnUpdateC").attr("onclick", 'return false;');
        //$("#btnPLock").attr("onclick", 'return false;');
        //$("#btnUpdateG").attr("onclick", 'return false;');
        $("body").css("pointer-events", 'none');
        $("body").css("overflow", 'hidden');
        $('body').append('<div id="loadingDiv"><div class="lds"><div></div><div></div><div></div></div></div>');
        $('a[id^="btn"]').attr("onclick", 'return false;');
    }
}

function DisableClick_MCU() {
    if (Page_ClientValidate()) {
        $("#btnSave").attr("onclick", 'return false;');
    }
}

/* PD checking */
function firstConfirm(isPDcheck) {
    var okBtn = isPDcheck == 1 ? $('#okBtn') : $('#okBtn2');
    $('.confirm-message').hide();
    $('.text-box-confirm').show();
    $('#confirmBtn').hide();
    okBtn.show();
}
function checkInput(isPDcheck) {
    var okBtn = isPDcheck == 1 ? $('#okBtn') : $('#okBtn2');
    if ($('#inputConfirm').val().toLowerCase() == "confirm") {
        okBtn.removeClass('disabled');
    } else {
        okBtn.addClass('disabled');
    }
}
function openPD() {
    $('.confirm-message').show();
    $('.text-box-confirm').hide();
    $('#confirmBtn').show();
    $('#okBtn').hide();
    $('#okBtn2').hide();
    $("#inputConfirm").val("");
    $('#agentDialog').modal('show');
}

function DisableClick2(){
    if (Page_ClientValidate()) {
        $("body").css("pointer-events", 'none');
        $("body").css("overflow", 'hidden');
        $('body').append('<div id="loadingDiv"><div class="lds"><div></div><div></div><div></div></div></div>');
        $('a[id^="btn"]').attr("onclick", 'return false;');
    }
}