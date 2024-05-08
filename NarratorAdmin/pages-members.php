@ -149,23 +149,23 @@
    GROUP BY HOUR(dateCreated)
    ORDER BY HOUR(dateCreated)";

$stmtHourlyBills = mysqli_prepare($link, $sqlHourlyBills);
mysqli_stmt_execute($stmtHourlyBills);
$resultHourlyBills = mysqli_stmt_get_result($stmtHourlyBills);
    $stmtHourlyBills = mysqli_prepare($link, $sqlHourlyBills);
    mysqli_stmt_execute($stmtHourlyBills);
    $resultHourlyBills = mysqli_stmt_get_result($stmtHourlyBills);

// Initialize array to hold combined hourly bills for 24 hours
$combinedHourlyBills = array_fill(0, 24, 0);
    // Initialize array to hold combined hourly bills for 24 hours
    $combinedHourlyBills = array_fill(0, 24, 0);

while ($row = mysqli_fetch_assoc($resultHourlyBills)) {
    $hour = intval($row['hour']);
    $count = intval($row['scshotCount']);
    $combinedHourlyBills[$hour] = round($count * $screenshot_cost, 2); // Assuming $screenshot_cost is defined
}
    while ($row = mysqli_fetch_assoc($resultHourlyBills)) {
        $hour = intval($row['hour']);
        $count = intval($row['scshotCount']);
        $combinedHourlyBills[$hour] = round($count * $screenshot_cost, 2); // Assuming $screenshot_cost is defined
    }

$hourLabels = [];
for ($i = 0; $i < 24; $i++) {
    $hourLabels[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ":00"; // Format labels as 00:00, 01:00, etc.
}
    $hourLabels = [];
    for ($i = 0; $i < 24; $i++) {
        $hourLabels[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ":00"; // Format labels as 00:00, 01:00, etc.
    }

?>

@ -298,7 +298,7 @@ for ($i = 0; $i < 24; $i++) {
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Monthly Screenshot Bills</h5>
                    <h5 class="card-title">Monthly Bills</h5>
                    <div id="barChart"></div>
                </div>
            </div>
