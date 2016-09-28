<?php /* Smarty version 2.6.6, created on 2014-04-09 06:54:24
         compiled from js5.tpl */ ?>
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
$(\'.report\').click(function(){
$(\'#report_entry_id\').val($(this).attr(\'entryId\'));	
$(\'#repost_link\').val(\'';  echo $this->_tpl_vars['baseurl'];  echo '/p/\' + $(this).attr(\'entryId\'));	
$(\'#overlay-shadow\').removeClass(\'hide\');
$(\'#overlay-container\').removeClass(\'hide\');
$(\'#scriptolution-soft-report\').removeClass(\'hide\');
});
$(\'.close-btn\').click(function(){
$(\'#overlay-shadow\').addClass(\'hide\');
$(\'#overlay-container\').addClass(\'hide\');
$(\'#scriptolution-soft-report\').addClass(\'hide\');
});
$(\'#report-submit\').click(function(){
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
var pid=$(\'#report_entry_id\').val();
var x=$(\'#repost_link\').val();
var n=$(\'input[name="report-reason"]:checked\').val();
sendreport(x,n,pid);
}
});
function sendreport(x,n,pid){
jQuery.ajax({
type:\'POST\',
url:\' ';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/report.php\',
data:\'number=\'+n+\'&repost_link=\'+x+\'&pid=\' + pid,
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