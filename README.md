💪 Challenge
Homer veut ajouter sa photo de profil
Voici un challenge qui va permettre la rencontre entre Homer et Marge !

Commence par créér un fichier form.php
Ecris le code du formulaire avec un input type file. Tu peux t'inspirer du formulaire plus haut.
Ecris le code PHP pour gérer l'upload de ton image. Attention ! Ton code sera avant ton formulaire. Tu peux aussi t'inspirer du code plus haut.
Sécurise ton formulaire avec la gestion du poids (1Mo max) et de l'extension (jpg, png, gif, webp). Tu peux aussi t'inspirer du code plus haut.
Affiche sa photo, (tu peux, ajouter son nom, son prénom, son age en dur dans le code, ou encore mieux optionnellement, en ajoutant des champs dans ton form et en récupérant les informations de $_POST)
Essaie également de faire en sorte que le nom de la photo soit unique.
Inspire-toi de cet exemple pour le rendu final
image

Dans tes projets, tu seras très souvent amené à gérer ainsi de l'upload de fichier. La plupart du temps, tu auras à sauvegarder les chemins vers ces fichiers dans une base de données, ce qui te permettra de lister par exemple les fichiers déjà présents, et de les supprimer si besoin.

BONUS: Ajoute un bouton Delete permettant de supprimer le fichier. Pour cela, tu devras utiliser la fonction unlink de PHP qui permet de supprimer un fichier. Avant de supprimer un fichier, pense à vérifier qu'il existe bel et bien. La fonction file_exists pourra t'aider.
Critères de validation
Un fichier form.php
Le formulaire permet d'uploader la photo de Homer,
Le script permettant de gérer l'upload
Le script permettant de vérifier la taille et l'extension
Si le poids de la photo dépasse 1Mo, l'upload est rejetée et un message d'erreur approprié apparaît
la photo ayant une extension autre que jpg, png, gif ou webp est rejetée, un message d'erreur approprié apparaît
La photo uploadée doit avoir un nom unique !
