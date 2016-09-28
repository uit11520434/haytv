<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="list-content">
                {if $blogtype == 0}
                    {include file="myfancy_bit.tpl"}
                {else}
                    {include file="posts_bit_blog.tpl"}
                {/if}
            </div>
            <div class="loading"><img src="{$baseurl}/images/loading.gif"/> Đang tải...</div>
            <div class="buttonNext" pageUrl="{$baseurl}/{if $blogtype == 0}chemgio{/if}{if $blogtype == 1}tamsu{/if}{if $blogtype == 2}tinhot{/if}/" page="{$tnp}">Nữa đi, đừng dừng lại...</div>
        </div>
        <div class="col-md-4">
            {include file="right.tpl"}
        </div>
    </div>
</div>

