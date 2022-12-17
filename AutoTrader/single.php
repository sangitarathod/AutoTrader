<?php get_header(); ?>
<main class="at-main">
    <section class="at-content-area content-full-width">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
        <article class="at-article-full">
            <header>
                <h2>
                    <?php the_title(); ?>
                </h2>
                By:
                <?php the_author(); ?>
            </header>
            <?php the_content(); ?>
        </article>
        <?php endwhile; else: ?>
        <article>
            <p>Sorry, no post was found!</p>
        </article>
        <?php endif; ?>
    </section>

</main>
<?php get_footer(); ?>