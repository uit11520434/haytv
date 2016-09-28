<script src="{$baseurl}/comic/jQuery.cssTransform.Patch.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery-ui.min.js" type="text/javascript"></script>
<link href="{$baseurl}/comic/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
<script src="{$baseurl}/comic/cp_depends.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/excanvas.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/CanvasWidget.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/CanvasPainter.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.batchImageLoad.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/interface.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.autogrow.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.blockUI.min.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/colorpicker.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.repeatedclick.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.imgDrop.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.getimagedata.min.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/base64.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/canvas2image.js" type="text/javascript"></script>
<script src="{$baseurl}/comic/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
<link href="{$baseurl}/comic/jquery.mCustomScrollbar.css" media="screen" rel="stylesheet" type="text/css" />
<script src="{$baseurl}/comic/rage.min.js" type="text/javascript"></script>
<link href="{$baseurl}/comic/style.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="{$baseurl}/comic/colorpicker.css" media="screen" rel="stylesheet" type="text/css" />

<div class="box infoBox rageBuilderContainer">
    <div id="blank_content">
        <div>
            <div class="dock" id="toolbar">
                <div class="dock-container" title="Click để thêm hình ảnh.">
                </div>
            </div>
        </div>
        <div id='promptContainer' title='Chèn ảnh'>
			<p class='errorText'></p>
            <p>Nhập đường dẫn (URL) của ảnh.</p>
            <div>
                <strong>URL: </strong>
                <input type='text' id='txtImportUrl' value='' /></div>
			 <p>Hoặc tải lên từ máy tính của bạn.</p>
			<div>
                <strong>File: </strong>
                <input type="file" id="fileToUpload" style="width: 164px;" /></div>
        </div>
        <div id='startUpMessageContainer' title='Pro-tip'>
        </div>
        <div id='exportContainer' title='Kiểm tra lại nào'>
            <div>
                <div style='float: left'>
                    <img alt="" src="{$baseurl}/comic/packs/neutral/images/Thoughtful.png" style="width: 66px;" /></div>
                <div>
                    Bạn đã xong thật chưa? Nếu xác nhận bạn sẽ không thể tiếp tục sửa ảnh này. Sau đó
                    bạn có thể đăng lên myfancy.org hoặc lưu ảnh về máy.
                </div>
                <div style='clear: both'>
                </div>
            </div>
        </div>
        <div id="canvasContainer">
            <div id="controllers" class="ui-widget-header ui-corner-all">
                <div id="templateController" class="controllerSubset" style="border-left: none; padding-left: 3px;">
                    <select id="drpPacks" title="Chọn bộ ảnh" style="margin: 0;">
                    </select>
                </div>
                <div id="toolsController" class="controllerSubset">
                    <strong style='padding-right: 5px'>Công cụ:</strong> <span title='Chèn chữ' id='addTextCtrl'
                        class='menuIcon'>
                        <img src="{$baseurl}/comic/cdn/img/ragecomic/text_dropcaps.png" />
                    </span><span title='Chèn ảnh từ URL' id='importImage' class='menuIcon'>
                        <img src="{$baseurl}/comic/cdn/img/ragecomic/photo_add.png" />
                    </span>
                </div>
                <div id="brushController" class="controllerSubset">
                    <strong style='padding-right: 5px'>Bút vẽ:</strong> <span title='Chọn màu bút' id="customWidget"
                        class='menuIcon'>
                        <img src="{$baseurl}/comic/cdn/img/ragecomic/color_wheel.png" />
                    </span><span title='Chọn kích thước bút' id="brushSize" class='menuIcon'>
                        <img src="{$baseurl}/comic/cdn/img/ragecomic/paintbrush.png" />
                    </span><span title="Undo thao tác bút vẽ hoặc 'Dính vào khung' cuối cùng" id="undoBrush"
                        class='menuIcon'>
                        <img src="{$baseurl}/comic/cdn/img/ragecomic/arrow_undo.png" />
                    </span>
                    <div id="brushSizeSlider">
                    </div>
                </div>
                <div id="panelController" class="controllerSubset" style="float: right">
                    <strong style='padding-right: 5px'>Khung:</strong> <span title='Thêm dòng' id='addFrameCtrl'
                        class='menuIcon'>
                        <img alt="" src="{$baseurl}/comic/cdn/img/ragecomic/add.png" />
                    </span><span title='Xóa dòng cuối' id='removeFrameCtrl' class='menuIcon'>
                        <img alt="" src="{$baseurl}/comic/cdn/img/ragecomic/delete.png" />
                    </span>
                </div>
                <div id="canvasControllerDiv" class="controllerSubset">
                    <span title='Hoàn thành' id='exportCanvas' class='menuIcon'>
                        <img alt="" src="{$baseurl}/comic/cdn/img/ragecomic/disk.png" /></span>
                </div>
                <div style="clear: both">
                </div>
            </div>
            <div id='drawingCanvasContainer'>
                <canvas id="drawingCanvasInterface"></canvas>
                <canvas id="drawingCanvas"></canvas>
                <img id="watermark" src="{$baseurl}/comic/cdn/img/ragecomic/watermark.png"
                     style="display: none;" />
            </div>
        </div>
    </div>
	<div style="margin:5px auto;width:800px;">
		<div class="fb-like" data-href="http://www.myfancy.org/comic/" data-width="500" data-show-faces="false" data-send="false"></div>
		<div class="fb-comments" data-href="http://www.myfancy.org/comic/" data-width="800"></div>
	</div>
</div>
{literal}
	<script type="text/javascript">  

        $(document).ready(function () {
            RageComic.initialize({
                packRoot: "http://www.myfancy.org/comic/",
                siteUrl: "",
                builderUrl: "http://www.myfancy.org/comic",
                cdnRoot: "http://www.myfancy.org/comic/cdn/"
            });
        });
        window.onbeforeunload = confirmExit;
		function confirmExit() {
            return "Ảnh của bạn chưa được lưu. Bạn có chắc muốn thoát không?";
        }
    </script>
{/literal}