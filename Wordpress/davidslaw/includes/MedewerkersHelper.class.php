<?php

class MedewerkersHelper {

	private static $parentPageID = 13;

	public static function getMedewerkers() {
		return get_posts([
			'order' 			=> 'ASC',
			'orderby'			=> 'menu_order',
			'post_type'			=> 'page',
			'post_parent' 		=> MedewerkersHelper::$parentPageID,
			'posts_per_page' 	=> -1
		]);
	}

	public static function getSidebarMenu() 
	{
		$children = self::getMedewerkers();

		$advocaten   = [];
		$medewerkers = [];

		foreach ($children as $key => $child) 
		{
			$function = strtolower(get_field('functie', $child->ID));
			if($function === "partner" || $function === "advocaat")
			{
				$advocaten[] = $child;
			}
			else
			{
				$medewerkers[] = $child;
			}

			error_log(json_encode($function));
		}

		$advocat_menu_entries = "<div class='title'>".__('advocaten', 'davids')."</div>";
		foreach ($advocaten as $key => $advocat) 
		{
			//var_dump($advocat);
			$path = get_permalink($advocat->ID);
			$name = $advocat->post_title;

			$curr_entry = "<div class='row'><div class='col-xs-12'><a href='".$path."' class='employee-entry' data-employeeID='".$advocat->post_name."'>".ucwords(strtolower($name)).'</a></div></div>';
			$advocat_menu_entries .= $curr_entry;
		}

		$medewerker_menu_entries = "<div class='title pad-top-3'>".__('medewerkers')."</div>";
		foreach ($medewerkers as $key => $medewerker) 
		{
			$path = get_permalink($medewerker->ID);
			$name = $medewerker->post_title;

			$curr_entry = "<div class='row'><div class='col-xs-12'><a href='".$path."' class='employee-entry' data-employeeID='".$medewerker->post_name."'>".ucwords(strtolower($name)).'</a></div></div>';
			$medewerker_menu_entries .= $curr_entry;
		}

		return $advocat_menu_entries.$medewerker_menu_entries;
	}
}
