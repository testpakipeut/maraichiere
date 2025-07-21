

<!-- Inclusion du header (fichier séparé) -->
<?php include('partials/header.php'); ?>
<!-- Le fichier header.php contiendra le logo, le menu de navigation, etc. -->

<main>
    <!-- Hero -->
    <section id="hero" class="hero-section">
        <div class="hero-content">
            <h1>Des légumes frais, locaux et de saison</h1>
            <p>Vente directe à la ferme chaque mercredi et samedi</p>
        </div>
    </section>

    <!-- Présentation de la ferme -->
    <section id="presentation" class="section-flex bg-white">
        <div class="presentation-text">
            <h2>Bienvenue à la Ferme des Amandiers</h2>
            <p>Installée depuis 2015, Sandrine cultive avec passion une grande variété de légumes de saison en agriculture raisonnée. Chaque semaine, elle propose ses récoltes fraîches à la vente directe, en drive à la ferme, chaque mercredi et samedi.</p>
            <p>Le site vous permet désormais de consulter les paniers disponibles avant de vous déplacer, et de découvrir l’univers de la ferme : ses méthodes de culture, ses valeurs, et les engagements de Sandrine pour une alimentation plus saine et locale.</p>
        </div>
        <div class="presentation-img">
            <img src="assets/img/hero-header.jpg" alt="Image de la ferme" />
        </div>
    </section>

    <!-- À propos de Sandrine -->
    <section id="a-propos" class="section-flex bg-light">
        <div class="a-propos-img">
            <img src="assets/img/sandrine.jpg" alt="Photo de Sandrine" />
        </div>
        <div class="a-propos-text">
            <h2>À propos de Sandrine</h2>
            <p>Sandrine est une maraîchère passionnée par la terre et les relations humaines. Engagée pour une agriculture raisonnée, elle met un point d’honneur à cultiver des légumes de qualité tout en respectant les rythmes de la nature.</p>
            <p>Proche de sa clientèle, elle aime échanger, conseiller et partager des recettes autour des produits de saison. Sa ferme est un lieu de vie, de rencontre, et de gourmandise.</p>
        </div>
    </section>

    <!-- Nos valeurs -->
    <section id="valeurs">
        <div class="valeurs-container">
            <h2>Nos valeurs</h2>
            <div class="valeurs-grid">
                <div class="valeur-card">
                    <h3>Saisonnalité</h3>
                    <p>Nous ne vendons que des produits cultivés à maturité, respectant les saisons.</p>
                </div>
                <div class="valeur-card">
                    <h3>Transparence</h3>
                    <p>Vous savez d’où viennent vos produits et comment ils sont cultivés.</p>
                </div>
                <div class="valeur-card">
                    <h3>Circuit court</h3>
                    <p>Pas d’intermédiaires : directement du champ à votre panier.</p>
                </div>
                <div class="valeur-card">
                    <h3>Engagement local</h3>
                    <p>Nous participons activement à la vie du territoire et soutenons l’agriculture locale.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Comment ça marche -->
    <section id="fonctionnement" class="bg-light">
        <div class="fonctionnement-container">
            <h2>Comment ça marche ?</h2>
            <div class="fonctionnement-grid">
                <div class="etape-card">
                    <h3>1. Consultez les paniers</h3>
                    <p>Chaque mardi et vendredi, les paniers disponibles sont mis à jour sur le site.</p>
                </div>
                <div class="etape-card">
                    <h3>2. Venez au drive</h3>
                    <p>Rendez-vous à la ferme le mercredi ou le samedi pour récupérer vos produits.</p>
                </div>
                <div class="etape-card">
                    <h3>3. Profitez des saveurs locales</h3>
                    <p>Savourez des légumes cultivés avec soin, à deux pas de chez vous.</p>
                </div>
            </div>
            <a href="produits.php" class="cta-btn">Voir les produits</a>
        </div>
    </section>
</main>

<!-- Le fichier footer.php contiendra les coordonnées, mentions légales, etc. -->

<?php include 'partials/footer.php'; ?>
