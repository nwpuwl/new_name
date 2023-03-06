<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>漢語多功能字庫 Multi-function Chinese Character Database</title>
<link href="main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="css/lightbox.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/jquery.ez-plus.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript" src="yui/yahoo-dom-event/yahoo-dom-event.js"></script>
<script src = "js/cookie.js"></script>
<script src = "js/phonetic.js"></script>
<script src = "js/mandarin.js"></script>
<script src = "js/main.js"></script>
<script type="text/javascript">

function archaic() {
	$("#archaic-remark").show();
	$("#sound-type-remark").hide();

	$("span[sound-type-class]").each(function() {
		var a = $(this).attr("archaic-class");
		var s = $(this).attr("sound-type-class");
		$(this).removeClass(s).addClass(a);
	});
}

function soundType() {
	$("#archaic-remark").hide();
	$("#sound-type-remark").show();

	$("span[sound-type-class]").each(function() {
		var a = $(this).attr("archaic-class");
		var s = $(this).attr("sound-type-class");
		$(this).removeClass(a).addClass(s);
	});
}

</script></head>
<body onload="phonetic_init();archaic();">
<div id="mouseoverlayer"><!----></div>
<div id="globalWrapper">

<!-- Top Bar -->
<div class="mf-top" style="z-index:4">
	<div class="mf-bar mf-brown mf-large">
		<a href="javascript:void(0);" class="topnav-icons fa fa-bars mf-hide-large mf-left mf-bar-item mf-button" title="Menu" onclick="mf_open();"></a>
		<a href="/" class="topnav-icons fa fa-home mf-left mf-bar-item mf-button" title="Home"></a>
		<a href="javascript:void(0);" class="mf-bar-item mf-button mf-right" id="topnavbtn_cantonese_ph" onclick="mf_open_nav('cantonese_ph')" title="粵音音節">粵 <i class="fa fa-caret-down"></i><i class="fa fa-caret-up" style="display:none"></i></a>
		<a href="javascript:void(0);" class="mf-bar-item mf-button mf-right" id="topnavbtn_mandarin_ph" onclick="mf_open_nav('mandarin_ph')" title="普通話音節">普 <i class="fa fa-caret-down"></i><i class="fa fa-caret-up" style="display:none"></i></a>
		<a href="advanceSearch.php" class="topnav-icons fa fa-search-plus mf-right mf-bar-item mf-button" title="Advanced Search"></a>
		<a href="javascript:void(0);" class="topnav-icons fa fa-search mf-right mf-bar-item mf-button" id="top_search_button" onclick="open_search(this)" title="Search"></a>
		<div id="search_bar_panel">
			<a href="javascript:void(0);" class="topnav-icons fa fa-times-circle mf-right mf-bar-item mf-button" id="top_search_close"  onclick="open_search(this)" title="Close"></a>
			<a href="javascript:void(0);" class="topnav-icons fa fa-search mf-right mf-bar-item mf-button" onclick="document.getElementById('search_hc_search').submit()" title="Search"></a>
			<div class="mf-right mf-bar-item mf-medium">
			<form id="search_hc_search" name="search_hc_search" action="searchAll.php" method="get">
				<input type="hidden" name="type" value="word"><input type="hidden" name="simple" value="1">
				<input type="text" name="q" id="search_input" size="10" maxlength="">
				<select name="freq">
					<option value="-1">所有字</option>
					<option value="0">常用字</option>
				</select>
			</form>
			</div>
		</div>
	</div>
	<div id="nav_mandarin_ph">
		<table>
			<tr>
				<td colspan="3">
				<form name="search_mandarin_ph_search" id="search_mandarin_ph_search">
					<span id="search_mandarin_ph_dropdown_span"><span class="ph_initial">?</span><span class="ph_final">?</span><span class="ph_tone">?</span></span>
					<input type="button" onclick="search_mandarin_ph_submit()" class="searchButton" value="搜索">
				</form>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<table class="ph_initial">
						<tr>
							<th onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, '?')">聲母</th>
						</tr>
						<tr>
							<th onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, '-')">-</th>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'b')">b</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'p')">p</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'm')">m</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'f')">f</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'd')">d</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 't')">t</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'n')">n</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'l')">l</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'g')">g</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'k')">k</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'h')">h</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'j')">j</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'q')">q</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'x')">x</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'zh')">zh</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'ch')">ch</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'sh')">sh</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'r')">r</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'z')">z</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'c')">c</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 's')">s</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'y')">y</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(1, 'w')">w</td>
						</tr>
					</table>
				</td>
				<td valign="top">
					<table class="ph_final">
						<tr>
							<th colspan="3" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, '?')">韻母</th>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'a')">a</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'o')">o</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'e')">e</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'er')">er</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ai')">ai</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ei')">ei</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ao')">ao</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ou')">ou</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'an')">an</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'en')">en</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ang')">ang</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'eng')">eng</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ong')">ong</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'i')">i</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ia')">ia</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'iao')">iao</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ie')">ie</td>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'iu')">iou <span style="color:#666">(iu)</span></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ian')">ian</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'in')">in</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'iang')">iang</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ing')">ing</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'iong')">iong</td>
							<td></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'u')">u</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ua')">ua</td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'uo')">uo</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'uai')">uai</td>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'ui')">uei <span style="color:#666">(ui)</span></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'uan')">uan</td>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'un')">uen <span style="color:#666">(un)</span></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'uang')">uang</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'U')">ü <span style="color:#666">(u)</span></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'Ue')">üe <span style="color:#666">(ue)</span></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'Uan')">üan <span style="color:#666">(uan)</span></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(2, 'Un')">ün <span style="color:#666">(un)</span></td>
							<td></td>
						</tr>
					</table>
				</td>
				<td valign="top">
					<table class="ph_tone">
						<tr>
							<th onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(3, '?')">聲調</th>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(3, '0')">&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(3, '1')"><img src="img/phonetic/pinyin1.gif" border="0" align="absmiddle"></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(3, '2')"><img src="img/phonetic/pinyin2.gif" border="0" align="absmiddle"></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(3, '3')"><img src="img/phonetic/pinyin3.gif" border="0" align="absmiddle"></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="mandarin_ph_pulldown_gen(3, '4')"><img src="img/phonetic/pinyin4.gif" border="0" align="absmiddle"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<div id="nav_cantonese_ph">
		<table>
			<tr>
				<td colspan="3">
				<form name="search_ph_search" id="search_ph_search">
					<span id="search_ph_dropdown_span"><span class="ph_initial">?</span><span class="ph_final">?</span><span class="ph_tone">?</span></span>
					<input type="button" onclick="search_ph_submit()" class="searchButton" value="搜索">
				</form>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<table class="ph_initial">
						<tr>
							<th onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, '?')">聲母</th>
						</tr>
						<tr>
							<th onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, '-')">-</th>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'b')"><span id='phonetic_0'></span><script type="text/javascript">
	phonetic_initial[0] = "b";
	phonetic_final[0] = "";
	phonetic_tone[0] = "";
	phonetic_mode[0] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'p')"><span id='phonetic_1'></span><script type="text/javascript">
	phonetic_initial[1] = "p";
	phonetic_final[1] = "";
	phonetic_tone[1] = "";
	phonetic_mode[1] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'm')"><span id='phonetic_2'></span><script type="text/javascript">
	phonetic_initial[2] = "m";
	phonetic_final[2] = "";
	phonetic_tone[2] = "";
	phonetic_mode[2] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'f')"><span id='phonetic_3'></span><script type="text/javascript">
	phonetic_initial[3] = "f";
	phonetic_final[3] = "";
	phonetic_tone[3] = "";
	phonetic_mode[3] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'd')"><span id='phonetic_4'></span><script type="text/javascript">
	phonetic_initial[4] = "d";
	phonetic_final[4] = "";
	phonetic_tone[4] = "";
	phonetic_mode[4] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 't')"><span id='phonetic_5'></span><script type="text/javascript">
	phonetic_initial[5] = "t";
	phonetic_final[5] = "";
	phonetic_tone[5] = "";
	phonetic_mode[5] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'n')"><span id='phonetic_6'></span><script type="text/javascript">
	phonetic_initial[6] = "n";
	phonetic_final[6] = "";
	phonetic_tone[6] = "";
	phonetic_mode[6] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'l')"><span id='phonetic_7'></span><script type="text/javascript">
	phonetic_initial[7] = "l";
	phonetic_final[7] = "";
	phonetic_tone[7] = "";
	phonetic_mode[7] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'g')"><span id='phonetic_8'></span><script type="text/javascript">
	phonetic_initial[8] = "g";
	phonetic_final[8] = "";
	phonetic_tone[8] = "";
	phonetic_mode[8] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'k')"><span id='phonetic_9'></span><script type="text/javascript">
	phonetic_initial[9] = "k";
	phonetic_final[9] = "";
	phonetic_tone[9] = "";
	phonetic_mode[9] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'h')"><span id='phonetic_10'></span><script type="text/javascript">
	phonetic_initial[10] = "h";
	phonetic_final[10] = "";
	phonetic_tone[10] = "";
	phonetic_mode[10] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'ng')"><span id='phonetic_11'></span><script type="text/javascript">
	phonetic_initial[11] = "ng";
	phonetic_final[11] = "";
	phonetic_tone[11] = "";
	phonetic_mode[11] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'z')"><span id='phonetic_12'></span><script type="text/javascript">
	phonetic_initial[12] = "z";
	phonetic_final[12] = "";
	phonetic_tone[12] = "";
	phonetic_mode[12] = "1";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'c')"><span id='phonetic_13'></span><script type="text/javascript">
	phonetic_initial[13] = "c";
	phonetic_final[13] = "";
	phonetic_tone[13] = "";
	phonetic_mode[13] = "1";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 's')"><span id='phonetic_14'></span><script type="text/javascript">
	phonetic_initial[14] = "s";
	phonetic_final[14] = "";
	phonetic_tone[14] = "";
	phonetic_mode[14] = "1";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'gw')"><span id='phonetic_15'></span><script type="text/javascript">
	phonetic_initial[15] = "gw";
	phonetic_final[15] = "";
	phonetic_tone[15] = "";
	phonetic_mode[15] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'kw')"><span id='phonetic_16'></span><script type="text/javascript">
	phonetic_initial[16] = "kw";
	phonetic_final[16] = "";
	phonetic_tone[16] = "";
	phonetic_mode[16] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'j')"><span id='phonetic_17'></span><script type="text/javascript">
	phonetic_initial[17] = "j";
	phonetic_final[17] = "";
	phonetic_tone[17] = "";
	phonetic_mode[17] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(1, 'w')"><span id='phonetic_18'></span><script type="text/javascript">
	phonetic_initial[18] = "w";
	phonetic_final[18] = "";
	phonetic_tone[18] = "";
	phonetic_mode[18] = "0";
</script></td>
						</tr>
					</table>
				</td>
				<td valign="top">
					<table class="ph_final">
						<tr>
							<th colspan="3" onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, '?')">韻母</th>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aa')"><span id='phonetic_19'></span><script type="text/javascript">
	phonetic_initial[19] = "";
	phonetic_final[19] = "aa";
	phonetic_tone[19] = "";
	phonetic_mode[19] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aai')"><span id='phonetic_20'></span><script type="text/javascript">
	phonetic_initial[20] = "";
	phonetic_final[20] = "aai";
	phonetic_tone[20] = "";
	phonetic_mode[20] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aau')"><span id='phonetic_21'></span><script type="text/javascript">
	phonetic_initial[21] = "";
	phonetic_final[21] = "aau";
	phonetic_tone[21] = "";
	phonetic_mode[21] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aam')"><span id='phonetic_22'></span><script type="text/javascript">
	phonetic_initial[22] = "";
	phonetic_final[22] = "aam";
	phonetic_tone[22] = "";
	phonetic_mode[22] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aan')"><span id='phonetic_23'></span><script type="text/javascript">
	phonetic_initial[23] = "";
	phonetic_final[23] = "aan";
	phonetic_tone[23] = "";
	phonetic_mode[23] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aang')"><span id='phonetic_24'></span><script type="text/javascript">
	phonetic_initial[24] = "";
	phonetic_final[24] = "aang";
	phonetic_tone[24] = "";
	phonetic_mode[24] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aap')"><span id='phonetic_25'></span><script type="text/javascript">
	phonetic_initial[25] = "";
	phonetic_final[25] = "aap";
	phonetic_tone[25] = "";
	phonetic_mode[25] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aat')"><span id='phonetic_26'></span><script type="text/javascript">
	phonetic_initial[26] = "";
	phonetic_final[26] = "aat";
	phonetic_tone[26] = "";
	phonetic_mode[26] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'aak')"><span id='phonetic_27'></span><script type="text/javascript">
	phonetic_initial[27] = "";
	phonetic_final[27] = "aak";
	phonetic_tone[27] = "";
	phonetic_mode[27] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ai')"><span id='phonetic_28'></span><script type="text/javascript">
	phonetic_initial[28] = "";
	phonetic_final[28] = "ai";
	phonetic_tone[28] = "";
	phonetic_mode[28] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'au')"><span id='phonetic_29'></span><script type="text/javascript">
	phonetic_initial[29] = "";
	phonetic_final[29] = "au";
	phonetic_tone[29] = "";
	phonetic_mode[29] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'am')"><span id='phonetic_30'></span><script type="text/javascript">
	phonetic_initial[30] = "";
	phonetic_final[30] = "am";
	phonetic_tone[30] = "";
	phonetic_mode[30] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'an')"><span id='phonetic_31'></span><script type="text/javascript">
	phonetic_initial[31] = "";
	phonetic_final[31] = "an";
	phonetic_tone[31] = "";
	phonetic_mode[31] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ang')"><span id='phonetic_32'></span><script type="text/javascript">
	phonetic_initial[32] = "";
	phonetic_final[32] = "ang";
	phonetic_tone[32] = "";
	phonetic_mode[32] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ap')"><span id='phonetic_33'></span><script type="text/javascript">
	phonetic_initial[33] = "";
	phonetic_final[33] = "ap";
	phonetic_tone[33] = "";
	phonetic_mode[33] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'at')"><span id='phonetic_34'></span><script type="text/javascript">
	phonetic_initial[34] = "";
	phonetic_final[34] = "at";
	phonetic_tone[34] = "";
	phonetic_mode[34] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ak')"><span id='phonetic_35'></span><script type="text/javascript">
	phonetic_initial[35] = "";
	phonetic_final[35] = "ak";
	phonetic_tone[35] = "";
	phonetic_mode[35] = "0";
</script></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'e')"><span id='phonetic_36'></span><script type="text/javascript">
	phonetic_initial[36] = "";
	phonetic_final[36] = "e";
	phonetic_tone[36] = "";
	phonetic_mode[36] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ei')"><span id='phonetic_37'></span><script type="text/javascript">
	phonetic_initial[37] = "";
	phonetic_final[37] = "ei";
	phonetic_tone[37] = "";
	phonetic_mode[37] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'eu')"><span id='phonetic_38'></span><script type="text/javascript">
	phonetic_initial[38] = "";
	phonetic_final[38] = "eu";
	phonetic_tone[38] = "";
	phonetic_mode[38] = "1";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'em')"><span id='phonetic_39'></span><script type="text/javascript">
	phonetic_initial[39] = "";
	phonetic_final[39] = "em";
	phonetic_tone[39] = "";
	phonetic_mode[39] = "1";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'eng')"><span id='phonetic_40'></span><script type="text/javascript">
	phonetic_initial[40] = "";
	phonetic_final[40] = "eng";
	phonetic_tone[40] = "";
	phonetic_mode[40] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ep')"><span id='phonetic_41'></span><script type="text/javascript">
	phonetic_initial[41] = "";
	phonetic_final[41] = "ep";
	phonetic_tone[41] = "";
	phonetic_mode[41] = "1";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ek')"><span id='phonetic_42'></span><script type="text/javascript">
	phonetic_initial[42] = "";
	phonetic_final[42] = "ek";
	phonetic_tone[42] = "";
	phonetic_mode[42] = "0";
</script></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'i')"><span id='phonetic_43'></span><script type="text/javascript">
	phonetic_initial[43] = "";
	phonetic_final[43] = "i";
	phonetic_tone[43] = "";
	phonetic_mode[43] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'iu')"><span id='phonetic_44'></span><script type="text/javascript">
	phonetic_initial[44] = "";
	phonetic_final[44] = "iu";
	phonetic_tone[44] = "";
	phonetic_mode[44] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'im')"><span id='phonetic_45'></span><script type="text/javascript">
	phonetic_initial[45] = "";
	phonetic_final[45] = "im";
	phonetic_tone[45] = "";
	phonetic_mode[45] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'in')"><span id='phonetic_46'></span><script type="text/javascript">
	phonetic_initial[46] = "";
	phonetic_final[46] = "in";
	phonetic_tone[46] = "";
	phonetic_mode[46] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ing')"><span id='phonetic_47'></span><script type="text/javascript">
	phonetic_initial[47] = "";
	phonetic_final[47] = "ing";
	phonetic_tone[47] = "";
	phonetic_mode[47] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ip')"><span id='phonetic_48'></span><script type="text/javascript">
	phonetic_initial[48] = "";
	phonetic_final[48] = "ip";
	phonetic_tone[48] = "";
	phonetic_mode[48] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'it')"><span id='phonetic_49'></span><script type="text/javascript">
	phonetic_initial[49] = "";
	phonetic_final[49] = "it";
	phonetic_tone[49] = "";
	phonetic_mode[49] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ik')"><span id='phonetic_50'></span><script type="text/javascript">
	phonetic_initial[50] = "";
	phonetic_final[50] = "ik";
	phonetic_tone[50] = "";
	phonetic_mode[50] = "0";
</script></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'o')"><span id='phonetic_51'></span><script type="text/javascript">
	phonetic_initial[51] = "";
	phonetic_final[51] = "o";
	phonetic_tone[51] = "";
	phonetic_mode[51] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'oi')"><span id='phonetic_52'></span><script type="text/javascript">
	phonetic_initial[52] = "";
	phonetic_final[52] = "oi";
	phonetic_tone[52] = "";
	phonetic_mode[52] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ou')"><span id='phonetic_53'></span><script type="text/javascript">
	phonetic_initial[53] = "";
	phonetic_final[53] = "ou";
	phonetic_tone[53] = "";
	phonetic_mode[53] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'on')"><span id='phonetic_54'></span><script type="text/javascript">
	phonetic_initial[54] = "";
	phonetic_final[54] = "on";
	phonetic_tone[54] = "";
	phonetic_mode[54] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ong')"><span id='phonetic_55'></span><script type="text/javascript">
	phonetic_initial[55] = "";
	phonetic_final[55] = "ong";
	phonetic_tone[55] = "";
	phonetic_mode[55] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ot')"><span id='phonetic_56'></span><script type="text/javascript">
	phonetic_initial[56] = "";
	phonetic_final[56] = "ot";
	phonetic_tone[56] = "";
	phonetic_mode[56] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ok')"><span id='phonetic_57'></span><script type="text/javascript">
	phonetic_initial[57] = "";
	phonetic_final[57] = "ok";
	phonetic_tone[57] = "";
	phonetic_mode[57] = "0";
</script></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'u')"><span id='phonetic_58'></span><script type="text/javascript">
	phonetic_initial[58] = "";
	phonetic_final[58] = "u";
	phonetic_tone[58] = "";
	phonetic_mode[58] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ui')"><span id='phonetic_59'></span><script type="text/javascript">
	phonetic_initial[59] = "";
	phonetic_final[59] = "ui";
	phonetic_tone[59] = "";
	phonetic_mode[59] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'un')"><span id='phonetic_60'></span><script type="text/javascript">
	phonetic_initial[60] = "";
	phonetic_final[60] = "un";
	phonetic_tone[60] = "";
	phonetic_mode[60] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ung')"><span id='phonetic_61'></span><script type="text/javascript">
	phonetic_initial[61] = "";
	phonetic_final[61] = "ung";
	phonetic_tone[61] = "";
	phonetic_mode[61] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ut')"><span id='phonetic_62'></span><script type="text/javascript">
	phonetic_initial[62] = "";
	phonetic_final[62] = "ut";
	phonetic_tone[62] = "";
	phonetic_mode[62] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'uk')"><span id='phonetic_63'></span><script type="text/javascript">
	phonetic_initial[63] = "";
	phonetic_final[63] = "uk";
	phonetic_tone[63] = "";
	phonetic_mode[63] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'oe')"><span id='phonetic_64'></span><script type="text/javascript">
	phonetic_initial[64] = "";
	phonetic_final[64] = "oe";
	phonetic_tone[64] = "";
	phonetic_mode[64] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'oeng')"><span id='phonetic_65'></span><script type="text/javascript">
	phonetic_initial[65] = "";
	phonetic_final[65] = "oeng";
	phonetic_tone[65] = "";
	phonetic_mode[65] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'oek')"><span id='phonetic_66'></span><script type="text/javascript">
	phonetic_initial[66] = "";
	phonetic_final[66] = "oek";
	phonetic_tone[66] = "";
	phonetic_mode[66] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'eoi')"><span id='phonetic_67'></span><script type="text/javascript">
	phonetic_initial[67] = "";
	phonetic_final[67] = "eoi";
	phonetic_tone[67] = "";
	phonetic_mode[67] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'eon')"><span id='phonetic_68'></span><script type="text/javascript">
	phonetic_initial[68] = "";
	phonetic_final[68] = "eon";
	phonetic_tone[68] = "";
	phonetic_mode[68] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'eot')"><span id='phonetic_69'></span><script type="text/javascript">
	phonetic_initial[69] = "";
	phonetic_final[69] = "eot";
	phonetic_tone[69] = "";
	phonetic_mode[69] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'yu')"><span id='phonetic_70'></span><script type="text/javascript">
	phonetic_initial[70] = "";
	phonetic_final[70] = "yu";
	phonetic_tone[70] = "";
	phonetic_mode[70] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'yun')"><span id='phonetic_71'></span><script type="text/javascript">
	phonetic_initial[71] = "";
	phonetic_final[71] = "yun";
	phonetic_tone[71] = "";
	phonetic_mode[71] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'yut')"><span id='phonetic_72'></span><script type="text/javascript">
	phonetic_initial[72] = "";
	phonetic_final[72] = "yut";
	phonetic_tone[72] = "";
	phonetic_mode[72] = "0";
</script></td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'm')"><span id='phonetic_73'></span><script type="text/javascript">
	phonetic_initial[73] = "";
	phonetic_final[73] = "m";
	phonetic_tone[73] = "";
	phonetic_mode[73] = "0";
</script></td>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(2, 'ng')"><span id='phonetic_74'></span><script type="text/javascript">
	phonetic_initial[74] = "";
	phonetic_final[74] = "ng";
	phonetic_tone[74] = "";
	phonetic_mode[74] = "0";
</script></td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</td>
				<td valign="top">
					<table class="ph_tone">
						<tr>
							<th onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '?')">聲調</th>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '1')"><span id='phonetic_75'></span><script type="text/javascript">
	phonetic_initial[75] = "";
	phonetic_final[75] = "";
	phonetic_tone[75] = "1";
	phonetic_mode[75] = "1";
</script>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '2')"><span id='phonetic_76'></span><script type="text/javascript">
	phonetic_initial[76] = "";
	phonetic_final[76] = "";
	phonetic_tone[76] = "2";
	phonetic_mode[76] = "0";
</script>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '3')"><span id='phonetic_77'></span><script type="text/javascript">
	phonetic_initial[77] = "";
	phonetic_final[77] = "";
	phonetic_tone[77] = "3";
	phonetic_mode[77] = "1";
</script>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '4')"><span id='phonetic_78'></span><script type="text/javascript">
	phonetic_initial[78] = "";
	phonetic_final[78] = "";
	phonetic_tone[78] = "4";
	phonetic_mode[78] = "0";
</script>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '5')"><span id='phonetic_79'></span><script type="text/javascript">
	phonetic_initial[79] = "";
	phonetic_final[79] = "";
	phonetic_tone[79] = "5";
	phonetic_mode[79] = "0";
</script>&nbsp;</td>
						</tr>
						<tr>
							<td onmouseover="this.style.backgroundColor = 'yellow'" onmouseout="this.style.backgroundColor = 'white'" onclick="ph_pulldown_gen(3, '6')"><span id='phonetic_80'></span><script type="text/javascript">
	phonetic_initial[80] = "";
	phonetic_final[80] = "";
	phonetic_tone[80] = "6";
	phonetic_mode[80] = "1";
</script>&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: left; font-size: 80%"><span id="search_ph_special_message"></span></td>
			</tr>
		</table>
	</div>
</div>

<!-- Sidebar/menu -->
<nav class="mf-sidebar mf-collapse mf-light-gray mf-animate-left" id="column-one">

	<div id="m-logo" class="menu">
		<a style="background-image: url(img/leximflogo.png);" href="."></a>
	</div>

<!-- BEGIN 語言 //-->
	<div id="m-lang" class="menu">
		<div class="mBody">
			<ul>				<li id="lang-chi" class="selected">中文</li>
				<li id="lang-eng"><a href="javascript:void(0)" onclick="changeLang()">ENG</a></li>
			</ul>
		</div>
	</div>
<!-- END 語言 //-->

<!-- BEGIN 字形 //-->
	<div id="m-stroke" class="menu">
		<h5>字形</h5>
		<div class="mBody">
			<ul>
				<li><a href="radical.php">部首索引</a></li>
				<li><a href="stroke.php">筆畫索引</a></li>
				<li><a href="oraclePiece.php">甲骨部件表</a></li>
				<li><a href="bronzePiece.php">金文部件表</a></li>
				<li><a href="ancient.php">形義源流通解</a></li>
			</ul>
		</div>
	</div>
<!-- END 字形 //-->

<!-- BEGIN 字音 //-->
	<div id="m-phonetic" class="menu">
		<h5>字音</h5>
		<div class="mBody">
			<ul>
				<li><a href="syllables.php">粵語音節表</a></li>
				<li><a href="initialTable.php">粵語聲母表</a></li>
				<li><a href="finalTable.php">粵語韻母表</a></li>
				<li>
					粵語分類字表:<br/>
					<form method="get" action="classified.php">
						<select name="category">
							<option value="1">總字表</option>
							<option value="2">單讀音字</option>
							<option value="3">破音字</option>
							<option value="4">異讀字</option>
							<option value="5">異讀破音字</option>
							<option value="6">破音+異讀破音</option>
						</select>
						<input type="submit" value="瀏覽">
					</form>
				</li>
				<li>粵語注音系統對照表<br/>[<a href="initials.php">聲母</a>|<a href="finals.php">韻母</a>|<a href="tones.php">聲調</a>]</li>
				<li><a href="mandarin_syllables.php">普通話音節表</a></li>
				<li><a href="dialect.php">其他方言讀音</a></li>
			</ul>
		</div>
	</div>
<!-- END 字音 //-->

<!-- BEGIN 工具 //-->
	<div id="m-tool" class="menu">
		<h5>工具</h5>
		<div class="mBody">
			<ul>
				<li><a href="shuowen.php">《說文》全文索引</a></li>
				<li><a href="chinaPlaces.php">《讀史方輿紀要》</a></li>
				<li><a href="idiom.php">成語彙輯</a></li>
				<li><a href="stctable.php">繁簡對照表</a></li>
<!-- 				<li><a href="hkword.php">香港字</a></li> //-->
			</ul>
		</div>
	</div>
<!-- END 工具 //-->

<!-- BEGIN 設定 //-->
	<div id="m-settings" class="menu">
		<h5>設定</h5>
		<div class="mBody">
			<ul>
				<li>冷僻字: </br>
					<select id="ext2ImgTxtSelect" onchange="unicodeExt2Img_select( this );">
						<option value="1" >圖形</option>
						<option value="0" selected="selected">文字</option>
					</select>
				</li>
				<li>粵音系統: </br>
					<select id="option_phsys_dropdown" onChange="phonetic_gen(this.value)">
						<!-- need in order -->
						<option value="0">粵拼</option>
						<option value="1">黃錫凌</option>
						<option value="2">耶魯</option>
						<option value="3">廣州</option>
						<option value="4">IPA(調值)</option>
						<option value="5">IPA(調型)</option>
						<option value="6">教院</option>
						<option value="7">劉錫祥</option>
					</select>
				</li>
			</ul>
		</div>
	</div>
<!-- END 設定 //-->

</nav>	<!-- END column-one //-->

<!-- Overlay effect when opening sidebar on small screens -->
<div class="mf-overlay mf-hide-large mf-animate-opacity" onclick="mf_close_all_nav()" style="cursor:pointer" title="close side menu" id="column-overlay"></div>

<div class="mf-main" id="content">
	<a name="top" id="top"></a>
	<div id="bodyContent">

			<h1 align="center">漢字部首索引</h1>


				<table class="outer" align="center">
					<tr>
						<td>
							<table class="radical_table">
								<tr>
									<th colspan="2">畫數</th>
									<th colspan="17" style="width: auto">部首表</th>
								</tr>
								<tr> 
									<th colspan="2">1</th>
									<td><a href="radical.php?rad=1">一</a><br><span class="radical_index">1</span></td>
									<td><a href="radical.php?rad=2">丨</a><br><span class="radical_index">2</span></td>
									<td><a href="radical.php?rad=3">丶</a><br><span class="radical_index">3</span></td>
									<td><a href="radical.php?rad=4">丿</a><br><span class="radical_index">4</span></td>
									<td><a href="radical.php?rad=5">乙</a><br><span class="radical_index">5</span></td>
									<td><a href="radical.php?rad=6">亅</a><br><span class="radical_index">6</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2" rowspan="2">2</th>
									<td><a href="radical.php?rad=7">二</a><br><span class="radical_index">7</span></td>
									<td><a href="radical.php?rad=8">亠</a><br><span class="radical_index">8</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=9">人 <span style="font-size: 10px">[亻]</span></a><br><span class="radical_index">9</span></td>
									<td><a href="radical.php?rad=10">儿</a><br><span class="radical_index">10</span></td>
									<td><a href="radical.php?rad=11">入</a><br><span class="radical_index">11</span></td>
									<td><a href="radical.php?rad=12">八</a><br><span class="radical_index">12</span></td>
									<td><a href="radical.php?rad=13">冂</a><br><span class="radical_index">13</span></td>
									<td><a href="radical.php?rad=14">冖</a><br><span class="radical_index">14</span></td>
									<td><a href="radical.php?rad=15">冫</a><br><span class="radical_index">15</span></td>
									<td><a href="radical.php?rad=16">几</a><br><span class="radical_index">16</span></td>
									<td><a href="radical.php?rad=17">凵</a><br><span class="radical_index">17</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=18">刀 <span style="font-size: 10px">[刂]</span></a><br><span class="radical_index">18</span></td>
									<td><a href="radical.php?rad=19">力</a><br><span class="radical_index">19</span></td>
									<td><a href="radical.php?rad=20">勹</a><br><span class="radical_index">20</span></td>
									<td><a href="radical.php?rad=21">匕</a><br><span class="radical_index">21</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=22">匚</a><br><span class="radical_index">22</span></td>
									<td><a href="radical.php?rad=23">匸</a><br><span class="radical_index">23</span></td>
									<td><a href="radical.php?rad=24">十</a><br><span class="radical_index">24</span></td>
									<td><a href="radical.php?rad=25">卜</a><br><span class="radical_index">25</span></td>
									<td><a href="radical.php?rad=26">卩</a><br><span class="radical_index">26</span></td>
									<td><a href="radical.php?rad=27">厂</a><br><span class="radical_index">27</span></td>
									<td><a href="radical.php?rad=28">厶</a><br><span class="radical_index">28</span></td>
									<td><a href="radical.php?rad=29">又</a><br><span class="radical_index">29</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2" rowspan="3">3</th>
									<td><a href="radical.php?rad=30">口</a><br><span class="radical_index">30</span></td>
									<td><a href="radical.php?rad=31">囗</a><br><span class="radical_index">31</span></td>
									<td><a href="radical.php?rad=32">土</a><br><span class="radical_index">32</span></td>
									<td><a href="radical.php?rad=33">士</a><br><span class="radical_index">33</span></td>
									<td><a href="radical.php?rad=34">夂</a><br><span class="radical_index">34</span></td>
									<td><a href="radical.php?rad=35">夊</a><br><span class="radical_index">35</span></td>
									<td><a href="radical.php?rad=36">夕</a><br><span class="radical_index">36</span></td>
									<td><a href="radical.php?rad=37">大</a><br><span class="radical_index">37</span></td>
									<td><a href="radical.php?rad=38">女</a><br><span class="radical_index">38</span></td>
									<td><a href="radical.php?rad=39">子</a><br><span class="radical_index">39</span></td>
									<td><a href="radical.php?rad=40">宀</a><br><span class="radical_index">40</span></td>
									<td><a href="radical.php?rad=41">寸</a><br><span class="radical_index">41</span></td>
									<td><a href="radical.php?rad=42">小</a><br><span class="radical_index">42</span></td>
									<td colspan="4" style="width: auto"><a href="radical.php?rad=43">𡯁 <span style="font-size: 10px">[尢,兀,尣,𡯂]</span></a><br><span class="radical_index">43</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=44">尸</a><br><span class="radical_index">44</span></td>
									<td><a href="radical.php?rad=45">屮</a><br><span class="radical_index">45</span></td>
									<td><a href="radical.php?rad=46">山</a><br><span class="radical_index">46</span></td>
									<td><a href="radical.php?rad=47">巛</a><br><span class="radical_index">47</span></td>
									<td><a href="radical.php?rad=48">工</a><br><span class="radical_index">48</span></td>
									<td><a href="radical.php?rad=49">己</a><br><span class="radical_index">49</span></td>
									<td><a href="radical.php?rad=50">巾</a><br><span class="radical_index">50</span></td>
									<td><a href="radical.php?rad=51">干</a><br><span class="radical_index">51</span></td>
									<td><a href="radical.php?rad=52">幺</a><br><span class="radical_index">52</span></td>
									<td><a href="radical.php?rad=53">广</a><br><span class="radical_index">53</span></td>
									<td><a href="radical.php?rad=54">廴</a><br><span class="radical_index">54</span></td>
									<td><a href="radical.php?rad=55">廾</a><br><span class="radical_index">55</span></td>
									<td><a href="radical.php?rad=56">弋</a><br><span class="radical_index">56</span></td>
									<td><a href="radical.php?rad=57">弓</a><br><span class="radical_index">57</span></td>
									<td colspan="3" style="width: auto"><a href="radical.php?rad=58">彐 <span style="font-size: 10px">[⺕,⺔]</span></a><br><span class="radical_index">58</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=59">彡</a><br><span class="radical_index">59</span></td>
									<td><a href="radical.php?rad=60">彳</a><br><span class="radical_index">60</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th colspan="2" rowspan="3">4</th>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=61">心 <span style="font-size: 10px">[忄,㣺]</span></a><br><span class="radical_index">61</span></td>
									<td><a href="radical.php?rad=62">戈</a><br><span class="radical_index">62</span></td>
									<td><a href="radical.php?rad=63">戶</a><br><span class="radical_index">63</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=64">手 <span style="font-size: 10px">[扌]</span></a><br><span class="radical_index">64</span></td>
									<td><a href="radical.php?rad=65">支</a><br><span class="radical_index">65</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=66">攴 <span style="font-size: 10px">[攵]</span></a><br><span class="radical_index">66</span></td>
									<td><a href="radical.php?rad=67">文</a><br><span class="radical_index">67</span></td>
									<td><a href="radical.php?rad=68">斗</a><br><span class="radical_index">68</span></td>
									<td><a href="radical.php?rad=69">斤</a><br><span class="radical_index">69</span></td>
									<td><a href="radical.php?rad=70">方</a><br><span class="radical_index">70</span></td>
									<td><a href="radical.php?rad=71">无</a><br><span class="radical_index">71</span></td>
									<td><a href="radical.php?rad=72">日</a><br><span class="radical_index">72</span></td>
									<td><a href="radical.php?rad=73">曰</a><br><span class="radical_index">73</span></td>
									<td><a href="radical.php?rad=74">月</a><br><span class="radical_index">74</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=75">木</a><br><span class="radical_index">75</span></td>
									<td><a href="radical.php?rad=76">欠</a><br><span class="radical_index">76</span></td>
									<td><a href="radical.php?rad=77">止</a><br><span class="radical_index">77</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=78">歹 <span style="font-size: 10px">[歺]</span></a><br><span class="radical_index">78</span></td>
									<td><a href="radical.php?rad=79">殳</a><br><span class="radical_index">79</span></td>
									<td><a href="radical.php?rad=80">毋</a><br><span class="radical_index">80</span></td>
									<td><a href="radical.php?rad=81">比</a><br><span class="radical_index">81</span></td>
									<td><a href="radical.php?rad=82">毛</a><br><span class="radical_index">82</span></td>
									<td><a href="radical.php?rad=83">氏</a><br><span class="radical_index">83</span></td>
									<td><a href="radical.php?rad=84">气</a><br><span class="radical_index">84</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=85">水 <span style="font-size: 10px">[氵,氺]</span></a><br><span class="radical_index">85</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=86">火 <span style="font-size: 10px">[灬]</span></a><br><span class="radical_index">86</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=87">爪 <span style="font-size: 10px">[爫]</span></a><br><span class="radical_index">87</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=88">父</a><br><span class="radical_index">88</span></td>
									<td><a href="radical.php?rad=89">爻</a><br><span class="radical_index">89</span></td>
									<td><a href="radical.php?rad=90">爿</a><br><span class="radical_index">90</span></td>
									<td><a href="radical.php?rad=91">片</a><br><span class="radical_index">91</span></td>
									<td><a href="radical.php?rad=92">牙</a><br><span class="radical_index">92</span></td>
									<td><a href="radical.php?rad=93">牛</a><br><span class="radical_index">93</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=94">犬 <span style="font-size: 10px">[犭]</span></a><br><span class="radical_index">94</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th colspan="2" rowspan="2">5</th>
									<td><a href="radical.php?rad=95">玄</a><br><span class="radical_index">95</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=96">玉 <span style="font-size: 10px">[⺩]</span></a><br><span class="radical_index">96</span></td>
									<td><a href="radical.php?rad=97">瓜</a><br><span class="radical_index">97</span></td>
									<td><a href="radical.php?rad=98">瓦</a><br><span class="radical_index">98</span></td>
									<td><a href="radical.php?rad=99">甘</a><br><span class="radical_index">99</span></td>
									<td><a href="radical.php?rad=100">生</a><br><span class="radical_index">100</span></td>
									<td><a href="radical.php?rad=101">用</a><br><span class="radical_index">101</span></td>
									<td><a href="radical.php?rad=102">田</a><br><span class="radical_index">102</span></td>
									<td><a href="radical.php?rad=103">疋</a><br><span class="radical_index">103</span></td>
									<td><a href="radical.php?rad=104">疒</a><br><span class="radical_index">104</span></td>
									<td><a href="radical.php?rad=105">癶</a><br><span class="radical_index">105</span></td>
									<td><a href="radical.php?rad=106">白</a><br><span class="radical_index">106</span></td>
									<td><a href="radical.php?rad=107">皮</a><br><span class="radical_index">107</span></td>
									<td><a href="radical.php?rad=108">皿</a><br><span class="radical_index">108</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=109">目 <span style="font-size: 10px">[罒]</span></a><br><span class="radical_index">109</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=110">矛</a><br><span class="radical_index">110</span></td>
									<td><a href="radical.php?rad=111">矢</a><br><span class="radical_index">111</span></td>
									<td><a href="radical.php?rad=112">石</a><br><span class="radical_index">112</span></td>
									<td><a href="radical.php?rad=113">示</a><br><span class="radical_index">113</span></td>
									<td><a href="radical.php?rad=114">禸</a><br><span class="radical_index">114</span></td>
									<td><a href="radical.php?rad=115">禾</a><br><span class="radical_index">115</span></td>
									<td><a href="radical.php?rad=116">穴</a><br><span class="radical_index">116</span></td>
									<td><a href="radical.php?rad=117">立</a><br><span class="radical_index">117</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th colspan="2" rowspan="2">6</th>
									<td><a href="radical.php?rad=118">竹</a><br><span class="radical_index">118</span></td>
									<td><a href="radical.php?rad=119">米</a><br><span class="radical_index">119</span></td>
									<td><a href="radical.php?rad=120">糸</a><br><span class="radical_index">120</span></td>
									<td><a href="radical.php?rad=121">缶</a><br><span class="radical_index">121</span></td>
									<td colspan="3" style="width: auto"><a href="radical.php?rad=122">网 <span style="font-size: 10px">[⺵,⺴,罓,罒]</span></a><br><span class="radical_index">122</span></td>
									<td><a href="radical.php?rad=123">羊</a><br><span class="radical_index">123</span></td>
									<td><a href="radical.php?rad=124">羽</a><br><span class="radical_index">124</span></td>
									<td><a href="radical.php?rad=125">老</a><br><span class="radical_index">125</span></td>
									<td><a href="radical.php?rad=126">而</a><br><span class="radical_index">126</span></td>
									<td><a href="radical.php?rad=127">耒</a><br><span class="radical_index">127</span></td>
									<td><a href="radical.php?rad=128">耳</a><br><span class="radical_index">128</span></td>
									<td><a href="radical.php?rad=129">聿</a><br><span class="radical_index">129</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=130">肉 <span style="font-size: 10px">[⺼]</span></a><br><span class="radical_index">130</span></td>
									<td><a href="radical.php?rad=131">臣</a><br><span class="radical_index">131</span></td>
								</tr>
								<tr>
									<td><a href="radical.php?rad=132">自</a><br><span class="radical_index">132</span></td>
									<td><a href="radical.php?rad=133">至</a><br><span class="radical_index">133</span></td>
									<td><a href="radical.php?rad=134">臼</a><br><span class="radical_index">134</span></td>
									<td><a href="radical.php?rad=135">舌</a><br><span class="radical_index">135</span></td>
									<td><a href="radical.php?rad=136">舛</a><br><span class="radical_index">136</span></td>
									<td><a href="radical.php?rad=137">舟</a><br><span class="radical_index">137</span></td>
									<td><a href="radical.php?rad=138">艮</a><br><span class="radical_index">138</span></td>
									<td><a href="radical.php?rad=139">色</a><br><span class="radical_index">139</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=140">艸 <span style="font-size: 10px">[⺿]</span></a><br><span class="radical_index">140</span></td>
									<td><a href="radical.php?rad=141">虍</a><br><span class="radical_index">141</span></td>
									<td><a href="radical.php?rad=142">虫</a><br><span class="radical_index">142</span></td>
									<td><a href="radical.php?rad=143">血</a><br><span class="radical_index">143</span></td>
									<td><a href="radical.php?rad=144">行</a><br><span class="radical_index">144</span></td>
									<td><a href="radical.php?rad=145">衣</a><br><span class="radical_index">145</span></td>
									<td><a href="radical.php?rad=146">襾</a><br><span class="radical_index">146</span></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2" rowspan="2">7</th>
									<td><a href="radical.php?rad=147">見</a><br><span class="radical_index">147</span></td>
									<td><a href="radical.php?rad=148">角</a><br><span class="radical_index">148</span></td>
									<td><a href="radical.php?rad=149">言</a><br><span class="radical_index">149</span></td>
									<td><a href="radical.php?rad=150">谷</a><br><span class="radical_index">150</span></td>
									<td><a href="radical.php?rad=151">豆</a><br><span class="radical_index">151</span></td>
									<td><a href="radical.php?rad=152">豕</a><br><span class="radical_index">152</span></td>
									<td><a href="radical.php?rad=153">豸</a><br><span class="radical_index">153</span></td>
									<td><a href="radical.php?rad=154">貝</a><br><span class="radical_index">154</span></td>
									<td><a href="radical.php?rad=155">赤</a><br><span class="radical_index">155</span></td>
									<td><a href="radical.php?rad=156">走</a><br><span class="radical_index">156</span></td>
									<td><a href="radical.php?rad=157">足</a><br><span class="radical_index">157</span></td>
									<td><a href="radical.php?rad=158">身</a><br><span class="radical_index">158</span></td>
									<td><a href="radical.php?rad=159">車</a><br><span class="radical_index">159</span></td>
									<td><a href="radical.php?rad=160">辛</a><br><span class="radical_index">160</span></td>
									<td><a href="radical.php?rad=161">辰</a><br><span class="radical_index">161</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=162">辵 <span style="font-size: 10px">[⻍]</span></a><br><span class="radical_index">162</span></td>
								</tr>
								<tr> 
									<td colspan="2" style="width: auto"><a href="radical.php?rad=163">邑 <span style="font-size: 10px">[⻏]</span></a><br><span class="radical_index">163</span></td>
									<td><a href="radical.php?rad=164">酉</a><br><span class="radical_index">164</span></td>
									<td><a href="radical.php?rad=165">釆</a><br><span class="radical_index">165</span></td>
									<td><a href="radical.php?rad=166">里</a><br><span class="radical_index">166</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">8</th>
									<td><a href="radical.php?rad=167">金</a><br><span class="radical_index">167</span></td>
									<td><a href="radical.php?rad=168">長</a><br><span class="radical_index">168</span></td>
									<td><a href="radical.php?rad=169">門</a><br><span class="radical_index">169</span></td>
									<td colspan="2" style="width: auto"><a href="radical.php?rad=170">阜 <span style="font-size: 10px">[⻖]</span></a><br><span class="radical_index">170</span></td>
									<td><a href="radical.php?rad=171">隶</a><br><span class="radical_index">171</span></td>
									<td><a href="radical.php?rad=172">隹</a><br><span class="radical_index">172</span></td>
									<td><a href="radical.php?rad=173">雨</a><br><span class="radical_index">173</span></td>
									<td><a href="radical.php?rad=174">青</a><br><span class="radical_index">174</span></td>
									<td><a href="radical.php?rad=175">非</a><br><span class="radical_index">175</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">9</th>
									<td><a href="radical.php?rad=176">面</a><br><span class="radical_index">176</span></td>
									<td><a href="radical.php?rad=177">革</a><br><span class="radical_index">177</span></td>
									<td><a href="radical.php?rad=178">韋</a><br><span class="radical_index">178</span></td>
									<td><a href="radical.php?rad=179">韭</a><br><span class="radical_index">179</span></td>
									<td><a href="radical.php?rad=180">音</a><br><span class="radical_index">180</span></td>
									<td><a href="radical.php?rad=181">頁</a><br><span class="radical_index">181</span></td>
									<td><a href="radical.php?rad=182">風</a><br><span class="radical_index">182</span></td>
									<td><a href="radical.php?rad=183">飛</a><br><span class="radical_index">183</span></td>
									<td><a href="radical.php?rad=184">食</a><br><span class="radical_index">184</span></td>
									<td><a href="radical.php?rad=185">首</a><br><span class="radical_index">185</span></td>
									<td><a href="radical.php?rad=186">香</a><br><span class="radical_index">186</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">10</th>
									<td><a href="radical.php?rad=187">馬</a><br><span class="radical_index">187</span></td>
									<td><a href="radical.php?rad=188">骨</a><br><span class="radical_index">188</span></td>
									<td><a href="radical.php?rad=189">高</a><br><span class="radical_index">189</span></td>
									<td><a href="radical.php?rad=190">髟</a><br><span class="radical_index">190</span></td>
									<td><a href="radical.php?rad=191">鬥</a><br><span class="radical_index">191</span></td>
									<td><a href="radical.php?rad=192">鬯</a><br><span class="radical_index">192</span></td>
									<td><a href="radical.php?rad=193">鬲</a><br><span class="radical_index">193</span></td>
									<td><a href="radical.php?rad=194">鬼</a><br><span class="radical_index">194</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">11</th>
									<td><a href="radical.php?rad=195">魚</a><br><span class="radical_index">195</span></td>
									<td><a href="radical.php?rad=196">鳥</a><br><span class="radical_index">196</span></td>
									<td><a href="radical.php?rad=197">鹵</a><br><span class="radical_index">197</span></td>
									<td><a href="radical.php?rad=198">鹿</a><br><span class="radical_index">198</span></td>
									<td><a href="radical.php?rad=199">麥</a><br><span class="radical_index">199</span></td>
									<td><a href="radical.php?rad=200">麻</a><br><span class="radical_index">200</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">12</th>
									<td><a href="radical.php?rad=201">黃</a><br><span class="radical_index">201</span></td>
									<td><a href="radical.php?rad=202">黍</a><br><span class="radical_index">202</span></td>
									<td><a href="radical.php?rad=203">黑</a><br><span class="radical_index">203</span></td>
									<td><a href="radical.php?rad=204">黹</a><br><span class="radical_index">204</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">13</th>
									<td><a href="radical.php?rad=205">黽</a><br><span class="radical_index">205</span></td>
									<td><a href="radical.php?rad=206">鼎</a><br><span class="radical_index">206</span></td>
									<td><a href="radical.php?rad=207">鼓</a><br><span class="radical_index">207</span></td>
									<td><a href="radical.php?rad=208">鼠</a><br><span class="radical_index">208</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">14</th>
									<td><a href="radical.php?rad=209">鼻</a><br><span class="radical_index">209</span></td>
									<td><a href="radical.php?rad=210">齊</a><br><span class="radical_index">210</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">15</th>
									<td><a href="radical.php?rad=211">齒</a><br><span class="radical_index">211</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">16</th>
									<td><a href="radical.php?rad=212">龍</a><br><span class="radical_index">212</span></td>
									<td><a href="radical.php?rad=213">龜</a><br><span class="radical_index">213</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr> 
									<th colspan="2">17</th>
									<td><a href="radical.php?rad=214">龠</a><br><span class="radical_index">214</span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

		<div class="visualClear"></div>
	</div>
</div>

<footer class="mf-main mf-container mf-padding-16" id="footer">
	<div class="mf-col m3 mf-cell-middle mf-center">
		<a href="http://www.cuhk.edu.hk" target="_top"><img src="img/cusmall.gif" width="69" height="48" border="0"></a>
		<a href="http://humanum.arts.cuhk.edu.hk/" target="_top"><img src="img/rihlogo.gif" width="100" height="67" border="0"></a>
	</div>
	<div class="mf-col m6 mf-cell-middle mf-center">
		<div id="footer_box">
			<ul>
				<li><a href="quick-start-7.pdf">新手入門</a></li>
				<li><a href="guide.php">使用凡例</a></li>
				<li><a href="stats.php">字庫統計</a></li>
				<li><a href="search.php?rand=1">隨機漢字</a></li>
				<li><a href="just.php">最近被搜索的漢字</a><br></li>

				<li><a href="acknowledgments.php">鳴謝</a></li>
				<li><a href="team.php">製作單位</a></li>
				<li><a href="http://www.cuhk.edu.hk/chinese/privacy.html">私隱政策</a></li>
				<li><a href="http://www.cuhk.edu.hk/chinese/disclaimer.html">免責聲明</a></li>
				<li><a href="feedback.php">意見簿</a></li>
			</ul>
		</div>
		<div id="admin">（<a href="admin/">管理員</a>）</div>
	</div>
	<div class="mf-col m3">
		<div class="mf-third mf-cell-middle mf-center"><a href="http://info.gov.hk/qef/" target="_top"><img src="img/qeflogo.gif" width="48" height="48" border="0"></a></div>
		<div class="mf-twothird" id="sitestats_box">
			<ul>
				<li>在線人數： 583</li>
				<li>自 2014 年 7 月 8 日起</li>
				<li>瀏覽人數： 31269197</li>
				<li>使用次數： 145741917</li>
			</ul>
		</div>
	</div>
</footer>

<div id="soundPlayer">
	<script>
		var context;
		var buffer_map = {};
		function playBuffer(buffer) {
			if (buffer) {
				const source = context.createBufferSource();
				source.buffer = buffer;
				source.connect(context.destination);
				source.start();
			} else {
				alert('Invalid audio buffer');
			}
		}
		function _playSound( url ) {
			try {
				if (context) context.close();
				context = new (window.AudioContext || window.webkitAudioContext)();
				if (buffer_map[url]) {
					playBuffer(buffer_map[url]);
				} else {
					const request = new XMLHttpRequest();
					request.open("GET",url,true);
					request.responseType = "arraybuffer";
					request.onload = function() {
						context.decodeAudioData(request.response, function(buffer) {
							buffer_map[url] = buffer;
							playBuffer(buffer_map[url]);
						});
					};
					request.send();
				}
			} catch(e) {
				alert('web audio api not supported');
			}
		}
	</script>
</div>

</div>	<!-- END globalWrapper //-->

</body></html>
