<?php
    include_once './class/Baza.php';
    
    $db = new Baza("localhost","root","","users");
    session_start();
    $sessionId = session_id();
   
    $sql = "SELECT * FROM logged_in_users WHERE sessionId='$sessionId'";
    $result = $db -> getUserId($sql);
    /*

    if (filter_input(INPUT_POST, 'submit',FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
        $sql = "INSERT INTO "
    }*/

    if($result != NULL){
?>
    <!DOCTYPE html>
    <html lang="pl">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <title>CodeITbetter</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <!-- Font Awesome icons (free version)-->
            <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Google fonts-->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
            <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />
            <link href="css/ekko-lightbox.css" rel="stylesheet"/>
            <link rel="stylesheet" href="css/lightbox.css" /> 
        </head>
        <body id="page-top">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars ms-1"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#services">Usługi</a></li>
                            <li class="nav-item"><a class="nav-link" href="#galery">Galeria</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">O nas</a></li>
                            <li class="nav-item"><a class="nav-link" href="#team">Zespół</a></li>
                            <li class="nav-item"><a class="nav-link" href="#registration">Rejestracja</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Kontakt</a></li>
                            <li class="nav-item"><a class="nav-link"><button type="button" class="btn btn-outline-light btn-sm" id="logOut" value="logOut" >Wyloguj się</button></li></a>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Masthead-->
            <header class="masthead">
                <div class="container">
                    <div class="masthead-subheading">Witaj w naszym studiu!</div>
                    <div class="masthead-heading text-uppercase">Miło cię poznać</div>
                    <a class="btn btn-primary btn-xl text-uppercase" href="#services">Dowiedz się więcej</a></br>

                </div>
            </header>
            <!-- Services-->
            <section class="page-section" id="services">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Nasze kursy</h2>
                        <h3 class="section-subheading text-muted">Zapoznaj się z oferowanym przez nas wachlarzem szkoleń.</h3>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Administracja sieci</h4>
                            <p class="text-muted">Tutaj dowiesz się jak tworzyć i administrować sieci komputerowe</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Aplikacje internetowe</h4>
                            <p class="text-muted">W tym kursie dowiesz się jak tworzyć strony internetowe oparte na technologiach takich jak: html, css, javascript, php.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Bezpieczeństwo informacji</h4>
                            <p class="text-muted">Nauczymy Cię jak zabezpieczyć twoje informacje w sieci, tak aby nie dostały się w niepowołane ręce.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- galery-->
            <section class="page-section bg-light" id="galery">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Galeria zdjęć</h2>
                        <h3 class="section-subheading text-muted">Poniżej przedstawiamy kilka zdjęc z naszych bootcampów i szkoleń. 
                        
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4">
                            
                                <a href="assets/img/galery/6.jpg" data-lightbox="galeria" data-title="Obraz 1">
                                    <img src="assets/img/galery/mini/6.jpg" class="img-fluid" alt="zdjecie6">
                                </a>
                                
                            
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            
                            <a href="assets/img/galery/1.jpg" data-lightbox="galeria" data-title="Obraz 2">
                                <img src="assets/img/galery/mini/1.jpg" class="img-fluid" alt="zdjecie1">
                            </a>
                            
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                        
                            <a href="assets/img/galery/2.jpg" data-lightbox="galeria" data-title="Obraz 3">
                                <img src="assets/img/galery/mini/2.jpg" class="img-fluid" alt="zdjecie2">
                            </a>
                            
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <!-- Portfolio item 4-->
                            <a href="assets/img/galery/3.jpg" data-lightbox="galeria" data-title="Obraz 4">
                                <img src="assets/img/galery/mini/3.jpg" class="img-fluid" alt="zdjecie3">
                            </a>
                            
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                            <!-- Portfolio item 5-->
                            <a href="assets/img/galery/4.jpg" data-lightbox="galeria" data-title="Obraz 5">
                                <img src="assets/img/galery/mini/4.jpg" class="img-fluid" alt="zdjecie4">
                            </a>
                            
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!-- Portfolio item 6-->
                            <a href="assets/img/galery/5.jpg" data-lightbox="galeria" data-title="Obraz 6">
                                <img src="assets/img/galery/mini/5.jpg" class="img-fluid" alt="zdjecie5">
                            </a>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- About-->
            <section class="page-section" id="about">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">O nas</h2>
                        <h3 class="section-subheading text-muted">Przedstawimy Ci proces tworzenia naszego zespołu.</h3>
                    </div>
                    <ul class="timeline">
                        <li>
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1" id="linkModal1"><div class="timeline-image" ><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg"  alt="..." /></div></a>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Skoromne początki</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Początki kariery naszych wykładowców, a teraz wykwalifikowanych ekspertów w swoim fachu.</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2"><div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="about2" /></div></a>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Marzec 2011</h4>
                                    <h4 class="subheading">Pomysł utoworzenia agencji.</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">To właśnie wtedy 3 znajomych po fachu pomyślało: Hej, czemu by nie podzielić się naszą wiedzą z innymi!</p></div>
                            </div>
                        </li>
                        <li>
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3"><div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div></a>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Grudzień 2015</h4>
                                    <h4 class="subheading">Zarejestrowaliśmy jako pełnoprawna firma</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Po latach testów, zbierania finansów nasz pomysł został wdrożony w życie!</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4"><div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div></a>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Czerwiec 2020</h4>
                                    <h4 class="subheading">Działamy w innych krajach</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">Nasze działania przenoszą się za granice naszego kraju. Nawiązaliśmy współpacę ze światowymi gigantami takimi jak: Facebook, Microsoft, Google i IBM</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>
                                    Bądź
                                    <br />
                                    Częscią Naszej
                                    <br />
                                    Historii!
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- Team-->
            <section class="page-section bg-light" id="team">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Zespół wykładowców działających w Lublinie</h2>
                        <h3 class="section-subheading text-muted">Możesz zapoznać się z ich działalnoscią w social mediach a także z karierą zawodową w serwisie LinkedIn .</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                                <h4>Marcin Kowalski</h4>
                                <p class="text-muted">Administracja Sieci</p>
                                <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="https://pl.linkedin.com/"  target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                                <h4>Lena Nowak</h4>
                                <p class="text-muted">Aplikacje internetowe</p>
                                <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/"  target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"  target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="https://pl.linkedin.com/"  target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                                <h4>Mateusz Głowacki</h4>
                                <p class="text-muted">Bezpieczenstwo Informacji</p>
                                <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/"  target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"  target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="https://pl.linkedin.com/"  target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Oczywiście to nie jest cała nasz załoga. Za rozwój, utrzymanie i działania biura odpowiedzialnych w tym momencie jest około 100 osób na całym świecie.</p></div>
                    </div>
                </div>
            </section>
           
            <!-- Clients-->
            <div class="py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." /></a>
                        </div>
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." /></a>
                        </div>
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." /></a>
                        </div>
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." /></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact-->
            
                    <!--Section: Contact v.1-->
            <section class="page-section" id = "contact">
                
            <div class="row ">
                <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        
                            <h2 class="section-heading text-uppercase">Tutaj mamy swoją siedzibę</h2>
                            
                            <h3 class="section-subheading text-primary">Kontakt: 81 538 42 87 </h3>
                            
                            

                    </div>
                    <div class="col-lg-8 ">
                        <iframe width="95%"     height="450" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJX9cOuXBXIkcR-hIhFMFMbRs&key=AIzaSyDHCfNKeOdoVA3G9ROgdXiGVn9Ula9WJVM"></iframe>
                    </div>
                </div>
                    
            </section>
                    <!--Section: Contact v.1-->
                    
                
            
            <!-- Footer-->
            <footer class="footer py-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 text-lg-start">
                            Copyright &copy; Your Website
                            <!-- This script automatically adds the current year to your website footer-->
                            <!-- (credit: https://updateyourfooter.com/)-->
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </div>
                        <div class="col-lg-4 my-3 my-lg-0">
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                            <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Submit Modals-->
            
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body" id="modalBody">
                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Portfolio Modals-->
            <!-- Portfolio item 1 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container" id = "modal1">
                            
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project details-->
                                                <h2 class="text-uppercase">Politechnika Lubelska</h2>
                                                <p class="item-intro text-muted">To tutaj się wszsystko zaczeło!</p>
                                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/politechnika.jpg" alt="politechnika" />
                                                <p>Trójka założycieli naszej firmy studiowała razem na tej Lubelskiej uczelni Informatykę. </p>
                                                
                                                <a href="http://www.pollub.pl/"  class="btn btn-info btn-xl" role="button" aria-pressed="true" target="_blank">
                                                    pollub.pl</a>
                                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                    <i class="fas fa-times me-1"></i>
                                                    Zamknij 
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 2 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">Początki</h2>
                                        
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/poczatki.jpg" alt="poczatki" />
                                        <p>W tamtym czasie nasz region był ubogi w tego typu oferty szkoleń, więc przyszliśmy z pomocą. Początkowo nasz firma miała wyglądać nieco inaczej, lecz po konsultacjach środowiskowych ukierunkowaliśmy nasz pogląd na sytuację i plan dalszego działania!</p>
                                        
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-times me-1"></i>
                                            Zamknij
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 3 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">Wystartowaliśmy na całego!</h2>
                                        
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/firma.jpg" alt="firma" />
                                        <p>To był bardzo intensywny okres dla nas wszystkich! Założenie poważnej spółki kosztuje dużo czasu i nie tylko.</p>
                                        
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-times me-1"></i>
                                            Zamknij
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 4 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">Przełom!</h2>
                                        <p class="item-intro text-muted">Świat się o nas dowiedział.</p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/swiat.jpg" alt="swiat" />
                                        <p>To jest ogromny sukces, podpisaliśmy wieloletnie kontrakty i umowy z najwiekszymi firmami ze świata. Z naszych usług korzystają firmy z ponad 20 krajów. Jest to załuga naszego zespołu, jego profesjonalnego podejścia do zleconych zadań </p>
                                        
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-times me-1"></i>
                                            Zamknij
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script src="js/lightbox.js"></script>
            <!--<script src="https://maps.google.com/maps/api/js?sensor=false" ></script>-->
            <script src="./js/login.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        </body>
    </html>
<?php
    }else{
       header("location:./php/login.php");
    }
