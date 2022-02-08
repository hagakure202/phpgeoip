
function scan_dir($dir, $level = 1)
{

$files = scandir($dir, SCANDIR_SORT_ASCENDING);

foreach ($files as $file) {
if ($file == '..' || $file == '.') {
continue;
}
$output = '<span>'.$file.'</span>';
$path = $dir.'/'.$file;
if (is_dir($path)) {
$output = '<span style="color:green">'.$file.'</span>';
}
for ($i = 0; $i < $level; $i++) {
echo '--';
}
echo $output.'<br>';

if (is_dir($path)) {

scan_dir(realpath($path), $level + 1);
}

}
}

//scan_dir("../");