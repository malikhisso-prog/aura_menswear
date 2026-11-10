<?php
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json; charset=utf-8');

$action = $_POST['action'] ?? '';
$id  = (int)($_POST['id']  ?? 0);
$qty = (int)($_POST['qty'] ?? 1);

if ($action === 'add') {
    $product = getProductById($id);
    if (!$product) {
        echo json_encode(['success' => false, 'message' => 'المنتج غير موجود']);
        exit;
    }

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$id] = [
            'id'    => $id,
            'name'  => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'qty'   => $qty,
        ];
    }

    echo json_encode([
        'success' => true,
        'count'   => cartCount(),
        'message' => 'تمت إضافة المنتج إلى السلة',
    ]);
    exit;
}

if ($action === 'update') {
    if (isset($_SESSION['cart'][$id])) {
        if ($qty < 1) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['qty'] = $qty;
        }
    }
    echo json_encode(['success' => true, 'count' => cartCount()]);
    exit;
}

if ($action === 'remove') {
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    echo json_encode(['success' => true, 'count' => cartCount()]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'إجراء غير معروف']);