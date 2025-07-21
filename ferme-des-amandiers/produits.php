<?php
// Connexion à la base de données
require_once 'data/db.php';

//On recupère la saison courante via la date
$date = new DateTime();
// On détermine la saison courante en fonction du mois
$saisonCourante = '';

// On utilise le mois de la date actuelle pour déterminer la saison
// Les mois sont numérotés de 1 à 12
if ($date->format('m') >= 3 && $date->format('m') <= 5) {
    $saisonCourante = 'Printemps';
} elseif ($date->format('m') >= 6 && $date->format('m') <= 8) {
    $saisonCourante = 'Été';
} elseif ($date->format('m') >= 9 && $date->format('m') <= 11) {
    $saisonCourante = 'Automne';
} else {
    $saisonCourante = 'Hiver';
}

// Requête pour récupérer les produits, leur saison et leurs jours de disponibilité
$sql = "
    SELECT 
        p.id, 
        p.nom, 
        p.description, 
        p.image_url, 
        s.nom AS saison,
        GROUP_CONCAT(j.nom SEPARATOR ', ') AS jours
    FROM produits p
        LEFT JOIN saisons s ON p.saison_id = s.id
        LEFT JOIN produit_jour pj ON p.id = pj.produit_id
        LEFT JOIN jours j ON pj.jour_id = j.id
    WHERE s.nom = :saison
    GROUP BY p.id
";

// Préparation et exécution de la requête
$stmt = $pdo->prepare($sql);
// On lie le paramètre :saison à la saison courante
// On utilise PDO::PARAM_STR pour indiquer que c'est une chaîne de caractères
$stmt->bindParam(':saison', $saisonCourante, PDO::PARAM_STR);
// On exécute la requête
$stmt->execute();
// Récupération des résultats
// On utilise fetchAll pour récupérer tous les produits de la saison courante
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'partials/header.php'; ?>

<main>
    <!-- Titre principal -->
    <section>
        <h1>Nos produits de saison</h1>
        <p>Voici les produits disponibles cette semaine à la vente directe.</p>
    </section>

    <!-- Boutons de filtrage (à rendre fonctionnels en JavaScript) -->
    <section>
        <button data-filtre="tous">Tous</button>
        <button data-filtre="mercredi">Mercredi</button>
        <button data-filtre="samedi">Samedi</button>
        <!-- Les boutons doivent permettre de filtrer les produits affichés selon le jour -->
    </section>

    <!-- Liste des produits -->
    <section>
        <div class="grille-produits">
        <?php foreach ($produits as $produit): ?>
            <?php
                // On prépare les classes pour le filtrage JS (ex : "mercredi samedi")
                $joursClasses = strtolower(str_replace(', ', ' ', $produit['jours']));
            ?>
            <div class="produit" data-jour="<?= $joursClasses ?>">
                <img src="<?= $produit['image_url'] ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">
                <h2><?= htmlspecialchars($produit['nom']) ?></h2>
                <p><?= htmlspecialchars($produit['description']) ?></p>
                <p><em>Saison : <?= $produit['saison'] ?></em></p>
                <p>Jours : <?= $produit['jours'] ?></p>
            </div>
        <?php endforeach; ?>
        </div>
    </section>

    <!-- Script JS pour le filtrage dynamique -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const boutons = document.querySelectorAll('[data-filtre]');
        const produits = document.querySelectorAll('.produit');

        // Ajout d'un écouteur de transitionend pour chaque produit
        produits.forEach(produit => {
            produit.addEventListener('transitionend', function(e) {
                if (e.propertyName === 'opacity') {
                    const nomProduit = produit.querySelector('h2').textContent;
                    if (produit.classList.contains('hidden')) {
                        console.log('Transition FINIE (masqué) :', nomProduit);
                    } else {
                        console.log('Transition FINIE (affiché) :', nomProduit);
                    }
                }
            });
        });

        boutons.forEach(bouton => {
            bouton.addEventListener('click', function() {
                const filtre = this.getAttribute('data-filtre');
                console.log('Filtre sélectionné :', filtre);
                produits.forEach(produit => {
                    const nomProduit = produit.querySelector('h2').textContent;
                    if (filtre === 'tous' || produit.getAttribute('data-jour').includes(filtre)) {
                        produit.classList.remove('hidden');
                        console.log('Affiché (début transition):', nomProduit);
                    } else {
                        produit.classList.add('hidden');
                        console.log('Masqué (début transition):', nomProduit);
                    }
                });
            });
        });
    });
    </script>
</main>

<?php include 'partials/footer.php'; ?>
