
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MindSpace — A digital wellness and mental health platform for college students. Access resources, journal your mood, and find support.">
    <meta name="author" content="Howard Fletcher, Sakib Jamal">
    <title>Home — MindSpace</title>

    <!-- Google Fonts: DM Serif Display (display) + Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Skip-to-content link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <header class="site-header" role="banner">
        <div class="container nav-container">
            <!-- Brand -->
            <a href="index.php" class="logo" aria-label="MindSpace — return to homepage">
                <span class="logo-icon" aria-hidden="true">🍃</span>
                <span class="logo-text">MindSpace</span>
            </a>

            <!-- CSS-only hamburger toggle -->
            <input type="checkbox" id="nav-toggle" class="nav-toggle-checkbox" aria-hidden="true">
            <label for="nav-toggle" class="nav-toggle-label" aria-label="Toggle navigation menu">
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </label>

            <!-- Primary navigation -->
            <nav class="main-nav" role="navigation" aria-label="Main navigation">
                <ul class="nav-list">
                    <li><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
                    <li><a href="planner.php" class="nav-link " >Planner</a></li>
                    <li><a href="resources.php" class="nav-link " >Resources</a></li>
                    <li><a href="journal.php" class="nav-link " >Journal</a></li>
                    <li><a href="about.php" class="nav-link " >About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-content">

        <!-- DAILY TIP -->
        <section class="section" aria-label="Daily wellness tip">
            <div class="container">
                <div class="tip-banner">
                    <p class="tip-label">Today's Wellness Tip</p>
                    <p class="tip-text">Start your day with five minutes of mindful breathing. Your mind will thank you.</p>
                </div>
            </div>
        </section>

        <!-- HERO: BREATHING -->
        <section class="hero" aria-label="Welcome">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Your mind deserves a moment.</h1>
                        <p>MindSpace is a student wellness hub built by GSU students who understand the pressure. Check in with yourself, explore curated resources, and take small steps toward feeling better.</p>
                        <p style="margin-top: var(--space-sm);"><a href="planner.php" class="btn-primary">Open Your Planner →</a></p>
                                            </div>

                    <!-- CSS-only breathing animation -->
                    <div class="breathing-wrapper">
                        <div class="breathing-circle" role="img" aria-label="Animated breathing exercise circle — breathe in for 4 seconds, breathe out for 4 seconds">
                            <div class="breathing-ring-glow"></div>
                            <div class="breathing-ring-outer"></div>
                            <div class="breathing-ring"></div>
                            <span class="breathe-text breathe-in">Breathe in</span>
                            <span class="breathe-text breathe-out">Breathe out</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============== MOOD QUICK-CHECK ==================== -->
        <section class="section" aria-label="Quick mood check">
            <div class="container">
                <div class="mood-quick">
                    <h2>How are you feeling right now?</h2>
                    <form action="journal.php" method="post" class="mood-quick-form">
                        <input type="hidden" name="from_quick" value="1">
                        <div class="mood-options" role="radiogroup" aria-label="Select your current mood">
                            <input type="radio" name="mood" id="qm-great" value="great" class="mood-radio" required>
                            <label for="qm-great" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😊</span>
                                <span class="mood-label">Great</span>
                            </label>

                            <input type="radio" name="mood" id="qm-good" value="good" class="mood-radio">
                            <label for="qm-good" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">🙂</span>
                                <span class="mood-label">Good</span>
                            </label>

                            <input type="radio" name="mood" id="qm-ok" value="ok" class="mood-radio">
                            <label for="qm-ok" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😐</span>
                                <span class="mood-label">OK</span>
                            </label>

                            <input type="radio" name="mood" id="qm-low" value="low" class="mood-radio">
                            <label for="qm-low" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😔</span>
                                <span class="mood-label">Low</span>
                            </label>

                            <input type="radio" name="mood" id="qm-struggling" value="struggling" class="mood-radio">
                            <label for="qm-struggling" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😞</span>
                                <span class="mood-label">Struggling</span>
                            </label>
                        </div>
                        <button type="submit" class="btn-primary">Start Journal Entry →</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- ============= FEATURED RESOURCES =================== -->
        <section class="section section-sage featured-resources" aria-label="Featured resources">
            <div class="container">
                <h2 class="text-center">Featured Resources</h2>
                <p class="text-center" style="color:#666; margin-bottom:var(--space-lg);">Curated tools and guides for common student wellness challenges.</p>
                <div class="resource-grid">
                                        <article class="resource-card cat-anxiety">
                        <span class="resource-type">Guide</span>
                        <h3>Managing Exam Anxiety</h3>
                        <p>Evidence-based techniques to calm pre-test nerves and perform at your best when it matters most.</p>
                        <a href="https://www.apa.org/topics/anxiety" class="resource-link" target="_blank" rel="noopener noreferrer">
                            Learn more →
                        </a>
                    </article>
                                        <article class="resource-card cat-sleep">
                        <span class="resource-type">Guide</span>
                        <h3>Sleep Hygiene for Night Owls</h3>
                        <p>A practical guide to better sleep even when your schedule is unpredictable.</p>
                        <a href="https://www.sleepfoundation.org/sleep-hygiene" class="resource-link" target="_blank" rel="noopener noreferrer">
                            Learn more →
                        </a>
                    </article>
                                        <article class="resource-card cat-crisis">
                        <span class="resource-type">Hotline</span>
                        <h3>988 Suicide &amp; Crisis Lifeline</h3>
                        <p>Free, 24/7 confidential support. Call or text 988 anytime you need to talk.</p>
                        <a href="https://988lifeline.org" class="resource-link" target="_blank" rel="noopener noreferrer">
                            Learn more →
                        </a>
                    </article>
                                    </div>
                <p class="text-center" style="margin-top:var(--space-md);">
                    <a href="resources.php" class="btn-secondary">View All Resources →</a>
                </p>
            </div>
        </section>

    </main>


    <footer class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <span class="logo-icon" aria-hidden="true">🍃</span>
                    <span class="footer-name">MindSpace</span>
                </div>
                <p class="footer-tagline">Your mental health matters. Take it one day at a time.</p>
                <div class="footer-meta">
                    <p>CSC 4370/6370 Web Programming &mdash; Summer 2026</p>
                    <p>Howard Fletcher &amp; Sakib Jamal &mdash; Georgia State University</p>
                </div>
                <p class="footer-crisis">
                    If you are in crisis, call or text <a href="tel:988" aria-label="Call 988 Suicide and Crisis Lifeline">988</a> &mdash; available 24/7.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
