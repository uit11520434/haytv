// ipcms v 2013
var fb_api		=	true;
var	json_scroll	=	true;
$(window).scroll(function(){
	var scrollTop = $(window).scrollTop();
	if(scrollTop > 47){
		$("#nav").css({'position':'fixed','top':0});
		$("#main").css({'margin-top':'47px'});
	}else {
		$("#nav,#main").removeAttr("style");
	}
});
$(document).ready(function() {
	$("#nav li.menu-comic").hover(function() {
		$(this).find("div").show();
	},function() {
		$(this).find("div").hide();
	});
	login();
	if(fb_api) {
		facebook_like();
	}
});
function json_data(page_next) {
	json_scroll	=	false;
	$("#pages").hide();
	$("#ip-loading").show();
	$.getJSON(page_next+page_num, {}, function (data) {
		if(data.html=="" || data.html==null) {
			$("#pages").remove();
		}else {
			var	$html	=	data.html;
			$('#contents').append($html);
			fixInfoPanel();
			FB.XFBML.parse();
			page_num	=	data.page;
			json_scroll	=	true;
		}
		$("#ip-loading").hide();
		$("#pages").show();
	});
}
function refreshPosition(newContent) {
    $('#contents').imagesLoaded(function() {
		$('#contents').isotope({
			layoutMode: 'masonry',
			itemSelector: '.bitems'
		});
	});
}

function delete_post(p_id) {
	if (confirm("Bạn có chắc chắn muốn xóa!")) {
		$("#ip-loading").show();
		$.post("/ajax.php",{post: 'delete-post',p_id:p_id},function(data){
			if(data==1) {
				$('#post_'+p_id).remove();$("#ip-loading").hide();
			}else {
				$("#ip-loading").hide();
				alert('Truyện này đã được duyệt bạn không thể xóa!');
			}
		});
	}
	return false;
}

function delete_chap(chap_id) {
	if (confirm("Bạn có chắc chắn muốn xóa!")) {
		$("#ip-loading").show();
		$.post("/ajax.php",{post: 'delete-chap',chap_id:chap_id},function(data){
			if(data==1) {
				$('#post_'+chap_id).remove();$("#ip-loading").hide();
			}else {
				$("#ip-loading").hide();
				alert('Truyện này đã được duyệt bạn không thể xóa!');
			}
		});
	}
	return false;
}

function report(p_id) {
	var	report_html	=	'<div class="form">'+
						'<p style="margin-top:0"><label for="r_txt">Lý do báo cáo</label><select name="r_txt" id="r_txt"><option value="Đồi trụy">Đồi trụy</option><option value="Phản động">Phản động</option><option value="Liên quan đến chính trị">Liên quan đến chính trị</option><option value="Liên quan đến tôn giáo">Liên quan đến tôn giáo</option><option value="Phản cảm">Phản cảm</option><option value="Bị trùng">Bị trùng</option><option value="Vi phạm bản quyền">Vi phạm bản quyền</option><option value="Lý do khác">Lý do khác</option></select></p>'+
						'<p id="__khac" style="display:none;"><label for="r_txtz">Hoặc nhập lý do khác</label><input id="r_txtz" name="r_txtz" type="text"></p>'+
						'</div>'+
						'<div class="submit">'+
						'<a class="uibutton confirm" id="submit_report" href="#">Gửi báo cáo</a>'+
						'<a class="uibutton" href="#" onclick="return alertClose()">Hủy bỏ</a>'+
						'</div>';
	iposAlert('Báo cáo hình ảnh vi phạm',report_html);
	$("#r_txt").change(function() {
		if($(this).val()=='Lý do khác') {
			$("#__khac").show();
		}else {
			$("#__khac").hide();
		}
	});
	$("#submit_report").click(function() {
		var	r_txt	=	$('select[name="r_txt"]').val();
		var	r_txtz	=	$('input[name="r_txtz"]').val();
		if(r_txtz) {
			r_txt	=	r_txtz;	
		}
		$("#ip-loading").show();
		$.post("/ajax.php",{post: 'report',p_id:p_id,r_txt:r_txt},function(data){
			$("#ip-loading").hide();
			alertClose();
			alert('Cảm ơn bạn đã báo cáo hình ảnh này. BQT sẽ xử lý trong thời gian sớm nhất.');
		});
		return false;
	});
	return false;
}

function vote(p_id,v) {
	var	num	=	$(v).attr('rel');
	$("#ip-loading").show();
	$.post("/ajax.php",{post: 'vote',p_id:p_id,num:num},function(data){
		$("#ip-loading").hide();
		if(num==1) {
			$('a.upVoted').removeClass('upVoted');
			$(v).addClass('downVoted');
		}else {
			$('a.downVoted').removeClass('downVoted');
			$(v).addClass('upVoted');	
		}
	});
	return false;
}

function login() {
	$.post("/ajax.php",{post: 'login'},function(data){
		$('#_Login').html(data);	
	});
}
function submit_images() {
	var	p_title	=	$('input[name="p_title"]').val();
	if(!p_title) {
		alert('Vui lòng nhập tiêu đề của ảnh!');
		$('input[name="p_title"]').focus();
		return false;
	}else {
		$('#ip-loading').show();
		return true;	
	}
}

function save_images() {
	$("#ip-loading").show();
	var	p_title	=	$('input[name="p_title"]').val();
	var	p_tag	=	$('select[name="p_tag"]').val();
	if(!p_title) {
		alert('Vui lòng nhập tiêu đề của ảnh!');
		$('input[name="p_title"]').focus();
		return false;
	}else {
		if(p_tag == 0) {
			alert('Vui lòng chọn phân loại!');
			$('select[name="p_tag"]').focus();
			return false;
		}else {
			var	p_source	=	$('input[name="p_source"]').val();
			var	p_desc		=	$('textarea[name="p_desc"]').val();
			var	images		=	$('input[name="images"]').val();
			$.post("/ajax.php",{ 
						post: 		'saveimg',
						p_title:	p_title,
						p_desc:		p_desc,
						p_source:	p_source,
						p_tag:		p_tag,
						images:		images
			},function(data){
				if(data == 2) {
					alert('Để đăng ảnh này bạn cần đăng nhập!');
				}else {
					if(data == 1) {
						alert('Có lỗi xảy ra, vui lòng thử lại sau ít phút!');
					}else {
						alert(data);
						$("#ip-loading").hide();
						window.location	=	'/rage/';
					}
				}
			});
			return false;
		}
	}
	return false;
}
function submit_video() {
	var	p_video	=	$('input[name="p_video"]').val();
	var	p_title	=	$('input[name="p_title"]').val();
	if(!p_video) {
		alert('Vui lòng nhập đường dẫn video!');
		$('input[name="p_txt"]').focus();
		return false;
	}else {
		if(!p_title) {
			alert('Vui lòng nhập tiêu đề của video!');
			$('input[name="p_title"]').focus();
			return false;
		}else {
			$('#ip-loading').show();
			return true;	
		}
	}
}
function submit_user() {
	var	user_name	=	$('input[name="user_name"]').val();
	if(!user_name) {
		alert('Vui lòng nhập tên hiện thị!');
		$('input[name="user_name"]').focus();
		return false;
	}else {
		return true;
	}
}
function submit_login() {
	var	user_email		=	$('input[name="user_email"]').val();
	var	user_password	=	$('input[name="user_password"]').val();
	if(!user_email) {
		alert('Vui lòng nhập email của bạn!');
		$('input[name="user_email"]').focus();
		return false;
	}else {
		if(!user_password) {
			alert('Vui lòng nhập mật khẩu!');
			$('input[name="user_password"]').focus();
			return false;
		}else {
			return true;	
		}
	}
}
function submit_passwordz() {
	var	newpassword		=	$('input[name="newpassword"]').val();
	var	repassword		=	$('input[name="repassword"]').val();

		if(!newpassword) {
			alert('Vui lòng nhập mật khẩu mới!');
			$('input[name="newpassword"]').focus();
			return false;
		}else {
			if(!repassword) {
				alert('Vui lòng nhập mật khẩu xác nhận!');
				$('input[name="repassword"]').focus();
				return false;
			}else {
				if(newpassword!=repassword) {
					alert('Mật khẩu mới và mật khẩu xác nhận khống giống nhau!');
					$('input[name="repassword"]').focus();
					return false;
				}else {
					return true;	
				}	
			}
		}
}
function submit_password() {
	var	password		=	$('input[name="password"]').val();
	var	newpassword		=	$('input[name="newpassword"]').val();
	var	repassword		=	$('input[name="repassword"]').val();
	if(!password) {
		alert('Vui lòng nhập mật khẩu của bạn!');
		$('input[name="password"]').focus();
		return false;
	}else {
		if(!newpassword) {
			alert('Vui lòng nhập mật khẩu mới!');
			$('input[name="newpassword"]').focus();
			return false;
		}else {
			if(!repassword) {
				alert('Vui lòng nhập mật khẩu xác nhận!');
				$('input[name="repassword"]').focus();
				return false;
			}else {
				if(newpassword!=repassword) {
					alert('Mật khẩu mới và mật khẩu xác nhận khống giống nhau!');
					$('input[name="repassword"]').focus();
					return false;
				}else {
					return true;	
				}	
			}
		}
	}
}

function facebook_like() {
	window.fbAsyncInit = function() {
		FB.init({appId: APP_FACEBOOK, status: true, cookie: true, xfbml: true});
		FB.Event.subscribe('edge.create', function(href, widget) {
			//alert(href);
		   	$.post("/ajax.php",{post: 'updatelike',href:href,num:1});
		});
		FB.Event.subscribe('edge.remove', function(response) {
			$.post("/ajax.php",{post: 'updatelike',href:response,num:2});	
		});
		FB.Event.subscribe('comment.create', function(cmdata) {
		   $.post("/ajax.php",{post: 'updatecomment',href:cmdata.href,num:1});	
		});
		FB.Event.subscribe('comment.remove', function(cmdataz) {
			$.post("/ajax.php",{post: 'updatecomment',href:cmdataz.href,num:2});	
		});
	};
	facebook_sdk();
}

function facebook_sdk() {
  (function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol +
		  '//connect.facebook.net/vi_VN/all.js';
		document.getElementById('fb-root').appendChild(e);
	}());
}
function facebook_login() {
	var	ref	=	$("input[name='ref']").val();
	FB.api('/me', function(response) {
		$.post("/ajax.php",{post: 'facebook',uid:response.id,name:response.name,email:response.email,ref:ref},function(data){
			window.location	=	data;
		})
	});
}

function iposAlert(Atitle,Atxt) {
	var	alert_html	=	'<div id="ipos-wp"></div>'+
						'<div id="ipos-popup">'+
							'<div class="title">'+Atitle+'</div>'+
							'<div class="contents">'+Atxt+'</div>'+
						'</div>';
	$('body').append(alert_html);
	$('#ipos-popup').animate({
		top: "120px"
	}, 500 );
	$("#ipos-wp").click(function() {
		alertClose();
	});
	return false;
}
function alertClose() {
	$('#ipos-wp,#ipos-popup').remove();
	return false;
}

function soanthao(idtext) {
	tinyMCE.init({
		mode : "exact",
		elements : idtext,
		theme : "advanced",
		skin : "bootstrap",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,formatselect,fontselect,fontsizeselect,link,unlink,image,|,fullscreen,code",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		content_css : "css/content.css",
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		entity_encoding : "raw"
	});	
}
			function check_comic() {
				$("#submit_comic").click(function(){
					var	p_comic	=	$('input[name="p_comic"]').val();
					var	p_check	=	$('input[name="p_check"]').val();
					if(p_comic==2||p_comic==3) {
						if(p_check==1) {
							var	p_title	=	$('input[name="p_title"]').val();
							if(!p_title) {
								alert('Vui lòng nhập tên truyện!');
								$('input[name="p_title"]').focus();
								return false;
							}else {
								var	p_desc	=	$('textarea[name="p_desc"]').val();
								if(!p_desc) {
									alert('Vui lòng nhập mô tả!');
									$('textarea[name="p_desc"]').focus();
									return false;
								}else {
									var	p_chap	=	$('input[name="p_chap_1"]').val();
									if(!p_chap) {
										alert('Vui lòng tên chapter!');
										$('input[name="p_chap_1"]').focus();
										return false;
									}else {
										var	p_txt	=	tinyMCE.get('p_txt_1').getContent();
										if(p_txt.length<300) {
											alert('Nội dung phải lớn hơn 300 ký tự!');
											return false;
										}else {
											return true;
										}
									}
								}
							}
						}else {
							var	p_id	=	$('select[name="p_id"]').val();
							if(!p_id) {
								alert('Vui lòng chọn truyện cần thêm chap mới!');
								$('select[name="p_id"]').focus();
								return false;
							}else {
								var	p_chap	=	$('input[name="p_chap_1"]').val();
								if(!p_chap) {
									alert('Vui lòng tên chapter!');
									$('input[name="p_chap_1"]').focus();
									return false;
								}else {
									var	p_txt	=	tinyMCE.get('p_txt_1').getContent();
									if(p_txt.length<300) {
										alert('Nội dung phải lớn hơn 300 ký tự!');
										return false;
									}else {
										return true;
									}
								}
							}
						}
					}else {
						var	p_title	=	$('input[name="p_title"]').val();
						if(!p_title) {
							alert('Vui lòng nhập tên truyện!');
							$('input[name="p_title"]').focus();
							return false;
						}else {
							var	p_desc	=	$('textarea[name="p_desc"]').val();
							if(!p_desc) {
								alert('Vui lòng nhập mô tả!');
								$('textarea[name="p_desc"]').focus();
								return false;
							}else {
								var	p_txt	=	tinyMCE.get('p_txt_1').getContent();
								if(p_txt.length<300) {
									alert('Nội dung phải lớn hơn 300 ký tự!');
									return false;
								}else {
									return true;
								}
							}
						}
					}
				})
			}
			function phan_loai() {
				$("#phan_loai a").click(function(){
					$("#phan_loai a").removeClass('active');
					$(this).addClass('active');
					var phanloai	=	$(this).attr('rel');
					$("input[name='p_comic']").val(phanloai);
					if(phanloai==2||phanloai==3) {
						$("p.check_pl,p.add_chapter,#load_chap").removeClass('none');
					}else {
						$("p.check_pl,p.add_chapter,#load_chap").addClass('none');
					}
					return false;
				});
			}
			function upload_comic() {
				soanthao('p_txt_1');
				check_comic();
				phan_loai();
				$("#lb1").click(function(){
					$("p.check_lb2").removeClass('none');
					$("p.check_lb1").addClass('none');
					$("input[name='p_check']").val(1);
				})
				$("#lb2").click(function(){
					$("p.check_lb2").addClass('none');
					$("p.check_lb1").removeClass('none');
					$("input[name='p_check']").val(2);
				})
				$("#add_chapter").click(function(){
					p_total	=	p_total+1;
					$("#load_chap").append('<p class="check_pl"><label for="p_chap_'+p_total+'">Tên chapter '+p_total+'<span>*</span></label><input type="text" name="p_chap_'+p_total+'" id="p_chap_'+p_total+'"></p><p><label for="p_txt_'+p_total+'">Nội dung '+p_total+'<span>*</span></label><textarea name="p_txt_'+p_total+'" style="height:325px" id="p_txt_'+p_total+'"></textarea></p>');
					soanthao('p_txt_'+p_total);
					$("input[name='p_total']").val(p_total);
					if(p_total==2) {
						$("b.num_total").html(1);
					}
					return false;
				})
			}
			
					function submit_comic_2() {
						var	p_title	=	$('input[name="p_title"]').val();
						if(!p_title) {
							alert('Vui lòng nhập tên truyện!');
							$('input[name="p_title"]').focus();
							return false;
						}else {
							var	p_desc	=	$('textarea[name="p_desc"]').val();
							if(!p_desc) {
								alert('Vui lòng nhập mô tả!');
								$('textarea[name="p_desc"]').focus();
								return false;
							}else {
								return true;
							}
						}
					}
					function submit_chapter() {
						var	p_chap_1	=	$('input[name="p_chap_1"]').val();
						if(!p_chap_1) {
							alert('Vui lòng nhập tên chap!');
							$('input[name="p_chap_1"]').focus();
							return false;
						}else {
							var	p_txt_1	=	tinyMCE.get('p_txt_1').getContent();
							if(!p_txt_1) {
								alert('Vui lòng nhập nội dung chap!');
								$('textarea[name="p_txt_1"]').focus();
								return false;
							}else {
								return true;
							}
						}
					}
function fixInfoPanel() {
	$(".photoListItem").each(function () {
		var s = $(window).scrollTop();
		var a = $(this);
		var b = $(".info", this);
		if (a.offset().top - 60 < s && s < a.offset().top - 60 + a.outerHeight()) {
			if (s + b.outerHeight() < a.offset().top + a.outerHeight() - 70) {
				b.css({
					position: "fixed",
					top: "60px"
				});
			} else {
				b.css({
					position: "relative",
					top: ""
				})
			}
		} else {
			b.css({
				position: "relative",
				top: ""
			})
		}
	})
}