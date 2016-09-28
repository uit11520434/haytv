		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Cài Đặt</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="settings_general.php" id="isoft_group_1" name="group_1" title="Cài Đặt Chung" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Cài Đặt Chung
                                    </span>
        						</a>
                                
        						<div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Cài Đặt Chung</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Tên Website </label></td>
                                                        <td class="value">
                                                        	<input id="site_name" name="site_name" value="{$site_name}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÊN WEBSITE CỦA BẠN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">E-Mail Website </label></td>
                                                        <td class="value">
                                                            <input id="site_email" name="site_email" value="{$site_email}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ĐỊA CHỈ E-MAIL DÙNG ĐỂ GỬI THƯ ĐI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Số Bài/Trang </label></td>
                                                        <td class="value">
                                                            <input id="items_per_page" name="items_per_page" value="{$items_per_page}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÀI ĐĂNG HIỂN THỊ TRÊN MỘT TRANG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Giới Hạn Đăng </label></td>
                                                        <td class="value">
                                                            <input id="quota" name="quota" value="{$quota}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÀI THÀNH VIÊN CÓ THỂ ĐĂNG TRONG MỘT NGÀY]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Xác nhận bài dăng </label></td>
                                                        <td class="value">
                                                            <select id="approve_stories" name="approve_stories" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $approve_stories eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $approve_stories eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU BÀI MỚI PHẢI ĐƯỢC DUYỆT TRƯỚC KHI HIỂN THỊ CÔNG KHAI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Điều Kiện Chấp Thuận </label></td>
                                                        <td class="value">
                                                            <input id="myes" name="myes" value="{$myes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÌNH CHỌN CẦN ĐẠT ĐƯỢC TRƯỚC KHI BÀI ĐĂNG ĐƯỢC CHUYỂN TỪ TRANG BÌNH CHỌN SANG TRANG BÀI MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Điều Kiện Xóa </label></td>
                                                        <td class="value">
                                                            <input id="mno" name="mno" value="{$mno}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÌNH CHỌN "KHÔNG" CẦN ĐẠT ĐƯỢC TRƯỚC KHI BÀI ĐĂNG BỊ XÓA VĨNH VIỄN KHỎI TRANG BÌNH CHỌN VÀ TRANG BÀI MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="mtrend">Bài Đăng Hot </label></td>
                                                        <td class="value">
                                                            <input id="mtrend" name="mtrend" value="{$mtrend}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ BÌNH CHỌN CẦN ĐẠT ĐƯỢC TRƯỚC KHI BÀI ĐĂNG ĐƯỢC CHUYỂN TỪ TRANG BÀI MỚI SANG TRANG ĐANG HOT]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Tài Khoản Twitter </label></td>
                                                        <td class="value">
                                                            <input id="twitter" name="twitter" value="{$twitter}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÀI KHOẢN TWITTER ĐƯỢC LIÊN KẾT KHI NGƯỜI DÙNG CHIA SẺ BÀI ĐĂNG LÊN TWITTER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
													<tr class="hidden">
                                                        <td class="label"><label for="status">Kết Nối Qua Twitter </label></td>
                                                        <td class="value">
                                                            <select id="TC" name="TC" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $TC eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $TC eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ĐĂNG NHẬP THÔNG QUA TWITTER]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">ID Ứng Dụng Twitter </label></td>
                                                        <td class="value">
                                                            <input id="TWITTER_APP_ID" name="TWITTER_APP_ID" value="{$TWITTER_APP_ID}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ID ỨNG DỤNG TWITTER NHẬN ĐƯỢC KHI BẠN TẠO ỨNG DỤNG TRÊN TWITTER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Mã Ứng Dụng Twitter </label></td>
                                                        <td class="value">
                                                            <input id="TWITTER_APP_SECRET" name="TWITTER_APP_SECRET" value="{$TWITTER_APP_SECRET}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[MÃ ỨNG DỤNG TWITTER NHẬN ĐƯỢC KHI BẠN TẠO ỨNG DỤNG TRÊN TWITTER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">ID Ứng Dụng Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_APP_ID" name="FACEBOOK_APP_ID" value="{$FACEBOOK_APP_ID}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ID ỨNG DỤNG FACEBOOK NHẬN ĐƯỢC KHI BẠN TẠO ỨNG DỤNG TRÊN FACEBOOK]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Mã Ứng Dụng Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_SECRET" name="FACEBOOK_SECRET" value="{$FACEBOOK_SECRET}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[MÃ ỨNG DỤNG FACEBOOK NHẬN ĐƯỢC KHI BẠN TẠO ỨNG DỤNG TRÊN FACEBOOK]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="FACEBOOK_PROFILE">Trang Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_PROFILE" name="FACEBOOK_PROFILE" value="{$FACEBOOK_PROFILE}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TẠO MỘT TRANG FACEBOOK SAU ĐÓ ĐIỀN TÊN TRANG VÀO ĐÂY, VÍ DỤ TRANG FACEBOOK LÀ http://www.facebook.com/trollcackieu THÌ BẠN NHẬP VÀO LÀ trollcackieu]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
                                                    <tr class="hidden">
                                                        <td class="label"><label for="FACEBOOK_ADMIN">ID Quản Trị Facebook </label></td>
                                                        <td class="value">
                                                            <input id="FACEBOOK_ADMIN" name="FACEBOOK_ADMIN" value="{$FACEBOOK_ADMIN}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NHẬP ID NGƯỜI DÙNG FACEBOOK MÀ BẠN MUỐN CHO LÀM ADMIN, CẦN THIẾT CHO CÁC LIKE TỪ FACEBOOK]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Đóng Dấu Ảnh </label></td>
                                                        <td class="value">
                                                            <select id="lwm" name="lwm" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $lwm eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $lwm eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[THÊM LOGO CỦA BẠN VÀO ẢNH KHI ĐĂNG HÌNH ẢNH]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Đóng Dấu URL </label></td>
                                                        <td class="value">
                                                            <select id="twm" name="twm" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $twm eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $twm eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU IMAGICK]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Font Chữ </label></td>
                                                        <td class="value">
                                                            <input id="wmfont" name="wmfont" value="{$wmfont}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU IMAGICK]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Cỡ Chữ </label></td>
                                                        <td class="value">
                                                            <input id="fsize" name="fsize" value="{$fsize}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU IMAGICK]</td>
                                                        <td><small></small></td>
                                                    </tr>
																										
													<tr class="hidden">
                                                        <td class="label"><label for="status">Màu Chữ RBG </label></td>
                                                        <td class="value">
                                                          R: <input id="blackr" name="blackr" value="{$blackr}" class=" required-entry required-entry input-text" type="text"/>
														  B: <input id="blackb" name="blackb" value="{$blackb}" class=" required-entry required-entry input-text" type="text"/>
														  G: <input id="blackg" name="blackg" value="{$blackg}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU IMAGICK]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Màu Nền Dấu RBG </label></td>
                                                        <td class="value">
                                                          R: <input id="whiter" name="whiter" value="{$whiter}" class=" required-entry required-entry input-text" type="text"/>
														  B: <input id="whiteb" name="whiteb" value="{$whiteb}" class=" required-entry required-entry input-text" type="text"/>
														  G: <input id="whiteg" name="whiteg" value="{$whiteg}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YÊU CẦU IMAGICK]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Ẩn/Hiện Dấu </label></td>
                                                        <td class="value">
                                                            <select id="displaywm" name="displaywm" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $displaywm eq "1"}selected{/if}>Hiện</option>
                											<option value="0" {if $displaywm eq "0"}selected{/if}>Ẩn</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ẨN HOẶC HIỆN DẤU VỚI NGƯỜI XEM]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Chế Độ Trang </label></td>
                                                        <td class="value">
                                                            <select id="AUTOSCROLL" name="AUTOSCROLL" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $AUTOSCROLL eq "1"}selected{/if}>Không Giới Hạn</option>
                											<option value="0" {if $AUTOSCROLL eq "0"}selected{/if}>Bình Thường</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[KIỂU HIỂN THỊ CỦA TRANG]</td>
                                                        <td><small></small></td>
                                                    </tr>

													<tr class="hidden">
                                                        <td class="label"><label for="status">Ảnh Thu Nhỏ </label></td>
                                                        <td class="value">
                                                            <select id="thumbs" name="thumbs" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $thumbs eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $thumbs eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT CHẾ ĐỘ ẢNH THU NHỎ]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Safe Mode </label></td>
                                                        <td class="value">
                                                            <select id="safemode" name="safemode" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $safemode eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $safemode eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT CHẾ ĐỘ SAFE MODE]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="ganalytics">Google Analytics ID </label></td>
                                                        <td class="value">
                                                            <input id="ganalytics" name="ganalytics" value="{$ganalytics}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[VÍ DỤ: UA-12345678-1. ĐỂ TRỐNG ĐỂ TẮT TÍNH NĂNG NÀY]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Đăng Video </label></td>
                                                        <td class="value">
                                                            <select id="vupload" name="vupload" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $vupload eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $vupload eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT CHỨC NĂNG ĐĂNG VIDEO]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Đăng Văn Bản </label></td>
                                                        <td class="value">
                                                            <select id="tupload" name="tupload" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $tupload eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $tupload eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT CHỨC NĂNG ĐĂNG VĂN BẢN]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">RSS </label></td>
                                                        <td class="value">
                                                            <select id="RSS" name="RSS" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $RSS eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $RSS eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT RSS]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Sửa Bài Đăng </label></td>
                                                        <td class="value">
                                                            <select id="fixenabled" name="fixenabled" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $fixenabled eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $fixenabled eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT CHỨC NĂNG SỬA BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Hiện Bài Đăng Đặc Sắc Theo </label></td>
                                                        <td class="value">
                                                            <select id="topgags" name="topgags" class=" required-entry required-entry select" type="select">
                                                            <option value="3" {if $topgags eq "3"}selected{/if}>Tháng</option>
                                                            <option value="2" {if $topgags eq "2"}selected{/if}>Tuần</option>
                                                            <option value="1" {if $topgags eq "1"}selected{/if}>Ngày</option>
                											<option value="0" {if $topgags eq "0"}selected{/if}>Tắt</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[CÁCH THỨC HIỂN THỊ BÀI ĐĂNG ĐẶC SẮC]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Trang Bài Mới </label></td>
                                                        <td class="value">
                                                            <select id="trendingenabled" name="trendingenabled" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $trendingenabled eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $trendingenabled eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT TRANG BÀI MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Khách Xem Trang Bình Chọn? </label></td>
                                                        <td class="value">
                                                            <select id="voteforvisitor" name="voteforvisitor" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $voteforvisitor eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $voteforvisitor eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[NẾU CHỌN CÓ KHÁCH SẼ THẤY BÀI ĐĂNG TRONG TRANG BÌNH CHỌN NHƯNG KHÔNG THỂ BÌNH CHỌN]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Tối Ưu Máy Tìm Kiếm </label></td>
                                                        <td class="value">
                                                            <select id="SEO" name="SEO" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $SEO eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $SEO eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TẠO URL THÂN THIỆN ĐỂ TĂNG LƯỢNG TRUY CẬP TỪ CÁC CỖ MÁY TÌM KIẾM]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Rút Gọn Tiêu Đề Bài Đăng </label></td>
                                                        <td class="value">
                                                            <select id="truncate" name="truncate" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $truncate eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $truncate eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[RÚT GỌN TIÊU ĐỀ BÀI ĐĂNG ĐỂ CỐ ĐỊNH GIAO DIỆN]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Có Thể Bạn Muốn Xem </label></td>
                                                        <td class="value">
                                                            <select id="recommended" name="recommended" class=" required-entry required-entry select" type="select">
                                                            <option value="0" {if $recommended eq "0"}selected{/if}>Tắt</option>
                											<option value="1" {if $recommended eq "1"}selected{/if}>Dưới bài đăng</option>
                											<option value="2" {if $recommended eq "2"}selected{/if}>Bên phải</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[CÁCH THỨC HIỂN THỊ BÀI ĐĂNG NGẪU NHIÊN]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Kênh Bài Đăng </label></td>
                                                        <td class="value">
                                                            <select id="channels" name="channels" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $channels eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $channels eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT KÊNH BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Có Thể Bạn Muốn Xem Trên Trang Chủ </label></td>
                                                        <td class="value">
                                                            <select id="rhome" name="rhome" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $rhome eq "1"}selected{/if}>Có</option>
                											<option value="0" {if $rhome eq "0"}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[HIỂN THỊ BÀI ĐĂNG NGẪU NHIÊN TRÊN TRANG CHỦ]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Chuyển Hướng Sau Khi Đăng Ký </label></td>
                                                        <td class="value">
                                                            <select id="regredirect" name="regredirect" class=" required-entry required-entry select" type="select">
                                                            <option value="0" {if $regredirect eq "0"}selected{/if}>Trang chủ</option>
                											<option value="1" {if $regredirect eq "1"}selected{/if}>Cài đặt</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TRANG ĐƯỢC LOAD SAU KHI ĐĂNG KÝ THÀNH CÔNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Trang Chủ </label></td>
                                                        <td class="value">
                                                            <select id="index" name="index" class=" required-entry required-entry select" type="select">
                                                            <option value="0" {if $index eq "0"}selected{/if}>Hot</option>
                											<option value="1" {if $index eq "1"}selected{/if}>Mới</option>
                											<option value="2" {if $index eq "2"}selected{/if}>Bình chọn</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TRANG ĐƯỢC SỬ DỤNG LÀM TRANG CHỦ]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Thư Mục /post/ </label></td>
                                                        <td class="value">
                                                            <input id="postfolder" name="postfolder" value="{$postfolder}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label"><font color="red"><b>[LUÔN CÓ DẤU GẠCH CHÉO, VÍ DỤ : /post/ - NHỚ SỬA TỆP .HTACCESS NẾU KHÔNG SẼ BỊ LỖI 404]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Điểm Khi Đăng Bài </label></td>
                                                        <td class="value">
                                                            <input id="up_points" name="up_points" value="{$up_points}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ ĐIỂM THÀNH VIÊN NHẬN ĐƯỢC VỚI MỖI BÀI ĐĂNG MỚI]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Điểm Khi Xem Bài Đăng </label></td>
                                                        <td class="value">
                                                            <input id="view_points" name="view_points" value="{$view_points}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ ĐIỂM THÀNH VIÊN NHẬN ĐƯỢC VỚI MỖI LƯỢT XEM BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Nút Chia Sẻ #1 </label></td>
                                                        <td class="value">
                                                            <select id="share1" name="share1" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $share1 eq "1"}selected{/if}>Twitter</option>
                											<option value="2" {if $share1 eq "2"}selected{/if}>Facebook Share</option>
                											<option value="3" {if $share1 eq "3"}selected{/if}>Facebook Like</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[NÚT CHIA SẺ THỨ NHẤT ĐƯỢC DÙNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Nút Chia Sẻ #2 </label></td>
                                                        <td class="value">
                                                            <select id="share2" name="share2" class=" required-entry required-entry select" type="select">
                                                            <option value="1" {if $share2 eq "1"}selected{/if}>Twitter</option>
                											<option value="2" {if $share2 eq "2"}selected{/if}>Facebook Share</option>
                											<option value="3" {if $share2 eq "3"}selected{/if}>Facebook Like</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[NÚT CHIA SẺ THỨ HAI ĐƯỢC DÙNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Quảng Cáo Nhạy Cảm </label></td>
                                                        <td class="value">
                                                            <select id="NSFWADS" name="NSFWADS" class=" required-entry required-entry select" type="select">
                                                            <option value="0" {if $NSFWADS eq "0"}selected{/if}>Không</option>
                											<option value="1" {if $NSFWADS eq "1"}selected{/if}>Có</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[HIỆN QUẢNG CÁO NHẠY CẢM CHỈ CHO THÀNH VIÊN ĐÃ KÍCH HOẠT]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Hiện Bài Đăng Phổ Biến Theo </label></td>
                                                        <td class="value">
                                                            <select id="populargags" name="populargags" class=" required-entry required-entry select" type="select">
                                                            <option value="3" {if $populargags eq "3"}selected{/if}>Tháng</option>
                                                            <option value="2" {if $populargags eq "2"}selected{/if}>Tuần</option>
                                                            <option value="1" {if $populargags eq "1"}selected{/if}>Ngày</option>
                											<option value="0" {if $populargags eq "0"}selected{/if}>Tắt</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[CÁCH THỨC HIỂN THỊ BÀI ĐĂNG PHỔ BIẾN]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
                                                        <td class="label"><label for="status">Top Bài Đăng </label></td>
                                                        <td class="value">
                                                            <select id="topposts" name="topposts" class=" required-entry required-entry select" type="select">
                                                            <option value="0" {if $topposts eq "0"}selected{/if}>Không</option>
                											<option value="1" {if $topposts eq "1"}selected{/if}>Có</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BẬT HOẶC TẮT TRANG TOP BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
													
													<tr class="hidden">
														<td class="label"><label for="status">Chế Độ Mobile </label></td>
														<td class="value">
															<select id="mobilemode" name="mobilemode" class=" required-entry required-entry select" type="select">
															<option value="1" {if $mobilemode eq "1"}selected{/if}>Có</option>
															<option value="0" {if $mobilemode eq "0"}selected{/if}>Không</option>
															</select>
														</td>
														<td class="scope-label">[TỰ CHUYỂN SANG GIAO DIỆN DI ĐỘNG KHI NGƯỜI DÙNG TRUY CẬP BẰNG ĐIỆN THOẠI]</td>
														<td><small></small></td>
													</tr>

													<tr class="hidden">
														<td class="label"><label for="status">URL Trang Di Động </label></td>
														<td class="value">
															<input id="m_url" name="m_url" value="{$m_url}" class=" required-entry required-entry input-text" type="text"/>
														</td>
														<td class="scope-label">[URL TRANG DI ĐỘNG CỦA BẠN]</td>
														<td><small></small></td>
													</tr>

													<tr class="hidden">
														<td class="label"><label for="status">Số Bài/Trang Trong Chế Độ Mobile </label></td>
														<td class="value">
															<input id="mobile_per_page" name="mobile_per_page" value="{$mobile_per_page}" class=" required-entry required-entry input-text" type="text"/>
														</td>
														<td class="scope-label">[SỐ BÀI HIỂN THỊ TRÊN MỘT TRANG]</td>
														<td><small></small></td>
													</tr>

                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
    						</li>
                            
                            <li >
                                <a href="settings_meta.php" id="isoft_group_9" name="group_9" title="Cài Đặt Thẻ Meta" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Cài Đặt Thẻ Meta
                                    </span>
                                </a>
                                <div id="isoft_group_9_content" style="display:none;"></div>
                            </li>
                            
                            <li >
                                <a href="settings_static.php" id="isoft_group_11" name="group_11" title="Trang Tĩnh" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Trang Tĩnh
                                    </span>
                                </a>
                                <div id="isoft_group_11_content" style="display:none;"></div>
                            </li>
    
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_1', []);
                        </script>
                        
					</div>
                    
					<div class="main-col" id="content">
						<div class="main-col-inner">
							<div id="messages">
                            {if $message ne "" OR $error ne ""}
                            	{include file="administrator/show_message.tpl"}
                            {/if}
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Cài Đặt - Cài Đặt Chung</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Lưu Thay Đổi</span></button>			
                                </p>
                            </div>
                            
                            <form action="settings_general.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>