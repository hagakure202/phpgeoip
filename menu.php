<html>
<head>
    <link rel='stylesheet' href="/style.css" type='text/css'/>

</head>

<body>
<?php
$categories = [
    ['id' => 1, 'name' => 'Одежда', 'parent_id' => 0],
    ['id' => 2, 'name' => 'Женская одежда', 'parent_id' => 1],
    ['id' => 3, 'name' => 'Мужская одежда', 'parent_id' => 1],
    ['id' => 4, 'name' => 'обувь', 'parent_id' => 2],
    ['id' => 5, 'name' => 'обувь', 'parent_id' => 3],
    ['id' => 6, 'name' => 'кеды', 'parent_id' => 5],
    ['id' => 7, 'name' => 'ботинки', 'parent_id' => 5],
    ['id' => 8, 'name' => 'туфли', 'parent_id' => 5],
    ['id' => 9, 'name' => 'туфли', 'parent_id' => 4],
    ['id' => 10, 'name' => 'платья', 'parent_id' => 2],
    ['id' => 11, 'name' => 'футболки', 'parent_id' => 2],
    ['id' => 12, 'name' => 'уход за обувью', 'parent_id' => 2],
];


function search_category_child(&$currCategory, $categories)
{

    $id = $currCategory['id'];
    $childs = [];

    foreach ($categories as $category) {
        if ($category['parent_id'] == $id) {
            search_category_child($category, $categories);
            $childs[] = $category;
        }
    }
    $currCategory['childs'] = $childs;
}


$treeCategory = [$categories[0]];

search_category_child($treeCategory[0], $categories);

//var_dump('<pre>', $treeCategory);


function echo_cat($currCategory, $treeCategory, $level = 0)
{

    if (empty($currCategory['childs'])) {
        return;
    }
    $childs = $currCategory['childs'];
    if ($level > 0) {
        echo '<ul class="submenu">';
    }
    foreach ($childs as $child) {
        $name = $child['name'];
        echo '<li><a href="">'.$name.'</a>';

//        for ($i = 0; $i < $level; $i++) {
//            echo '--';
//        }


        echo_cat($child, $treeCategory, $level + 1);
        echo '</li>';

    }
    if ($level > 0) {
        echo '</ul>';
    }
}


//echo_cat($treeCategory[0],$treeCategory);


//scan_dir("../");
//
//<nav>
//    <ul class="topmenu">
//        <li><a href="" class="active">Главная<span class="fa fa-angle-down"></span></a>
//            <ul class="submenu">
//                <li><a href="">меню второго уровня</a></li>
//                <li><a href="">меню второго уровня<span class="fa fa-angle-down"></span></a>
//                    <ul class="submenu">
//                        <li><a href="">меню третьего уровня</a></li>
//                        <li><a href="">меню третьего уровня</a></li>
//                        <li><a href="">меню третьего уровня</a></li>
//                    </ul>
//                </li>
//                <li><a href="">меню второго уровня</a></li>
//            </ul>
//        </li>
//        <li><a href="">Компания</a></li>
//        <li><a href="">Блог</a></li>
//        <li><a href="">Контакты</a></li>
//    </ul>
//</nav>
?>
<nav>
    <ul class="topmenu">
        <?php  echo_cat($treeCategory[0], $treeCategory); ?>
    </ul>
</nav>

</body>
</html>

<?php

function recursion($n){
    return recursion($n);
}