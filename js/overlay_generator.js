/**
 * Created by ArtofWack on 11/27/2015.
 */


//$( document ).ajaxError(function(ev, jqxhdr, ajaxsettings, err) {alert(ev); alert(jqxhdr); alert(ajaxsettings);alert(err);});
$(document).ajaxError(function (ev, jqxhdr, ajaxsettings, err) {
	alert(err);
});

function require(uri) {
	var rv;
	//WARNING extremly evil security leak, but hey beaglebone script people are trustworthy right ?
	$.get(uri, function (data) {
		alert(data);
		eval(data);
		rv = exports;
	}, 'text');
	return rv;
}

// ripped from https://github.com/jadonk/bonescript/blob/master/src/my.js
function pin_data(slew, direction, pullup, mux) {
	var pinData = 0;
	if (slew == 'slow') pinData |= 0x40;
	if (direction != "out") pinData |= 0x20;
	switch (pullup) {
		case 'disabled':
			pinData |= 0x08;
			break;
		case 'pullup':
			pinData |= 0x10;
			break;
		default:
			break;
	}
	pinData |= (mux & 0x07);
	return (pinData);
}

// ripped from https://github.com/jadonk/bonescript/blob/master/src/my.js
function getpin(pin) {
	if (typeof pin == 'object') return (pin);
	else if (typeof pin == 'string') return (bone.pins[pin]);
	else if (typeof pin == 'number') return (bone.pinIndex[pin]);
	else throw("Invalid pin: " + pin);
}

function clearOutputs() {
	document.getElementById("bbboverlayout").value = "";
	document.getElementById("bbbinstallscriptout").value = "";
	document.getElementById("bbbrclocalout").value = "";
	spanpinsysfsobj.innerHTML = '--';
	inppinsysfsobj.value = '';
}

// ripped from https://github.com/jadonk/bonescript/blob/master/src/my.js and modified
function createDTS(pin, data, template, dts) {
	dts = dts.replace(/!PIN_KEY!/g, pin.key);
	dts = dts.replace(/!PIN_DOT_KEY!/g, pin.key.replace(/_/, '.'));
	dts = dts.replace(/!PIN_FUNCTION!/g, pin.options[data & 7]);
	dts = dts.replace(/!PIN_OFFSET!/g, pin.muxRegOffset);
	dts = dts.replace(/!DATA!/g, '0x' + data.toString(16));
	if (pin.pwm) {
		dts = dts.replace(/!PWM_MODULE!/g, pin.pwm.module);
		dts = dts.replace(/!PWM_INDEX!/g, pin.pwm.index);
		dts = dts.replace(/!DUTY_CYCLE!/g, 500000);
	}
	try {
		document.getElementById("bbboverlayout").value = dts;
		var fragment = template + '_' + pin.key + '_' + data.toString(16);
		var dtsFilename = '/lib/firmware/' + fragment + '-00A0.dts';
		var dtboFilename = '/lib/firmware/' + fragment + '-00A0.dtbo';
		var command = 'dtc -O dtb -o ' + dtboFilename + ' -b 0 -@ ' + dtsFilename + "\n";
		var rclocal = "";
		if (template == 'bspwm') {
			rclocal += 'grep -q am33xx_pwm /sys/devices/bone_capemgr.?/slots || echo am33xx_pwm > /sys/devices/bone_capemgr.?/slots\n'
		}
		rclocal += 'echo ' + fragment + ' > /sys/devices/bone_capemgr.?/slots\n';
		if (template == 'bspm' && data & 0x07 == 7) { //FIXME: this check does not work reliably (check pin P8_30)
			rclocal += 'echo ' + pin.gpio + ' > /sys/class/gpio/export\n';
			spanpinsysfsobj.innerHTML = '/sys/class/gpio/gpio' + pin.gpio + '/';
			inppinsysfsobj.value = 'ls ' + spanpinsysfsobj.innerHTML;
		}
		spandtsfilenameobj.innerHTML = dtsFilename;

		document.getElementById("bbbinstallscriptout").value = command;
		document.getElementById("bbbrclocalout").value = rclocal;

	} catch (ex) {
		alert(ex);
	}
}

function getAndcreateDTS(pin, data, template) {
	//var dts_template="https://raw.githubusercontent.com/jadonk/bonescript/master/dts/bspm_template.dts";
	var dts = "";
	var dts_template = template + '_template.dts';
	$.get(dts_template, function (dts) {
		createDTS(pin, data, template, dts);
	}, 'text');
}
var bone;
require("//raw.githubusercontent.com/jadonk/bonescript/master/src/bone.js");
if (typeof bone != 'object') bone = exports;

var selectpinobject = document.getElementById("selpinid");
var selectpinslewobj = document.getElementById("selpinslew");
var selectpinmuxmodeobj = document.getElementById("selpinmuxmode");
var selectpindirectionobj = document.getElementById("selpindirection");
var selectpinpullupobj = document.getElementById("selpinpullup");
var spanpinnameobj = document.getElementById("pinnamespan");
var spanpincanpwmobj = document.getElementById("pincanpwmpan");
var spandtsfilenameobj = document.getElementById("dtsfilename");
var spanpinsysfsobj = document.getElementById("pinsysfs");
var inppinsysfsobj = document.getElementById("inppinsysfs");

//populate list of pins
if (typeof(selectpinobject) == 'object') {
	$.each(bone.pins, function (key) {
		//selectpinobject.add(new Option(key,key,false,false),null);
		selectpinobject.add(new Option(key, key), null);
	});
	selectpinobject.remove(0);
}

function updatePinModes() {
	var pinstr = selectpinobject.options[selectpinobject.selectedIndex].value;
	var pin = getpin(pinstr);
	while (selectpinmuxmodeobj.length > 0) {
		selectpinmuxmodeobj.remove(0);
	}
	if (pin.options) {
		selectpinmuxmodeobj.disabled = false;
		$.each(pin.options, function (k, v) {
			if (v != "NA") {
				selectpinmuxmodeobj.add(new Option("Mode" + k + ": " + v, k), null);
			}
		});
	} else {
		selectpinmuxmodeobj.disabled = true;
	}
}

function updatePinDTS() {
	var pinstr = selectpinobject.options[selectpinobject.selectedIndex].value;
	var pin = getpin(pinstr);
	clearOutputs();

	spanpinnameobj.innerHTML = pin.name;
	if (pin.options) {
		var muxmode = selectpinmuxmodeobj.options[selectpinmuxmodeobj.selectedIndex].value;
		selectpindirectionobj.disabled = false;
		selectpinpullupobj.disabled = false;
		selectpinslewobj.disabled = false;
		spanpinnameobj.style.fontWeight = "normal";
		spanpinnameobj.style.color = "";
		var template = "bspm";
		if (typeof(pin.pwm) == "object") {
			if (pin.pwm.muxmode == muxmode) {
				template = "bspwm";
				selectpindirectionobj.selectedIndex = 0;
				spanpinsysfsobj.innerHTML = '/sys/devices/ocp.?/pwm_test_' + pinstr + '.??/';
				inppinsysfsobj.value = 'ls ' + spanpinsysfsobj.innerHTML;
			}
			spanpincanpwmobj.innerHTML = "Yes";
		} else {
			spanpincanpwmobj.innerHTML = "No";
		}
		var pinData = pin_data(selectpinslewobj.options[selectpinslewobj.selectedIndex].value // "fast"
			, selectpindirectionobj.options[selectpindirectionobj.selectedIndex].value //"out"
			, selectpinpullupobj.options[selectpinpullupobj.selectedIndex].value //'pullup'
			, muxmode // 0x07 mode 7
		);


		getAndcreateDTS(pin, pinData, template);
	} else {
		if (pin.ain) {
			spanpinsysfsobj.innerHTML = '/sys/bus/iio/devices/iio\:device0/in_voltage' + pin.ain + '_raw';
			inppinsysfsobj.value = 'cat ' + spanpinsysfsobj.innerHTML;
			document.getElementById("bbbrclocalout").value = 'grep -q BB-ADC /sys/devices/bone_capemgr.?/slots || echo BB-ADC > /sys/devices/bone_capemgr.?/slots\n'
		}
		spanpinnameobj.style.fontWeight = "bold";
		spanpinnameobj.style.color = "red";
		selectpindirectionobj.disabled = true;
		selectpinpullupobj.disabled = true;
		selectpinslewobj.disabled = true;
	}
}

updatePinModes();
updatePinDTS();