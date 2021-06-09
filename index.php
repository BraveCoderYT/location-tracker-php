<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
    if (!isset($_POST["submit"])) {
        $ip_address = $_SERVER["REMOTE_ADDR"];
    }else {
        $ip_address = $_POST["ip"];
    }

    $data = file_get_contents("http://ip-api.com/json/{$ip_address}?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,query");
    $row = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Track user location - Brave Coder</title>
</head>
<body>
    
    <div class="container wrapper my-5">
        <h2 class="title text-center mb-4">Find user location using ip address</h2>
        <form action="" method="post" class="from shadow p-4 bg-white">
            <div class="mb-3">
                <label class="form-label" for="ip">Ip Address</label>
                <input type="text" class="form-control" name="ip" id="ip" value="<?php echo $ip_address; ?>" placeholder="Enter your ip address" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Search</button>
        </form>

        <div class="content my-5 shadow p-4 bg-white">
            <div class="d-flex">
                <b>IP Address:</b> <p><?php echo $row["query"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Country:</b> <p><?php echo $row["country"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Country Code:</b> <p><?php echo $row["countryCode"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Region Name:</b> <p><?php echo $row["regionName"]; ?></p>
            </div>
            <div class="d-flex">
                <b>City:</b> <p><?php echo $row["city"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Zip Code:</b> <p><?php echo $row["zip"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Timezone:</b> <p><?php echo $row["timezone"]; ?></p>
            </div>
            <div class="d-flex">
                <b>Currency:</b> <p><?php echo $row["currency"]; ?></p>
            </div>
            <div class="d-flex">
                <b>ISP</b> <p><?php echo $row["isp"]; ?></p>
            </div>
            <div class="d-flex">
                <b>ORG:</b> <p><?php echo $row["org"]; ?></p>
            </div>
        </div>
    </div>

    <!-- Boostrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>