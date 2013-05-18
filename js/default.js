/*********************************************************************************
 * @name: bPopup
 * @author: (c)Bjoern Klinggaard (http://dinbror.dk/bpopup - twitter@bklinggaard)
 * @version: 0.7.0.min
 *********************************************************************************/
(function(b){b.fn.bPopup=function(n,p){function t(){b.isFunction(a.onOpen)&&a.onOpen.call(c);k=(e.data("bPopup")||0)+1;d="__bPopup"+k;l="auto"!==a.position[1];m="auto"!==a.position[0];i="fixed"===a.positionStyle;j=r(c,a.amsl);f=l?a.position[1]:j[1];g=m?a.position[0]:j[0];q=s();a.modal&&b('<div class="bModal '+d+'"></div>').css({"background-color":a.modalColor,height:"100%",left:0,opacity:0,position:"fixed",top:0,width:"100%","z-index":a.zIndex+k}).each(function(){a.appending&&b(this).appendTo(a.appendTo)}).animate({opacity:a.opacity},a.fadeSpeed);c.data("bPopup",a).data("id",d).css({left:!a.follow[0]&&m||i?g:h.scrollLeft()+g,position:a.positionStyle||"absolute",top:!a.follow[1]&&l||i?f:h.scrollTop()+f,"z-index":a.zIndex+k+1}).each(function(){a.appending&&b(this).appendTo(a.appendTo);if(null!=a.loadUrl)switch(a.contentContainer=b(a.contentContainer||c),a.content){case "iframe":b('<iframe scrolling="no" frameborder="0"></iframe>').attr("src",a.loadUrl).appendTo(a.contentContainer);break;default:a.contentContainer.load(a.loadUrl)}}).fadeIn(a.fadeSpeed,function(){b.isFunction(p)&&p.call(c);u()})}function o(){a.modal&&b(".bModal."+c.data("id")).fadeOut(a.fadeSpeed,function(){b(this).remove()});c.stop().fadeOut(a.fadeSpeed,function(){null!=a.loadUrl&&a.contentContainer.empty()});e.data("bPopup",0<e.data("bPopup")-1?e.data("bPopup")-1:null);a.scrollBar||b("html").css("overflow","auto");b("."+a.closeClass).die("click."+d);b(".bModal."+d).die("click");h.unbind("keydown."+d);e.unbind("."+d);c.data("bPopup",null);b.isFunction(a.onClose)&&setTimeout(function(){a.onClose.call(c)},a.fadeSpeed);return!1}function u(){e.data("bPopup",k);b("."+a.closeClass).live("click."+d,o);a.modalClose&&b(".bModal."+d).live("click",o).css("cursor","pointer");(a.follow[0]||a.follow[1])&&e.bind("scroll."+d,function(){q&&c.stop().animate({left:a.follow[0]&&!i?h.scrollLeft()+g:g,top:a.follow[1]&&!i?h.scrollTop()+f:f},a.followSpeed)}).bind("resize."+d,function(){if(q=s())j=r(c,a.amsl),a.follow[0]&&(g=m?g:j[0]),a.follow[1]&&(f=l?f:j[1]),c.stop().each(function(){i?b(this).css({left:g,top:f},a.followSpeed):b(this).animate({left:m?g:g+h.scrollLeft(),top:l?f:f+h.scrollTop()},a.followSpeed)})});a.escClose&&h.bind("keydown."+d,function(a){27==a.which&&o()})}function r(a,b){var c=(e.width()-a.outerWidth(!0))/2,d=(e.height()-a.outerHeight(!0))/2-b;return[c,20>d?20:d]}function s(){return e.height()>c.outerHeight(!0)+20&&e.width()>c.outerWidth(!0)+20}b.isFunction(n)&&(p=n,n=null);var a=b.extend({},b.fn.bPopup.defaults,n);a.scrollBar||b("html").css("overflow","hidden");var c=this,h=b(document),e=b(window),k,d,q,l,m,i,j,f,g;this.close=function(){a=c.data("bPopup");o()};return this.each(function(){c.data("bPopup")||t()})};b.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",closeClass:"bClose",content:"ajax",contentContainer:null,escClose:!0,fadeSpeed:250,follow:[!0,!0],followSpeed:500,loadUrl:null,modal:!0,modalClose:!0,modalColor:"#000",onClose:null,onOpen:null,opacity:0.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,zIndex:9997}})(jQuery);

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
	initForms();
});
