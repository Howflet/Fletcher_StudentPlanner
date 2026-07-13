<?php
/* -----------------------------------------------------------
   MindSpace — Mood Journal (journal.php)
   Core PHP Feature:
     - $_POST validation with htmlspecialchars()
     - $_SESSION['mood'] stores today's journal entry
     - Handles quick-mood POST from homepage
     - Full journal form with mood, energy, entry, gratitude
   ----------------------------------------------------------- */
session_start();

$currentPage = 'journal';
$pageTitle   = 'Mood Journal';

$quickMood  = '';
$errors     = [];
$formData   = [
    'mood'      => '',
    'energy'    => '',
    'entry'     => '',
    'gratitude' => ''
];

/* ---- Handle quick-mood from homepage ---- */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['from_quick'])) {
    $quickMood = htmlspecialchars(trim($_POST['mood'] ?? ''));
    $formData['mood'] = $quickMood;
}

/* ---- Handle full journal form submission ---- */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['full_journal'])) {
    // Sanitize all inputs
    $formData['mood']      = htmlspecialchars(trim($_POST['mood'] ?? ''));
    $formData['energy']    = htmlspecialchars(trim($_POST['energy'] ?? ''));
    $formData['entry']     = htmlspecialchars(trim($_POST['entry'] ?? ''));
    $formData['gratitude'] = htmlspecialchars(trim($_POST['gratitude'] ?? ''));

    // Validation
    if (empty($formData['mood'])) {
        $errors[] = 'Please select how you are feeling.';
    }
    if (empty($formData['entry'])) {
        $errors[] = 'Please write something in your journal entry.';
    }

    // If valid, store in session and redirect
    if (empty($errors)) {
        $_SESSION['mood'] = [
            'mood'      => $formData['mood'],
            'energy'    => $formData['energy'],
            'entry'     => $formData['entry'],
            'gratitude' => $formData['gratitude'],
            'timestamp' => date('l, F j, Y \a\t g:i A')
        ];
        header('Location: confirmation.php');
        exit();
    }
}

include('includes/header.php');
?>

    <main id="main-content">

        <section class="journal-section">
            <div class="container">
                <h1>Mood Journal</h1>
                <p style="color:#555; max-width:600px; margin-bottom:var(--space-lg);">
                    Take a moment to check in with yourself. There are no right or wrong answers — just honest reflection.
                </p>

                <!-- Error messages -->
                <?php if (!empty($errors)): ?>
                <div class="form-errors" role="alert">
                    <?php foreach ($errors as $error): ?>
                    <p>⚠ <?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <form action="journal.php" method="post" class="journal-form" novalidate>
                    <input type="hidden" name="full_journal" value="1">

                    <!-- Mood Selection -->
                    <div class="form-group">
                        <label class="form-label" id="mood-label">How are you feeling right now? <span aria-hidden="true">*</span></label>
                        <span class="form-hint" id="mood-hint">Select the option that best describes your current mood.</span>
                        <div class="mood-selector" role="radiogroup" aria-labelledby="mood-label" aria-describedby="mood-hint">

                            <input type="radio" name="mood" id="jm-great" value="great" class="mood-radio" <?= $formData['mood'] === 'great' ? 'checked' : '' ?> required>
                            <label for="jm-great" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😊</span>
                                <span class="mood-label">Great</span>
                            </label>

                            <input type="radio" name="mood" id="jm-good" value="good" class="mood-radio" <?= $formData['mood'] === 'good' ? 'checked' : '' ?>>
                            <label for="jm-good" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">🙂</span>
                                <span class="mood-label">Good</span>
                            </label>

                            <input type="radio" name="mood" id="jm-ok" value="ok" class="mood-radio" <?= $formData['mood'] === 'ok' ? 'checked' : '' ?>>
                            <label for="jm-ok" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😐</span>
                                <span class="mood-label">OK</span>
                            </label>

                            <input type="radio" name="mood" id="jm-low" value="low" class="mood-radio" <?= $formData['mood'] === 'low' ? 'checked' : '' ?>>
                            <label for="jm-low" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😔</span>
                                <span class="mood-label">Low</span>
                            </label>

                            <input type="radio" name="mood" id="jm-struggling" value="struggling" class="mood-radio" <?= $formData['mood'] === 'struggling' ? 'checked' : '' ?>>
                            <label for="jm-struggling" class="mood-option">
                                <span class="mood-emoji" aria-hidden="true">😞</span>
                                <span class="mood-label">Struggling</span>
                            </label>

                        </div>
                    </div>

                    <!-- Energy Level -->
                    <div class="form-group">
                        <label class="form-label" id="energy-label">Energy level</label>
                        <div class="energy-options" role="radiogroup" aria-labelledby="energy-label">

                            <input type="radio" name="energy" id="en-high" value="high" class="energy-radio" <?= $formData['energy'] === 'high' ? 'checked' : '' ?>>
                            <label for="en-high" class="energy-label">⚡ High</label>

                            <input type="radio" name="energy" id="en-medium" value="medium" class="energy-radio" <?= $formData['energy'] === 'medium' ? 'checked' : '' ?>>
                            <label for="en-medium" class="energy-label">🔋 Medium</label>

                            <input type="radio" name="energy" id="en-low" value="low" class="energy-radio" <?= $formData['energy'] === 'low' ? 'checked' : '' ?>>
                            <label for="en-low" class="energy-label">🪫 Low</label>

                        </div>
                    </div>

                    <!-- Journal Entry -->
                    <div class="form-group">
                        <label for="journal-entry" class="form-label">What's on your mind? <span aria-hidden="true">*</span></label>
                        <span class="form-hint" id="entry-hint">Write freely — this is your private space to process your thoughts.</span>
                        <textarea id="journal-entry" name="entry" class="form-textarea" rows="6" required aria-describedby="entry-hint" placeholder="Today I feel..."><?= htmlspecialchars($formData['entry']) ?></textarea>
                    </div>

                    <!-- Gratitude -->
                    <div class="form-group">
                        <label for="gratitude" class="form-label">One thing you're grateful for</label>
                        <span class="form-hint" id="gratitude-hint">Even small things count. A good meal, a kind word, a sunny walk.</span>
                        <input type="text" id="gratitude" name="gratitude" class="form-input" aria-describedby="gratitude-hint" placeholder="e.g. My friend checked in on me today" value="<?= htmlspecialchars($formData['gratitude']) ?>">
                    </div>

                    <button type="submit" class="btn-primary">Save Journal Entry</button>
                </form>

            </div>
        </section>

    </main>

<?php include('includes/footer.php'); ?>
