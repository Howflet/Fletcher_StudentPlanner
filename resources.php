<?php
/* -----------------------------------------------------------
   MindSpace — Resource Library (resources.php)
   Secondary Feature A: Information Design Challenge
     — Complex content organized into categorized cards.
   Secondary Feature B: CSS-Only Interaction
     — :checked radio-button filter hides/shows categories
       with zero JavaScript.
   PHP: $resources[] array rendered with foreach.
   ----------------------------------------------------------- */
$currentPage = 'resources';
$pageTitle   = 'Resources';

/* ---- Resource Data Array ---- */
$resources = [
    [
        'title'       => 'Managing Exam Anxiety',
        'description' => 'Evidence-based techniques to calm pre-test nerves and perform at your best when it matters most.',
        'category'    => 'anxiety',
        'type'        => 'Guide',
        'url'         => 'https://www.apa.org/topics/anxiety'
    ],
    [
        'title'       => 'Grounding Exercises for Panic',
        'description' => 'The 5-4-3-2-1 technique and other immediate coping tools for overwhelming moments.',
        'category'    => 'anxiety',
        'type'        => 'Exercise',
        'url'         => 'https://www.health.harvard.edu/mind-and-mood/relaxation-techniques-breath-control-helps-quell-errant-stress-response'
    ],
    [
        'title'       => 'The 20-Minute Study Break',
        'description' => 'Why stepping away from your desk actually improves retention and reduces burnout.',
        'category'    => 'stress',
        'type'        => 'Article',
        'url'         => 'https://www.apa.org/topics/stress'
    ],
    [
        'title'       => 'Digital Detox Starter Kit',
        'description' => 'Reduce screen time and social media pressure without feeling disconnected from your world.',
        'category'    => 'stress',
        'type'        => 'Guide',
        'url'         => 'https://www.apa.org/topics/stress/manage-social-media'
    ],
    [
        'title'       => 'Sleep Hygiene for Night Owls',
        'description' => 'A practical guide to better sleep even when your schedule is unpredictable.',
        'category'    => 'sleep',
        'type'        => 'Guide',
        'url'         => 'https://www.sleepfoundation.org/sleep-hygiene'
    ],
    [
        'title'       => 'Power Nap Protocol',
        'description' => 'How a 20-minute nap between classes can reset your energy without ruining tonight\'s sleep.',
        'category'    => 'sleep',
        'type'        => 'Article',
        'url'         => 'https://www.sleepfoundation.org/sleep-hygiene/napping'
    ],
    [
        'title'       => 'Deep Focus Techniques',
        'description' => 'How to use the Pomodoro method and environment design to reclaim your attention span.',
        'category'    => 'focus',
        'type'        => 'Article',
        'url'         => 'https://todoist.com/productivity-methods/pomodoro-technique'
    ],
    [
        'title'       => 'Building a Study Playlist',
        'description' => 'The science behind music and concentration — what to listen to and what to avoid while studying.',
        'category'    => 'focus',
        'type'        => 'Article',
        'url'         => 'https://www.apa.org/monitor/2023/06/music-and-the-brain'
    ],
    [
        'title'       => 'Setting Boundaries with Roommates',
        'description' => 'Healthy communication strategies for shared living spaces during college.',
        'category'    => 'relationships',
        'type'        => 'Article',
        'url'         => 'https://www.apa.org/topics/relationships'
    ],
    [
        'title'       => 'Navigating Loneliness on Campus',
        'description' => 'Why feeling alone is more common than you think, and evidence-based ways to build connection.',
        'category'    => 'relationships',
        'type'        => 'Article',
        'url'         => 'https://www.apa.org/topics/loneliness'
    ],
    [
        'title'       => 'GSU Counseling Center',
        'description' => 'Free, confidential counseling services available to all enrolled Georgia State students.',
        'category'    => 'crisis',
        'type'        => 'Resource',
        'url'         => 'https://counselingcenter.gsu.edu'
    ],
    [
        'title'       => '988 Suicide &amp; Crisis Lifeline',
        'description' => 'Free, 24/7 confidential support. Call or text 988 anytime you need to talk to someone.',
        'category'    => 'crisis',
        'type'        => 'Hotline',
        'url'         => 'https://988lifeline.org'
    ]
];

include('includes/header.php');
?>

    <main id="main-content">

        <!-- =============== PAGE HEADER =============== -->
        <section class="section" aria-label="Resource library header">
            <div class="container">
                <h1>Resource Library</h1>
                <p style="color:#555; max-width:600px; margin-bottom:var(--space-md);">Curated guides, exercises, and support tools for the challenges students face most. Use the filters below to find what you need.</p>

                <!-- =============== CSS-ONLY CATEGORY FILTER ===============
                     Secondary Feature B: CSS-Only Interaction
                     How it works:
                     1. Hidden radio inputs are siblings of .filter-bar and .resource-grid
                     2. When a radio is :checked, the general sibling combinator (~)
                        hides .resource-card elements that don't match the category
                     3. Zero JavaScript — pure CSS selector logic
                     ========================================================= -->

                <div class="filter-section">
                    <!-- Hidden radio inputs (must be siblings of .resource-grid) -->
                    <input type="radio" name="category" id="cat-all" class="filter-input" checked>
                    <input type="radio" name="category" id="cat-stress" class="filter-input">
                    <input type="radio" name="category" id="cat-anxiety" class="filter-input">
                    <input type="radio" name="category" id="cat-sleep" class="filter-input">
                    <input type="radio" name="category" id="cat-focus" class="filter-input">
                    <input type="radio" name="category" id="cat-relationships" class="filter-input">
                    <input type="radio" name="category" id="cat-crisis" class="filter-input">

                    <!-- Filter labels styled as pill buttons -->
                    <div class="filter-bar" role="radiogroup" aria-label="Filter resources by category">
                        <label for="cat-all" class="filter-label">All</label>
                        <label for="cat-stress" class="filter-label">Stress</label>
                        <label for="cat-anxiety" class="filter-label">Anxiety</label>
                        <label for="cat-sleep" class="filter-label">Sleep</label>
                        <label for="cat-focus" class="filter-label">Focus</label>
                        <label for="cat-relationships" class="filter-label">Relationships</label>
                        <label for="cat-crisis" class="filter-label">Crisis</label>
                    </div>

                    <!-- Resource Grid — rendered from PHP array with foreach -->
                    <div class="resource-grid">
                        <?php foreach ($resources as $resource): ?>
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
                </div><!-- /.filter-section -->

            </div>
        </section>

    </main>

<?php include('includes/footer.php'); ?>
