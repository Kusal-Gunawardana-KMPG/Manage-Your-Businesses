<?php

require "connection.php";

$search_txt = $_POST["t"];
$category = $_POST["cat"];
$type = $_POST["type"];
$sort = $_POST["s"];

$query = "SELECT * FROM `service`";
$status = 0;



if (!empty($search_txt)) {
    $query .= " WHERE `title` LIKE '%" . $search_txt . "%'";
    $status = 1;
}

if ($category != 0 && $status == 0) {
    $query .= " WHERE `category_id`='" . $category . "'";
    $status = 1;
} else if ($category != 0 && $status != 0) {
    $query .= " AND `category_id`='" . $category . "'";
}

$pid = 0;
if ($type != 0) {
    $type_rs = Database::search("SELECT * FROM `service` WHERE `type_id`='" . $type . "'");
    $type_num = $type_rs->num_rows;
    for ($x = 0; $x < $type_num; $x++) {
        $type_data = $type_rs->fetch_assoc();
        $pid = $type_data["id"];
    }

    if ($status == 0) {
        $query .= "WHERE `type_id`= '" . $pid . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= "AND `type_id`='" . $pid . "'";
    }
}


if ($sort == 1) {
    $query .= "  ORDER BY `price` ASC";
    $status = 1;
} else if ($sort == 2) {
    $query .= "  ORDER BY `price` DESC";
    $status = 1;
}


if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 3;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>
    <?php

    $image_rs = Database::search("SELECT * FROM `image` WHERE `service_id`='" . $results_data["id"] . "'");
    $image_data = $image_rs->fetch_assoc();

    $type_rs = Database::search("SELECT service.type_id,type.name,service.status_id FROM `service` INNER JOIN `type` ON 
                                    service.type_id=type.id WHERE service.id='" .  $results_data["id"] . "' ");

    $type_data = $type_rs->fetch_assoc();

    ?>

    <div class="card col-lg-4 border-bottom border-start border-top border-end border-dark border-3 " style="border-radius: 15px;width: 18rem;">

        <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
        <div class="card-body ms-0 m-0 text-center">
            <h5 class="card-title fw-bold fs-4"><?php echo $results_data["title"]; ?></h5>
            <span class="card-text text-primary fs-5">Rs. <?php echo $results_data["price"]; ?> .00</span></br>
            <span class="card-text ui purple horizontal label"><?php echo $type_data["name"]; ?> Working</span>
            </br>




            <?php

            if ($type_data["status_id"] == 1) {

            ?>



                <span class="ui pointing red basic label fw-bold">Avaialable</span><br /></br>

                <a href='<?php echo "singleProductView.php?id=" . ($results_data["id"]); ?>' class="col-12 btn btn-success fw-bold">Book Now</a>

                <button class="col-12 btn btn-danger mt-2" onclick="addToInterested(<?php echo $results_data['id']; ?>);">
                    <i class="bi bi-star text-white fs-5"></i>
                </button>



            <?php

            } else {

            ?>


                <span class="ui pointing black basic label fw-bold disabled">Unavaialable</span><br /></br>

                <a href='<?php echo "singleProductView.php?id=" . ($results_data["id"]); ?>' class="col-12 btn btn-success disabled fw-bold">Book Now</a>

                <button class="col-12 btn btn-danger mt-2 disabled" onclick="addToInterested(<?php echo $results_data['id']; ?>);">
                    <i class="bi bi-star text-white fs-5"></i>
                </button>


            <?php

            }

            ?>



        </div>
    </div>

<?php
} 

?>


<div style="height: 10px;"></div>
<div class=" col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="advancedSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="advancedSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>