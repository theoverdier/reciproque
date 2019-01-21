# reciproque
Projet Reciproque

POUR APPORTER DES MODIFICATIONS VIA LE TERMINAL
git clone https://github.com/theoverdier/reciproque.git // Permet de récupérer le fichier modifié
git add Nom du fichier qui a été modifié // Permets d'intégrer UNIQUEMENT son fichier modifié
git commit -am "MESSAGE DE COMMIT" // Faire un commit UNIQUEMENT de son fichier modifié
git push // Envoyer les modification sur le fichier partagé

ARCHITECTURE DU CODE
ASSET : Dossier de ressource (son, image, icon). Dossier modifiable
BOOTSTRAP : Dossier contenant CSS JS bootstrapt si le CDN ne fonctionne pas. NE PAS TOUCHER.
CSS
JS
PAGE : Contient les fichier "header.php" et "footer.php". Si bibliothèque js/ fichier js/ ou css à inclure --> header.php
ne pas toucher "footer.php"
"page.php" --> modèle : incluant "header.php" et "footer.php" (à copier coller)

