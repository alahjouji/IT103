Fonctionnalités
---------------

implémentées:
- Inscription d'un utilisateur au serveur
- Authentification d'un utilisateur
- Déconnexion d'un utilisateur
- Ajout ou édition d'une question
- Ajout, édition ou supression d'une réponse
- Vote pour une seule des réponses d'une question
- Changement de vote pour une autre réponse
- Affichage de la liste des questions sans réponse sur la page d'accueil
- Affichage de la liste des questions de l'utilisateur connecté sur la page d'accueil
- Affichage de la liste de toutes les questions
- Voir une question associé à toutes ses réponses 

non implémentées: RAS



Architecture
------------

src/config.php :

	Fichier contenant les variables globales de configuration de la base de données et du site.

src/functions.php :

	Fichier contenant toutes les fonctions utilisées dans le code php des autres fichiers.

src/install.php :

	Fichier permettant de:
	 créer les tables réponses, questions, utilisateurs et votes.
	 créer 2 utilisateurs (max@max.max/ Max/ max) et (bob@bob.bob/ Bob/ bob).
	 créer une question de Max Hello? et une réponse de Bob Hello! à cette question.
	 ajouter un vote de Max pour la réponse de Bob.
		

src/index.php :
	
	Ce fichier permet à un utilisateur de s'authentifier s'il fournit une adresse mail et un mot de passe existants dans la base de données. 
	La saisie du mail et du pseudo doit respecter les contraintes suivantes: mail dans un format valide et aucun champ vide. 
	Des messages d'erreurs s'affichent dans le cas échéant.
	Si un utilisateur est déjà connecté ou arrive à se connecter ce fichier renvoit directement à la page d'accueil.
        Ce fichier contient aussi un lien vers le formulaire d'inscription.

src/back_inscription_form.php :

	ce fichier permet à un nouvel utilisateur de s'inscrire sur le serveur s'il remplis tous les champs, avec un mail et un pseudo qui n'existent pas déjà 
        dans la base de données et s'il retape le même mot de passe correctement.
	Dans le cas d'un champ vide ou d'une consigne non respectée, un message d'erreur est affiché.

src/home.php :

	Ce fichier représente la page d'accueil affiché pour un utilisateur authentifié.
	Il permet à ce dernier de voir la liste des dérnières questions sans réponse et la liste de ses propres questions.
	Il peut aussi accéder au réponses de chaque question en cliquant dessus.
	Il contient aussi une barre avec des liens pour poser une nouvelle question, Voir la liste de toutes les questions ou se déconnecter.

src/back_questions.php :

	Ce fichier permet à un utilisateur authentifié de voir la liste de toutes les questions.
	Il peut aussi accéder aux réponses de chaque question en cliquent dessus.

src/back_questions_form.php :

	Ce fichier permet à tout utilisateur authentifié de poser une nouvelle question ou d'éditer une question qui existe déjà si c'est lui qui l'avait posé.
	En cas d'édition toutes les réponses déjà associé seront supprimés.

src/back_reponses.php :

	Ce fichier permet à un utilisateur authentifié de voir une question et toutes ses réponses.
	Si c'est lui qui avait posé la question il trouvera un lien pour l'éditer.
	Il peut aussi voir le nombre de votes pour chaque réponse, ainsi si c'est sa réponse deux liens d'édition et de supression s'afficheront à côté d'elle 
        sinon un lien de vote sera affiché.
	En cas de supression d'une réponse tous les votes associés seront supprimés aussi.
	
src/back_reponses_form.php :
	
	Ce fichier permet à tout utilisateur authentifié de donner une nouvelle réponse à une question ou d'éditer une réponse qui existe déjà si c'est lui qui 
        l'avait donné.
	En cas d'édition toutes les votes déjà associé seront supprimés et l'utilisateur est renvoyé à la question associé.

src/back_votes.php :

	Ce fichier permet à un utilisateur d'ajouter un vote à une réponse. 
	Si il a déjà voté pour cette réponse un message d'erreur est affiché.
	si il a déjà voté pour une autre réponse de la même question il se voit proposé un choix entre garder son vote pour l'autre réponse ou le modifier et 
	voter pour celle-ci.

src/back_votes_edit.php :

	Si un utilisateur désire de changer son vote pour une autre question ce fichier permet de supprimer son vote de la table des votes, décrémenter le nombre
        de votes de la première réponse, ajouter un nouveau vote et incrémenter le nombre de votes de la deuxième réponse.

src/bootstrap.css
src/signin.css
src/offcanvas.css     
src/grid.css

	4 fichiers css de la librairie bootstrap pour introduire du code css avancé et mettre en forme le site.




