<?php get_header(); ?>

<div class="about-container">

<?php 
    // https://stackoverflow.com/questions/3127385/wordpress-get-the-page-id-outside-the-loop
    $page_object = get_queried_object();
    $page_id     = get_queried_object_id();
    if ( post_password_required($page_id) ) : 
        echo get_the_password_form();

    else:
?>

    <div class="about-container__hero-about">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/hero.jpg" alt="">
        <h2 class="hero-about__headline">Die Digitalisierung <br>von Unternehmen <br>sinnvoll unterstützen</h2>
    </div>

    <div class="about-container__text">
        <p>Als Business Analysten, Softwareentwickler und IT-Berater begleiten wir unsere Kunden aus Branchen wie Automotive, Logistik, Luftfahrt, Touristik und Finanzdienstleistungen teilweise schon seit vielen Jahren  Mit targenio ermöglichen wir die Digitalisierung und Automatisierung von Geschäftsvorgängen entlang von Methoden und Techniken des  Business Process Management (BPM). Mit der Software targenio bieten wir dabei eine Alternative zu gängigen Standardsoftware-Systemen wie beispielsweise klassischen ERP-Lösungen. In der Regel mit dem Mehrwert, dass Automatisierung sehr viel schneller, flexibler und kundenindividueller umgesetzt werden kann – bei voller Integration in bestehende Umsysteme und dem Fokus, dezidierte Geschäftsvorgänge end-to-end abzubilden.</p>
    </div>

    <div class="about-container__banner">
        <h3 class="banner-about__headline">Aus der Logik von <br>end-to-end-Prozessen <br>entwickelt</h3>
    </div>

    <div class="about-container__text">
        <p>Mit targenio unterstützen wir Kunden dabei end-to-end Geschäftsvorgänge einfach, effektiv und selbstbestimmt abzubilden. Im Kern stellt targenio eine Standardsoftware zur vorgangsorientierten Bearbeitung von Geschäftsvorfällen dar bestehend aus fachlichen Modulen, Designern und Softwareentwicklung. Um die Software noch konsequenter weiterzuentwickeln führen wir das vormalige Geschäftsfeld targenio von Rödl & Partner seit 01.01.2020 in der targenio GmbH weiter.</p>
    </div>

    <div class="about-container__profile-card-wrapper">
        <div class="profile-card">
            <div class="profile-card__img">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/kolbenschlag_michael.jpg" alt="">
            </div>
            <div class="profile-card__info">
                <div class="info__name">
                    <h4 class="profile-card-headline">
                        Michael Kolbenschlag<br>
                        <span>Geschäftsführer</span>
                    </h4>
                </div>
                <div class="info__social">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-awesome-linkedin.svg" alt="">
                    </a>
                </div>
                <div class="info__descr">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
            </div>
        </div>
        <div class="profile-card">
            <div class="profile-card__img">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/koenig_marcus.jpg" alt="">
            </div>
            <div class="profile-card__info">
                <div class="info__name">
                    <h4 class="profile-card-headline">
                        Marcus König<br>
                        <span>Geschäftsführer</span>
                    </h4>
                </div>
                <div class="info__social">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-awesome-linkedin.svg" alt="">
                    </a>
                </div>
                <div class="info__descr">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
            </div>
        </div>
        <div class="profile-card">
            <div class="profile-card__img">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/herrmann_holger.jpg" alt="">
            </div>
            <div class="profile-card__info">
                <div class="info__name">
                    <h4 class="profile-card-headline">
                        Holger Herrmann<br>
                        <span>Leiter Softwareentwicklung</span>
                    </h4>
                </div>
                <div class="info__social">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-awesome-linkedin.svg" alt="">
                    </a>
                </div>
                <div class="info__descr">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</div>
            </div>
        </div>
    </div>

    <div class="about-container__quote">
        <h3 class="quote-about" id="quote-about">Wir wollen Unternehmen die <br>Freiheit geben, Geschäftsvorgänge <br>nach Ihren individuellen <br>Bedürfnissen zu digitalisieren.</h3>
        <!-- <h3 class="quote-about">Wir wollen Unternehmen &shy;die Freiheit geben, Geschäftsvorgänge &shy;nach Ihren individuellen &shy;Bedürfnissen zu digitalisieren.</h3> -->
    </div>

    <div class="about-container__fact-blocks">
        <div class="fact-blocks__block">
            <h3>Fakt 001</h3>
        </div>
        <div class="fact-blocks__block">
            <h3>Fakt 002</h3>
        </div>
        <div class="fact-blocks__block">
            <h3>Fakt 003</h3>
        </div>
        <div class="fact-blocks__block">
            <h3>Fakt 004</h3>
        </div>
        <div class="fact-blocks__block">
            <h3>Fakt 005</h3>
        </div>
        <div class="fact-blocks__block">
            <h3>Fakt 006</h3>
        </div>
    </div>

<?php
    endif;
?>

</div>

<?php get_footer(); ?>