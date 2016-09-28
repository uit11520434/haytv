</div></div></div>
<div class="clear"> </div>
<div id="footer-container">
<div id="footer-nav">
<div id="footer-wrapper">
	<ul class="legal">
	<li id="copyright">website được thiết kế bởi myfancy.org</li>
	</ul>
	<ul class="footerLinks">
		<li><a href="http://www.myfancy.org/search/label/code%20webs">code webs</a></li>
		<li><a href="{$baseurl}/noi-quy-website.html">{$lang135}</a></li>
		<li><a href="{$baseurl}/faq">{$lang202}</a></li>
		<li><a href="https://www.facebook.com/DoiMat">Góp ý</a></l>
		<li><a href="{$baseurl}/lien-he-quang-cao.html">Liên hệ quảng cáo</a></li>
		<li style="color: rgb(255, 255, 255); font-size: 9px; outline: 1px solid rgb(255, 255, 255); background-color: rgb(255, 102, 0); padding: 1px 4px; margin: 8px;"><a style="color: rgb(255, 255, 255);" href="{$baseurl}/rss.php?t=hot">RSS</a></li>
	</ul>
</div>
</div>
<div id="footer-wrapper">
	<ul class="menu">
		<li class="menu_title">	<h3>Xã Stress</h3></li>
		<li><a href="http://www.myfancy.org/search/label/hot%20girl">Lộ Hàng</a></i>
		<li><a href="http://www.myfancy.org/search/label/hot%20girl">Hot girl</a></i>
		<li><a href="http://www.myfancy.org/search/label/t%C3%ACnh%20d%E1%BB%A5c">Tình dục</a></i>
		<li><a href="http://www.myfancy.org/search/label/t%C3%A2m%20s%E1%BB%B1">Tâm sự</a></i>
	</ul>
	<ul class="menu">
		<li class="menu_title">	<h3>Kênh hay</h3></li>
		<li><a href="http://www.myfancy.org/search/label/%E1%BA%A3nh%20troll">Ảnh troll</a></i>
		<li><a href="http://www.myfancy.org/search/label/video">Video</a></i>
		<li><a href="http://www.myfancy.org/search/label/th%E1%BB%A7%20thu%E1%BA%ADt">Thủ thuật</a></i>
	</ul>
	<ul class="menu">
		<li class="menu_title">	<h3>Liên kết</h3></li>
		<li><a target="_blank" title="haivl , ovui , code haivl , code chế comic , code chế ảnh , Facebook" href="http://www.myfancy.org">My fancy</a></i>
		<li><a target="_blank" title="haivl , ovui , code haivl , code chế comic , code chế ảnh , Twitter" href="http://www.myfancy.org">my fancy</a></i>
		<li><a target="_blank" title="haivl , ovui , code haivl , code chế comic , code chế ảnh , google" href="http://www.myfancy.org">my fancy</a></i>
                <li><a target="_blank" title="haivl , ovui , code haivl , code chế comic , code chế ảnh , Facebook" href="http://www.myfancy.org">My fancy</a></i>
	</ul>
         <ul class="menu">
		<li class="menu_title">	<h3>Phát Triển</h3></li>
		<li><a href="https://www.facebook.com/facequockiencoltd">Quockiencoltd</a></i>		
	</ul>
</div>
<div id="overlay-shadow" class="hide"></div>
<div id="overlay-container" class="hide" >
    <div id="scriptolution-soft-report" class="scriptolution-soft-box hide">
    	{if $viewpage eq "1"} 	
        <div class="content">
            <a href="javascript:void(0);" class="close-btn"></a>
            <form id="form-scriptolution-soft-report" class="modal" action="#" onsubmit="return false" >
                <h3>{$lang206}</h3>
                <h4>{$lang207}</h4>
                <input id="report_entry_id" type="hidden" name="entryId" value="{$p.PID}"/>
                <div class="field">
                    <label for="violation"><input id="violation" type="radio" name="report-reason" value="1"/>{$lang208}</label>
                    <label for="solicitation"><input id="solicitation" type="radio" name="report-reason" value="2"/>{$lang209}</label>
                    <label for="offensive"><input id="offensive" type="radio" name="report-reason" value="3"/>{$lang210}</label>
                    <label for="repost"><input id="repost" type="radio" name="report-reason" value="4"/>{$lang211}&darr;</label>
                </div>
                <div class="field">
                	<input id="repost_link" type="text" class="text " placeholder="{$baseurl}/post/{$p.PID}" />
                </div>
            </form>
        </div>
        {else}
        <div class="content">
            <a href="javascript:void(0);" class="close-btn"></a>
            <form id="form-scriptolution-soft-report" class="modal" action="#" onsubmit="return false" >
                <h3>{$lang206}</h3>
                <h4>{$lang207}</h4>
                <input id="report_entry_id" type="hidden" name="entryId" value=""/>
                <div class="field">
                    <label for="violation"><input id="violation" type="radio" name="report-reason" value="1"/>{$lang208}</label>
                    <label for="solicitation"><input id="solicitation" type="radio" name="report-reason" value="2"/>{$lang209}</label>
                    <label for="offensive"><input id="offensive" type="radio" name="report-reason" value="3"/>{$lang210}</label>
                    <label for="repost"><input id="repost" type="radio" name="report-reason" value="4"/>{$lang211}&darr;</label>
                </div>
                <div class="field">
                	<input id="repost_link" type="text" class="text " placeholder="{$baseurl}/post/" />
                </div>
            </form>
        </div>
        {/if}
        <div class="actions">
            <ul class="buttons">
                <li><a class="cancel close-report" href="javascript:void(0);">{$lang119}</a></li>
                <li><a class="button submit-button" href="javascript:void(0);" id="report-submit">{$lang212}</a></li>
                <li class="hide"><a class="button loading" href="javascript:void(0);"></a></li>
            </ul>
        </div>
    </div>
    <div id="scriptolution-soft-share" class="scriptolution-soft-box hide">
        <div class="content">
            <a href="javascript:void(0);" class="close-btn"></a>
            <form id="form-scriptolution-soft-share" class="modal" action="">
            </form>
        </div>                
    </div>
	
    <div class="keyboard-instruction hide">
        <h3>{$lang213}</h3>
        <div class="keyboard-img"></div>
        <ul class="key">
            <li><strong>R</strong> - {$lang214}</li>
            <li><strong>C</strong> - {$lang215}</li>
            <li><strong>H</strong> - {$lang216}</li>
            <li><strong>J</strong> - {$lang217}</li>
            <li><strong>K</strong> - {$lang218}</li>
            <li><strong>L</strong> - {$lang219}</li>
        </ul>
        <p>{$lang220}</p>
    </div>
</div>
</div>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="{$baseurl}/fancybox/lib/jquery-1.9.1.min.js"></script>
{if $showlike == 1}
<div style="z-index:9998 ;overflow: hidden; width: 30px; height: 20px; position: absolute;-moz-opacity:0.0; -khtml-opacity: 0.0; opacity: 0.0 !important;" id="icontainerpage">
	<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F{$pageid}&amp;width=24&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=494974433924953" scrolling="no" frameborder="0" style="border:none;   position: absolute;margin-top: -34px;margin-left: -90px;" allowTransparency="true"  id="fbframepage" name="fbframepage"></iframe>
 </div>
{/if}

{if $viewpage eq "1"}
{include file='js4.tpl'}
{else}
{include file='js5.tpl'}
{/if}
{literal}
<a style="width:55px;height:46px; position:fixed; bottom:0; {/literal}{if $smarty.session.language eq "ar"}left{else}right{/if}{literal}:20px; background:#eeeeee;-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
-webkit-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);
-moz-box-shadow:    0px 0px 2px rgba(0, 0, 0, 0.4);
box-shadow:         0px 0px 2px rgba(0, 0, 0, 0.4);
padding:12px 6px 0 6px;
font-size:14px;
font-weight:bold;
border: 1px #FFF solid;
color:#000;display:none
" href="javascript:void(0);" onclick="
if($.browser.safari || $.browser.chrome){ bodyelem = $(body) } else{ bodyelem = $(html) }
bodyelem.animate({scrollTop : 0},'slow');
"id="backtotop" title="Myfancy.org"><center><img src="https://lh6.googleusercontent.com/-4wOubWQAMS8/Uzf9zcD92eI/AAAAAAAAA6o/i6btQ_f_asg/h120/gotop.png" /></center></a>
{/literal}
{if $ganalytics ne ""}
{literal}
{/if}
	<script>
		var viewpage = 1;
    </script>
{/literal}
{else}
{literal}
	<script>
		var viewpage = 0;
    </script>
{/literal}
{/if}
{literal}

	<script>
		$('.search-button').click(function () {
			$('#header_searchbar').toggle('slow')
		});
		$("#backtotop").hide();
		$(function () {
					$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#backtotop').fadeIn()
				} else {
					$('#backtotop').fadeOut()
				}
			});
			$('#backtotop').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false
			});
		});
    </script>
{/literal}
{if !in_array($menu,array(5,11,15))}
<script type="text/javascript" src="{$baseurl}/js/myfancy.js?v=0820"></script>
{/if}
</div>
</body>
</html>