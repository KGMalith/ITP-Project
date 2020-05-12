<?php
    include 'dbconnect.php';

    if(isset($_POST['updatepaddystock'])){

        $stokID = mysqli_real_escape_string($con,$_POST['skID']);
        $ItemID = mysqli_real_escape_string($con, $_POST['itemName']);
        $Date = mysqli_real_escape_string($con, $_POST['initdate']);
        $Quantity = mysqli_real_escape_string($con, $_POST['quantity']);
        $Descrip = mysqli_real_escape_string($con, $_POST['des']);

        if (empty($ItemID)) {
            header("Location: ../Item/Stock/addPaddyStockDetails.php?error=emptyitem&stockid=". $stokID. "&itemid=".$ItemID. "&date=".$Date. "&quantity=".$Quantity. "&descrp=".$Descrip);
            exit();
        }

        if (empty($Quantity)) {
            header("Location: ../Item/Stock/addPaddyStockDetails.php?error=emptyquan&stockid=" . $stokID . "&itemid=" . $ItemID . "&date=" . $Date . "&quantity=" . $Quantity . "&descrp=" . $Descrip);
            exit();
        }

        $sql = "SELECT itemID FROM paddystock WHERE itemID='" . $itemid . "' AND p_ID != '". $stokID."'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            header("Location: ../Item/Stock/addPaddyStockDetails.php?error=ItemTaken&stockid=" . $stokID . "&itemid=" . $ItemID . "&date=" . $Date . "&quantity=" . $Quantity . "&descrp=" . $Descrip);
            exit();
        }

        $sql = "UPDATE paddystock SET itemID= '$ItemID',initDate='$Date',quantity='$Quantity',Descrp='$Descrip' WHERE p_ID='". $stokID."'";
        $result = mysqli_query($con,$sql);
        if($result){
            header("Location: ../Item/Stock/addPaddyStockTable.php?Update=Success");
            exit();
        }else{
            header("Location: ../Item/Stock/addPaddyStockTable.php?error=SQLError");
            exit();
        }
    }

?>