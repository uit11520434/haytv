{if $error ne ""}
<p class="form-message error middle">{$error}<br /></p>
{elseif $message ne ""}
<p class="form-message success middle">{$message}<br /></p>
{/if}
<div id="main" class="middle">
    <div id="content-holder">
        <div class="b9gcs-soft-box static" >
            <div class="content contact-container contact-wrapper">
                <form id="cntctfrm" class="modal" action="{$baseurl}/contact" name="cntctfrm" method="POST">
                    <h3>{$lang205}</h3>
                    <div class="info" style="">
                    	<p><a href="{$baseurl}/faq">{$lang226}</a></p>
                    </div>
                    
                    <div class="field">
                        <label>
                            <h4>{$lang227}</h4>
                            <div class="topic">
                                <select name="topic">
                                <option value="">-- {$lang228} --</option>
                                <option value="bug" {if $topic eq "bug"}selected="selected"{/if}>{$lang229}</option>
                                <option value="question" {if $topic eq "question"}selected="selected"{/if}>{$lang230}</option>
                                <option value="feedback" {if $topic eq "feedback"}selected="selected"{/if}>{$lang231}</option>
                                <option value="business" {if $topic eq "business"}selected="selected"{/if}>{$lang232}</option>
                                </select>
                            </div>
                        </label>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4>{$lang233}</h4>
                        	<input type="text" class="text " name='subject' value="{$subject|stripslashes}" maxlength="200" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible">{$lang234}</p>
                    </div>
                    
                    <div class="field">
                        <label>
                            <h4>{$lang235}</h4>
                            <textarea name="msg" class="form-textarea " maxlength="600" placeholder="">{$msg|stripslashes}</textarea>
                        </label>
                        <p class="info" style="visibility:visible">{$lang236}</p>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4>{$lang237}</h4>
                        	<input type="text" class="text" name='name' value="{$name|stripslashes}" maxlength="200" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible"></p>
                    </div>
                    
                    <div class="field">
                        <label>
                            <h4>{$lang238}</h4>
                            <input type="text" class="text " name='email' value="{$email|stripslashes}" maxlength="200" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible">{$lang239}</p>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4>{$site_name} {$lang1} <span>({$lang114})</span></h4>
                        	<input type="text" class="text " name='username' value="{$username|stripslashes}" maxlength="30" placeholder=""/>
                        </label>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4>{$lang240} <span>({$lang114})</span></h4>
                        	<input type="text" class="text " name='os' value="{$os|stripslashes}" maxlength="50" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible">{$lang241}</p>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4>{$lang242}</h4>
                            <img src="{$baseurl}/include/captcha.php" /><br />
                        	<input type="text" class="text " name='imagecode' value="" maxlength="5" placeholder=""/>
                        </label>
                    </div>
                    <input type="hidden" name="msgsub" value="1" />
                </form>
            </div>
            <div class="actions">
            	<ul class="buttons">
            		<li><a class="button" href="#" onclick="document.cntctfrm.submit();">{$lang29}</a></li>
            	</ul>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">