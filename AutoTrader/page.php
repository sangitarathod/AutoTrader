<?php get_header(); ?>
<main class="at-main">
    <section class="at-content-area at-content-thin">
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
        <article class="at-article-full">
            <p>Sorry, no page was found!</p>
        </article>
        <?php endif; ?>
    </section>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>