<?php
/* -----------------------------------------------------------
   MindSpace — Homepage (index.php)
   Features: Daily wellness tip (PHP array + date), breathing
   animation (@keyframes), mood quick-check form, featured
   resources via foreach.
   ----------------------------------------------------------- */
session_start();

$currentPage = 'home';
$pageTitle   = 'Home';

/* ---- Daily Wellness Tips — one per weekday via date('N') ---- */
$tips = [
    "Start your day with five minutes of mindful breathing. Your mind will thank you.",
    "Take a screen break every 90 minutes — step outside, stretch, or just look at something far away.",
    "Write down three things you're grateful for today. Gratitude rewires your brain for positivity.",
    "Move your body for at least 20 minutes. Exercise is one of the most effective natural antidepressants.",
    "Reach out to someone you trust today. Connection is one of the strongest mental health protectors.",
    "Set one boundary today — it's okay to say no to protect your energy and focus.",
    "End your day by reflecting on one thing that went well. Progress matters more than perfection."
];
$todayTip = $tips[date('N') - 1]; // date('N'): Mon=1 … Sun=7

/* ---- Featured Resources (subset) ---- */
$featuredResources = [
    [
        'title'       => 'Managing Exam Anxiety',
        'description' => 'Evidence-based techniques to calm pre-test nerves and perform at your best when it matters most.',
        'category'    => 'anxiety',
        'type'        => 'Guide',
        'url'         => 'https://www.apa.org/topics/anxiety'
    ],
    [
        'title'       => 'Sleep Hygiene for Night Owls',
        'description' => 'A practical guide to better sleep even when your schedule is unpredictable.',
        'category'    => 'sleep',
        'type'        => 'Guide',
        'url'         => 'https://www.sleepfoundation.org/sleep-hygiene'
    ],
    [
        'title'       => '988 Suicide &amp; Crisis Lifeline',
        'description' => 'Free, 24/7 confidential support. Call or text 988 anytime you need to talk.',
        'category'    => 'crisis',
        'type'        => 'Hotline',
        'url'         => 'https://988lifeline.org'
    ]
];

include('includes/header.php');
?>

    <main id="main-content">

        <!-- ===================== DAILY TIP ===================== -->
        <section class="section" aria-label="Daily wellness tip">
            <div class="container">
                <div class="tip-banner">
                    <p class="tip-label">Today's Wellness Tip</p>
                    <p class="tip-text"><?= htmlspecialchars($todayTip) ?></p>
                </div>
            </div>
        </section>

        <!-- ================= HERO: BREATHING =================== -->
        <section class="hero" aria-label="Welcome">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Your mind deserves a moment.</h1>
                        <p>MindSpace is a student wellness hub built by GSU students who understand the pressure. Check in with yourself, explore curated resources, and take small steps toward feeling better.</p>
                        <p style="margin-top: var(--space-sm);"><a href="planner.php" class="btn-primary">Open Your Planner →</a></p>
                        <?php if (isset($_SESSION['mood'])): ?>
                            <div class="welcome-back">
                                <strong>Welcome back.</strong> Your last mood check-in: <?= htmlspecialchars($_SESSION['mood']['mood']) ?>. <a href="journal.php">Update your journal →</a>
                            </div>
                        <?php endif; ?>
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
                    <?php foreach ($featuredResources as $resource): ?>
                    <article class="resource-card cat-<?= htmlspecialchars($resource['category']) ?>">
                        <span class="resource-type"><?= htmlspecialchars($resource['type']) ?></span>
                        <h3><?= $resource['title'] ?></h3>
                        <p><?= $resource['description'] ?></p>
                        <a href="<?= htmlspecialchars($resource['url']) ?>" class="resource-link" target="_blank" rel="noopener noreferrer">
                            Learn more →
                        </a>
                    </article>
                    <?php endforeach; ?>
                </div>
                <p class="text-center" style="margin-top:var(--space-md);">
                    <a href="resources.php" class="btn-secondary">View All Resources →</a>
                </p>
            </div>
        </section>

    </main>

<?php include('includes/footer.php'); ?>
