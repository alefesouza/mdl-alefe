<?php if(!endsWith($_SERVER['REQUEST_URI'], 'portfolio/') && !endsWith($_SERVER['REQUEST_URI'], 'talks/')) { ?>
        </div>
    </div>
<?php } ?>
        <footer>
        <?php the_field('rodape_texto', 9); ?>
        </footer>
    </main>
</div>
<?php wp_footer(); ?>
</body>
</html>
