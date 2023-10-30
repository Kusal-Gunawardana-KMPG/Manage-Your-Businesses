<?php

require "connection.php";

$txt = $_POST["t"];

$query = "SELECT * FROM `service`";

if (!empty($txt)) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
}


if ("0" != ($_POST["page"])) {
    $pageno = $_POST["page"];
} else {
    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 3;
$number_of_pages = ceil($product_num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;
$selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

$selected_num = $selected_rs->num_rows;


?>

<?php

for ($x = 0; $x < $selected_num; $x++) {
    $selected_data = $selected_rs->fetch_assoc();


    $image_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $selected_data["id"] . "'");
    $image_data = $image_rs->fetch_assoc();



    $type_rs = Database::search("SELECT service.type_id,type.name,service.status_id FROM `service` INNER JOIN `type` ON 
                                    service.type_id=type.id WHERE service.id='" .  $selected_data["id"] . "' ");

    $type_data = $type_rs->fetch_assoc();



?>

    <div class="card col-lg-3 m-1 mt-1 mb-1 border-bottom border-start border-top border-end border-dark border-3 " style="border-radius: 15px;width: 18rem;">

        <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
        <div class="card-body ms-0 m-0 text-center">
            <h5 class="card-title fw-bold fs-4"><?php echo $selected_data["title"]; ?></h5>
            <span class="card-text text-primary fs-5">Rs. <?php echo $selected_data["price"]; ?> .00</span></br>
            <span class="card-text ui purple horizontal label"><?php echo $type_data["name"]; ?> Working</span>
            </br>




            <?php

            if ($type_data["status_id"] == 1) {

            ?>



                <span class="ui pointing red basic label fw-bold">Avaialable</span><br /></br>

                <a href='<?php echo "singleProductView.php?id=" . ($selected_data["id"]); ?>' class="col-12 btn btn-success fw-bold">Book Now</a>

                <button class="col-12 btn btn-danger mt-2" onclick="addToInterested(<?php echo $selected_data['id']; ?>);">
                    <i class="bi bi-star text-white fs-5"></i>
                </button>



            <?php

            } else {

            ?>


                <span class="ui pointing black basic label fw-bold disabled">Unavaialable</span><br /></br>

                <a href='<?php echo "singleProductView.php?id=" . ($selected_data["id"]); ?>' class="col-12 btn btn-success disabled fw-bold">Book Now</a>

                <button class="col-12 btn btn-danger mt-2 disabled" onclick="addToInterested(<?php echo $selected_data['id']; ?>);">
                    <i class="bi bi-star text-white fs-5"></i>
                </button>


            <?php

            }

            ?>



        </div>
    </div>

    </div>


<?php

}
?>

</div>

<div class="justify-content-center text-center align-content-center col-12">
    <div class=" offset-lg-3 offset-2 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                            } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link " onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                            } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>