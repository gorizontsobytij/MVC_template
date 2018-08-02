<h1>Hello  indecs<?php //echo $data[0]; ?></h1>
<?php
foreach ($data as $value){
echo '<a href = "../../news/news/?page='.$value['id'].'">'.$value["title"].'</a>



';
}
?>



