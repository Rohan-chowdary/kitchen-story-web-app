<!-- HEADER -->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(isset($titleSeoHeader) && !empty($titleSeoHeader)): ?>
<title><?php echo echoOutput($titleSeoHeader); ?></title>
<?php endif; ?>
<body>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.ts  {border-collapse:collapse;border-spacing:10px;}
.tg td, .ts td{border-color:black;border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th, .ts th{border-color:black;border-style:solid;border-width:0px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0pky, .ts .ts-0pky{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-1pky, .ts .ts-0pky{border-color:inherit;text-align:left;vertical-align:top;}
p{margin: 0}
.section-title{margin: 5px 0;}
.info-title{margin-bottom: 8px; margin-left: 8px;}
.info-subtitle{margin-left: 8px;}
</style>

<table class="tg" style="table-layout: fixed; width: 100%">
<colgroup>
<col style="width: 28px">
<col style="width: 22px">
</colgroup>
<thead>
  <tr>
    <th class="tg-0pky"></th>
    <th class="tg-0pky"><img src="<?php echo $urlPath->image($theme['th_logo']); ?>" style="width: 100%; max-width: 150px"/></th>
    <th class="tg-0pky"></th>
  </tr>
</thead>
</table>

<table class="tg" style="table-layout: fixed; width: 100%;margin-bottom: 20px;">
<thead>
  <tr>
    <th class="tg-0pky">
    	<h2 style="margin-bottom: 8px"><?php echo echoOutput($itemDetails['recipe_title']); ?></h2>
    	<p style="color: #666; margin: 0"><?php echo echoOutput($itemDetails['author_name']); ?> · <?php echo formatDate($itemDetails['recipe_created']); ?></p>
    </th>
  </tr>
</thead>
</table>

<table class="ts" style="table-layout: fixed; width: 100%;">
<colgroup>
<col style="width: 28px">
<col style="width: 22px">
</colgroup>
<thead>
  <tr>
    <th class="ts-1pky"><img src="<?php echo $urlPath->image($itemDetails['recipe_image']); ?>" style=" border-radius: 8px; width: 100%; max-width: 350px"/></th>
    <th class="ts-1pky">

<table class="tg">
<tbody>

  <tr>
    <td class="tg-0lax">
    	<p class="info-title"><b><?php echo echoOutput($translation['tr_16']); ?></b></p>
		<p class="info-subtitle"><?php echo echoOutput($itemDetails['recipe_time']); ?></p>
    </td>
  </tr>

  <tr>
    <td class="tg-0lax">
    	<p class="info-title"><b><?php echo echoOutput($translation['tr_17']); ?></b></p>
		<p class="info-subtitle"><?php echo echoOutput($itemDetails['difficult_title']); ?></p>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">
    	<p class="info-title"><b><?php echo echoOutput($translation['tr_18']); ?></b></p>
		<p class="info-subtitle"><?php echo echoOutput($itemDetails['recipe_servings']); ?></p>
    </td>
  </tr>
</tbody>
</table>

    </th>
  </tr>
</thead>
</table>

<table class="tg">
	<tr>
		<td>
    	<p class="section-title"><b>Description</b></p>
		</td>
	</tr>	
	<tr>
		<td>
    	<p><?php echo echoOutput($itemDetails['recipe_description']); ?></p>
		</td>
	</tr>
</table>

<table class="tg">
	<tr>
		<td>
    	<p class="section-title"><b><?php echo echoOutput($translation['tr_19']); ?></b></p>
		</td>
	</tr>	
	<tr>
		<td>
		<?php foreach ($ingredients as $key => $ing): ?>
		<p style="margin-bottom: 5px;"><b style="margin-right: 8px;font-family: DejaVu Sans;">&mdash;</b> <?php echo $ing; ?></p>
		<?php endforeach ?>
		</td>
	</tr>
</table>


<table class="tg">
	<tr>
		<td>
    	<p class="section-title"><b><?php echo echoOutput($translation['tr_20']); ?></b></p>
		</td>
	</tr>	
	<tr>
		<td>
		<ul style=" margin: 0px; padding-left: 20px; list-style: decimal;">
		<?php foreach ($instructions as $key => $ing): ?>
		<li style="margin-bottom: 10px;">
		<p><?php echo $ing; ?></p>
		</li>
		<?php endforeach ?>
		</ul>
		</td>
	</tr>
</table>


</body>
</html>