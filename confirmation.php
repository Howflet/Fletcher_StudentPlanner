<?php
/* -----------------------------------------------------------
   MindSpace — Journal Confirmation (confirmation.php)
   Reads $_SESSION['mood'] and echoes the saved entry back
   to the user with htmlspecialchars(). Suggests a relevant
   resource category based on the submitted mood.
   ----------------------------------------------------------- */
session_start();

$currentPage = 'journal';
$pageTitle   = 'Entry Saved';

/* Redirect if no session data */
if (!isset($_SESSION['mood'])) {
    header('Location: journal.php');
    exit();
}

$moodData = $_SESSION['mood'];

/* ---- Mood-based resource suggestions ---- */
$suggestions = [
    'great'      => [
        'message'  => 'Glad to hear you\'re doing well! Keep the momentum going.',
        'category' => 'focus',
        'label'    => 'Focus Resources'
    ],
    'good'       => [
        'message'  => 'That\'s great — explore ways to maintain your wellbeing.',
        'category' => 'focus',
        'label'    => 'Focus Resources'
    ],
    'ok'         => [
        'message'  => 'Everyone has those days. Here are some tools that might help.',
        'category' => 'stress',
        'label'    => 'Stress Management'
    ],
    'low'        => [
        'message'  => 'Thank you for being honest with yourself. You don\'t have to face this alone.',
        'category' => 'anxiety',
        'label'    => 'Anxiety Support'
    ],
    'struggling' => [
        'message'  => 'We hear you, and it takes courage to acknowledge how you feel. Please reach out if you need support.',
        'category' => 'crisis',
        'label'    => 'Crisis Support'
    ]
];

$currentMood = $moodData['mood'] ?? 'ok';
$suggestion  = $suggestions[$currentMood] ?? $suggestions['ok'];

/* Emoji map for display */
$moodEmojis = [
    'great'      => '😊',
    'good'       => '🙂',
    'ok'         => '😐',
    'low'        => '😔',
    'struggling' => '😞'
];
$emoji = $moodEmojis[$currentMood] ?? '😐';

include('includes/header.php');
?>

    <main id="main-content">

        <section class="confirmation-section">
            <div class="container">
                <div class="confirmation-card">

                    <!-- Success icon -->
                    <div class="confirmation-icon" aria-hidden="true">✓</div>

                    <h1>Journal Entry Saved</h1>
                    <p class="confirmation-date"><?= htmlspecialchars($moodData['timestamp'] ?? '') ?></p>

                    <!-- Entry details -->
                    <div class="confirmation-details">
                        <div class="detail-row">
                            <span class="detail-label">Mood</span>
                            <span class="detail-value"><?= htmlspecialchars($emoji) ?> <?= htmlspecialchars(ucfirst($moodData['mood'] ?? '')) ?></span>
                        </div>

                        <?php if (!empty($moodData['energy'])): ?>
                        <div class="detail-row">
                            <span class="detail-label">Energy</span>
                            <span class="detail-value"><?= htmlspecialchars(ucfirst($moodData['energy'])) ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($moodData['entry'])): ?>
                        <div class="detail-row" style="flex-direction:column;">
                            <span class="detail-label">Journal Entry</span>
                            <span class="detail-entry"><?= nl2br(htmlspecialchars($moodData['entry'])) ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($moodData['gratitude'])): ?>
                        <div class="detail-row">
                            <span class="detail-label">Grateful for</span>
                            <span class="detail-value"><?= htmlspecialchars($moodData['gratitude']) ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Mood-based suggestion -->
                    <div class="confirmation-suggestion">
                        <p><strong><?= htmlspecialchars($suggestion['message']) ?></strong></p>
                        <p style="margin-top:var(--space-xs);">
                            <a href="resources.php" class="resource-link"><?= htmlspecialchars($suggestion['label']) ?> →</a>
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="confirmation-actions">
                        <a href="index.php" class="btn-primary">Back to Home</a>
                        <a href="resources.php" class="btn-secondary">Browse Resources</a>
                    </div>

                </div>
            </div>
        </section>

    </main>

<?php include('includes/footer.php'); ?>
