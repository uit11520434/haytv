<?php /* Smarty version 2.6.6, created on 2014-04-09 06:52:59
         compiled from js4.tpl */ ?>
<?php echo '
<script type="text/javascript">
$(\'.keyboard_link\').click(function(){
$("#overlay-shadow").removeClass("hide");
$("#overlay-container").removeClass("hide");
$(".keyboard-instruction").removeClass("hide");
$("#overlay-container").click(function(){
$("#overlay-shadow").addClass("hide");
$("#overlay-container").addClass("hide");
$(".keyboard-instruction").addClass("hide");	
});
});
$(\'#report-item-link\').click(function(){
$(\'#overlay-shadow\').removeClass(\'hide\');
$(\'#overlay-container\').removeClass(\'hide\');
$(\'#scriptolution-soft-report\').removeClass(\'hide\');
});
$(\'.close-btn\').click(function(){
$(\'#overlay-shadow\').addClass(\'hide\');
$(\'#overlay-container\').addClass(\'hide\');
$(\'#scriptolution-soft-report\').addClass(\'hide\');
});
$(\'.submit-button\').click(function(){
var e=0;
if($(\'input[name="report-reason"]:checked\').val()){
if($(\'input[name="report-reason"]:checked\').val()==4){
var x=$(\'#repost_link\').val();
if(! (x.match(\'';  echo $this->_tpl_vars['baseurl'];  echo '\'))){ 
$(\'#repost_link\').addClass(\'failed\');
e=1;
}else{
$(\'#repost_link\').removeClass(\'failed\');
$(\'#repost_link\').addClass(\'success\');
};
}
}else{
e=1;
}
if(e){
return false;
}else{
var x=$(\'#repost_link\').val();
var n=$(\'input[name="report-reason"]:checked\').val();
sendreport(x,n);
}
});
function sendreport(x,n){
jQuery.ajax({
type:\'POST\',
url:\' ';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/report.php\',
data:\'number=\'+n+\'&repost_link=\'+x+\'&pid=\' +  \'';  echo $this->_tpl_vars['p']['PID'];  echo '\' ,
success:function(e){
$(\'#overlay-shadow\').addClass(\'hide\');
$(\'#overlay-container\').addClass(\'hide\');
$(\'#scriptolution-soft-report\').addClass(\'hide\');
alert(\'Cảm ơn bạn đã báo cáo bài vi phạm.\');
}
});
}
</script>
'; ?>