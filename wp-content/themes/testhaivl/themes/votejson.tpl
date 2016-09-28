					{if $enable_fc eq "1"}
{literal}
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });	  
</script>
{/literal}
{/if}
                	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>
					{section name=i loop=$posts}               
						{include file="votes_bit.tpl"}
                    {/section}                

					{literal}
					<script type="text/javascript">
                    $('.unlove').click(function(){
                    var id=$(this).attr('entryId');
                    if( $(this).hasClass('unloved')){
                    $(this).removeClass('unloved');
                    ulikedeg($(this).attr('entryId'),0,-1);
                    }else{
                    $(this).addClass('unloved');
                    if($('#post_love_'+id).hasClass('loved')){
                    ulikedeg($(this).attr('entryId'),-1,1);	
                    $('#post_love_'+id).removeClass('loved');
                    }else{
                    ulikedeg($(this).attr('entryId'),0,1);	
                    }
                    }
                    });
                    $('.vote').click(function(){
                    var id=$(this).attr('rel');
                    if( $(this).hasClass('loved')){
                    $(this).removeClass('loved');
                    ulikedeg($(this).attr('rel'),-1,0);
                    }else{
                    $(this).addClass('loved');
                    if($('#vote-down-btn-'+id).hasClass('unloved')){
                    $('#vote-down-btn-'+id).removeClass('unloved');
                    ulikedeg($(this).attr('rel'),1,-1);
                    }else{
                    ulikedeg($(this).attr('rel'),1,0);
                    }
                    }
                    });        
                    function ulikedeg(p,l,u){
                    jQuery.ajax({
                    type:'POST',
                    url:'{/literal}{$baseurl}{literal}'+ '/votegag.php',
                    data:'l='+l+'&pid=' + p +'&u='+u,
                    success:function(e){
                    $('#love_count_'+p).html(e);
                    }
                    });
                    }        
                    </script>
					{/literal}