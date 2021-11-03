window.onload = function() {
    console.log("click");
    // isInDiv('click','righttttt');
};

function post_Memu_Show(){
	var $thiscell = $('.card');
	if ($thiscell.hasClass('is-collapsed')){
		$thiscell.removeClass('is-collapsed').addClass('is-expanded');
	}else{
		$thiscell.removeClass('is-expanded').addClass('is-collapsed');
	}
}