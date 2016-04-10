<?php
/**
 * @file baban.class.php
 * @package For legacy Cube Legacy 2.2
 * @version $Id: HappyNewYear.class.php ver0.02 2012/12/28  00:00:00 marine  $
 */

if (!defined('XOOPS_ROOT_PATH')) exit();

class HappyNewYear extends XCube_ActionFilter
{
	public function preBlockFilter()
	{
			$this->mRoot->mDelegateManager->add('Site.JQuery.AddFunction',array(&$this, 'addScript'));
	}

	public function addScript(&$jQuery)
	{
		$jQuery->addStylesheet('/common/HappyNewYear/hny.css', true);
		$jQuery->addLibrary('/common/HappyNewYear/jquery.easing.compatibility.js', true);
		$jQuery->addLibrary('/common/HappyNewYear/jquery.cookie.js', true);
    $jQuery->addScript('

jQuery(function() {
	countDown();
 });

 function countDown() {
 	var startTime = new Date();
 	//カウントダウンの終了期日を記入↓
    var endTime = new Date(\'January 1,2013, 00:00:00\');
    var diff  = endTime - startTime;
    var times = 24 * 60 * 60 * 1000;
    var day   = Math.floor(diff / times)
    var hour  = Math.floor(diff % times / (60 * 60 * 1000))
    var min   = Math.floor(diff % times / (60 * 1000)) % 60
    var sec   = Math.floor(diff % times / 1000) % 60 % 60
    var ms    = Math.floor(diff % times / 10) % 100
    if(diff > 0){
    } else {
			jQuery(function() {
						popUp();
			 });
    }
 }

 function popUp() {
		//クッキーを有効にする場合は、下記の記述をコメントアウトして下さい。（//を先頭に追加）
    jQuery.cookie("access_site","you", { expires: -1 });

    if(jQuery.cookie("access_site")){//accessの値がある場合
    }else{//クッキーの値が無い場合
			jQuery(\'<div id="hny"><img src="/common/HappyNewYear/hny.png" /></div>\').appendTo(\'body\').css({height: "1px", width:"1px", position: "absolute", "z-index": 9999, left: "100%", top: "100%"}).animate(
			{
				// height:"100%",
				height:jQuery(document).height(),
				width:"100%",
				left: 0,
				 top: 0
			},
			{
				duration: 2000,
				easing: \'easeOutBounce\'
			},
				\'slow\');
	    jQuery(\'#hny\').click(function() {
					// alert("てへっ");
	        jQuery(\'#hny\' ).animate(
					{
						height:"0%",
						width:"0%",
						left: 0,
						 top: 0
					},
	            {
	                duration: 2000,
	                easing: \'easeOutBounce\',
	                complete: function() { jQuery(\'#hny\').remove() }
	            }
	        );
	    } );
    }
    jQuery(window).load(function(){
        //access_siteというキーで適当な値をcookieに保存。364日間有効
        jQuery.cookie("access_site","you", { expires: 364 });
    })
	}
		');
	}
//class END
}
?>
