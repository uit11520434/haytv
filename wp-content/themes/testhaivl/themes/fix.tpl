{if $error ne ""}
<p class="form-message error">{$error}</p>
{elseif $message ne ""}
<p class="form-message success">{$message}</p>
{/if}
<div id="main">
    <div id="content-holder">
        <div id="b9gcs-soft-post" class="b9gcs-soft-box static">
            <div class="content form_photo">
                <form id="forma" class="modal" name="forma" action="#" enctype="multipart/form-data" method="post">
                    <h3>{$p.story|stripslashes} [Đã sửa]</h3>
                    <h4>{$lang184} {$lang185}</h4>
                    <div class="post-container">
                        <div class="img-wrap">
                        	<img src="{$purl}/t/l-{$p.pic}"/>
                        </div>
                    </div>
                    <h4>{$lang186} {$lang187}</h4>
                    <div class="field">
                        <label>
                            <h4>{$lang103}</h4>                            
                            <input id="photo_file_upload" class="file text " type="file" name="image" style="display:block;"></input>
                        </label>
                    	<p class="info">{$lang107}</p>
                    </div>
                    <div class="field">
                        <label>
                            <h4>{$lang113}<span>({$lang114})</span></h4>
                            <input id="photo_tag_input" type="text" class="text tag_input tipped" name="tags" value="{$p.tags|stripslashes}" />
                            <p class="info" style="visibility:hidden">{$lang118}</p>
                        </label>
                    </div>
                    <hr />
                    <div class="field checkbox">
                    	<label for="submit-nsfw">
                    	<input id="submit-nsfw" type="checkbox" class="checkbox" name="nsfw" value="1" {if $p.nsfw eq "1"}checked="checked"{/if} />{$lang117}</label>
                    </div>
                    <input type="hidden" name="fixsub" id="fixsub" value="1" />
                </form>
            </div>        
            <div class="actions">
                <ul class="buttons">
                    <li class="loading-btn" style="visibility:hidden"><a class="button loading"></a></li>
                    <li class="form-btn"><a class="button" href="#" onclick="document.forma.submit();" >{$lang120}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="side-bar">
    <div class="msg-box notice">
    	<h3>{$lang121}</h3>
    	<p>{$quota} {$lang122}</p>
    </div>

    <div class="msg-box">
        <h3>{$lang123}</h3>
        <ul class="submit-info">
            <li><b>{$lang181}</b></li>
            <li><b>{$lang182}</b></li>
        </ul>
    </div>
</div>
<div id="footer" class="">