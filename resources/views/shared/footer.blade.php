
    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4><strong>Gestion Financiere</strong></h4>
            <p>L'epargne facile avec Gestion Financiere.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Liens Utiles</h4>
            <ul class="menu-list">
              <li><a href="#">Accueil</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">A propos</a></li>
              <li><a href="{{route('sinscrire')}}">Devenir client</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item last-item">
            <h4>Nous contacter</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Nom" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="Addresse E-Mail" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Votre message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Envoyer</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Copyright &copy; 2023 Tous droits réservations.
            
            - Design: <a rel="nofollow noopener" href="https://jgotechmaker.com" target="_blank">JGOTECHMAKER</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="all/vendor/jquery/jquery.min.js"></script>
    <script src="all/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="all/assets/js/jquery.singlePageNav.min.js"></script>
    <script src="all/assets/js/custom.js"></script>
    <script src="all/assets/js/owl.js"></script>
    <script src="all/assets/js/slick.js"></script>
    <script src="all/assets/js/accordions.js"></script>
    <script>
      $(function() {
        // Single Page Nav
        $('#navbarResponsive').singlePageNav({
          'offset': 100,
          'filter': ':not(.external)'
        });

        // On mobile, close the menu after nav-link click
        $('#navbarResponsive .navbar-nav .nav-item .nav-link').click(function(){
          $('#navbarResponsive').removeClass('show');
        });
      });
    </script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>