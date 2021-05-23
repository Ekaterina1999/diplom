<? if (isset($_GET['submit'])) {
                    $action = $_GET['action'];
                    $search = $_GET['order_user'];
                    $p_from = $_GET['data_from'];
                    $p_to = $_GET['data_to'];
                    $method = $_GET['method'];
                    if($_GET['order_user'] !== "") {
                        $sql = "SELECT * FROM `ktg_base` WHERE CONCAT(  `name` ,  `order_user` ,  `organizator` ,  `method` ,  `data_from` ,  `data_to` ,  `status` ) LIKE '%".$search."%'";
                    } else {
                        $fields = array('method', 'data_from', 'data_to');
                        $conditions = array();
                        foreach ($fields as $field) {
                            if (isset($_GET[$field]) && $_GET[$field] != '' && $_GET[$field] != '0') {
                                $conditions[] = "`$field` LIKE '%" . $_GET[$field] . "%'";
                            }
                        }
                        $sql = "SELECT * FROM `ktg_base`";
                        if (count($conditions) > 0) {
                            $sql .= "WHERE " . implode(' AND ', $conditions);
                        }
                    }
                } else {
                    $sql = "SELECT * FROM `ktg_base` WHERE del = 0";
                }
				?>