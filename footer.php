<?php if(endsWith($_SERVER["REQUEST_URI"], "portfolio/")) { ?>
    </div>
<? } else { ?>
    </div></div>
<? } ?>
    <footer>
      <? the_field("rodape_texto", 9); ?>
    </footer>
  </main>
</div>
<? wp_footer(); ?>
</body>
</html>