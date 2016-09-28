	<div style="margin: 0 6px 15px 6px;overflow: hidden;">
	</div>
</div>

 <div class="side-bar">
     {if $smarty.session.USERID eq ""}
        <div class="spcl-button-wrap" style="margin-bottom: 10px;">
                    <a  id="facebook_login" class="spcl-button facebook badge-facebook-connect" label="LoginFormFacebookButton" next="" href="{$baseurl}/fblogin.php?m={$eurl}">{$lang25}</a>
                     
         </div>
		{else}
		<div id="side-bar-upload">
            <a class="spcl-button blue" href="{$baseurl}/submit" label="Header">Click để bắt đầu chia sẻ hình ảnh và video vui !</a>
        </div> 
        {/if}
		 
		
        {if $viewpage != "1"}
		
		<div class="s-300">
            {insert name=get_advertisement AID=2}
			{if $smarty.session.USERID eq ""}
			{insert name=get_advertisement AID=$HOMERIGHT1AdID}
			{else}
				<iframe width="300px" scrolling="no" height="400px" frameborder="0" marginwidth="0" marginheight="0" src="{$baseurl}/shoutcloud.php"></iframe>
			{/if}    
        </div>
              
        <div id="tabs">
          <ul>
            <li><a data="tuan">Tuần</a></li>
            <li><a data="thang">Tháng</a></li>
            <li><a data="nam">Năm</a></li>
          </ul>
          <span id="slogo">
            <a href="{$baseurl}/top"><label for="slogo">Bảng Xếp Hạng</label></a>
            <img alt="Top Overs" src="{$baseurl}/images/top-logo.png" width="21" height="21" />
          </span>
          <div class="current">
          </div>
        </div>

		<div class="right-ovui">
				<h3><a href="{$baseurl}/online">Thành viên hoạt động gần đây</a></h3>
				<div class="who_online">
				   <ul>
					</ul>
					<div class="clear"> </div>
				</div>
			 </div>
		 <div class="social-block">
            <h3>Ủng hộ xứ nghệ nhé bạn :)</h3>
            <div class="facebook-like">
                <div class="fb-like" data-href="https://www.facebook.com/xungheonlinecom" data-send="false" data-width="280" data-show-faces="true"></div>
            </div>
			<!--
           <div class="twitter-follow">
                <a href="http://twitter.com/{$twitter}" class="twitter-follow-button">{$lang149} @{$twitter}</a>
            </div>     -->         
            <div class="google-plus">
                <p> +1 nếu bạn thấy vui</p>
                <g:plusone size="medium" href="{$baseurl}"></g:plusone>
            </div> 
        </div>
		
        <div id="moving-boxes">
        <div class="s-300">
            {insert name=get_advertisement value=var AID=17}
			 {insert name=get_advertisement AID=27}
        </div>
       
		 </div>
        {/if}
        {if $viewpage eq "1"}
		{if $smarty.session.USERID eq ""}
        <div class="s-300">
            {insert name=get_advertisement AID=$INFORIGHT1AdID}
		
        </div>
		<div class="s-300">
            {insert name=get_advertisement value=var AID="5"}
			{insert name=get_advertisement AID=5}
        </div>
		{else}
		
		{/if}
		<div class="right-ovui tinmoi"> 
            <h3>Bài viết mới</h3>
                    <ol>  
                        
                    </ol>
         </div> 
        <div class="right-ovui baimoi">
            <h3>Bài mới</h3>
                    <ol> 
                    </ol>
         </div> 
    <div id="moving-boxes">
        <div class="right-ovui noibat">
            <h3>Có thể bạn sẽ thích</h3>
                    <ol>  
                    </ol>
			
         </div>
		 <div class="right-ovui binhchon">
            <h3>Giúp xứ nghệ duyệt bài này</h3>
                    <ol>   
                    </ol>
			
         </div>
        

        {/if}
        
     </div> 
 </div> 