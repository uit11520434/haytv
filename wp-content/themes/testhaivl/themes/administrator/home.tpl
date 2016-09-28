	<div class="middle" id="anchor-content">
    	<div id="page:main-container">
        	
            <div id="messages"></div>
            
            <div class="content-header">
                <table cellspacing="0">
                    <tr>
                        <td><h3 class="head-dashboard">Trang Chủ</h3></td>
                    </tr>
                </table>
            </div>
            
			<div class="dashboard-container">
    			<p class="switcher">
                	<label for="store_switcher">Thống Kê Website</label>
				</p>
                  
				<table cellspacing="25" width="100%">
        		<tr>
            		<td>                                                
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Thống Kê Bài Đăng</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Nội Dung</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Kết Quả</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Bài Đăng Chờ Xác Nhận</td>
                                                <td class=" a-center last">{insert name=get_total_v1}</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">Bài Đăng Bị Báo Lỗi</td>
                                                <td class=" a-center last">{insert name=get_total_v2}</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">Bài Đăng Mới</td>
                                                <td class=" a-center last">{insert name=get_total_v4}</td>
                                        	</tr>
                                            <tr>
                                            	<td class=" ">Tổng Số Bài Đăng</td>
                                                <td class=" a-center last">{insert name=get_total_v5}</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                
            	</td>
                <td>                                                
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Thống Kê Quảng Cáo</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Nội Dung</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Kết Quả</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Tổng Số Quảng Cáo</td>
                                                <td class=" a-center last">{insert name=get_total_com value=var table=advertisements}</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>Thống Kê Thành Viên</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   width="100"  />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Nội Dung</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Kết Quả</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	<td class=" ">Tổng Số Thành Viên</td>
                                                <td class=" a-center last">{insert name=get_total_m3}</td>
                                        	</tr>
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>
                
            	</td>
            	<td>
                        
                        <div class="entry-edit">
                    		<div class="entry-edit-head"><h4>10 Thành Viên Mới</h4></div>
                    		<fieldset class="np">
                                <div class="grid np">
                                    <table cellspacing="0" style="border:0;" id="lastOrdersGrid_table">
                                        <col   />
                                        <col   />
                                        <thead>
                                            <tr class="headings">
                                                <th  class=" no-link"><span class="nobr">Tên Đăng Nhập</span></th>
                                                <th  class=" no-link a-center last"><span class="nobr">Địa Chỉ E-Mail</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	{section name=i loop=$results}
                                            <tr>
                                            	<td class=" ">{$results[i].username|stripslashes|truncate:20:"...":true}</td>
                                                <td class=" a-center last">{$results[i].email|stripslashes|truncate:50:"...":true}</td>
                                        	</tr>
											{/section}
                                        </tbody>
                                    </table>
                                </div>
							</fieldset>
                		</div>

            </td>
        </tr>
    </table>
</div>
                        </div>
        </div>