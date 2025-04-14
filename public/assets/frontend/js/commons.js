///////////////////////////////////////////////////////////////////////////////
// Flash Template
///////////////////////////////////////////////////////////////////////////////
function insert_flash( _url , _width , _height )
{
    var h
	if (_height == 0) h=60;
	else h=_height;
	//alert(h);
	var writeStr =  '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="' + _width + '" height="' + h + '" align="middle">'
                  + '<param name="movie" value="' + _url + '">'
                  + '<param name="quality" value="high">'
                  + '<param name="wmode" value="transparent">'
                  + '<embed src="' + _url + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + _width + '" height="' + h + '" wmode="transparent"></embed>'
                  + '</object>';

    document.write( writeStr );
}
// Function WriteSwf
function WriteSwf(img,wsize,hsize){
    document.write("<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\""+wsize+"\" height=\""+hsize+"\">");
    document.write("<param name=\"movie\" value=\""+img+"\">");
    document.write("<param name=\"quality\" value=\"high\">");
    document.write("<param name=wmode value=transparent>");
    document.write("<param name=\"menu\" value=\"false\">");
    document.write("<embed src=\""+img+"\" wmode=\"transparent\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\""+wsize+"\" height=\""+hsize+"\" menu=\"false\"></embed>");
    document.write("</object>");
}

function goToURL(obj) {
    var i = obj.selectedIndex;
    if(i>0){
        if(obj.options[i].value.indexOf('http://')==-1)
            window.open('http://' + obj.options[i].value);
        else
            window.open(obj.options[i].value);
    }
}

function openwin(url, id, width, height) {
	// Open a window in the middle of the screen
	var l = (screen.availWidth/2) - (width/2);
	var t = (screen.availHeight/2) - (height/2);
	window.open(url, id, "width="+width+",height="+height+",left="+l+",top="+t);
}

function gmobj(o){
	if(document.getElementById){ m=document.getElementById(o); }
	else if(document.all){ m=document.all[o]; }
	else if(document.layers){ m=document[o]; }
	return m;
}

function FormatNumber(str){
	var strTemp = GetNumber(str);
	if(strTemp.length <= 3)
		return strTemp;
	strResult = "";
	for(var i =0; i< strTemp.length; i++)
		strTemp = strTemp.replace(",", "");
	for(var i = strTemp.length; i>=0; i--)
	{
		if(strResult.length >0 && (strTemp.length - i -1) % 3 == 0)
			strResult = "," + strResult;
		strResult = strTemp.substring(i, i + 1) + strResult;
	}	
	return strResult;
}
function GetNumber(str)
{
	for(var i = 0; i < str.length; i++)
	{	
		var temp = str.substring(i, i + 1);		
		if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
		{
			alert("Vui lòng nhập số (0-9)!");
			return str.substring(0, i);
		}
		if(temp == " ")
			return str.substring(0, i);
	}
	return str;
}

 function IsNumberInt(str)
{
	for(var i = 0; i < str.length; i++)
	{	
		var temp = str.substring(i, i + 1);		
		if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
		{
			alert("Vui lòng nhập số (0-9)!");
			return str.substring(0, i);
		}
		if(temp == " " || temp == ",")
			return str.substring(0, i);
	}
	return str;
}

/**
*
* URL encode / decode
* http://www.webtoolkit.info/
*
**/

var Url = {

	// public method for url encoding
	encode : function (string) {
		return escape(this._utf8_encode(string));
	},

	// public method for url decoding
	decode : function (string) {
		return this._utf8_decode(unescape(string));
	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}

}
function number_format(number, decimals, dec_point, thousands_sep) {
	// Formats a number with grouped thousands
	//
	// version: 1004.2314
	// discuss at: http://phpjs.org/functions/number_format
	// +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +     bugfix by: Michael White (http://getsprink.com)
	// +     bugfix by: Benjamin Lupton
	// +     bugfix by: Allan Jensen (http://www.winternet.no)
	// +    revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// +     bugfix by: Howard Yeend
	// +    revised by: Luke Smith (http://lucassmith.name)
	// +     bugfix by: Diogo Resende
	// +     bugfix by: Rival
	// +      input by: Kheang Hok Chin (http://www.distantia.ca/)
	// +   improved by: davook
	// +   improved by: Brett Zamir (http://brett-zamir.me)
	// +      input by: Jay Klehr
	// +   improved by: Brett Zamir (http://brett-zamir.me)
	// +      input by: Amir Habibi (http://www.residence-mixte.com/)
	// +     bugfix by: Brett Zamir (http://brett-zamir.me)
	// +   improved by: Theriault
	// *     example 1: number_format(1234.56);
	// *     returns 1: '1,235'
	// *     example 2: number_format(1234.56, 2, ',', ' ');
	// *     returns 2: '1 234,56'
	// *     example 3: number_format(1234.5678, 2, '.', '');
	// *     returns 3: '1234.57'
	// *     example 4: number_format(67, 2, ',', '.');
	// *     returns 4: '67,00'
	// *     example 5: number_format(1000);
	// *     returns 5: '1,000'
	// *     example 6: number_format(67.311, 2);
	// *     returns 6: '67.31'
	// *     example 7: number_format(1000.55, 1);
	// *     returns 7: '1,000.6'
	// *     example 8: number_format(67000, 5, ',', '.');
	// *     returns 8: '67.000,00000'
	// *     example 9: number_format(0.9, 0);
	// *     returns 9: '1'
	// *    example 10: number_format('1.20', 2);
	// *    returns 10: '1.20'
	// *    example 11: number_format('1.20', 4);
	// *    returns 11: '1.2000'
	// *    example 12: number_format('1.2000', 3);
	// *    returns 12: '1.200'
	var n = !isFinite(+number) ? 0 : +number,
	prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	s = '',

	toFixedFix = function (n, prec) {
		var k = Math.pow(10, prec);
		return '' + Math.round(n * k) / k;
	};

	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}
