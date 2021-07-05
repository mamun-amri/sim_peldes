<?php 
$string = "
<div class=\"page-header\"><h1>Form ".  ucwords($table_name)."</h1></div>
<div class=\"row\">
	<div class=\"col-xs-12\">
<form class=\"form-horizontal\" action=\"<?php echo \$action; ?>\" method=\"post\">
<table class='table table-bordered'>";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "   
	<tr>
	<td width=\"200\">".$row["column_name"]."<?php echo form_error('".$row["column_name"]."') ?></td>
	<td><textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
	</td>
	</tr>";
    }elseif($row["data_type"]=='email'){
        $string .= "
	<tr>
	<td width=\"200\">".$row["column_name"]."<?php echo form_error('".$row["column_name"]."') ?></td>
	<td><input type=\"email\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
	</td>
	</tr>";   
    }
    elseif($row["data_type"]=='date'){
        $string .= "
		<tr>
		<td width=\"200\">".$row["column_name"]."<?php echo form_error('".$row["column_name"]."') ?></td>
		<td><input type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
		</td>
	</tr>";   
        } 
    else
    {
    $string .= "
	<tr>
		<td width=\"200\">".$row["column_name"]."<?php echo form_error('".$row["column_name"]."') ?></td>
		<td><input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
		</td>
	</tr>";  
    }
}
$string .= "
<tr>
<td></td>
			<td><input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "<button type=\"submit\" class=\"btn btn-danger\"><i class=\"fa fa-floppy-o\"></i> <?php echo \$button ?></button>&nbsp; &nbsp; &nbsp;";
$string .= "<a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-info\"><i class=\"fa fa-sign-out\"></i> Kembali</a>
		</td>";
$string .= "
</tr>
</table>
</form>
	</div>
</div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>