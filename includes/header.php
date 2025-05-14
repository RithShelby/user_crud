<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">CRUD App</a>
        <div>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? ' active' : '' ?>" href="index.php">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? ' active' : '' ?>" href="about.php">About Me</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
