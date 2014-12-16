<?php 
	require_once('db.php');
	include_once('rank.php');
	include_once('functions.php');

	$db = DataBase::getInstance();
	$projects = $db->query('SELECT * FROM project')->fetchAll();
	$types = $db->query('SELECT * FROM type')->fetchAll();
	foreach ($types as $t) {
		$types[$t['name']] = $t;
	}

	$variables = @$_POST['variables'];
	if(empty($variables))
		$variables = $db->query('SELECT * FROM variable')->fetchAll();
	
	// Ranking
	for ($i = 0; $i < count($projects); $i++) {
		$projects[$i]['rank'] = rank($projects[$i], $variables, $types);
		$projects[$i]['subrank'] = subrank($projects[$i], $variables, $types);
	}
	// Sorting
	function cmp_project($a, $b) {
		return ($a['rank'] < $b['rank']) ? 1 : -1;
	}
	usort($projects, 'cmp_project');

	// Export html
	echo '<div id="ranking">';
	for ($i = 0; $i < count($projects); $i++) {
		echo
		 '<div class="ranking_project" project_id="'.$projects[$i]['id'].'" project_clicked="no" >'.
			circularDisplay($projects[$i]['rank'], $projects[$i]['name'])
		.'</div>';
	}
	echo '</div>';

	echo '<div id="projects">';
	for ($i = 0; $i < count($projects); $i++) {
		$title =  $projects[$i]['name'];
		$labels = array();
		$values = array();
		foreach ($projects[$i]['subrank'] as $label => $value) {
			array_push($labels, $label);
			array_push($values, $value);
		}
		echo
		'<div id="project_details_'.$projects[$i]['id'].'" class="project_details" >'.
			radarGraph($title, $labels, $values)
		.'<hr /></div>';
	}
	echo '</div>';
?>