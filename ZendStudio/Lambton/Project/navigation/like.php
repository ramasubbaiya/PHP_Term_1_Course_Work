<?php
if (isset($_GET['type'], $_GET['like'])) {
    $type = $_GET['type'];
    $id = $_GET['like'];
    // echo $_GET['type'];
    switch ($type) {
        case 'art':
            $conn->query("
                INSERT INTO like_table(luser,car)
                                SELECT {$_SESSION['user_id']},{$id}
                                FROM  cart_like
                                WHERE EXISTS(
                                    SELECT id
                                    FROM  cart_like
                                    WHERE id={$id})
                                AND NOT EXISTS(
                                        SELECT id
                                        FROM like_table
                                        WHERE luser = {$_SESSION['user_id']}
                                        AND car ={$id})
                              LIMIT 1  
                ");
            break;
    }
}

header('location:index.php?page=cart');