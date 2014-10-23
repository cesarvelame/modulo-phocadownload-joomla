<?php
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select($db->quoteName(array('id', 'catid', 'title')));
$query->from($db->quoteName('#__phocadownload'));
$query->where($db->quoteName('published') . ' = '. $db->quote('1'));
$query->order($db->quoteName('publish_up').' desc'); 
$query->setLimit(5);
$db->setQuery($query);
$rows = $db->loadObjectList();
?>
<ul class="latestnews">
<?php
foreach( $rows as $row ) {
$file = "<li><a href=".JURI::base()."index.php?option=com_phocadownload&view=category&download=".$row->id."&id=".$row->catid.">".$row->title."</a></li>";
echo $file;
}
?>
</ul>