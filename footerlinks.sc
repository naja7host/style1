global $sql;

$footerlinks = "<div class='row footer-blocks '>
					<ul >";
// Get all news categories sorted by their id
$sql->db_Select("news_category", "*", "order by category_id", "no_where");

while($row = $sql->db_Fetch() )
	{
		$footerlinks .= "<li ><a href='" . e_HTTP . "news.php?cat." . $row['category_id'] . "' >" . $row['category_name'] . "</a></li>";
	}		
$footerlinks .= "	</ul>
				</div>";
   
   
return $footerlinks ;
