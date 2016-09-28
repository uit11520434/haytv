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
						{include file="posts_bit.tpl"}
					{/section}
	{literal}
	<script type="text/javascript">
    $('.vote').click(function(){
        if( $(this).hasClass('loved')){
            $(this).removeClass('loved');
        likedeg(-1,$(this).attr('rel'));
        }else{
        likedeg(1,$(this).attr('rel'));
        $(this).addClass('loved');
        }
        });
    function likedeg(x,p){
        jQuery.ajax({
            type:'POST',
            url:'{/literal}{$baseurl}{literal}'+ '/likedeg.php',
            data:'art='+x+'&pid=' + p,
            success:function(e){
                $('#love_count_'+p).html(e);
                }
            });
        }
    </script>
	{/literal}