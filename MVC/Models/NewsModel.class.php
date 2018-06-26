<?php
namespace MVC\Models; 
// use
class NewsModel extends \MVC\Models\Model {
	public function getNews($params = array()) {
		$ret = array(); 
		$mysqli = \core\Db::getInstance(); 
		$where_section = "1"; 
		if ( ! empty($params)) {
			if (isset($params["id"])) {
// $where_section .= " AND id = '{$id}' ";
// $where_section .= " AND id = '".int($id)."' ";
// $where_section .= " AND id = '".intval($id)."' ";
				$where_section .= " AND id = '" . $mysqli -> escape_string($params["id"]) . "' "; 
			}
			if (isset($params["name"])) {
// $where_section .= " AND id = '{$id}' ";
// $where_section .= " AND id = '".int($id)."' ";
// $where_section .= " AND id = '".intval($id)."' ";
				$where_section .= " AND name LIKE '" . $mysqli -> escape_string($params["name"]) . "_%' "; 
			}
		}
		$query = "SELECT * FROM news WHERE {$where_section} LIMIT 0,10;"; 
// !!!! MYSQLI_USE_RESULT
		if ($res = $mysqli -> query($query)) {
			if ($res -> num_rows != 0) {
// if ($ret = $res->fetch_all())
// if ($row = $res->fetch_row(MYSQLI_ASSOC))
				while ($row = $res -> fetch_assoc()) {
					$ret[] = $row; 
// $mysqli->query("UPDATE ")
				}
			}
			$res -> close(); 
		}
		return $ret; 
	}
}?>