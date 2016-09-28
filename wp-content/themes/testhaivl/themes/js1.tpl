{literal}
<script type="text/javascript">
function keyfind(e)
{
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = String.fromCharCode(code);
var classes=$('.entry-item').length;
if($('#header_searchbar').css('display')!='none'){
character=0;}
if(character =='H' || character =='h'){
$('.voteButton1').trigger('click');
}
if(character =='K' || character =='k'){
window.location.href=$('#next_post').attr('href');
}
if(character =='J' || character =='j'){
window.location.href=$('#prev_post').attr('href');
}
if(character =='L' || character =='l'){
$('.voteButton2').trigger('click');
}
if(character =='C' || character =='c'){
window.location.href = "{/literal}{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}#comments{literal}";
}
if(character =='R' || character =='r'){
window.location.href = "{/literal}{$baseurl}/random{literal}";
}
}
</script>
{/literal}