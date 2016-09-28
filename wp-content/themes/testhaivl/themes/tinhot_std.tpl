<div id="main">
    <div id="content-blog">        
        <div class="main-filter ">
           <h2>{$pagetitle}</h2>
        </div>
        <div id="content" listPage="blog">                     
            <div id="entries-content" class="list">
                <ul id="entries-content-ul" class="col-1"> 
                	{section name=i loop=$posts}               
                    {include file="posts_bit_blog.tpl"}
                    {/section}                
                </ul>
            </div>		
            <div id="paging-buttons" class="paging-buttons">
            	{if $tpp ne ""}
                <a href="{$baseurl}/tinhot/{$tpp}" class="previous">&laquo; {$lang166}</a>
                {else}
                <a href="#" onclick="return false;" class="previous disabled">&laquo; {$lang166}</a>
                {/if}
                {if $tnp ne ""}
                <a href="{$baseurl}/tinhot/{$tnp}" class="older">{$lang167} &raquo;</a>
                {else}
                <a href="#" onclick="return false;" class="older disabled">{$lang167} &raquo;</a>
                {/if}
            </div>
        </div>
    </div>

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
                $('#love_count_'+p).html('Yêu thích: <b>' + e + '</b>');
                }
            });
        }
    </script>
	{/literal}
{include file='right.tpl'}
  
