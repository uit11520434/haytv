{if $error ne ""}
<p class="form-message error middle">{$error}<br /></p>
{elseif $message ne ""}
<p class="form-message success middle">{$message}<br /></p>
{/if}
<div id="main" class="middle">
    <div id="content-holder">    
        <div id="b9gcs-soft-forgotpassword"  class="b9gcs-soft-box static" >
            <div class="content">
                <form id="del_account" name="delete_account_form" class="modal" action="#" method="post">
                    <h3>{$lang78}</h3>
                    <h4>{$lang79}</h4>
                    <h4>{$lang80} {$lang81} <a href="mailto:{$site_email}">{$lang82}</a></h4>
                    <br/>
                    <div class="field">
                        <label>
                            <h4>{$lang2}</h4>
                            <input type="password" class="text" name="password" id="password"/>
                            <input type="hidden" name="delsub" value="1" />
                        </label>
                        <p class="info">{$lang83}</p>
                    </div>
                </form>
            </div>
            <div class="actions">
                <ul class="buttons">
                	<li><a class="button disactiviate" href="#" onclick="document.delete_account_form.submit();">{$lang76}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">