/*================================================================================
 * @name: bPopup - if you can't get it up, use bPopup
 * @author: (c)Bjoern Klinggaard (twitter@bklinggaard)
 * @demo: http://dinbror.dk/bpopup
 * @version: 0.9.3.min
 ================================================================================*/
 (function(b){b.fn.bPopup=function(u,C){function v(){a.modal&&b('<div class="b-modal '+e+'"></div>').css({backgroundColor:a.modalColor,position:"fixed",top:0,right:0,bottom:0,left:0,opacity:0,zIndex:a.zIndex+l}).appendTo(a.appendTo).fadeTo(a.speed,a.opacity);z();c.data("bPopup",a).data("id",e).css({left:"slideIn"===a.transition?-1*(m+h):n(!(!a.follow[0]&&p||g)),position:a.positionStyle||"absolute",top:"slideDown"===a.transition?-1*(q+h):r(!(!a.follow[1]&&s||g)),"z-index":a.zIndex+l+1}).each(function(){a.appending&&b(this).appendTo(a.appendTo)});D(!0)}function t(){a.modal&&b(".b-modal."+c.data("id")).fadeTo(a.speed,0,function(){b(this).remove()});a.scrollBar||b("html").css("overflow","auto");b(".b-modal."+e).unbind("click");j.unbind("keydown."+e);d.unbind("."+e).data("bPopup",0<d.data("bPopup")-1?d.data("bPopup")-1:null);c.undelegate(".bClose, ."+a.closeClass,"click."+e,t).data("bPopup",null);D();return!1}function E(f){var b=f.width(),e=f.height(),d={};a.contentContainer.css({height:e,width:b});e>=c.height()&&(d.height=c.height());b>=c.width()&&(d.width=c.width());w=c.outerHeight(!0);h=c.outerWidth(!0);z();a.contentContainer.css({height:"auto",width:"auto"});d.left=n(!(!a.follow[0]&&p||g));d.top=r(!(!a.follow[1]&&s||g));c.animate(d,250,function(){f.show();x=A()})}function D(f){switch(a.transition){case "slideIn":c.css({display:"block",opacity:1}).animate({left:f?n(!(!a.follow[0]&&p||g)):j.scrollLeft()-(h||c.outerWidth(!0))-200},a.speed,a.easing,function(){B(f)});break;case "slideDown":c.css({display:"block",opacity:1}).animate({top:f?r(!(!a.follow[1]&&s||g)):j.scrollTop()-(w||c.outerHeight(!0))-200},a.speed,a.easing,function(){B(f)});break;default:c.stop().fadeTo(a.speed,f?1:0,function(){B(f)})}}function B(f){f?(d.data("bPopup",l),c.delegate(".bClose, ."+a.closeClass,"click."+e,t),a.modalClose&&b(".b-modal."+e).css("cursor","pointer").bind("click",t),!G&&(a.follow[0]||a.follow[1])&&d.bind("scroll."+e,function(){x&&c.dequeue().animate({left:a.follow[0]?n(!g):"auto",top:a.follow[1]?r(!g):"auto"},a.followSpeed,a.followEasing)}).bind("resize."+e,function(){if(x=A())clearTimeout(F),F=setTimeout(function(){z();c.dequeue().each(function(){g?b(this).css({left:m,top:q}):b(this).animate({left:a.follow[0]?n(!0):"auto",top:a.follow[1]?r(!0):"auto"},a.followSpeed,a.followEasing)})},50)}),a.escClose&&j.bind("keydown."+e,function(a){27==a.which&&t()}),k(C)):(c.hide(),k(a.onClose),a.loadUrl&&(a.contentContainer.empty(),c.css({height:"auto",width:"auto"})))}function n(a){return a?m+j.scrollLeft():m}function r(a){return a?q+j.scrollTop():q}function k(a){b.isFunction(a)&&a.call(c)}function z(){var b;s?b=a.position[1]:(b=((window.innerHeight||d.height())-c.outerHeight(!0))/2-a.amsl,b=b<y?y:b);q=b;m=p?a.position[0]:((window.innerWidth||d.width())-c.outerWidth(!0))/2;x=A()}function A(){return(window.innerHeight||d.height())>c.outerHeight(!0)+y&&(window.innerWidth||d.width())>c.outerWidth(!0)+y}b.isFunction(u)&&(C=u,u=null);var a=b.extend({},b.fn.bPopup.defaults,u);a.scrollBar||b("html").css("overflow","hidden");var c=this,j=b(document),d=b(window),G=/OS 6(_\d)+/i.test(navigator.userAgent),y=20,l=0,e,x,s,p,g,q,m,w,h,F;c.close=function(){a=this.data("bPopup");e="__b-popup"+d.data("bPopup")+"__";t()};return c.each(function(){if(!b(this).data("bPopup"))if(k(a.onOpen),l=(d.data("bPopup")||0)+1,e="__b-popup"+l+"__",s="auto"!==a.position[1],p="auto"!==a.position[0],g="fixed"===a.positionStyle,w=c.outerHeight(!0),h=c.outerWidth(!0),a.loadUrl)switch(a.contentContainer=b(a.contentContainer||c),a.content){case "iframe":var f=b('<iframe class="b-iframe" scrolling="no" frameborder="0"></iframe>');f.appendTo(a.contentContainer);w=c.outerHeight(!0);h=c.outerWidth(!0);v();f.attr("src",a.loadUrl);k(a.loadCallback);break;case "image":v();b("<img />").load(function(){k(a.loadCallback);E(b(this))}).attr("src",a.loadUrl).hide().appendTo(a.contentContainer);break;default:v(),b('<div class="b-ajax-wrapper"></div>').load(a.loadUrl,a.loadData,function(){k(a.loadCallback);E(b(this))}).hide().appendTo(a.contentContainer)}else v()})};b.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",closeClass:"b-close",content:"ajax",contentContainer:!1,easing:"swing",escClose:!0,follow:[!0,!0],followEasing:"swing",followSpeed:500,loadCallback:!1,loadData:!1,loadUrl:!1,modal:!0,modalClose:!0,modalColor:"#000",onClose:!1,onOpen:!1,opacity:0.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,speed:250,transition:"fadeIn",zIndex:9997}})(jQuery);
 
/* logging */
var isLogging = true;
function log(msg, prefix){
	if(isLogging){
		var logPrefix = 'DEBUG';
		if(prefix){
			logPrefix = prefix;
		}
		try{
			console.log(logPrefix + ': ' + msg);
		}catch(e){}
	}
}

/*launch registration popup*/
function regPop(type){
	$('#regPop').bPopup({
		follow: [true, false],
		positionStyle: 'fixed'
	});
	if(type == 'login'){
		regToLog();
	}else{
		document.register.r_email.focus();
	}
}

/*convert registration popup to login popup and vice versa*/
function regToLog(){
	$('#regPopupForm').hide();
	$('#logPopupForm').show()
	$('#email').focus();
}
function logToReg(){
	$('#logPopupForm').hide();
	$('#regPopupForm').show();
	document.register.r_email.focus();
}

/*this function forces numbers to be positive*/
function posNum(input){
	if(input.value < 0){
		input.value = 0;
	}
}

/* link formatting */
function createLink(anchor){
	var address = anchor.innerHTML;
	window.location.href='applicants.php?address=' + address;
}
function formatLink(address){
	return "<a href='javascript:void(0)' onclick='createLink(this)'>"+address+"<a/>";
}


/* form validation */
function resetField(name){
	$('#'+name).removeClass("successField").removeClass("errorField");
	$('label[for='+name+']').removeClass("successField").removeClass("errorField");
	$('#'+name+'_msg').removeClass("successField").removeClass("errorField");
}
function labelClass(label){
	if(label == 'success'){
		return "successField";
	}else if(label == 'error'){
		return "errorField";
	}
}
function messageField(name, msg, label){
	var className = labelClass(label);	
	if(!$('#'+name+'_msg').length){
		$('#'+name).after('<div class="inputMessage" id='+name+'_msg></div>');
	}
	$('#'+name+'_msg').addClass(className).html(msg);
}
function labelField(name, label, msg){
	log('labelField('+name+')');
	resetField(name);
	var className = labelClass(label);
	if(msg.length > 0){
		messageField(name, msg, label);	
	}
	if(className.length > 0){
		$('#'+name).addClass(className);
		$('label[for='+name+']').addClass(className);
	}
}

function passwordMatch(password1, password2){
	if($('#'+password2).val() === $('#'+password1).val()){
		labelField(password2, 'success', 'Your passwords match.');
	}else{
		labelField(password2, 'error', 'The passwords you entered do not match.');
	}
}

var best = /^.*(?=.{6,})(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/;
var strong = /^[a-zA-Z\d\W_]*(?=[a-zA-Z\d\W_]{6,})(((?=[a-zA-Z\d\W_]*[A-Z])(?=[a-zA-Z\d\W_]*[\d]))|((?=[a-zA-Z\d\W_]*[A-Z])(?=[a-zA-Z\d\W_]*[\W_]))|((?=[a-zA-Z\d\W_]*[\d])(?=[a-zA-Z\d\W_]*[\W_])))[a-zA-Z\d\W_]*$/;
var weak =/^[a-zA-Z\d\W_]*(?=[a-zA-Z\d\W_]{6,})(?=[a-zA-Z\d\W_]*[A-Z]|[a-zA-Z\d\W_]*[\d]|[a-zA-Z\d\W_]*[\W_])[a-zA-Z\d\W_]*$/;
var bad =/^((^[a-z]{6,}$)|(^[A-Z]{6,}$)|(^[\d]{6,}$)|(^[\W_]{6,}$))$/;

function passwordStrength(field){
	pValue = field.value;
	pName = field.id;
	if(best.test(pValue)){
		labelField(pName, 'success', 'Very strong password.');
	}else if(strong.test(pValue)){
		labelField(pName, 'success', 'Strong password.');
	}else if(weak.test(pValue)){
		labelField(pName, 'success', 'Okay password.');
	}else if(bad.test(pValue)){
		labelField(pName, 'error', 'Your password must contain at least one capital letter or one non-alphanumeric character.');
	}else{
		labelField(pName, 'error', 'Your password must be at least 6 characters.');
	}
}

function validateEmail(field) { 
    var validEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    if(validEmail.test(field.value)){
    	labelField(field.id, 'success', 'Valid email.');	
    }else{
   		labelField(field.id, 'error', 'A valid email address is required.');
    }
} 

function requiredField(field){
	log('requiredField('+field.id+')');
	if((field.tagName == 'INPUT' && !field.value.length)
	|| (field.tagName == 'SELECT' && field.value == -1))
	{
		labelField(field.id, 'error', 'This field is required.');		
	}else{
		labelField(field.id, 'success', 'OK');	
	}
}

function validateLength(field){
	var minLength = field.getAttribute('minlength');
	if (field.value.length < minLength){
		labelField(field.id, 'error', 'You must enter at least ' + minLength + ' characters.');	
	}else{
		labelField(field.id, 'success', 'OK');	
	}
}


function validateForm(form){
	log('validateForm('+form.name+')');
	
	$('form[name='+form.name+'] input[required=required], form[name='+form.name+'] select[required=required]').each(function(index) {
    	requiredField(this);
	});
	$('form[name='+form.name+'] input[minlength]').each(function(index) {
    	validateLength(this);
	});
	$('form[name='+form.name+'] input[type=email]').each(function(index) {
    	validateEmail(this);
	});
	$('form[name='+form.name+'] input[validate=strength]').each(function(index) {
    	passwordStrength(this);
	});
	$('form[name='+form.name+'] input[match]').attr('match'), $('form[name='+form.name+'] input[match]').each(function(index) {
    	passwordMatch(this);
	});
	$('form[name='+form.name+'] .errorField:input:first').focus();

	return false;
}

function initForms(){
	$('input.date').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true
	});
	$('input[required=required], select[required=required]')
	.bind("change blur keyup", function(event) {
  		requiredField(event.target);
	});
	$('input[minlength]')
	.bind("blur keyup", function(event) {
  		validateLength(event.target);
	});
	$('input[type=email]')
	.bind("blur keyup", function(event) {
  		validateEmail(event.target);
	});
	$('input[validate=strength]')
	.bind("blur keyup", function(event) {
  		passwordStrength(event.target);
	});
	$('input[match]')
	.bind("blur keyup", function(event) {
  		passwordMatch(event.target.getAttribute('match'), event.target.id);
	});		
	/*$('form[validate=validate]')
	.bind("submit", function(event) {
  		validateForm(event.target);
  		return false;
	});*/

}

$(document).ready(function() {
	//initForms();
});
