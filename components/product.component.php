<div class="page">
    <div class="header">
        <div class="headline">
            Inventar
        </div>
        <div class="subtitle">
            Betrachten Sie im folgenden eine Auswertung ihres Inventars.
        </div>
    </div>
    <div class="content">
        <?php
            require_once "./core/functions.php";
            
            $products = get_products();

            $productNames = array();
            $productCounts = array();
            $productColors = array();
            $productColorsBg = array();

            foreach ($products as $key => $value) {
                $rgbColor = array();
                foreach(array("r", "g", "b") as $color){
                    $rgbColor[$color] = mt_rand(0, 255);
                }

                $color = "rgb(".implode(",", $rgbColor).")";
                $color2 = "rgba(".implode(",", $rgbColor).",.3)";

                array_push($productNames, $value['name']);
                array_push($productCounts, $value['qty_available']);
                array_push($productColors, $color);
                array_push($productColorsBg, $color2);

                echo ("
                    <div class='entry'>
                        <div class='image'>
                            <img src='data:image/png;base64,$value[image_128]'/>
                        </div>
                        <div class='content'>
                            <div class='headline'>
                                $value[name]
                            </div>
                            <div class='subtitle'>
                                $value[qty_available] Stück im Lager
                            </div>
                            <div class='material-icons color' style='color: $color;'>lens</div>
                        </div>
                    </div>
                ");
            }

            echo("
                <div class='chart-entry'>
                    <canvas id='product-bar-chart'></canvas>
                </div>
            ");
        ?>
    </div>
</div>
<script>
    new Chart(document.getElementById("product-bar-chart").getContext("2d"), {
        type: "horizontalBar",
        data: {
            labels: <?php echo json_encode($productNames );?>,
            datasets: [{
                label: "Anzahl an Produkten",
                borderWidth: 2,
                borderColor: <?php echo json_encode($productColors );?>,
                backgroundColor: <?php echo json_encode($productColorsBg );?>,
                data: <?php echo json_encode($productCounts );?>
            }]
        },
        options: {
            legend: {
                display: true,
                position: "bottom"
            },
            title: {
                display: true,
                text: 'Anzahl an Produkten'
            }
        }
    });
</script>