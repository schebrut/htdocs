<?php foreach ($data as $message):?>
  <?php   $date= date('d.m.Y H:m:s', $message->messagetime);?>
    <tr>
        <td><b><?=$message->user?></b> - <?=$date?> <br><?=$message->message?></td>
    </tr>
<?php endforeach;?>

