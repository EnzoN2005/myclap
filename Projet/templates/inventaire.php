<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php") {
    header("Location:../index.php?view=inventaire");
    die("");
}
?>
<section class="inventorySection">
    <h2 class="sectionTitle">Matériel disponible</h2>
    
    <div class="inventoryContainer" id="inventoryContainer"></div>
</section>