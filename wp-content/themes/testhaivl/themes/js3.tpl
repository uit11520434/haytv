    <div id="b9gcs-soft-share" class="b9gcs-soft-box ">
        <div class="content">
            <a href="javascript:void(0);" class="close-btn"></a>
            <form id="form-b9gcs-soft-share" class="modal" action="">
                <h3>{$lang266}<span id="post-share-dismiss-counter"></span></h3>
                <h4>{$lang267}</h4>
                <div class="facebook-share">
                	<a href="javascript:myWindow('Facebook Share', 'http://www.facebook.com/sharer/sharer.php?u={$baseurl}{$postfolder}{$p.PID}/{$p.story|makeseo}.html', 'Facebook-Share-After-User-Post', 'Clicked');"></a>					
                </div>
                <div class="field">
                	<p>{$lang268}:</p>
                	<input id="post-share-entry-url" type="text" class="text" value="{$baseurl}{$postfolder}{$p.PID}/{$p.story|makeseo}.html" placeholder="/{$p.story|makeseo}.html" />
                </div>
            </form>
        </div>                
    </div>
</div>
{literal}
<script type="text/javascript">
$('#overlay-shadow').removeClass('hide');
$('#overlay-container').removeClass('hide');  
$('.close-btn').click(function(){
$('#overlay-shadow').addClass('hide');
$('#overlay-container').addClass('hide');
});
var i=10;		
function delayedAlert()  
{  
timeoutID = window.setTimeout(decrease, 1000);  
}  
function decrease()  
{  
$('#post-share-dismiss-counter').html('('+i+')');
i--;
if(i==-1){
$('#overlay-shadow').addClass('hide');
$('#overlay-container').addClass('hide'); 
}else{
delayedAlert() ;	  
};
}  
delayedAlert(); 
function clearAlert()  
{  
window.clearTimeout(timeoutID);  
}
</script>
{/literal}