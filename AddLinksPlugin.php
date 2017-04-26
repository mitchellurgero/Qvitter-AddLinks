<?php
/*
Add Links to Qvitter's Menu bar
Built by: Mitchell Urgero (@loki@urgero.org) <info@urgero.org>
*/

if (!defined('STATUSNET')) {
    exit(1);
}
class AddLinksPlugin extends Plugin
{
	public function initialize()
    {
    	return true;
    }
    static function settings($setting)
	{
		$settings['links'] = null;
		// config.php settings override the settings in this file
		$configphpsettings = common_config('site','AddLinks') ?: array();
		foreach($configphpsettings as $configphpsetting=>$value) {
			$settings[$configphpsetting] = $value;
		}
		if(isset($settings[$setting])) {
			return $settings[$setting];
		}
		else {
			return false;
		}
	}
	//From QvitterPlus
	function onQvitterEndShowScripts($input){
		if(static::settings("links") != false && count(static::settings("links")) > 0){
		?>
			<script>
				//Custom menu
				var menuInnerHtml = "";
				<?php
					$buffer = "";
					$custommenu = static::settings("links");
					foreach($custommenu as $button){
						$buffer .= "<a href='".$button['href']."' title='".$button['title']."' target='_blank'>".$button['label']."<i class='chev-right'></i></a>";
					}
					print "var menuInnerHtml=\"".$buffer."\";";
				?>
				$(document).ready(function(){
					var container = "<div class='menu-container' id='custom-menu'></div>";
					$("#clear-history").after(container);
					$("#custom-menu").append(menuInnerHtml);
				});
			</script>
		<?php
		}
	}
	 function onEndPersonalGroupNav(Menu $menu, Profile $target, Profile $scoped=null)
    {
        $custommenu = static::settings("links");
		foreach($custommenu as $button){
			$menu->menuItem($button['href'],$button['label'],$button['title'],false,"ID");
		}
        return true;
    }
}


?>
