<?php 
$string = "
<div class=\"page-header\"><h1>Detail Data ".  ucwords($table_name)."</h1></div>
<div class=\"row\">
	<div class=\"col-xs-12\">
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td width=\"25%\">".label($row["column_name"])."</td><td width=\"1%\">:</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
	</div>
</div>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>