<?php $title = "THC - Service de livraison de salade de fruits au Bénin";

// $articles

ob_start(); ?>

<main class="main">
  <div class="hero">
    <div class="hero__content">
      <div class="hero__content__text">
        <h1> The <br> Healthy Choice (THC) </h1>
        <p>Votre solution pour des salades <br>
          de fruits livrées à domicile ou au boulot à Cotonou</p>

        <p>
          <span class="star"><i class="fas fa-check"></i></span>Livraison régulière et simplifiée<br>
          <span class="star"><i class="fas fa-check"></i></span>Personnalisez votre sélection de fruits<br>
          <span class="star"><i class="fas fa-check"></i></span>Abonnement adapté à vos besoins
        </p>


        <a href="index.php?action=homePage#offers" class="btn">
          <i class="fas fa-arrow-right"></i> Voir le catalogue
        </a>

      </div>

      <div class="hero__content__image">
        <img src="public/images/logo-rond.png" alt="Logo THC">
      </div>
    </div>

  </div>

  <div class="process" id="process">
    <div class="process__title">
      <h2>
        Comment ça marche ? 🍎
      </h2>

      <p>
        Choisissez votre pack avec les fruits de votre choix
        et programmez vos livraisons.
        Nous nous occupons du reste.
      </p>
    </div>

    <div class="process__content">
      <div class="process__content__item">
        <span class="number">
          1
        </span>

        <span class="action">
          Créez un compte
        </span>

        <span class="easy">
          Simple et <br> rapide.
        </span>
      </div>

      <div class="process__content__item">
        <span class="number">
          2
        </span>

        <span class="action">
          Sélectionnez votre pack en fonction de vos goûts
        </span>

        <span class="easy">
          Ananas, pastèques, papaye, etc.
        </span>
      </div>

      <div class="process__content__item">
        <span class="number">
          3
        </span>

        <span class="action">
          Recevez vos livraisons
        </span>

        <span class="easy">
          Fraîcheur <br>garantie.
        </span>
      </div>
    </div>
  </div>

  <div class="reason">
    <div class="reason__content">
      <div class="reason__content__text">
        <h2>
          Comme vous voulez 🍇
        </h2>


        <p>
          Parce que nous adapter à vos besoins
          est une priorité pour nous, vous avez la
          possibilité de choisir vos fruits et vous faire
          livrer au lieu de votre choix, deux ou trois fois
          par semaine selon vos besoins.
        </p>

        <ul>
          <li>
            <i class="fas fa-check-circle"></i>Choix de vos fruits préférés
          </li>
          <li>
            <i class="fas fa-truck"></i>Livraisons simples au lieu de votre choix
          </li>
          <li>
            <i class="fas fa-gift"></i>Cash back de 10% reversés chaque mois pour chaque nouveau filleul
          </li>
        </ul>

        <button class="btn btn-primary">
          <i class="fas fa-info-circle"></i> En savoir plus
        </button>
      </div>

      <div class="reason__content__image">
        <img src="./public/images/fruits3.jpg" alt="salades de fruits au benin">
      </div>
    </div>
  </div>

  <?php include './././fruits.php' ?> 

  <div class="reason">
    <div class="reason__content">

      <div class="reason__content__image">
        <img src="./public/images/fruits1.jpeg" alt="salades de fruits au benin">
      </div>
      <div class="reason__content__text">
        <h2>
          <i class="fas fa-money"></i>
          Des récompenses pour votre générosité ! 🍍
        </h2>

        <p class="text-justify">

          Avec THC, des fruits pour vous et des récompenses pour votre générosité ! 🍍

          Prendre des fruits régulièrement, c’est bon pour la santé et encore meilleur avec THC ! Chaque semaine,
          recevez des délicieux packs de salade de fruits, livrés directement chez vous ou à votre boulot. <strong>Mais
            ce n’est pas tout;</strong>

          <br> <br>En parrainant vos proches, vous bénéficiez d’un système de cashback simple et avantageux. Chaque
          mois, <strong>10% de l’abonnement de votre filleul vous est reversé </strong>.

          Un geste pour votre bien-être, un plaisir à partager, et une récompense à la clé.
        </p>
      </div>


    </div>
  </div>

  <div class="pricing" id="pricing">
    <h2 style="color: white">
      Tarifs 🍉
    </h2>
    <div class="pricing__content text-center">
      <div class="pricing__content__item mx-auto">
        <span class="offer-name">
          <i class="fas fa-leaf"></i> Starter
        </span>
        <ul>
          <li><i class="fas fa-check"></i> 2 livraisons / semaine</li>
        </ul>
        <strong class="price">
          <i class="fas fa-coins"></i> 7.000 XOF
        </strong>
        <p class="small">
          Validité: 30 jours
        </p>
        <a href="index.php?action=mySubscriptionPage" class="btn-select">Choisir</a>
      </div>
      <div class="pricing__content__item featured mx-auto">
        <span class="offer-name">
          <i class="fas fa-star"></i> Premium
        </span>
        <ul>
          <li><i class="fas fa-check"></i> 3 livraisons / semaine</li>
        </ul>
        <strong class="price">
          <i class="fas fa-coins"></i> 9.000 XOF
        </strong>
        <p class="small">
          Validité: 30 jours
        </p>
        <a href="index.php?action=mySubscriptionPage" class="btn-select">Choisir</a>
      </div>
      <div class="pricing__content__item mx-auto">
        <span class="offer-name">
          <i class="fas fa-gem"></i> Gold
        </span>
        <ul>
          <li><i class="fas fa-check"></i> 5 livraisons / semaine</li>
        </ul>
        <strong class="price">
          <i class="fas fa-coins"></i> 15.000 XOF
        </strong>
        <p class="small">
        Validité: 30 jours
        </p>
        <a href="index.php?action=mySubscriptionPage" class="btn-select">Choisir</a>
      </div>
    </div>
  </div>


  <section class="testimonials">
    <h2 style="color: white"> Témoignages 🥭</h2>
    <div class="testimonial-slider">  
      <div class="testimonial-track">
        <div class="testimonial-card">
          <p class="quote">
            THC a littéralement changé ma routine quotidienne. Chaque matin, 
            je reçois une salade fraîche selon mes goûts, . Je n'ai plus besoin de m'inquiéter pour mes allergies à certains fruits, et
              cela me fait vraiment plaisir. "
          </p>
          <p class="author">Marie DOSSOU.</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        <div class="testimonial-card">
          <p class="quote">
            "J’ai essayé le service d’abonnement pour mes pauses déjeuner au bureau, et j’en suis ravi ! 
            Les fruits sont toujours d'une fraîcheur incomparable, et les portions sont généreuses.
             Merci à toute l’équipe pour leur travail exceptionnel."
          </p>
          <p class="author">Thomas LOKO.</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        <div class="testimonial-card">
          <p class="quote">
            "Je suis abonnée depuis six mois, et je suis impressionnée par la régularité et la
             qualité des livraisons. 
               En tant que personne soucieuse de ma santé, je recommande vivement 
               ce service à tous ceux qui veulent allier plaisir et nutrition."
          </p>
          <p class="author">Sophie MAHOUGNON</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
        <div class="testimonial-card">
          <p class="quote">
            "Je n’ai jamais vu un service client aussi efficace !! Les fruits sont excellents, et le packaging est 
            très pratique pour emporter partout. Bravo pour ce service qui dépasse toutes mes attentes."
          </p>
          <p class="author">Lucas CAKPO</p>
          <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-nav">
      <button class="prev"><i class="fas fa-chevron-left"></i></button>
      <button class="next"><i class="fas fa-chevron-right"></i></button>
    </div>
</section>



  <div class="reason">
    <div class="reason__content">

      <div class="reason__content__image">
      <img src="./public/images/fruits0.jpeg" alt="salades de fruits au benin" style='width: 100%; border-radius: 10px'>
      </div>
      <div class="reason__content__text">
      <div class="faq__container">
                  <h2 class="faq__title">Questions Fréquemment Posées 🍊</h2>
                  <div class="faq__list">
                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Dans quelles zones livrez-vous à Cotonou ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>Nous livrons dans les zones suivantes: <br>
                            <ul>
                              <li>
                                1er arrondissement (Le Bélier, Dandji, Donatin, Tokplegbe, Tanto, Suru-Léré, etc ...)
                              </li>
                              <li>
                              2e arrondissement (Yénawa, Kowégbo, Irédé, Kpondéhou 1et 2, Sènadé 1 et 2, etc ...)
                              </li>
                              <li>
                              3e arrondissement (Adjégoulè, Adogléta, Hounonkpo, Hlakonmè, Kpankpan, Midombo, Sègbéya, etc ....)
                              </li>

                              <li>
                              4e arrondissement (Sodjeatinmè Est, Sodjeatinmè Ouest, Sodjeatinmè centre, Abokicodji centre, Abokicodji lagune, Dédokpo, etc ... )
                              </li>

                              <li>
                              5e arrondissement (Guinkomè, Tokpa hoho, Wlacodji Kpodji, Wlacodji plage, Dota, Gbeto, Mifongu, Zongo, etc ...)
                              </li>

                              <li>
                              6e arrondissement ( Aidjèdo 1, 2, 3,4 ; Ahouansori Agata, Ahouansori Toweta 1et 2, Gbèdromèdé 1 et 2, etc ...)
                              </li>

                              <li>
                              7e arrondissement ( Gbenan, Gbewa (Batito), Sedami, Sedjro, Todoté, Yevedo, Dagbédji, Enagnon, Fignon, Missité, Sehogan, etc ...)
                              </li>
                              <li>
                              8e arrondissement (Agbodjedo, Agontikon, Gbédagba, Houéhoun, Houénoussou, Médedjro, Tonato, Minonkpo, etc ...)
                              </li>

                              <li>
                              9e arrondissement (Fifadji, Vossakpodji, Zogbo, Zogbohohouè, etc ...)
                              </li>

                              <li>
                              10e arrondissement  (Gbènonkpo, Kouhounou, Midédji, Missékplé, Missogbé, Vèdoko, etc ...)
                              </li>

                              <li>
                              11e arrondissement (Gbediga 1 et2, Gbégamey 1, 2, 3, 4, Saint Jean, Alobatin, Ayidoté, Finagnon, Houéyiho 1 et 2, Vodjè centre, etc ...)
                              </li>
                            </ul></p>
                          </div>
                      </div>
                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Comment programmer mes livraisons ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>
                                Dans votre tableau de bord, cliquez sur le menu (programmer), choisissez le jour, l'heure et le pack de 
                                votre choix, chaque semaine nous appliquerons ces choix, vous pouvez à tout moment modifier vos choix. Pour 
                                ce faire aller dans le tableau recapitulatif de vos livraisons à venir toujours dans le tableau de bord et Sélectionnez
                                la ligne concernée pour apporter des modifications.
                              </p>
                          </div>
                      </div>
                      
                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Quels types de fruits sont inclus dans vos salades ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>Nous sélectionnons une variété de fruits frais et de saison, tels que la mangue, l'ananas,
                                 la pastèque, les fraises, et bien d’autres.</p>
                          </div>
                      </div>
                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Combien de temps mes salades de fruits restent-elles fraîches ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>
                              Nos salades sont préparées quotidiennement et livrées fraîches. 
                              Si elles sont conservées au réfrigérateur, elles restent fraîches jusqu'à 3 jours.
                              </p>
                          </div>
                      </div>

                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Comment se passe l'affiliation ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>
                                Vous avez un lien de parrainage présent dans le menu "affiliation", chaque fois que quelqu'un qui s'est inscrit grâce à votre 
                                lien renouvelle son abonnement, 10% du montant payé vous sont reversés. Vous pouvez retirer cette somme ou vous en servir pour 
                                renouveller votre abonnement. 
                                <br> (Vous devez avoir un abonnement en cours pour profiter de ce service d'affiliation)
                              </p>
                          </div>
                      </div>


                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Quelle est la fréquence de livraison ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>
                              Vous pouvez choisir des livraisons quotidiennes, hebdomadaires ou selon un calendrier qui vous convient.
                              </p>
                          </div>
                      </div>
                      <div class="faq__item">
                          <button class="faq__question">
                              <span>Comment puis-je vous contacter en cas de problème ?</span>
                              <svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                          </button>
                          <div class="faq__answer">
                              <p>
                              Vous pouvez nous joindre par téléphone, WhatsApp, ou via notre formulaire de contact sur le site. 
                              Nous répondons rapidement à toutes vos demandes.
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
      </div>


    </div>
  </div>



  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="contact-container">
          <div class="contact-form-container" id="contact">
            <h2> Contactez-nous 🍑</h2>
            <form class="contact-form" action="#" method="POST">
              <div class="form-row">
                <div class="form-group">
                  <label for="nom">
                    <i class="fas fa-user"></i> Nom
                  </label>
                  <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                  <label for="prenoms">
                    <i class="fas fa-user"></i> Prénoms
                  </label>
                  <input type="text" id="prenoms" name="prenoms" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group">
                  <label for="email">
                    <i class="fas fa-envelope"></i> Email
                  </label>
                  <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="telephone">
                    <i class="fas fa-phone"></i> Téléphone
                  </label>
                  <input type="tel" id="telephone" name="telephone" required>
                </div>
              </div>
              <div class="form-group">
                <label for="objet">
                  <i class="fas fa-tag"></i> Objet
                </label>
                <input type="text" id="objet" name="objet" required>
              </div>
              <div class="form-group">
                <label for="message">
                  <i class="fas fa-comment"></i> Message
                </label>
                <textarea id="message" name="message" rows="5" required></textarea>
              </div>
              <div class="form-group checkbox-group">
                <input type="checkbox" id="cgu" name="cgu" required>
                <label for="cgu">
                  J'accepte les <a hreff="#">conditions générales d'utilisation</a>
                </label>
              </div>
              <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> Envoyer
              </button>
            </form>
          </div>
          <div class="contact-image" id="about">
            <h3>
              A-propos
            </h3>

            <strong>
              THC – Votre Livraison de Salades de Fruits à Cotonou
            </strong>

            <p>
              Nous vous offrons un service de livraison rapide et pratique de salades de fruits fraîches à domicile ou
              au bureau à Cotonou. Que vous soyez à la recherche
              d'une collation saine ou d'un déjeuner léger, nous vous
              proposons une sélection de fruits frais soigneusement
              choisis, livrés directement à votre porte. <br>

              <br>Profitez de nos options d'abonnement flexibles et personnalisées pour satisfaire vos envies tout au
              long de la semaine. Avec THC, la santé et le goût sont à portée de main !
            </p>


          </div>
        </div>


      </div>
    </div>
  </section>

</main>



<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>

<?php include 'parts/footer.php'; ?>
</body>

</html>