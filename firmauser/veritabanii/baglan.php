<?php 
try{

    $db=new PDO("mysql:host=localhost;dbname=ziyaretciaractakip",'root','');
    // echo "basarılı";

}
catch (PDOExpception $e){
    echo $e->getMessage();
}

?>


