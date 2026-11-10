<?php
if (!defined('AURA_WEBSITE')) {
    define('AURA_WEBSITE', true);
}

define('SITE_NAME', 'AURA');
define('SITE_TAGLINE', 'Old Money Elegance');
define('SITE_URL', 'http://localhost/aura-website');
define('SITE_EMAIL', 'concierge@aura-menswear.com');
define('SITE_PHONE', '+44 20 7946 0123');

define('CURRENCY', '$');
define('FREE_SHIPPING_THRESHOLD', 500);

date_default_timezone_set('Europe/London');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getProducts(): array {
    $file = __DIR__ . '/../data/products.json';
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    return $data['products'] ?? [];
}

function getProductById(int $id): ?array {
    foreach (getProducts() as $product) {
        if ((int)$product['id'] === $id) return $product;
    }
    return null;
}

function getFeaturedProducts(int $limit = 3): array {
    $featured = array_filter(getProducts(), fn($p) => !empty($p['featured']));
    return array_slice($featured, 0, $limit);
}

function clean(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function formatPrice(float $price): string {
    return CURRENCY . number_format($price, 0, '.', ',');
}

function url(string $path = ''): string {
    return SITE_URL . '/' . ltrim($path, '/');
}

function isActive(string $page): string {
    $current = basename($_SERVER['PHP_SELF']);
    return ($current === $page) ? 'active' : '';
}

function cartCount(): int {
    if (empty($_SESSION['cart'])) return 0;
    return array_sum(array_column($_SESSION['cart'], 'qty'));
}

function cartTotal(): float {
    if (empty($_SESSION['cart'])) return 0;
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['qty'];
    }
    return $total;
}