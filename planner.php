<?php
/* -----------------------------------------------------------
   MindSpace — Student Planner (planner.php)
   Option 2: Dashboard-First layout from wireframes.
   Features:
     - Today's schedule from $schedule[] array + foreach
     - Upcoming deadlines from $deadlines[] array + foreach
     - Mini calendar generated dynamically with PHP date()
     - Quick Add form: $_POST → $_SESSION['planner_items'][]
     - Daily wellness tip in sidebar
   ----------------------------------------------------------- */
session_start();

$currentPage = 'planner';
$pageTitle   = 'Planner';

/* ---- Handle Quick Add form (PRG pattern) ---- */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quick_add'])) {
    $newTitle = htmlspecialchars(trim($_POST['item_title'] ?? ''));
    $rawTime  = trim($_POST['item_time'] ?? '');

    if (!empty($newTitle) && !empty($rawTime)) {
        $formattedTime = date('g:i A', strtotime($rawTime));

        if (!isset($_SESSION['planner_items'])) {
            $_SESSION['planner_items'] = [];
        }

        $_SESSION['planner_items'][] = [
            'time'     => $formattedTime,
            'title'    => $newTitle,
            'type'     => 'personal',
            'location' => '',
            'added'    => true
        ];
    }

    /* Post-Redirect-Get to prevent resubmission */
    header('Location: planner.php?added=1');
    exit();
}

$addSuccess = isset($_GET['added']);

/* ---- Today's Schedule (PHP array) ---- */
$schedule = [
    ['time' => '7:30 AM',  'title' => 'Morning Mindfulness',           'type' => 'wellness', 'location' => ''],
    ['time' => '9:00 AM',  'title' => 'CSC 4370 Lecture',              'type' => 'class',    'location' => 'Aderhold 203'],
    ['time' => '11:00 AM', 'title' => 'Study Group: Web Programming',  'type' => 'study',    'location' => 'Library Rm 214'],
    ['time' => '1:00 PM',  'title' => 'Lunch Break',                   'type' => 'personal', 'location' => ''],
    ['time' => '2:00 PM',  'title' => 'Essay Draft Due — ENGL 1102',   'type' => 'deadline', 'location' => '', 'urgent' => true],
    ['time' => '3:30 PM',  'title' => 'Advisor Meeting',               'type' => 'class',    'location' => 'Langdale 427'],
    ['time' => '5:00 PM',  'title' => 'Gym — Recreation Center',       'type' => 'wellness', 'location' => 'Rec Center'],
    ['time' => '7:00 PM',  'title' => 'Roommate Dinner',               'type' => 'personal', 'location' => ''],
];

/* Merge user-added items from session */
if (isset($_SESSION['planner_items']) && is_array($_SESSION['planner_items'])) {
    foreach ($_SESSION['planner_items'] as $item) {
        $schedule[] = $item;
    }
}

/* ---- Upcoming Deadlines ---- */
$deadlines = [
    ['title' => 'Lab Report',          'course' => 'BIOL 2108',       'due' => 'Thu, Jul 9'],
    ['title' => 'Group Project Draft', 'course' => 'CSC 4370',        'due' => 'Fri, Jul 10'],
    ['title' => 'Career Fair',         'course' => 'Student Center',  'due' => 'Fri, Jul 10'],
    ['title' => 'Wellness Reflection', 'course' => 'PSYC 1101',      'due' => 'Mon, Jul 13'],
];

/* ---- Daily Tip ---- */
$tips = [
    "Start your day with five minutes of mindful breathing.",
    "Take a screen break every 90 minutes — step outside or stretch.",
    "Write down three things you're grateful for today.",
    "Move your body for at least 20 minutes.",
    "Reach out to someone you trust today.",
    "Set one boundary today — it's okay to say no.",
    "Reflect on one thing that went well today."
];
$todayTip = $tips[date('N') - 1];

/* ---- Mini Calendar (generated dynamically with PHP) ---- */
$calYear      = (int)date('Y');
$calMonth     = (int)date('n');
$calMonthName = date('F Y');
$firstDayTs   = mktime(0, 0, 0, $calMonth, 1, $calYear);
$startDow     = (int)date('w', $firstDayTs);   // 0 = Sun … 6 = Sat
$totalDays    = (int)date('t', $firstDayTs);
$currentDay   = (int)date('j');

/* Event-day dots — relative to today so they always look realistic */
$eventDays = array_filter(
    [$currentDay, $currentDay + 2, $currentDay + 3, $currentDay + 6, $currentDay + 9, $currentDay + 13, $currentDay - 1],
    fn($d) => $d >= 1 && $d <= $totalDays
);

include('includes/header.php');
?>

    <main id="main-content">

        <section class="section planner-section" aria-label="Student planner dashboard">
            <div class="container">

                <!-- Page header -->
                <div class="planner-header">
                    <h1>My Planner</h1>
                    <p>Your schedule, deadlines, and wellness activities — all in one view.</p>
                </div>

                <!-- Success message after Quick Add -->
                <?php if ($addSuccess): ?>
                <div class="welcome-back" role="status">
                    ✓ Event added to your schedule.
                </div>
                <?php endif; ?>

                <!-- ===== DASHBOARD GRID (wireframe Option 2) ===== -->
                <div class="planner-grid">

                    <!-- === MAIN CONTENT === -->
                    <div class="planner-main">

                        <!-- Today's Schedule -->
                        <div class="schedule-section">
                            <h2>Today &mdash; <?= date('D, M j') ?></h2>
                            <div class="schedule-list">
                                <?php foreach ($schedule as $item): ?>
                                <div class="schedule-row type-<?= htmlspecialchars($item['type']) ?> <?= !empty($item['urgent']) ? 'urgent' : '' ?>">
                                    <span class="schedule-time"><?= htmlspecialchars($item['time']) ?></span>
                                    <span class="schedule-type-dot" aria-hidden="true"></span>
                                    <div class="schedule-info">
                                        <span class="schedule-title"><?= htmlspecialchars($item['title']) ?></span>
                                        <?php if (!empty($item['location'])): ?>
                                        <span class="schedule-location"><?= htmlspecialchars($item['location']) ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($item['added'])): ?>
                                        <span class="schedule-added">Added by you</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Upcoming Deadlines -->
                        <div class="deadlines-section">
                            <h2>Upcoming Deadlines</h2>
                            <?php foreach ($deadlines as $d): ?>
                            <div class="deadline-card">
                                <strong><?= htmlspecialchars($d['title']) ?></strong>
                                &mdash; <?= htmlspecialchars($d['course']) ?>
                                &middot; <?= htmlspecialchars($d['due']) ?>
                            </div>
                            <?php endforeach; ?>
                        </div>

                    </div><!-- /.planner-main -->

                    <!-- === SIDEBAR === -->
                    <aside class="planner-sidebar" aria-label="Planner sidebar">

                        <!-- Mini Calendar -->
                        <div class="mini-cal" aria-label="<?= htmlspecialchars($calMonthName) ?> calendar">
                            <div class="mini-cal-head"><?= htmlspecialchars($calMonthName) ?></div>
                            <div class="mini-cal-grid">
                                <span class="cal-header">S</span>
                                <span class="cal-header">M</span>
                                <span class="cal-header">T</span>
                                <span class="cal-header">W</span>
                                <span class="cal-header">T</span>
                                <span class="cal-header">F</span>
                                <span class="cal-header">S</span>

                                <?php for ($i = 0; $i < $startDow; $i++): ?>
                                <span class="cal-empty"></span>
                                <?php endfor; ?>

                                <?php for ($day = 1; $day <= $totalDays; $day++):
                                    $classes = 'cal-day';
                                    if ($day === $currentDay) $classes .= ' today';
                                    if (in_array($day, $eventDays)) $classes .= ' has-event';
                                ?>
                                <span class="<?= $classes ?>"><?= $day ?></span>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <!-- Quick Add -->
                        <div class="quick-add">
                            <h3>Quick Add</h3>
                            <form action="planner.php" method="post" class="quick-add-form">
                                <input type="hidden" name="quick_add" value="1">

                                <label for="item-title">Event</label>
                                <input type="text" id="item-title" name="item_title" class="form-input" placeholder="e.g. Study group" required>

                                <label for="item-time">Time</label>
                                <input type="time" id="item-time" name="item_time" class="form-input" required>

                                <button type="submit" class="btn-primary">Add</button>
                            </form>
                        </div>

                        <!-- Wellness Tip -->
                        <div class="planner-tip">
                            <p class="tip-label">Wellness Reminder</p>
                            <p><?= htmlspecialchars($todayTip) ?></p>
                        </div>

                    </aside><!-- /.planner-sidebar -->

                </div><!-- /.planner-grid -->

            </div>
        </section>

    </main>

<?php include('includes/footer.php'); ?>
