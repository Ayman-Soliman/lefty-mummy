<?php
// Database connection parameters
$host = "localhost";
$db_name = "leftpsno_lm_ecom";
$username = "leftpsno_lefty-mummy";
$password = "omar-hamza-ali-2011-2015-2019";

// Website URL
$base_url = "https://lefty-mummy.com/";

// Connect to MySQL database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to get URLs for products and posts
function getUrls($pdo, $table, $id_column, $url_path) {
    $urls = [];
    $stmt = $pdo->prepare("SELECT $id_column FROM $table");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $urls[] = $GLOBALS['base_url'] . $url_path . $row[$id_column];
    }
    return $urls;
}

// Get all URLs for products and posts 
// https://lefty-mummy.com/product.php?prod_id=1&slug=Personalized_Alphabet_Gift_Box_Design_Set_-_30x40_cm_with_8_cm_Height
// https://lefty-mummy.com/post.php?post_id=1&slug=The%20Ultimate%20Guide%20to%20Choosing%20Laser%20Cut%20Gift%20Designs%20for%20Special%20Occasions
$product_urls = getUrls($pdo, 'products', 'id', 'product.php?prod_id=');
$post_urls = getUrls($pdo, 'posts', 'id', 'post.php?post_id=');
$post_urls = getUrls($pdo, 'apparel', 'id', 'apparel.php?store_id=');

// Combine all URLs
$all_urls = array_merge($product_urls, $post_urls);

// Sitemap XML Header
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Add each URL to the sitemap
foreach ($all_urls as $url) {
    $sitemap .= '<url>';
    $sitemap .= '<loc>' . htmlentities($url) . '</loc>';
    $sitemap .= '<changefreq>daily</changefreq>'; // Change frequency (adjust as needed)
    $sitemap .= '<priority>0.8</priority>'; // Priority (adjust as needed)
    $sitemap .= '</url>';
}

$sitemap .= '</urlset>';

// Save the sitemap to sitemap.xml
file_put_contents("sitemap.xml", $sitemap);

echo "Sitemap generated successfully!";
?>
