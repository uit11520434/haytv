{literal}
<script type="text/javascript">
$(document).keydown(function(e){
if(e.keyCode == 39 || e.keyCode == 75){
	var a=new Array();
	var b=new Array();
	var c=new Array();
	var i=0;
	$('.gag-link').each(function(){
		a[i]=$(this).attr('id');
		b[i]=$(this).offset().top;
		c[i]=$(this).height();
		i++;
		});
		var curloc=$(window).scrollTop();
		var j=0;
		var k=0;
	for(;j<a.length;){
	if(b[j]+c[j]-39>curloc && curloc >= b[j]-39){
	var k=j;
	break;
	}
	j++;
	}
	if(k == a.length-1){$('#go-next').click();}
	$.scrollTo(b[k+1]-38);
}
	
if(e.keyCode == 37 || e.keyCode == 74){
	var a=new Array();
	var b=new Array();
	var c=new Array();
	var i=0;
	$('.gag-link').each(function(){
		a[i]=$(this).attr('id');
		b[i]=$(this).offset().top;
		c[i]=$(this).height();
		i++;
		});
		var curloc=$(window).scrollTop();
		var j=0;
		var k=0;
	for(;j<a.length;){
	if(b[j]+c[j]-39>curloc && curloc >= b[j]-39){
	var k=j;
	break;
	}
	j++;
	}
	$.scrollTo(b[k-1]-38);
}
	
if(e.keyCode == 76){
	var a=new Array();
	var b=new Array();
	var i=0;
	$('.gag-link').each(function(){
		a[i]=$(this).attr('gagId');
		b[i]=$(this).offset().top;
		i++;
	});
	var curloc=$(window).scrollTop();
	var j=0;
	for(;j<a.length;){
	if(b[j]>curloc){
	break;
	}
	j++;
	}
	$.scrollTo('.gag-link:eq('+(j)+')');
	$('#post_love_'+a[j]).trigger('click');
}

if(e.keyCode == 72){
	var a=new Array();
	var b=new Array();
	var i=0;
	$('.gag-link').each(function(){
		a[i]=$(this).attr('gagId');
		b[i]=$(this).offset().top;
		i++;
	});
	var curloc=$(window).scrollTop();
	var j=0;
	for(;j<a.length;){
	if(b[j]>curloc){
	break;
	}
	j++;
	}
	$.scrollTo('.gag-link:eq('+(j)+')');
	$('#vote-down-btn-'+a[j]).trigger('click');
}
});

$(window).scroll(function(){
	var a=new Array();
	var b=new Array();
	var c=new Array();
	var i=0;
	$('.gag-link').each(function(){
		a[i]=$(this).attr('gagId');
		b[i]=$(this).offset().top;
		c[i]=$(this).height();
		i++;
	});
	var curloc=$(window).scrollTop();
	var j=0;
	var k=0;
	for(;j<a.length;){
	if(b[j]+c[j]>curloc && curloc > b[j]){
	var k=j;
	break;
	}
	j++;
	}
	var winh = $(window).height();
	var ach  = $('#action-'+a[0]).height()+30;
	if((curloc > (b[k]+c[k] - ach)) || curloc < b[0]){
	$('.b9gcs-stop').css('position','static');
	$('.b9gcs-stop').css('top','!important');
	}
	else
	{
		if((k==0 && curloc >= b[k]) || k>=1){
		$('#action-'+a[k]).css('position','fixed');
		$('#action-'+a[k]).css('top','55px');
		}
	}                
});
</script>
{/literal}