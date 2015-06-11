<footer class="content-info footer" role="contentinfo">
  <script type="text/javascript">
    function create_cont(tld, dom2, dom1, nam2, nam1, lab, cls) {
      var cont = "";
      var att = '@';
      var m1 = 'ma';
      var m2 = 'to:';
      var m3 = 'il';
      cont += '<a ' + 'class="' + cls + '" href="' + m1 + m3 + m2 + nam1 + nam2;
      cont += att + dom1 + dom2 + '.' + tld;
      cont += '">' + lab + '<' + '/a>';
      document.write(cont);
    }
  </script>
  <div class="container">
    <div class="row gb-section-start">
      <div class="col-sm-4">
        <h4>About us</h4>
        <p>Hello, we are Ivan and Ivana. Yes, we know, we have great names :)
        Besides that,  we love building apps and games, and helping others bring their awesome ideas to life too.
        Read more about us <a href="/about">here</a>.
        </p>
      </div>

      <div class="col-sm-4">
        <h4>Keep connected</h4>
        <div class="gb-social-icon"><img src="<?= Roots\Sage\Assets\get_asset_path("images/ic_fb.svg"); ?>"></div>Like us on <a href="#">Facebook</a>
        <p><div class="gb-social-icon"><img src="<?= Roots\Sage\Assets\get_asset_path("images/ic_tw.svg"); ?>"></div>Follow us on <a href="#">Twitter</a></p>
        <p><div class="gb-social-icon"><img src="<?= Roots\Sage\Assets\get_asset_path("images/ic_gp.svg"); ?>"></div>Add us on <a href="#">Google+</a></p>
        <p><div class="gb-social-icon"><img src="<?= Roots\Sage\Assets\get_asset_path("images/ic_em.svg"); ?>"></div>Drop us an <script type="text/javascript">create_cont("com", "bugs", "gali", "ial", "soc", "Email", "gb-contact");</script></p>
      </div>

      <div class="col-sm-4">
        <h4>Services we offer</h4>
        <p><div class="gb-social-icon"><img src="<?= Roots\Sage\Assets\get_asset_path("images/ic_gt.svg"); ?>"></div><a href="#">Mobile app development courses</a></p>
        <p><div class="gb-social-icon"><img src="<?= Roots\Sage\Assets\get_asset_path("images/ic_gt.svg"); ?>"></div><a href="#">Mobile app design & development</a></p>
      </div>
  </div>
</footer>
