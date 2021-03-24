
<?php
foreach ($data as $data_item)
{
    $status = $data_item->loginstatus ? 'green' : 'red';
    echo $data_item->login . ' <i class="fa fa-user-circle " style="color:'.$status.'"></i>' .'<br>';
}
?>

