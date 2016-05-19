$(document).ready(function(){

		$('.firstRow').click(function(){
			$('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
			$('#box').animate({'opacity':'1.00'}, 300, 'linear');
			$('.backdrop, #box').css('display', 'block');
		});

		$('.close').click(function(){
			close_box();
		});

		$('.backdrop').click(function(){
			close_box();
		});
		
		$('.midBox').click(function(){
			$('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
			$('#midBox').animate({'opacity':'1.00'}, 300, 'linear');
			$('.backdrop, #midBox').css('display', 'block');
		});

		$('.close').click(function(){
			close_box1();
		});

		$('.backdrop').click(function(){
			close_box1();
		});

});

function close_box()
{
	$('.backdrop, #box').animate({'opacity':'0'}, 300, 'linear', function(){
		$('.backdrop, #box').css('display', 'none');
	});
}

function close_box1()
{
	$('.backdrop, #midBox').animate({'opacity':'0'}, 300, 'linear', function(){
		$('.backdrop, #midBox').css('display', 'none');
	});
}

var x,y,n=0,ny=0,rotINT,rotYINT;
function rotateDIV() {
	x=document.getElementById("setting");
	clearInterval(rotINT);
	rotINT=setInterval("startRotate()",1);
}
function startRotate() {
	n=n+.75;
	x.style.transform="rotate(" + n + "deg)";
	x.style.webkitTransform="rotate(" + n + "deg)";
	x.style.OTransform="rotate(" + n + "deg)";
	x.style.MozTransform="rotate(" + n + "deg)";
	if (n==180 || n==360) {
		clearInterval(rotINT);
	if (n==360){n=0}
	}
}


