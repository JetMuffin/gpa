<?php 
	header("Content-type: text/html; charset=utf-8"); 
	function getTags($gpa)
	{
		$tags = Array(
			0 => Array(
				"color" => "red",
				"word" => "学神"	
			),
			1 => Array(
				"color" => "green",
				"word" => "学霸"
			),
			2 => Array(
				"color" => "teal",
				"word" => "中规中矩"
			),
			3 => Array(
				"color" => "yellow",
				"word" => "奋斗中"
			),
			4 => Array(
				"color" => "black",
				"word" => "神一般的存在"
			),				
			5 => Array(
				"color" => "orange",
				"word" => "我很努力"
			),
			6 => Array(
				"color" => "purple",
				"word" => "还需要加油"
			),
			7 => Array(
				"color" => "blue",
				"word" => "追赶中"
			),
			8 => Array(
				"color" => "teal",
				"word" => "还有谁？"
			),
			9 => Array(
				"color" => "yellow",
				"word" => "再不努力就老了"
			),
			10 => Array(
				"color" => "blue",
				"word" => "上升中"
			),
			11 => Array(
				"color" => "teal",
				"word" => "就要接近天空"
			),
			12 => Array(
				"color" => "purple",
				"word" => "潜力股"
			),
		);
		$stu_tags = Array();
		if($gpa > 4.9)
			array_push($stu_tags, $tags[0],$tags[4],$tags[8]);
		else if($gpa > 4.3)
			array_push($stu_tags, $tags[1],$tags[10],$tags[11]);
		else if($gpa > 3.8)
			array_push($stu_tags, $tags[2],$tags[3],$tags[12]);
		else if($gpa > 3.0)
			array_push($stu_tags, $tags[5],$tags[7],$tags[6]);
		else
			array_push($stu_tags, $tags[3],$tags[6],$tags[9]);
		return $stu_tags;
	}
 ?>