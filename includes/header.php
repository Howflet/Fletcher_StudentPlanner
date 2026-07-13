<?php
/* -----------------------------------------------------------
   MindSpace — Shared Header
   Includes: doctype, head, sticky nav with CSS-only hamburger
   Usage: Set $currentPage and $pageTitle before including.
   ----------------------------------------------------------- */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MindSpace — A digital wellness and mental health platform for college students. Access resources, journal your mood, and find support.">
    <meta name="author" content="Howard Fletcher, Sakib Jamal">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' — MindSpace' : 'MindSpace — Digital Wellness' ?></title>

    <!-- Google Fonts: DM Serif Display (display) + Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Accessibility: Skip-to-content link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <header class="site-header" role="banner">
        <div class="container nav-container">
            <!-- Brand -->
            <a href="index.php" class="logo" aria-label="MindSpace — return to homepage">
                <span class="logo-icon" aria-hidden="true">🍃</span>
                <span class="logo-text">MindSpace</span>
            </a>

            <!-- CSS-only hamburger toggle (no JavaScript) -->
            <input type="checkbox" id="nav-toggle" class="nav-toggle-checkbox" aria-hidden="true">
            <label for="nav-toggle" class="nav-toggle-label" aria-label="Toggle navigation menu">
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </label>

            <!-- Primary navigation -->
            <nav class="main-nav" role="navigation" aria-label="Main navigation">
                <ul class="nav-list">
                    <li><a href="index.php" class="nav-link <?= ($currentPage ?? '') === 'home' ? 'active' : '' ?>" <?= ($currentPage ?? '') === 'home' ? 'aria-current="page"' : '' ?>>Home</a></li>
                    <li><a href="planner.php" class="nav-link <?= ($currentPage ?? '') === 'planner' ? 'active' : '' ?>" <?= ($currentPage ?? '') === 'planner' ? 'aria-current="page"' : '' ?>>Planner</a></li>
                    <li><a href="resources.php" class="nav-link <?= ($currentPage ?? '') === 'resources' ? 'active' : '' ?>" <?= ($currentPage ?? '') === 'resources' ? 'aria-current="page"' : '' ?>>Resources</a></li>
                    <li><a href="journal.php" class="nav-link <?= ($currentPage ?? '') === 'journal' ? 'active' : '' ?>" <?= ($currentPage ?? '') === 'journal' ? 'aria-current="page"' : '' ?>>Journal</a></li>
                    <li><a href="about.php" class="nav-link <?= ($currentPage ?? '') === 'about' ? 'active' : '' ?>" <?= ($currentPage ?? '') === 'about' ? 'aria-current="page"' : '' ?>>About</a></li>
                </ul>
            </nav>
        </div>
    </header>
