<?php
/* -----------------------------------------------------------
   MindSpace — About (about.php)
   Content page: mission, how to use the platform, disclaimer,
   and team credits. Semantic HTML5 structure.
   ----------------------------------------------------------- */
$currentPage = 'about';
$pageTitle   = 'About';

include('includes/header.php');
?>

    <main id="main-content">

        <!-- =============== ABOUT HERO =============== -->
        <section class="about-hero" aria-label="About MindSpace">
            <div class="container">
                <h1>About MindSpace</h1>
                <p>A digital wellness platform built by GSU students, for GSU students.</p>
            </div>
        </section>

        <!-- =============== ABOUT CONTENT =============== -->
        <section class="about-content" aria-label="Our mission and story">
            <div class="container">

                <div class="about-grid">
                    <div class="about-block">
                        <h2>Why We Built This</h2>
                        <p>MindSpace was created by students who understand the pressure of balancing coursework, social life, work, and personal wellbeing. We know what it feels like to stare at a deadline at 2 a.m., to feel isolated in a crowded lecture hall, or to wonder if what you're feeling is normal.</p>
                        <p>We built this platform because we believe small, consistent check-ins can make a real difference — and because finding the right mental health resource shouldn't require a Google deep-dive when you're already overwhelmed.</p>
                    </div>
                    <div class="about-block">
                        <h2>Our Approach</h2>
                        <p>MindSpace focuses on three principles: <strong>awareness</strong> (recognizing how you feel), <strong>access</strong> (connecting you to curated resources), and <strong>action</strong> (taking one small step today).</p>
                        <p>We don't track your data, we don't sell anything, and we're not a substitute for professional care. We're a starting point — a quiet space on the internet where it's okay to admit you're not okay, and where the next step is always visible.</p>
                    </div>
                </div>

                <!-- How to use the platform -->
                <h2 class="text-center">How to Use MindSpace</h2>
                <div class="about-features">
                    <article class="about-feature">
                        <span class="about-feature-icon" aria-hidden="true">🍃</span>
                        <h3>Breathe</h3>
                        <p>Start on the homepage with a guided breathing moment. Let the animation pace your breath for a few cycles before diving into your day.</p>
                    </article>
                    <article class="about-feature">
                        <span class="about-feature-icon" aria-hidden="true">📝</span>
                        <h3>Journal</h3>
                        <p>Check in with the mood journal. Select how you're feeling, write what's on your mind, and name one thing you're grateful for. Small reflections build self-awareness over time.</p>
                    </article>
                    <article class="about-feature">
                        <span class="about-feature-icon" aria-hidden="true">📚</span>
                        <h3>Explore</h3>
                        <p>Browse the resource library filtered by what you need most — stress, anxiety, sleep, focus, relationships, or crisis support. Every resource is curated and relevant to student life.</p>
                    </article>
                </div>

                <!-- Disclaimer -->
                <aside class="about-disclaimer" aria-label="Important disclaimer">
                    <h3>Important Note</h3>
                    <p>MindSpace is an educational project and informational resource. It is <strong>not</strong> a substitute for professional mental health treatment. If you are experiencing a mental health crisis, please contact the <a href="https://988lifeline.org" target="_blank" rel="noopener noreferrer">988 Suicide &amp; Crisis Lifeline</a> (call or text 988) or visit the <a href="https://counselingcenter.gsu.edu" target="_blank" rel="noopener noreferrer">GSU Counseling Center</a> for free, confidential support.</p>
                </aside>

            </div>
        </section>

        <!-- =============== TEAM =============== -->
        <section class="about-team" aria-label="Team">
            <div class="container">
                <h2>The Team</h2>
                <div class="team-members">
                    <div class="team-member">
                        <div class="team-avatar" aria-hidden="true">HF</div>
                        <h3>Howard Fletcher</h3>
                        <p>Georgia State University</p>
                    </div>
                    <div class="team-member">
                        <div class="team-avatar" aria-hidden="true">SJ</div>
                        <h3>Sakib Jamal</h3>
                        <p>Georgia State University</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php include('includes/footer.php'); ?>
