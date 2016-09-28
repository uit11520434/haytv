<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];
$gagid = intval($_REQUEST['gagid']);
$gagstory = $_REQUEST['gagstory'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="{$lang254}" dir="LTR">
<head prefix="og: http://ogp.me/ns/fb#">
<style>body.plugin{background:transparent;overflow:hidden}
body{background:#fff;font-size:11px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;color:#333;line-height:1.28;margin:0;padding:0;text-align:left;direction:ltr;unicode-bidi:embed}
h1, h2, h3, h4, h5, h6{font-size:13px;color:#333;margin:0;padding:0}
h1{font-size:14px}
h4, h5, h6{font-size:11px}
p{margin:1em 0}
a{cursor:pointer;color:#3b5998;-moz-outline-style:none;text-decoration:none}
a:hover{text-decoration:underline}
img{border:0}
td, td.label{font-size:11px;text-align:left}
dd{color:#000}
dt{color:#777}
ul{list-style-type:none;margin:0;padding:0}
abbr{border-bottom:none}
hr{background:#d9d9d9;border-width:0;color:#d9d9d9;height:1px}
.clearfix:after{clear:both;content:".";display:block;font-size:0;height:0;line-height:0;visibility:hidden}
.clearfix{zoom:1}
.datawrap{word-wrap:break-word}
.word_break{display:inline-block}
.ellipsis{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.img_loading{position:absolute;top:-9999999px}
.aero{opacity:.5}
.column{float:left}
.center{margin-left:auto;margin-right:auto}
#facebook .hidden_elem{display:none !important}
#facebook .invisible_elem{visibility:hidden}
#facebook .accessible_elem{left:-9999px;position:fixed}
.direction_ltr{direction:ltr}
.direction_rtl{direction:rtl}
.text_align_ltr{text-align:left}
.text_align_rtl{text-align:right}
.uiGrid{border:0;border-collapse:collapse;border-spacing:0}
.uiGridFixed{table-layout:fixed;width:100%}
.uiGrid .vTop{vertical-align:top}
.uiGrid .vMid{vertical-align:middle}
.uiGrid .vBot{vertical-align:bottom}
.uiGrid .hLeft{text-align:left}
.uiGrid .hCent{text-align:center}
.uiGrid .hRght{text-align:right}
.pluginErrorLink{color:#f03d25}
.fss{font-size:9px}
.fsm{font-size:11px}
.fsl{font-size:13px}
.fsxl{font-size:16px}
.fsxxl{font-size:18px}
.fwn{font-weight:normal}
.fwb{font-weight:bold}
.fcb{color:#333}
.fcg{color:gray}
form{margin:0;padding:0}
label{cursor:pointer;color:#666;font-weight:bold;vertical-align:middle}
label input{font-weight:normal}
textarea, .inputtext, .inputpassword{border:1px solid #bdc7d8;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;margin:0;padding:3px}
textarea{max-width:100%}
select{border:1px solid #bdc7d8;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;padding:2px}
.inputtext, .inputpassword{padding-bottom:4px}
.ff4.mac .inputtext, .ff4.mac .inputpassword{padding-bottom:3px}
.inputradio{padding:0;margin:0 5px 0 0;vertical-align:middle}
.inputcheckbox{border:0;vertical-align:middle}
.inputbutton, .inputsubmit{border-style:solid;border-width:1px;border-color:#d9dfea #0e1f5b #0e1f5b #d9dfea;background-color:#3b5998;color:#fff;padding:2px 15px 3px 15px;text-align:center}
.inputsubmit_disabled{background-color:#999;border-bottom:1px solid #000;border-right:1px solid #666;color:#fff}
.inputaux{background:#f0f0f0;border-color:#e7e7e7 #666 #666 #e7e7e7;color:#000}
.inputaux_disabled{color:#999}
.inputsearch{background:#fff url(https://s-static.ak.fbcdn.net/rsrc.php/v2/y7/x/IJYgcESal33.png) no-repeat left 4px;padding-left:17px}
.pluginButton{background:#eceef5;border-radius:3px;border:1px solid #cad4e7;cursor:pointer;padding:2px 6px 4px;white-space:nowrap;color:#3b5998}
.pluginButtonInline{display:inline-block}
.pluginButtonX{cursor:default}
.pluginButton button{background:transparent;border:0;margin:-1px;padding:0;font:inherit;color:inherit;cursor:pointer}
.pluginButton button::-moz-focus-inner{border:0;padding:0}
.pluginButtonIcon{position:relative;top:3px;margin-right:3px}
.pluginButtonSmall{padding:0 5px 2px 5px}
.pluginButtonSmall .pluginButtonIcon{margin-right:2px}
.pluginButton:hover{border-color:#9dacce}
.pluginButtonPressed, .pluginButtonPressed:hover{background-color:#eee;border-color:#ddd;color:#aaa}
.pluginSkinDark .pluginButton{background-color:#c7c7c7;border-color:#999;color:#333}
.pluginSkinDark .pluginButton:hover{background-color:#d9d9d9;border-color:#ddd}
.pluginSkinDark .pluginButtonPressed, .pluginSkinDark .pluginButtonPressed:hover{background-color:#444;border-color:#555;color:#666}
.pluginButtonErrorLink{color:#a00;font-weight:bold}
.pluginButtonX .pluginButtonXOff, .pluginButtonX button:hover .pluginButtonXOn{display:inline-block}
.pluginButtonX .pluginButtonXOn, .pluginButtonX button:hover .pluginButtonXOff{display:none}
.pluginButton .pluginButtonThrobber, form.async_saving .pluginButtonIconWithThrobber{display:none}
form.async_saving .pluginButtonThrobber{display:inline-block;margin-top:2px;margin-bottom:1px;max-width:14px}
.sp_like{background-image:url(https://s-static.ak.fbcdn.net/rsrc.php/v2/yI/x/1dQf_ATK831.png);background-repeat:no-repeat;display:inline-block;height:14px;width:14px}
.sx_like_fav{background-position:-0px -0px}
.sx_like_ch{background-position:-0px -15px}
.sx_like_x{background-position:-0px -30px}
.sx_like_thumb{background-position:-0px -45px}
i.img u{position:absolute;top:-9999999px}
.pluginCountButton{background:#fff;border:1px solid #c1c1c1;display:inline-block;height:14px;line-height:14px;margin-left:6px;min-width:15px;padding:1px 2px;text-align:center;white-space:nowrap}
.pluginCountButtonNub{height:0;left:2px;position:relative;top:-14px;width:5px;z-index:2}
.pluginCountButtonNub s, .pluginCountButtonNub i{border-color:transparent #D7D7D7 transparent;border-style:solid;border-width:4px 5px 4px 0;display:block;position:relative;top:1px}
.pluginCountButtonNub i{border-right-color:#fff;left:2px;top:-7px}
.pluginCountButtonDark{background:#d7d7d7;border-color:#d7d7d7;color:#333}
.pluginCountButtonDarkNub i{display:none}
.pluginCountTextConnected,
.pluginCountConnected .pluginCountTextDisconnected{display:none}
.pluginCountConnected .pluginCountTextConnected{display:inline}
._5v8{position:absolute;width:100%}
._5v4{width:450px;top:24px}
._5v9{top:23px}
._5va{top:0}
._5vb{top:62px}
._5vc{top:20px}
.fbpfc{border-top:1px solid #323232;border-right:1px solid #323232;border-left:1px solid #323232}
.fbpfl .fbpfb{background:#fff;color:#000;border-bottom:2px solid #283e6c}
.fbpfd .fbpfb{background:#101010;color:#fff;border-bottom:2px solid #ccc}
.fbpfc{position:relative}
.fbpfnb, .fbpfnc{position:absolute;width:0;height:0;line-height:0}
.fbpfnb{border:5px solid transparent}
.fbpfnc{border:4px solid transparent}
.fbpfst .fbpfnb{top:6px}
.fbpfsb .fbpfnb{bottom:6px}
.fbpfsl .fbpfnb{left:6px}
.fbpfsr .fbpfnb{right:6px}
.fbpfet .fbpfnb{top:-10px}
.fbpfeb .fbpfnb{bottom:-10px}
.fbpfel .fbpfnb{left:-10px}
.fbpfer .fbpfnb{right:-10px}
.fbpfet .fbpfnc{top:-3px;left:-4px}
.fbpfeb .fbpfnc{bottom:-3px;left:-4px}
.fbpfel .fbpfnc{left:-3px;top:-4px}
.fbpfer .fbpfnc{right:-3px;top:-4px}
.fbpfet .fbpfnb{border-bottom-color:#323232}
.fbpfl .fbpfeb .fbpfnb{border-top-color:#283e6c}
.fbpfd .fbpfeb .fbpfnb{border-top-color:#ccc}
.fbpfel .fbpfnb{border-right-color:#323232}
.fbpfer .fbpfnb{border-left-color:#323232}
.fbpfl .fbpfet .fbpfnc{border-bottom-color:#fff}
.fbpfl .fbpfeb .fbpfnc{border-top-color:#fff}
.fbpfl .fbpfel .fbpfnc{border-right-color:#fff}
.fbpfl .fbpfer .fbpfnc{border-left-color:#fff}
.fbpfd .fbpfet .fbpfnc{border-bottom-color:#101010}
.fbpfd .fbpfeb .fbpfnc{border-top-color:#101010}
.fbpfd .fbpfel .fbpfnc{border-right-color:#101010}
.fbpfd .fbpfer .fbpfnc{border-left-color:#101010}
.fbpfet{margin-top:5px}
.fbpfeb{margin-bottom:4px}
.fbpfel{margin-left:5px}
.fbpfer{margin-right:5px}
.pluginFluidInputContainer{margin:0 4px}
.pluginFluidInput{width:100%;margin-left:-4px}
.fbpdl{color:#000}
.fbpdl .fbpdc{background-color:#fff}
.fbpdl .fbpdf{border-top:1px solid #bdc7d8;background-color:#f2f2f2}
.fbpdd{color:#fff}
.fbpdd .fbpdc{background-color:#101010}
.fbpdd .fbpdf{border-top:1px solid #444;background-color:#333333
}
.fbpdf{text-align:right}
.pas{padding:5px}
.pam{padding:10px}
.pal{padding:20px}
.pts{padding-top:5px}
.ptm{padding-top:10px}
.ptl{padding-top:20px}
.prs{padding-right:5px}
.prm{padding-right:10px}
.prl{padding-right:20px}
.pbs{padding-bottom:5px}
.pbm{padding-bottom:10px}
.pbl{padding-bottom:20px}
.pls{padding-left:5px}
.plm{padding-left:10px}
.pll{padding-left:20px}
.phs{padding-left:5px;padding-right:5px}
.phm{padding-left:10px;padding-right:10px}
.phl{padding-left:20px;padding-right:20px}
.pvs{padding-top:5px;padding-bottom:5px}
.pvm{padding-top:10px;padding-bottom:10px}
.pvl{padding-top:20px;padding-bottom:20px}
.mas{margin:5px}
.mam{margin:10px}
.mal{margin:20px}
.mts{margin-top:5px}
.mtm{margin-top:10px}
.mtl{margin-top:20px}
.mrs{margin-right:5px}
.mrm{margin-right:10px}
.mrl{margin-right:20px}
.mbs{margin-bottom:5px}
.mbm{margin-bottom:10px}
.mbl{margin-bottom:20px}
.mls{margin-left:5px}
.mlm{margin-left:10px}
.mll{margin-left:20px}
.mhs{margin-left:5px;margin-right:5px}
.mhm{margin-left:10px;margin-right:10px}
.mhl{margin-left:20px;margin-right:20px}
.mvs{margin-top:5px;margin-bottom:5px}
.mvm{margin-top:10px;margin-bottom:10px}
.mvl{margin-top:20px;margin-bottom:20px}
._8m{overflow:hidden}
._8u{margin-top:1px}
._8o, ._8o .img{display:block}
._8r{margin-right:5px;margin-top:-1px}
._8s{margin-right:8px}
._8t{margin-right:10px}
.lfloat{float:left}
.rfloat{float:right}
.uiTextareaNoResize{resize:none}
.uiTextareaAutogrow{overflow:hidden}
.DOMControl_placeholder{color:#777}
.no_js .DOMControl_placeholder{color:#000}
.uiButton{cursor:pointer;display:inline-block;font-size:11px;font-weight:bold;line-height:13px;padding:2px 6px;text-align:center;text-decoration:none;vertical-align:top;white-space:nowrap}
.uiButton, .uiButtonSuppressed:active, .uiButtonSuppressed:focus, .uiButtonSuppressed:hover{background-image:url(https://s-static.ak.fbcdn.net/rsrc.php/v2/yo/x/JT4vN1lDFUd.png);background-repeat:no-repeat;background-size:auto;background-position:0 -49px;background-color:#eee;border:1px solid #999;border-bottom-color:#888;box-shadow:0 1px 0 rgba(0, 0, 0, .1)}
.uiButton + .uiButton{margin-left:4px}
.uiButton:hover{text-decoration:none}
.uiButton:active, .uiButtonDepressed{background:#ddd;border-bottom-color:#999;box-shadow:0 1px 0 rgba(0, 0, 0, .05)}
.uiButton .img{margin-top:2px;vertical-align:top}
.uiButtonLarge .img{margin-top:4px}
.uiButton .customimg{margin-top:0}
.uiButtonText, .uiButton input{background:none;border:0;color:#333;cursor:pointer;display:-moz-inline-box;display:inline-block;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;font-weight:bold;line-height:13px;margin:0;padding:1px 0 2px;white-space:nowrap}
.uiButton input::-moz-focus-inner{border:0;padding:0}
.uiButtonOverlay, .uiButtonOverlay:hover{background-clip:padding-box;background-color:#fff;background-color:rgba(255, 255, 255, .8);background-image:none;border-color:#a5a5a5;border-color:rgba(0, 0, 0, .35);border-radius:2px}
.uiButtonOverlay:focus, .uiButtonOverlay:active{background-color:#f9fafc;background-color:rgba(249, 250, 252, .9);border-color:#3b5998;border-color:rgba(59, 89, 152, .5)}
form.async_saving .uiButton.uiButtonOverlay, .uiButtonOverlay.uiButtonDisabled, .uiButtonOverlay.uiButtonDisabled:active, .uiButtonOverlay.uiButtonDisabled:focus, .uiButtonOverlay.uiButtonDisabled:hover{background-color:#fff;background-color:rgba(255, 255, 255, .8);border-color:#c8c8c8;border-color:rgba(180, 180, 180, .8)}
.uiButtonSpecial{background-image:url(https://s-static.ak.fbcdn.net/rsrc.php/v2/yo/x/JT4vN1lDFUd.png);background-repeat:no-repeat;background-size:auto;background-position:0 -98px;background-color:#69a74e;border-color:#3b6e22 #3b6e22 #2c5115}
.uiButtonSpecial:active{background:#609946;border-bottom-color:#3b6e22}
form.async_saving .uiButton.uiButtonSpecial, .uiButtonSpecial.uiButtonDisabled, .uiButtonSpecial.uiButtonDisabled:active, .uiButtonSpecial.uiButtonDisabled:focus, .uiButtonSpecial.uiButtonDisabled:hover{background:#b4d3a7;border-color:#9db791}
.uiButtonConfirm{background-image:url(https://s-static.ak.fbcdn.net/rsrc.php/v2/yo/x/JT4vN1lDFUd.png);background-repeat:no-repeat;background-size:auto;background-position:0 0;background-color:#5b74a8;border-color:#29447e #29447e #1a356e}
.uiButtonConfirm:active{background:#4f6aa3;border-bottom-color:#29447e}
form.async_saving .uiButton.uiButtonConfirm, .uiButtonConfirm.uiButtonDisabled, .uiButtonConfirm.uiButtonDisabled:active, .uiButtonConfirm.uiButtonDisabled:focus, .uiButtonConfirm.uiButtonDisabled:hover{background:#adbad4;border-color:#94a2bf}
form.async_saving .uiButton.uiButtonSpecial .uiButtonText, form.async_saving .uiButton.uiButtonSpecial input, form.async_saving .uiButton.uiButtonConfirm .uiButtonText, form.async_saving .uiButton.uiButtonConfirm input, .uiButtonSpecial .uiButtonText, .uiButtonSpecial input, .uiButtonSpecial.uiButtonDisabled .uiButtonText, .uiButtonSpecial.uiButtonDisabled input, .uiButtonConfirm .uiButtonText, .uiButtonConfirm input, .uiButtonConfirm.uiButtonDisabled .uiButtonText, .uiButtonConfirm.uiButtonDisabled input{color:#fff}
form.async_saving .uiButton, .uiButtonDisabled, .uiButtonDisabled:active, .uiButtonDisabled:focus, .uiButtonDisabled:hover{background:#f2f2f2;border-color:#c8c8c8;box-shadow:none}
form.async_saving .uiButton .img, .uiButtonDisabled .img{opacity:.5}
form.async_saving .uiButtonText, form.async_saving .uiButton input, .uiButtonDisabled .uiButtonText, .uiButtonDisabled input{color:#b8b8b8}
form.async_saving .uiButton, form.async_saving .uiButtonText, form.async_saving .uiButton input, .uiButtonDepressed, .uiButtonDepressed .uiButtonText, .uiButtonDepressed input, .uiButtonDisabled, .uiButtonDisabled .uiButtonText, .uiButtonDisabled input{cursor:default}
.uiButtonLarge{height:19px}
.uiButtonLarge, .uiButtonLarge .uiButtonText, .uiButtonLarge input{font-size:13px;line-height:16px}
.uiButtonSuppressed{background:none;border-color:transparent;box-shadow:none}
.uiButtonNoText .img{margin-left:-1px;margin-right:-1px}
.android .uiButtonText, .android .uiButton input{padding:3px 0 1px 1px}
.ff4.mac .uiButton, .ff4.mac .uiButtonText, .ff4.mac .uiButton input{line-height:14px}
.ff4.mac .uiButtonLarge, .ff4.mac .uiButtonLarge .uiButtonText, .ff4.mac .uiButtonLarge input{line-height:16px}
.ff4.mac .uiButtonText, .ff4.mac .uiButton input{margin-bottom:-1px}
.ff4.mac .uiButtonLarge .uiButtonText, .ff4.mac .uiButtonLarge input{margin-bottom:0}
._s0:only-child{display:block}
._ru{background-position:center 25%}
._rv{width:100px;height:100px}
._rw{width:50px;height:50px}
._rx{width:32px;height:32px}
._ry{width:24px;height:24px}
</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"  style="margin:0;">
<div id="fb-root"></div>
<fb:like href="<?php echo $thebaseurl.$config[postfolder] ?><?php echo $gagid ?>/<?php if($config[SEO] == 1){echo makeseo($gagstory).".html";} ?>?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Post"></fb:like>
<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>
</body>
</html>