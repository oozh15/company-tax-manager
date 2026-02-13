<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CorpTax - Expense Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">CorpTax Pro</a>
        <div class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="/expenses">My Expenses</a>
                <a class="nav-link" href="/logout">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="/login">Login</a>
                <a class="nav-link" href="/signup">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">